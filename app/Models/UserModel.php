<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['login','password','email','roleId'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function getUsers($id=false){
        if($id==false){
            return $this->findAll();
            
        }
        return $this->find($id);
    }

public function hashPassword($password){
    return password_hash($password, PASSWORD_BCRYPT);
}

public function getRoleUser($login){
    $users = $this->getUsers();
    
    foreach($users as $user){
        if($user['login']=== $login){
      $roleId = $user['roleId'];
            var_dump($roleId);
            return $roleId;
       }
    }
    return false;
}

public function checkloginPassword($login,$password){
$roleModel = Model(RoleModel::class);
$users = $this->getUsers();
foreach($users as $user){
    if($user['login']===$login && password_verify($password,$user['password'])){
       
    
        $roleId = $this->getRoleUser($login);
        var_dump($login, $password, $roleId);
        setcookie('user_login',$login, time()+60*60*2,'/');
        if($roleId){
$role = $roleModel->getRoles($roleId);
setcookie('role', $role['roleName'], time() + 60*60*2,'/');

        }
        return true;
    }
}
return false;
}
}
