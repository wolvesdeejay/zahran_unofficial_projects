<?php
namespace App\Controllers;

use App\Models\custModel;
use CodeIgniter\Controller;

class User extends Controller
{
    public function login()
    {
        // Load necessary helpers, libraries, etc.

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Validate user input
            $validationRules = [
                'username' => 'required',
                'password' => 'required'
            ];

            if ($this->validate($validationRules)) {
                // Retrieve user credentials from the form
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                // Load user model
                $userModel = new UserModel();

                // Validate user credentials against the database
                $user = $userModel->where('username', $username)
                                  ->where('password', $password)
                                  ->first();

                if ($user) {
                    // User found, set session and redirect to dashboard
                    // Example:
                    // $session->set('user_id', $user['id']);
                    // redirect()->to('dashboard');
                } else {
                    // Invalid credentials, display error message
                    // Example:
                    // return redirect()->back()->with('error', 'Invalid username or password');
                }
            } else {
                // Validation failed, display validation errors
                // Example:
                // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }

        // Load the login view
        return view('user/login');
    }
	public function __construct()
    {
        $this->session = \Config\Services::session();
    } 

    public function userSelect()
    {
    return view('user/user_select');
    }

    public function register()
    {
        helper('form');
        return view('user/register');
                 
    }
    public function doRegister()
    {
        helper('form');

		$validationRules = [
			'firstName'=>'required|max_length[255]',
			'lastName'=>'required|max_length[255]',
			'email'=>'required|valid_email|max_length[255]|is_unique[customers.email]',
			'phone'=>'required|max_length[20]',
			'address'=>'required|max_length[255]',
			'city'=>'required|max_length[100]',
			'state'=>'required|max_length[100]',
			'zip_code'=>'required|max_length[20]',
			'username'=>'required|max_length[100]|is_unique[users.username]',
			'password'=>'required|min_length[8]|max_length[255]',
			'confirmpassword'=>'matches[password]'
		];

		if (! $this->validate($validationRules)) {
			// Validation fails, return the register view with validation errors
			return view('user/register', ['validation' => $this->validator]);
		}

		// Validation passed, continue with registration logic
		$model = new CustModel();

		$model->save([
			'FirstName'=>$this->request->getPost('firstName'),
			'LastName'=>$this->request->getPost('lastName'),
			'Email'=>$this->request->getPost('email'),
			'Phone'=>$this->request->getPost('phone'),
			'Address'=>$this->request->getPost('address'),
			'City'=>$this->request->getPost('city'),
			'State'=>$this->request->getPost('state'),
			'ZipCode'=>$this->request->getPost('zip_code'),
			'username'=>$this->request->getPost('username'),
			'password'=>password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
		]);
        // Set a session flash message
        session()->setFlashdata('success', 'Registration successful');

		return view('templates/header')
			. view('user/success')
			. view('templates/footer');
    }

}