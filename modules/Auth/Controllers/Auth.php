<?php

namespace Modules\Auth\Controllers;

use App\Controllers\BaseController;
use Modules\Auth\Models\AuthModel;
use Modules\Personel\Models\CommonModel;

/**
 *
 */
class Auth extends BaseController
{
  public function index()
  {
    return view('Modules\Auth\Views\original.php');
  }
  public function login()
  {
    $session = session();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $AuthModel = new AuthModel();

    $user = $AuthModel->CheckLogin($username);
    // echo '<pre>';
    // print_r($user);
    // die();
    if ($user) {
      $pass_hash = $user['password'];
      if ($password == $user['password']) {
        $ses_data = [
          'name' => $user['firstname'],
          'lname' => $user['lastname'],
          'user_id' => $user['id'],
          'username' => $user['username'],
          'role_id' => $user['role_id'],
          'isLoggedIn' => TRUE,
        ];
        $session->set($ses_data);
        return redirect()->to(base_url('home/'));
      } else {
        $session->setFlashdata('msg', 'คุณกรอกรหัสผ่านผิด');
        return redirect()->to('/');
      }
    }
    $session->setFlashdata('msg', 'ไม่พบชื่อผู้ใช้งานนี้');
    return redirect()->to('/');
  }

  public function logout()
  {
    $session = session();
    $session->set(array('name' => '', 'isLoggedIn' => FALSE));
    // $session->destroy();
    return redirect()->to(base_url('/'));
  }

  public function test()
  {
    return view('Modules\Auth\Views\test.php');
  }
}
