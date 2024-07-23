<?php

namespace Modules\Manage\Controllers;

use App\Controllers\BaseController;
use Modules\Manage\Models\ManageModel;

/**
 *
 */
class ManageSubject_old extends BaseController
{
    public function ManageSubject_old()
    {
        $ManageModel = new ManageModel();
        $data['prenames'] = $ManageModel->getSubject_old();
        return view('Modules\Subject_old\Views\index.php', $data);
    }
    public function SubmitFormSubject_old()
    {
        $input = $this->request->getPost();

        $ManageModel = new ManageModel();
        $ManageModel->ManageSubject_old($input);
        return redirect()->to(base_url('Manage/ManagePrename'));
    }
    public function DeleteSubject_old()
    {
        $input = $this->request->getPost();
        $ManageModel = new ManageModel();
        $ManageModel->DeleteSubject_old($input);
    }
}
