<?php

namespace Modules\Subject\Controllers;

use App\Controllers\BaseController;
use Modules\Subject\Models\SubjectModel;

class Subject extends BaseController
{
    protected $subjectModel;

    public function __construct()
    {
        $this->subjectModel = new SubjectModel();
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
        return view('\Modules\Subject\Views\index.php');
    }

    public function manage($id = '')
    {
        $data['subject_group'] = $this->subjectModel->getSubjectGroup();
        if ($id) {
            $data['data'] = $this->subjectModel->getSubject($id);
        }
        $data['getTeacherListAll'] = $this->subjectModel->getTeacherListAll();
        return view('\Modules\Subject\Views\manage.php', $data);
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
