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
    $input = $this->request->getPost();
    $AuthModel = new AuthModel();
    $checkLogin = $AuthModel->CheckLogin($input);

    if (!empty($checkLogin)) {
      return redirect()->to(base_url('/home'));
    } else {
      $session->setFlashdata('msg', 'คุณกรอกรหัสผ่านผิด');
      return redirect()->to(base_url('/'));
    }
  }
  public function test()
  {
    return view('Modules\Auth\Views\test.php');
  }
}
