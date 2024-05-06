<?php

namespace Modules\User\Controllers;

use App\Controllers\BaseController;
use Modules\User\Models\UserModel;

class User extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index()
  {
    return view('Modules\User\Views\index.php') ;
  }

  public function ajax_users ()
  {
    $search = $this->request->getGet();
    $data = $this->userModel->getUsers('', $search) ;
    return json_encode(
      [
        'draw' => $search['draw'],
        'recordsTotal' => count($data),
        'recordsFiltered' => count($data),
        'data' => $data,
        'filter' => $search
      ]
    );
  }

  public function save() 
  {
    // $data = [
    //     'username' => 'admin',
    //     'password' => 'P@ssw0rd',
    //     'firstname' => 'Super',
    //     'lastname' => 'Admin',
    //     'role_id' => '1',
    //     'created_at' => date('Y-m-d H:i:s'),
    //     'created_by' => 'Super Admin',
    //     'updated_at' => date('Y-m-d H:i:s'),
    //     'updated_by' => 'Super Admin',
    // ] ;
    $data = $this->request->getPost();
    $res = $this->userModel->saveUser($data);
    return redirect()->to(base_url('users'));
  }

  public function manage ($id='') {
    $data['roles'] = $this->userModel->get_roles();
    $data['departments'] = $this->userModel->get_departments();
    if($id){
      $data['data'] = $this->userModel->getUsers($id);
    }
    return view('Modules\User\Views\manage.php', $data) ;
  }

  public function delete() {
    $id = $this->request->getPost('id');
    $responese = $this->userModel->deleteUser($id);
    return json_encode($responese);
  }
}
