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
        $SubjectModel = new SubjectModel();
        $data['Subject'] = $SubjectModel->getSubject();
        return view('\Modules\Subject\Views\index.php', $data);
    }

    public function manage($id = '')
    {
        $SubjectModel = new SubjectModel();
        $data['subject_group'] = $this->subjectModel->getSubjectGroup();
        $data['subject_catagory'] = $SubjectModel->getSubject_catagory();
        if ($id) {
            $data['data'] = $this->subjectModel->getSubject($id);
        }
        // echo '<pre>';
        // print_r($data);
        // die();
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
        $SubjectModel = new SubjectModel();
        $id = $this->request->getPost('id');
        $SubjectModel->deleteSubject($id);
        return 1;
    }
}
