<?php

namespace Modules\Addsubject\Controllers;

use App\Controllers\BaseController;

/**
 *
 */
class Addsubject extends BaseController
{
  public function index()
  {
    return view('Modules\Addsubject\Views\createsubject.php');
  }
  
}
