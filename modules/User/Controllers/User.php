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
    return "1234" ;
  }

  public function add_super_admin() 
  {
    $data = [
        'username' => 'admin',
        'password' => 'P@ssw0rd',
        'firstname' => 'Super',
        'lastname' => 'Admin',
        'role_id' => '1',
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => 'Super Admin',
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => 'Super Admin',
    ] ;
    $res = $this->userModel->saveUser($data);
    return $res;
  }
}
