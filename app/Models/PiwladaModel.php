<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Piwlada;
use Ramsey\Uuid\Uuid;


class PiwladaModel extends Model
{
    protected $table            = 'piwlada';
    protected $primaryKey       = 'Piw_id';
    protected $useAutoIncrement = true;
    protected $returnType       = Piwlada::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Piw_id','uuid','title','content','image','User_id','created_at','updated_at','deleted_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
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
    protected $beforeInsert = ['generateUuidV7'];

    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    /**
     * Genera un UUID v7 ordenable per temps
     */
    protected function generateUuidV7(array $data)
    {
        // Només generem si no ve informat (per permetre upserts manuals)
        if (! isset($data['data']['uuid'])) {
            
            // Aquesta és la línia clau del capítol: v7 en lloc de v4
            $uuid = Uuid::uuid7();

            // Guardem els bytes crus (Raw Binary) per optimitzar espai
            $data['data']['uuid'] = $uuid->getBytes();
        }

        return $data;
    }
}