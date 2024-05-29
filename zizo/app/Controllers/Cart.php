<?php

namespace App\Controllers;

use App\Models\AccessoriesModel;
use App\Models\CarsModel;
use App\Models\CustModel;
use App\Models\OrdersModel;
use CodeIgniter\Controller;

class Cart extends Controller
{
    public function __construct()
    {
        $this->session = session(); // Initialize the session
        $this->accessoriesModel = new AccessoriesModel(); // Model to interact with the accessory data
    }

    // Add an item to the cart
    public function add($accessoryId)
{
    // Fetch the accessory from the database
    $accessory = $this->accessoriesModel->find($accessoryId);

    if ($accessory) {
        // Fetch or initialize the cart session
        $cart = $this->session->get('cart') ?: [];

        // Add or update the quantity for the accessory in the cart
        if (isset($cart[$accessoryId])) {
            $cart[$accessoryId]++;
        } else {
            $cart[$accessoryId] = 1;
        }

        // Save the updated cart back to the session
        $this->session->set('cart', $cart);
    }

    // Redirect to the cart view
    return redirect()->to('/cart/view');
}

    // View the current cart
    public function view()
    {
        $cart = $this->session->get('cart') ?: []; // Get the cart from session
        $cartItems = [];

        foreach ($cart as $AccessoryID => $quantity) {
            $accessory = $this->accessoriesModel->find($AccessoryID); // Get accessory details
            if ($accessory) {
                $cartItems[] = [
                    'accessory' => $accessory,
                    'quantity' => $quantity,
                    'total' => $accessory['price'] * $quantity, // Calculate total
                ];
            }
        }

        return view('cart/view', ['cartItems' => $cartItems]); // Pass data to the view
    }

    // Remove an item from the cart
    public function remove($accessoryID)
    {
        $cart = $this->session->get('cart') ?: [];
        if (isset($cart[$accessoryId])) {
            unset($cart[$accessoryId]); // Remove the item
            $this->session->set('cart', $cart);
        }

        return redirect()->to('/cart/view'); // Redirect to the cart view
    }
}
