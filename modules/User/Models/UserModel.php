<?php

namespace Modules\User\Models;

use CodeIgniter\HTTP\Response;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function saveUser($input)
    {
        $builder = $this->db->table('users');

        $builder->set('username', $input['username']);
        $builder->set('password', password_hash($input['password'], PASSWORD_DEFAULT));
        $builder->set('firstname', $input['firstname']);
        $builder->set('lastname', $input['lastname']);
        $builder->set('role_id', $input['role_id']);
        $builder->set('created_at', $input['created_at']);
        $builder->set('created_by', $input['created_by']);
        $builder->set('updated_at', $input['updated_at']);
        $builder->set('updated_by', $input['updated_by']);

        if(empty($input['id'])) {
            $builder->insert();
        }else{
            $builder->where('id', $input['id']);
            $builder->update();
        }

        $res = [
            'status' => 200,
            'msg' => 'Successfully'
        ];

        return json_encode($res);
    }
}
