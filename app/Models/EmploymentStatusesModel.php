<?php

namespace App\Models;

use CodeIgniter\Model;

class EmploymentStatusesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'employment_statuses';
    protected $primaryKey       = 'employment_status_id ';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['status'];

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
    public function getEmploymentStatuses($employment_status_id =false){
        if($employment_status_id ===false){
            return $this->findAll();
        }
        return $this->find($employment_status_id );
    }
}
