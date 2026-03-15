<?php

if (!function_exists('render_captcha')) {
    /**
     * Genera l'HTML complet d'un Captcha (Imatge + Input + Botó Refrescar + Javascript)
     * i guarda el valor inicial a la sessió.
     *
     * @param array $config Configuració opcional per a la llibreria Text2Image
     * @return string Codi HTML per imprimir a la vista
     */
    function render_captcha(array $config = []): string
    {
        // 1. Configuració per defecte (es pot sobreescriure per paràmetres)
        $defaultConfig = [
            'length'     => 5,
            'textColor'  => '#ffffff',
            'backColor'  => '#395786',
            'noiceLines' => 20,
            'noiceDots'  => 30
        ];
        $finalConfig = array_merge($defaultConfig, $config);

        // 2. Generem el Captcha i el guardem a la sessió
        $captchaLib = new \App\Libraries\Text2Image($finalConfig);
        $captchaLib->captcha();
        session()->set('captcha_text', $captchaLib->text);

        // 3. Obtenim la imatge i la ruta per l'AJAX
        $imageBase64 = $captchaLib->toImg64();
        $refreshUrl  = base_url('captcha/refrescar');

        // 4. Construïm el bloc HTML i Javascript (usant sintaxi Heredoc per claredat)
        $html = <<<HTML
        <div class="captcha-container" style="margin-bottom: 15px;">
            <label for="captcha_input" style="display: block; margin-bottom: 5px; font-weight: bold;">
                Introdueix el codi de seguretat:
            </label>
            
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <img id="imatge-captcha" src="data:image/png;base64,{$imageBase64}" alt="Captcha de seguretat" style="border: 1px solid #ccc; border-radius: 4px;">
                
                <button type="button" id="btn-refrescar-captcha" style="cursor: pointer; padding: 8px 12px; background: #f8f9fa; border: 1px solid #ddd; border-radius: 4px;" title="Generar un codi nou">
                    🔄 Refrescar
                </button>
            </div>
            
            <input type="text" name="captcha_input" id="captcha_input" required autocomplete="off" style="padding: 8px; width: 100%; max-width: 180px; box-sizing: border-box;">
        </div>

        <script>
        // Ens assegurem que el JS només s'executi un cop si hi ha múltiples formularis
        if (typeof window.captchaScriptLoaded === 'undefined') {
            window.captchaScriptLoaded = true;
            
            document.addEventListener('DOMContentLoaded', function() {
                const btnRefrescar = document.getElementById('btn-refrescar-captcha');
                const imgCaptcha = document.getElementById('imatge-captcha');

                if (btnRefrescar && imgCaptcha) {
                    btnRefrescar.addEventListener('click', function() {
                        // Afegim un timestamp per evitar que el navegador guardi la petició a la memòria cau (cache)
                        const timestamp = new Date().getTime();
                        
                        fetch('{$refreshUrl}?t=' + timestamp)
                            .then(response => response.json())
                            .then(data => {
                                if(data.status === 'ok') {
                                    imgCaptcha.src = 'data:image/png;base64,' + data.imatge;
                                    document.getElementById('captcha_input').value = ''; // Netegem l'input
                                    document.getElementById('captcha_input').focus();
                                }
                            })
                            .catch(error => console.error('Error carregant el nou captcha:', error));
                    });
                }
            });
        }
        </script>
HTML;

        return $html;
    }
}