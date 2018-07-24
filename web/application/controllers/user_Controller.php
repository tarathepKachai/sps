<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//use GuzzleHttp\Client;
//use GuzzleHttp\Psr7;
//use GuzzleHttp\Exception\RequestException;
//use GuzzleHttp\Psr7\Request;
//
//require 'vendor/autoload.php';

class user_Controller extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct(); // construct the Model class
    }

    public function index() {

        if (!isset($_SESSION['logged_in'])) {
            redirect('/user/login');
        } else {
            redirect('/user/index');
        }
    }

    public function main_page() {

        //$data['prefix'] = $this->get_prefix();
//        $this->load->view("template/header");
//
//        $this->load->view("page/index");
//        $this->load->view("page/modal_patient_edit");
//        $this->load->view("page/modal_user_sp");
//        $this->load->view("template/footer");
       

        if (!isset($_SESSION['usercde'])) {
            $user = $this->input->post("usercde");
        } else {
            $user = $_SESSION['usercde'];
        }


        if ($user != null && $user != "") {
            $_SESSION['logged_in'] = $user;
        }

        if ($_SESSION['logged_in'] == false) {
            redirect('/user/login');
        } else {
            $data['title'] = "โปรแกรมผู้ป่วยจำลอง";
            $this->load->view("template/template", $data);
        }

//         $data['title'] = "โปรแกรมผู้ป่วยจำลอง";
//            $this->load->view("template/template", $data);
    }

    public function login() {

        //$data['prefix'] = $this->get_prefix();
//        $this->load->view("template/header");
//
//        $this->load->view("page/index");
//        $this->load->view("page/modal_patient_edit");
//        $this->load->view("page/modal_user_sp");
//        $this->load->view("template/footer");

        $data['title'] = "เข้าสู่ระบบ/โปรแกรมผู้ป่วยจำลอง";


        $this->load->view("template/template_login", $data);
    }

    public function login_session() {

        $_SESSION['full_name'] = $this->input->post("full_name");
        $_SESSION['usercde'] = $this->input->post("usercde");
        $_SESSION['fname'] = $this->input->post("fname");
        $_SESSION['lname'] = $this->input->post("lname");
        $_SESSION['grpcde'] = $this->input->post("grpcde");
        $_SESSION['ldate'] = $this->input->post("ldate");
        $_SESSION['lcomname'] = $this->input->post("lcomname");
        $_SESSION['percode'] = $this->input->post("percode");
        $_SESSION['otcode'] = $this->input->post("otcode");
        $_SESSION['idx'] = $this->input->post("idx");
        $_SESSION['fac_code'] = $this->input->post("fac_code");
        $_SESSION['tjob_id'] = $this->input->post("tjob_id");
        $_SESSION['user_name'] = $this->input->post("user_name");
        $_SESSION['user_date'] = $this->input->post("user_date");
        $_SESSION['tunt_id'] = $this->input->post("tunt_id");
        $_SESSION['t_work_id'] = $this->input->post("t_work_id");
        $_SESSION['token'] = $this->input->post("token");
        $_SESSION['logged_in'] = true;
        $array = array(
          "status" => TRUE  
        );
        
        echo json_encode($array);

    }
    
    public function logout(){
        session_destroy();
        
        redirect('/user/login');
    }

    public function test() {
        echo $this->input->post("fname");
//        $data['title'] = "โปรแกรมผู้ป่วยจำลอง";
//        $this->load->view("template/template", $data);
    }

    function guzzle() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');
    }

//    public function get_prefix() {
//        header("Access-Control-Allow-Origin: *");
//        header("Access-Control-Allow-Headers: *");
//        header('Content-Type: application/json');
//
//        # guzzle client define
//        $client = new \GuzzleHttp\Client(); //['http_errors' => false]
//        #This url define speific Target for guzzle
//        $url = 'http://localhost/sps/Restserver/get_prefix';
//
//
//
//        $response = $client->request('GET', $url);
//        $data = $response->getBody();
////            #guzzle repose for future use
//////            echo $response->getStatusCode(); // 200
//////            echo $response->getReasonPhrase(); // OK
//////            echo $response->getProtocolVersion(); // 1.1
////            echo $response->getBody();
//        echo json_encode($data);
//    }

    public function get_sp_info($id) {

        $data['title'] = "หน้าต่างแสดงอาการ/โรค";


//        $client = new \GuzzleHttp\Client(); //['http_errors' => false]
//        #This url define speific Target for guzzle
//        $url = 'http://localhost/sps/Restserver/get_sp_info_by_id';
//
//        #guzzle
//        
//        //if($this->input->post("username")==null){
//        $param = ['form_params' => ['id' => $id]
//        ];
//        
//                # guzzle post request example with form parameter
//            $response = $client->request('POST', $url, $param
//            );
//            #guzzle repose for future use
//           
//            $data['sp_info'] =  json_decode($response->getBody());


        $data['id'] = $id;
        $this->load->view("template/template_sp_act", $data);
    }

    public function version() {

        echo CI_VERSION;
    }

}
