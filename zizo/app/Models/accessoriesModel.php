<?php
namespace App\Models;

use CodeIgniter\Model;

class AccessoriesModel extends Model {
    protected $table = 'accessories'; // Correct table name
    protected $primaryKey = 'AccessoryID';
    protected $allowedFields = ['Name', 'Model', 'Price', 'ImageURL']; // Fields to be used

    // If using timestamps, ensure correct configuration
    protected $useTimestamps = false;

    // If using soft deletes, ensure correct configuration
    protected $useSoftDeletes = false;

    // Return type for queries
    protected $returnType = 'array';
}
