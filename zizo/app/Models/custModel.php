<?php

namespace App\Models;

use CodeIgniter\Model;

class CustModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'CustomerID';
    protected $allowedFields = ['FirstName', 'LastName', 'Email', 'Phone', 'Address','City','State', 'ZipCode','username','password'];
}
