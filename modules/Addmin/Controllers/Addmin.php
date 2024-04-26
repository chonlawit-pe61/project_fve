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
  public function Addadmin()
  {
    $input = $this->request->getPost();
    echo "<pre>";
    print_r($input);
    die();
  }
}