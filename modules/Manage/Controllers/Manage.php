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

  public function ManagesubjectCatagory()
  {
    $ManageModel = new ManageModel();
    $data['subjectCatagory'] = $ManageModel->getSubjectCatagoryType();
    return view('Modules\Manage\Views\ManagesubjectCatagory.php', $data);
  }
  public function SubmitSubjectCatagory()
  {
    $input = $this->request->getPost();
    $ManageModel = new ManageModel();
    $ManageModel->ManageSubjectCatagoryType($input);
    return redirect()->to(base_url('Manage/ManagesubjectCatagory'));
  }
  public function DeleteSubjectCatagory()
  {
    $input = $this->request->getPost();
    $ManageModel = new ManageModel();
    $ManageModel->DeleteSubjectCatagoryType($input);
  }
}
