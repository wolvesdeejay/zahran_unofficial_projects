<?php

namespace App\Models;

use CodeIgniter\Model;

class CustModel extends Model
{
    protected $table = 'Customers';
    protected $primaryKey = 'CustomerID';
    protected $allowedFields = ['FirstName', 'LastName', 'Email', 'phone', 'street', 'city', 'state', 'zip_code'];
}
