<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ratings';
    protected $primaryKey       = 'rating_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["rating_id", "employee_id", "rating",'rating_date'];

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
    public function getRatings($rating_id=false){
        if($rating_id===false){
            return $this->findAll();
        }
        return $this->find($rating_id);
    }


}
