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
        $SubjectModel_old = new SubjectModel_old();
        $data['Subject'] = $SubjectModel_old->getSubject();
        return view('\Modules\Subject_old\Views\index.php', $data);
    }

    public function manage($id = '')
    {
        $SubjectModel_old = new SubjectModel_old();
        $data['subject_group'] = $SubjectModel_old->getSubjectGroup();
        $data['subject_catagory'] = $SubjectModel_old->getSubject_catagory();
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
        return redirect()->to(base_url('subjects_old'));
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $responese = $this->subjectModel->deleteSubject($id);
        return json_encode($responese);
    }
}
