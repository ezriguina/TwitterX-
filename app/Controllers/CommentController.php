<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\PiwladaModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class CommentController extends BaseController
{
    public function index()
    {
        //
    }
    public function view_comment(){
    $session = session();

    helper('form');
    $CommentModel = new CommentModel();
    $PiwModel =  new PiwladaModel();
    $UserModel = new UsersModel() ;
    
    $comments = $CommentModel->paginate(4);

    $data ['com'] = $comments ;
    $data ['pager']= $CommentModel->pager; 

    return view('Twitter',$data);

    
    }
    public function crear_comment(){

    $session = session();

    if(!$session->has('id')){
        return redirect()->to('Twitter/login');
    }

    $CommentModel = new CommentModel();
    $PiwModel =  new PiwladaModel();
    $UserModel = new UsersModel() ;
   
   $data = [
    'content' => $this->request->getPost('content'),
    'Piw_id' => $this->request->getPost('piwlada_id'),
    'User_id' => $session->get('id')
];

    $CommentModel->insert($data);

    return redirect()->back();
}
    public function list_comments()
    {
        $session = session();
        helper('form');

        if (!$session->has('id')) {
            return redirect()->to('Twitter/login');
        }
        $id_user = $session->get('id');
        
        $CommentModel = new CommentModel();

        $data['comments'] = $CommentModel->where('User_id', $id_user)
                            ->paginate(6, 'default');
        $data['pager'] = $CommentModel->pager;

        return view('Piwlada_Crud/Comment/list_comment', $data);
    }

     public function list_comments_admin()
    {
        $session = session();
        helper('form');

        if (!$session->has('id')) {
            return redirect()->to('Twitter/login');
        }
        $id_user = $session->get('id');
        
        $CommentModel = new CommentModel();

        $data['comments'] = $CommentModel->paginate(6, 'default');
        $data['pager'] = $CommentModel->pager;

        return view('Piwlada_Crud/Comment/list_comment', $data);
    }

     public function edit($id)
    {
        $session = session();
        helper('form');

        if (!$session->has('id')) {
            return redirect()->to('Twitter/login');
        }

        $CommentModel = new CommentModel();
        $comment = $CommentModel->find($id);

        if (!$comment) {
            return redirect()->back()->with('error', 'Comentario no encontrado');
        }

        $data['comment'] = $comment;
        return view('Piwlada_Crud/comment/edit_comment', $data);
    }

    public function update($id)
    {
        $session = session();
        helper('form');

        if (!$session->has('id')) {
            return redirect()->to('Twitter/login');
        }

        $CommentModel = new CommentModel();
        $comment = $CommentModel->find($id);

        if (!$comment) {
            return redirect()->back()->with('error', 'Comentario no encontrado');
        }

        $content = $this->request->getPost('content');

        $validation_rules = [
            'content' => 'required'
        ];

        if (!$this->validate($validation_rules)) {
            return redirect()->back()->withInput()->with('error', 'El contenido es obligatorio');
        }

        $data = [
            'content' => $content
        ];

        $CommentModel->update($id, $data);

        return redirect()->to('Twitter/Admin/Piwladas/com/list')->with('success', 'Comentario actualizado');
    }

    public function delete($id)
    {
        $session = session();
        helper('form');
        
        if (!$session->has('id')) {
            return redirect()->to('Twitter/login');
        }

        $CommentModel = new CommentModel();
        $comment = $CommentModel->find($id);

        if (!$comment) {
            return redirect()->back()->with('error', 'Comentario no encontrado');
        }

        $CommentModel->delete($id);

        return redirect()->back()->with('success', 'Comentario eliminado');
    }

}
