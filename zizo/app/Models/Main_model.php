<?php
namespace App\Models;
use CodeIgniter\Model;
class Main_model extends Model {
    
    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
    }
    public function getCity() {
       $query = $this->db->query('select * from city');
       return $query->getResult();
    }
    public function getCityDepartment($postData) {
      $sql = 'select * from department where city ='.$postData['city'] ;
      $query =  $this->db->query($sql);
      
      return $query->getResult();
    }    
    public function getDepartmentUsers($postData) {
      $sql = 'select * from user_depart where department ='.$postData['department'] ;
      $query =  $this->db->query($sql);
      
      return $query->getResult();
    }
}