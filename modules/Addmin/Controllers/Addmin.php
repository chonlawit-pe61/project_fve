<?php

namespace Modules\Addmin\Controllers;

use App\Controllers\BaseController;
use Modules\Addmin\Models\Addminmodel;
use Modules\Personel\Models\CommonModel;

/**
 *
 */
class Addmin extends BaseController
{
  public function index()
  {
    $Addminmodel=new Addminmodel();
    $data['userlive']=$Addminmodel->get_userlive();
    return view('Modules\Addmin\Views\index.php',$data);
  }
  public function index11()
  {
    $Addminmodel=new Addminmodel();
    $data['userlive']=$Addminmodel->get_userlive();
    return view('Modules\Addmin\Views\index11.php',$data);
  }
  public function Addadmin()
  {
    $session = session();
    $input = $this->request->getPost();
    $Addminmodel=new Addminmodel();
//     echo "<pre>";
// print_r($input);
// die();
    $data['userlive']=$Addminmodel->createaddmin($input);
    $session->setFlashdata('success', 'บันทึกข้อมูลสำเร็จ');
    return view('Modules\Addmin\Views\alert.php',$data);
  }
}