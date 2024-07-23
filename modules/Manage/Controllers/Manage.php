<?php

namespace Modules\Manage\Controllers;

use App\Controllers\BaseController;
use Modules\Manage\Models\ManageModel;

/**
 *
 */
class Manage extends BaseController
{
  public function ManagePrename()
  {
    $ManageModel = new ManageModel();
    $data['prenames'] = $ManageModel->getPrename();
    return view('Modules\Manage\Views\ManagePrename.php', $data);
  }
  public function SubmitFormPrename()
  {
    $input = $this->request->getPost();

    $ManageModel = new ManageModel();
    $ManageModel->ManagePrename($input);
    return redirect()->to(base_url('Manage/ManagePrename'));
  }
  public function DeletePrename()
  {
    $input = $this->request->getPost();
    $ManageModel = new ManageModel();
    $ManageModel->DeletePrename($input);
  }
}
