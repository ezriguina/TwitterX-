<?php

namespace App\Entities;

use App\Entities\Casts\UuidV7Cast;
use CodeIgniter\Entity\Entity;
use ramsey\Uuid\Uuid;

class Piwlada extends Entity
{
    protected $datamap = [];

    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'uuid'=> 'uuid_v7',
    ];
    protected $castHandlers = [
        'uuid_v7'=> UuidV7Cast::class,
    ] ;

}
