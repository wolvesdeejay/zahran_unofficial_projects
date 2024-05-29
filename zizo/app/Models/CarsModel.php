<?php

namespace App\Models;

use CodeIgniter\Model;

class CarsModel extends Model
{
    protected $table = 'Cars';

    protected $allowedFields = ['Make', 'Model', 'Year'];


    public function getCars($modell = false)
    {
        if ($modell=== false) {
            return $this->findAll();
        }

        return $this->where(['model' => $modell])->first();
    }
	
}