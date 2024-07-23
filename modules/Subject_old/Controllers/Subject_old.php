<?php

namespace Modules\Subject_old\Controllers;

use App\Controllers\BaseController;
use Modules\Subject\Models\SubjectModel;
use Modules\Subject_old\Models\SubjectModel_old;

class Subject_old extends BaseController
{
    protected $subjectModel;

    public function __construct()
    {
        $this->subjectModel = new SubjectModel_old();
    }

    public function ajax_subjects()
    {
        $search = $this->request->getGet();
        $data = $this->subjectModel->getSubject();

        return json_encode(
            [
                'draw' => $search['draw'],
                'recordsTotal' => count($data),
                'recordsFiltered' => count($data),
                'data' => $data,
                'filter' => $search
            ]
        );
    }
    public function index()
    {
        $data['data'] = $this->subjectModel->getSubject();
        return view('\Modules\Subject_old\Views\index.php', $data);
    }

    public function manage($id = '')
    {
        $data['subject_group'] = $this->subjectModel->getSubjectGroup();
        if ($id) {
            $data['data'] = $this->subjectModel->getSubject($id);
        }
        $data['getTeacherListAll'] = $this->subjectModel->getTeacherListAll();
        return view('\Modules\Subject_old\Views\manage.php', $data);
    }

    public function save()
    {
        $input = $this->request->getPost();
        $res = $this->subjectModel->saveSubject($input);
        return redirect()->to(base_url('subjects'));
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $responese = $this->subjectModel->deleteSubject($id);
        return json_encode($responese);
    }
}
