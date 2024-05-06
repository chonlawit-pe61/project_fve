<?php

namespace Modules\User\Models;

use CodeIgniter\HTTP\Response;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getUsers($id='', $search=array())
    {
        $builder = $this->db->table('users');

        $builder->select('users.*, roles.name as role_name');

        // Filter
        
        // 

        // Join Table
        $builder->join('roles', 'roles.id = users.role_id' , 'left');

        $builder->where('is_active', 1);
        if($id) {
            $builder->where('users.id', $id);
            $data = $builder->get()->getRowArray();
        } else {
            $data = $builder->get()->getResultArray();
        }
        return $data;
    }

    function saveUser($input)
    {
        $builder = $this->db->table('users');

        $builder->set('username', $input['username']);
        $builder->set('password', password_hash($input['password'], PASSWORD_DEFAULT));
        $builder->set('firstname', $input['firstname']);
        $builder->set('lastname', $input['lastname']);
        $builder->set('role_id', $input['role_id']);
        $builder->set('created_at', ($input['created_at']) ? $input['created_at'] : date('Y-m-d H:i:s'));
        $builder->set('created_by', 1);
        $builder->set('updated_at', ($input['updated_at'])? $input['updated_at'] : date('Y-m-d H:i:s'));
        $builder->set('updated_by', 1);

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

    function deleteUser($id){
        $builder = $this->db->table('users');
        $builder->set('is_active', 0);
        $builder->where('id', $id);
        $builder->update();

        $res = [
            'status' => 200,
            'msg' => '  Successfully'
        ];
        return $res ;
    }

    // MASTER DATA
    function get_roles(){
        $builder = $this->db->table('roles');
        $builder->select('id, name');
        $builder->whereNotIn('id', [3]);
        $data = $builder->get()->getResultArray();
        return $data ;
    }
}
