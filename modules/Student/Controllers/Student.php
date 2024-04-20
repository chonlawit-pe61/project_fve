<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;
use Modules\Student\Models\StudentModel;

/**
 *
 */
class Student extends BaseController
{
  public function index()
  {
    $StudentModel = new StudentModel();
    $data['std'] = $StudentModel->getAllStd();
    return view('Modules\Student\Views\index.php', $data);
  }
  public function createStd()
  {
    $StudentModel = new StudentModel();
    $data['typepeople'] = $StudentModel->getTypepeople();

    return view('Modules\Student\Views\createStd.php', $data);
  }
}
