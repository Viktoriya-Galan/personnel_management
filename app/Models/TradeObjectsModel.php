<?php

namespace App\Models;

use CodeIgniter\Model;

class TradeObjectsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'trade_objects';
    protected $primaryKey       = 'trade_object_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['trade_object_id ', 'object_name', 'address'];

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
    public function getTradeObjects($trade_object_id =false){
        if($trade_object_id===false){
            return $this->findAll();
        }
        return $this->find($trade_object_id);
    }
}
