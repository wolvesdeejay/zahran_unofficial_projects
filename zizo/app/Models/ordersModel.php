<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'Orders';
    protected $primaryKey = 'OrderID';
    protected $allowedFields = ['CustomerID', 'CarID', 'AccessoryID', 'OrderDate'];

    // Method to get customer details by order ID
    public function getCustomer($orderID) {
        return $this->join('Customers', 'Orders.CustomerID = Customers.CustomerID')
                    ->where('Orders.OrderID', $orderID) // Ensure you use the Orders table prefix
                    ->select('Customers.*') // Select only the Customer fields
                    ->first();
    }

    // Method to get accessory details by order ID
    public function getAccessory($orderID) {
        return $this->join('Accessories', 'Orders.AccessoryID = Accessories.AccessoryID')
                    ->where('Orders.OrderID', $orderID) // Ensure you use the Orders table prefix
                    ->select('Accessories.*') // Select only the Accessory fields
                    ->first();
    }

    // Method to get car details by order ID
    public function getCar($orderID) {
        return $this->join('Cars', 'Orders.CarID = Cars.CarID')
                    ->where('Orders.OrderID', $orderID) // Ensure you use the Orders table prefix
                    ->select('Cars.*') // Select only the Car fields
                    ->first();
    }
}
