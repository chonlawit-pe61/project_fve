<?php

namespace Modules\Manage\Controllers;

use App\Controllers\BaseController;
use Modules\Manage\Models\ManageSubjectModel;

/**
 *
 */
class ManageSubject extends BaseController
{
    public function SubjectType()
    {
        $ManageSubjectModel = new ManageSubjectModel();
        $data['Subjects'] = $ManageSubjectModel->getSubjectType();
        return view('Modules\Manage\Views\ManageSubject.php', $data);
    }
    public function SubmitFormSubject()
    {
        $input = $this->request->getPost();
        $ManageSubjectModel = new ManageSubjectModel();
        $ManageSubjectModel->ManageTypeSubject($input);
        return redirect()->to(base_url('Manage/SubjectType'));
    }
    public function DeleteSubject()
    {
        $input = $this->request->getPost();
        $ManageSubjectModel = new ManageSubjectModel();
        $ManageSubjectModel->DeleteTypeSubject($input);
    }
}
