<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Main_model;
class Dropdown extends Controller {
    public function index() {
        
        helper(['form', 'url']);
        $this->Main_model = new Main_model();
        $data['cities'] = $this->Main_model->getCity();
        return view('dropdown-view', $data);
    }
    public function getCityDepartment() {
        $this->Main_model = new Main_model();
        $postData = array(
            'city' => $this->request->getPost('city'),
        );
        $data = $this->Main_model->getCityDepartment($postData);
        echo json_encode($data);
    }    
    public function getDepartmentUsers() {
        $this->Main_model = new Main_model();
        $postData = array(
            'department' => $this->request->getPost('department'),
        );
        $data = $this->Main_model->getDepartmentUsers($postData);
        echo json_encode($data);
    }
}