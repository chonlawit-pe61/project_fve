<?php

namespace Modules\Manage\Controllers;

use App\Controllers\BaseController;
use Modules\Manage\Models\ManageTypePersonModel;

/**
 *
 */
class ManageTypePerson extends BaseController
{
  public function TypePerson()
  {
    $ManageTypePersonModel = new ManageTypePersonModel();
    $data['TypePersons'] = $ManageTypePersonModel->getTypePerson();
    return view('Modules\Manage\Views\ManageTypePerson.php', $data);
  }
  public function SubmitFormTypePerson()
  {
    $input = $this->request->getPost();

    $ManageTypePersonModel = new ManageTypePersonModel();
    $ManageTypePersonModel->ManageTypePerson($input);
    return redirect()->to(base_url('Manage/ManageTypePerson'));
  }
  public function DeleteTypePerson()
  {
    $input = $this->request->getPost();
    $ManageTypePersonModel = new ManageTypePersonModel();
    $ManageTypePersonModel->DeleteTypePerson($input);
  }
}
