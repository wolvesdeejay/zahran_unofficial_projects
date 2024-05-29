<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use CodeIgniter\Controller;

class OrderDetails extends Controller
{
    public function view($orderID) {
        $ordersModel = new OrdersModel();

        $customer = $ordersModel->getCustomer($orderID);
        $accessory = $ordersModel->getAccessory($orderID);
        $car = $ordersModel->getCar($orderID);

        $data = [
            'customer' => $customer,
            'accessory' => $accessory,
            'car' => $car,
        ];

        return view('order_details', $data);
    }
}
