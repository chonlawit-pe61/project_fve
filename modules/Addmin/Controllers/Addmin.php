<?php

namespace Modules\Addmin\Controllers;

use App\Controllers\BaseController;
use Modules\Addmin\Models\AuthModel;
use Modules\Personel\Models\CommonModel;

/**
 *
 */
class Addmin extends BaseController
{
  public function index()
  {
    return view('Modules\Addmin\Views\index.php');
  }
}