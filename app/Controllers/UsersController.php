<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\Text2Image;

class UsersController extends BaseController
{
    public function index()
    {
        //
    }
    public function login_view(){
    helper('form');
    return view('Auth/login');
    }

    public function login_post(){

     helper('form');
     $session = session();
     $userModel = new UsersModel();
   
     $correo =$this->request->getPost('correo');
     $pass=$this->request->getPost('pass');
     $validation = [
        'correo' => 'required',
        'pass'=> 'required'
     ];
     $user = $userModel->where('correo',$correo)->first();

     if($user){
     if(password_verify($pass,$user['contrasena'])){
        $sessionData = [
            'id' =>$user['id'],
            'nom'=>$user['nom'],
            'contrasena'=>$user['contrasena'],
            'rol' => $user['rol'],
            'correo'=> $user ['correo']
        ];
        $session ->set($sessionData);
       
        return redirect()->to('Twitter/Admin/Dashboard')->with('succes','has iniciado session'); // se cambiaria a privat dashboard

     }else{
        return redirect()->back()->withInput()->with('error',$this->validate($validation));
     }
     }

    }


    public function register_view(){
    helper('form');
    return view('Auth/signup');
    }

    public function register_post(){
        helper('form');
        $userModel = new UsersModel();

        $nom = $this->request->getPost('nom');
        $cognom = $this->request->getPost('cognom');
        $correo = $this ->request->getPost('correo');
        $password = $this->request->getPost('pass');
        $rol = $this->request->getPost('rol');
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');

        $password_hash = password_hash($password,PASSWORD_DEFAULT);
       
        $secret = "6Lfc7IMsAAAAAHwN6KPwVsJngvuPw-uVafTHHeIj";

       $verify = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse
        );

      $response = json_decode($verify);

     if(!$response->success){
    return redirect()->back()->withInput()->with('error','Verifica el captcha');
     }
        $validation=[
        'nom' => 'required',
        'cognom'=> 'required',
        'correo'=> 'required',
        'pass' => 'required',
        'rol' => 'required'
        ];
        
        if(!$this->validate($validation)){
            return redirect()->back()->withInput()->with('error',$validation);
        }
         
        $userModel->insert(['nom'=>$nom , 'cognom'=>$cognom,'correo'=>$correo,'contrasena'=>$password_hash ,'rol'=>$rol]) ;

       return redirect()->to('Twitter/login');
   
    }
    public function logout(){
    helper('form');

    session()->destroy();
    return redirect()->to('Twitter/login')->with('logout','Has cerrado session ');
    }
    
    public function Dash_view(){
        helper('from');
        $session = session();
        
        if(!$session->has('id')){
          
          return redirect()->to('Twitter/login');

        }
        
        $data['nom']=$session->get('nom');
        $data['cognom']=$session->get('cognom');
        $data['correo']=$session->get('correo');
        $data['rol']=$session->get('rol');
        
        return view('Admins_parte/dashboard_privat',$data);
    }
    
}
