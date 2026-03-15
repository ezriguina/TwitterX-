<?php

namespace App\Controllers;
use League\CommonMark\GithubFlavoredMarkdownConverter;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\PiwladaModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Ramsey\Uuid\Uuid;
use CodeIgniter\Files\File;




class PiwladasController extends BaseController
{
    public function index()
    {
        //
    }
public function twitter_view(){
    $session = session();

    $PiwModel = new PiwladaModel();
    $commentModel = new CommentModel();
    $userModel = new UsersModel() ;

    $Coms = $commentModel ->paginate(6,'default');
    $Piws = $PiwModel->paginate(6,'default');

  foreach ($Piws as $piw) {

    $piw->comments = $commentModel
        ->where('Piw_id', $piw->Piw_id)
        ->orderBy('created_at', 'ASC')
        ->findAll();
}

    $data['Piws']=$Piws;
    $data['Coms'] = $Coms ;

    $data['pager']=$PiwModel->pager;

    return view('Twitter',$data);
}
    public function Piw_create(){
        $session = session();
        if(!$session->has('id')){
          
          return redirect()->to('Twitter/login');

        }

        helper('form');
        
        return view('Piwlada_Crud/crear_piw');
    }
    public function Piw_create_post(){
        $session = session();
        if(!$session->has('id')){
          
          return redirect()->to('Twitter/login');

        }
        $PiwModel = new PiwladaModel();
        $id_user = $session->get('id');
        
        helper('form');
        $title = $this->request->getPost('title');
        $content = $this ->request->getPost('content');
        $imagen = $this->request->getPost('image');
        
        $validation_rules=[
         'title' => 'required' ,
         'content'=> 'required'
        ];
        
        if(!$this->validate($validation_rules)){
          return redirect()->back()->withInput()->with('error',$this->validate($validation_rules));
        
        }
        $config = [
        'html_input' => 'strip',       
        'allow_unsafe_links' => false,   
    ];

    $converter = new GithubFlavoredMarkdownConverter($config);
    $htmlContent = $converter->convert($content); 

    $data = [
        'title'   => $title,
        'content' => $htmlContent, 
        'User_id' => $id_user
    ];

     $imageFile = $this->request->getFile('image');
     $imageName = null;
     
     if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
    $imageName = $imageFile->getRandomName();
    $imageFile->move(FCPATH . 'uploads', $imageName);
     }
     
   $data = [
    'title'   => $title,
    'content' => $htmlContent, 
    'User_id' => $id_user,
    'image'   => $imageName
   ];



           $Piw = new  \App\Entities\Piwlada($data);
           
           $PiwModel ->save($Piw);
           
           //$PiwModel ->insert($data);

        return redirect()->to('Twitter/Admin/Piwladas/crear')->with('succes','se ha publicado la Piwlada ');
     
    }
       
    public function Piw_list(){

    $session = session();
    helper('form');
    $PiwModel = new PiwladaModel();

    if(!$session->has('id')){
        return redirect()->to('Twitter/login');
    }

    $id_user = $session->get('id');

    $data['Piws'] = $PiwModel
                    ->where('User_id', $id_user)
                    ->paginate(6, 'default');

    $data['pager'] = $PiwModel->pager;

    return view('Piwlada_Crud/list_piw', $data);
}
 public function Piw_list_admin(){

    $session = session();
    helper('form');
    $PiwModel = new PiwladaModel();

    if(!$session->has('id')){
        return redirect()->to('Twitter/login');
    }

    $id_user = $session->get('id');
    
    $data['Piws'] = $PiwModel->paginate(6, 'default');

    $data['pager'] = $PiwModel->pager;

    return view('Piwlada_Crud/list_piw', $data);
}

    public function Piw_delete_post($id){
        helper('form');
        $session = session();

        if(!$session->has('id')){
          
          return redirect()->to('Twitter/login');

        }
        $PiwModel = new PiwladaModel();
        
        $piwlada = $PiwModel->find($id);
        
        if(!$piwlada){
        return redirect()->back()->with('error','no puedes borrar este elemento') ;
        }
        $PiwModel->delete($id);
       
        return redirect()->back()->with('OK','has borrado');

    }
    public function Piw_read($uuid)
{
    helper('form');

    $PiwModel = new PiwladaModel();
    
    $piwlada = $PiwModel
    ->where('uuid', hex2bin(str_replace('-', '', $uuid)))
    ->first();

    if(!$piwlada){
        return redirect()->back()->with('error','Error al leer la piwlada');
    }
    
    $data['Piws'] = $piwlada;
    
    return view('Piwlada_Crud/read_piw', $data);
}
   /* public function Piw_read($id){
       helper('form');
        $PiwModel = new PiwladaModel();
        
        $piwlada = $PiwModel->find($id);
        
        if(!$piwlada){
        return redirect()->back()->with('error','Error al read pow') ;
        }       
        $data['Piws']=$piwlada;

        return view('Piwlada_Crud/read_piw.php',$data);
        
    }*/
  public function Piw_edit($uuid)
{
    helper('form');
    $PiwModel = new PiwladaModel();

    $piwlada = $PiwModel
        ->where('uuid', hex2bin(str_replace('-', '', $uuid)))
        ->first();

    if (!$piwlada) {
        return redirect()->back()->with('error', 'Piwlada no encontrada');
    }

    $data['Piws'] = $piwlada;

    return view('Piwlada_Crud/edit_piw', $data);
}


public function Piw_update($uuid)
{
    $session = session();
    $PiwModel = new PiwladaModel();
    $id_user = $session->get('id');

    helper('form');

    $uuidBinary = Uuid::fromString($uuid)->getBytes();

    $piwlada = $PiwModel
        ->where('uuid', $uuidBinary)
        ->first();

    if (!$piwlada) {
        return redirect()->back()->with('error','Piwlada no encontrada');
    }

    $validation_rules = [
        'title' => 'required',
        'content' => 'required'
    ];

    if (!$this->validate($validation_rules)) {
        return redirect()->back()->withInput();
    }

    $data = [
        'title'   => $this->request->getPost('title'),
        'content' => $this->request->getPost('content'),
        'User_id' => $id_user
    ];

    $PiwModel->where('uuid', $uuidBinary)->set($data)->update();

    return redirect()->back()->with('success','Piwlada actualizada correctamente');
}
    public function search(){
        helper('form');
        $PiwModel = new PiwladaModel();
        $CommModel = new CommentModel();

        $search = $this->request->getGet('search');

        if(!empty($search)){
        $PiwModel->groupStart()
        ->like('title',$search)
        ->orLike('content',$search)
        ->groupEnd();
        }

        $data['Piws']=$PiwModel->paginate(6);
        $data['Coms']=$CommModel->paginate(6);
        $data['pager']=$PiwModel->pager;
        $data['search']=$search;


        return view('Twitter',$data);

        }

}
