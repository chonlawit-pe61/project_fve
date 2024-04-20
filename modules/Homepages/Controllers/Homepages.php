<?php

namespace Modules\Homepages\Controllers;

use App\Controllers\BaseController;

/**
 *
 */
class Homepages extends BaseController
{
  public function homepage()
  {
    return view('Modules\Homepages\Views\index.php');
  }
}
