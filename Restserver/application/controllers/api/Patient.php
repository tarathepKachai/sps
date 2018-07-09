<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Patient extends \Restserver\Libraries\REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model("Patient_model");
    }

    public function patient_save_post() {

        $data = array(
            "input" => $this->post("username")
        );

        $this->response($data, 200);
        // แสดงรายการข่าวทั้งหมด
    }

    public function user_get() {
        $data = array(
            "status" => "success",
            "username" => $this->get("username")
        );
        $this->response($data, 200);
        // แสดงรายการข่าวทั้งหมด
    }

    public function prefix_get() {
        header('Content-Type: application/json');

        $data = $this->Patient_model->get_prefix_list();

        $this->response($data, 200);
    }

    public function person_status_get() {

        $data = $this->Patient_model->get_person_status_list();

        $this->response($data, 200);
    }

    public function edu_list_get() {
        $data = $this->Patient_model->get_edu_list();

        $this->response($data, 200);
    }

    public function time_sp_list_get() {
        $data = $this->Patient_model->get_time_sp_list();

        $this->response($data, 200);
    }

    public function sp_list_get() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');
        $data = $this->Patient_model->get_sp_list();

        $this->response($data, 200);
    }

    public function get_sp_by_id_post() {
        $id = $this->post("id");
        $result = $this->Patient_model->get_sp_by_id($id);

        $this->response($result, 200);
    }

    public function get_sp_data_post() {
        $id = $this->post("id");
        $result = $this->Patient_model->get_sp_data($id);

        $this->response($result, 200);
    }

    public function symptom_list_get() {
        $data = $this->Patient_model->get_symptom_list();

        $this->response($data, 200);
    }

    public function sp_act_list_get() {

        $data = $this->Patient_model->get_sp_act_list();

        $this->response($data, 200);
    }

    public function get_sp_info_by_id_post() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');
        $id = $this->post("id");

        $result = $this->Patient_model->get_sp_info_by_id($id);
        if ($result == 0) {
            $result = array(
                "error" => "0"
            );
        }

        $this->response($result, 200);
    }

    public function evaluation_list_get() {

        $data = $this->Patient_model->get_evaluation_list();

        $this->response($data, 200);
    }

    public function sp_data_table_post() {

        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $sp = $this->Patient_model->get_sp_list();

        $data = array();

        foreach ($sp as $r) {

            if ($r->exp == "1") {
                $exp = "เคย";
            } else {
                $exp = "ไม่เคย";
            }

            if ($r->gender == "male") {
                $gender = "ชาย";
            } else {
                $gender = "หญิง";
            }

            $rec_day = $this->convert_date_be($r->rec_day);

            $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                    "onclick='edit_person_info($r->person_id)' >แก้ไข</button>"
                    . "&nbsp;<button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-primary' " .
                    "onclick='manage_sp_act($r->person_id)' >อาการ/โรค</button>";
            $data[] = array(
                "<span id='rec_day_" . $r->person_id . "' >" . $rec_day . "</span>",
                "<span id='name_" . $r->person_id . "' >" . $r->prefix . " " . $r->fname . " " . $r->lname . "</span>",
                "<span id='gender_" . $r->person_id . "' >" . $gender . "</span>",
                "<span >" . $r->age . "</span>",
                "<span  >" . $exp . "</span>",
                $button
            );
        }

        $total_sp = $this->Patient_model->get_total_sp();

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_sp,
            "recordsFiltered" => $total_sp,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function sp_info_data_table_post() {

        // Datatables Variables
        $id = $this->post("id");
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $sp = $this->Patient_model->get_sp_info_by_id($id);

        $data = array();
        $count = count($sp);
        if (!isset($sp['error'])) {
            foreach ($sp as $r) {
                $date = $this->convert_date_be($r->date);
                $data[] = array(
                    "<span id='date_" . $r->sp_info_id . "' >" . $date . "</span>",
                    "<span id='sp_act" . $r->sp_info_id . "' >" . $r->sp_act_id . " </span>",
                    "<span id='symp_" . $r->sp_info_id . "' >" . $r->symp_id . " </span>",
                    "<span id='evaluation_" . $r->sp_info_id . "' >" . $r->evaluation . "</span>",
                    "<span id='comment_" . $r->sp_info_id . "' >" . $r->comment . "</span>"
                );
            }
        } else {

            foreach ($sp as $r) {

                //$date = $this->convert_date_be($r->date);


                $data[] = array(
                );
            }
        }

        $total_sp_info = $this->Patient_model->get_total_sp_info($id);

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_sp_info,
            "recordsFiltered" => $total_sp_info,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function sp_info_data_table_get() {

        // Datatables Variables

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $sp = $this->Patient_model->get_sp_info_list();

        $data = array();
        $count = count($sp);
        if (!isset($sp['error'])) {
            foreach ($sp as $r) {
                $date = $this->convert_date_be($r->date);
                $data[] = array(
                    "<span id='date_" . $r->sp_info_id . "' >" . $date . "</span>",
                    "<span id='name_" . $r->person_id . "' >" . $r->prefix . " " . $r->fname . " " . $r->lname . "</span>",
                    "<span id='sp_act" . $r->sp_info_id . "' >" . $r->sp_act_name . " </span>",
                    "<span id='symp_" . $r->sp_info_id . "' >" . $r->symp_name . " </span>",
                    "<span id='evaluation_" . $r->sp_info_id . "' >" . $r->evaluation . "</span>",
                    "<span id='comment_" . $r->sp_info_id . "' >" . $r->comment . "</span>"
                );
            }
        } else {
            foreach ($sp as $r) {

                //$date = $this->convert_date_be($r->date);
                $data[] = array(
                );
            }
        }

        $total_sp_info = $this->Patient_model->get_total_sp_info_all();

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_sp_info,
            "recordsFiltered" => $total_sp_info,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function test_info_get() {
        $sp = $this->Patient_model->get_sp_info_list();
        $this->response($sp, 200);
    }

    public function sp_save_post() {
        $id_card = "";


        for ($i = 0; $i < 13; $i++) {
            $next = $i + 1;
            $temp = "txtID" . $next;
            $id_card .= $this->post($temp);
        }



        if ($this->post('child')) {
            $child = "1";
        } else {
            $child = "0";
        }
        $prefix = $this->post("prefix");
        if ($prefix == "1" || $prefix == "3") {
            $gender = "male";
        } else {
            $gender = "female";
        }

        $rec_day = $this->convert_date_ad($this->post("rec_day"));
        $birthday = $this->convert_date_ad($this->post("birthday"));


        //$age = $this->cal_age($this->post("birthday"));

        $array = array(
            "rec_day" => $rec_day,
            "prefix" => $this->post("prefix"),
            "fname" => $this->post("fname"),
            "lname" => $this->post("lname"),
            "birthday" => $birthday,
            "id_card" => $id_card,
            "weight" => $this->post("weight"),
            "height" => $this->post("height"),
            "status" => $this->post("status"),
            "child" => $child,
            "scar" => $this->post("scar"),
            "job" => $this->post("job"),
            "workplace" => $this->post("workplace"),
            "tel_work" => $this->post("tel_work"),
            "address" => $this->post("address"),
            "mu" => $this->post("mu"),
            "road" => $this->post("road"),
            "tambol" => $this->post("tambol"),
            "amphur" => $this->post("amphur"),
            "province" => $this->post("province"),
            "tel" => $this->post("tel"),
            "fax" => $this->post("fax"),
            "line_id" => $this->post("line_id"),
            "email" => $this->post("email"),
            "person_em" => $this->post("person_em"),
            "tel_em" => $this->post("tel_em"),
            "edu" => $this->post("edu"),
            "edu_detail" => $this->post("edu_detail"),
            "admission" => $this->post("admission"),
            "disease" => $this->post("disease"),
            "reason" => $this->post("reason"),
            "exp" => $this->post("exp"),
            "exp_1" => $this->post("exp_1_detail"),
            "exp_2" => $this->post("exp_2_detail"),
            "exp_3" => $this->post("exp_3_detail"),
            "exp_4" => $this->post("exp_4_detail"),
            "time_sp" => $this->post("time_sp"),
            "last_update" => date("Y-m-d H:i:s"),
            "gender" => $gender
        );
        if ($this->post("form_type") == "insert") {

            $result = $this->Patient_model->patient_save_data($array);
        } else {
            $person_id = $this->post("person_id");
            $result = $this->Patient_model->patient_update_data($array, $person_id);
        }

        $this->response($array, 200);
    }

    public function convert_date_ad($date) {

        //$date = $this->post("date");
        $ex_date = explode("/", $date);

        $year = $ex_date[2];
        $month = $ex_date[1];
        $day = $ex_date[0];

        $year = $year - 543;

        $new_date = $year . "-" . $month . "-" . $day;

        return $new_date;
    }

    public function convert_date_be($date) {
        //$date = $this->post("date");

        $ex_date = explode("-", $date);

        $year = $ex_date[0];
        $month = $ex_date[1];
        $day = $ex_date[2];

        $year = $year + 543;
        $new_date = $day . "/" . $month . "/" . $year;
        return $new_date;
    }

    public function save_sp_info_post() {

        //$person_id = $this->post("person_id");

        $date = $this->convert_date_ad($this->post("date"));

        $array = array(
            "date" => $date,
            "person_id" => $this->post("person_id"),
            "sp_act_id" => $this->post("sp_act"),
            "symp_id" => $this->post("symptom"),
            "evaluation" => $this->post("evaluation"),
            "comment" => $this->post("comment"),
            "datetime" => date("Y-m-d H:i:s"),
            "last_update" => date("Y-m-d H:i:s")
        );

        $data = $this->Patient_model->insert_sp_info($array);


        $this->response($data, 200);
    }

    public function cal_age($bd) {
        $birthDate = $bd;
        //explode the date to get month, day and year
        $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
        return $age + 543;
    }

    public function update_sp_act_post() {

        $sp_info_id = $this->post("sp_info_id");
        $sp_act_id = $this->post("sp_act_id");

        $array = array(
            "sp_act_id" => $sp_act_id
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        $this->response($result, 200);
    }

    public function update_evaluation_post() {

        $sp_info_id = $this->post("sp_info_id");
        $eva = $this->post("evaluation");

        if ($eva == "0") {
            $eva = "";
        }

        $array = array(
            "evaluation" => $eva
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        $this->response($result, 200);
    }

    public function update_symptom_post() {

        $sp_info_id = $this->post("sp_info_id");
        $symp = $this->post("symptom");

        $array = array(
            "symp_id" => $symp
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        $this->response($result, 200);
    }

    public function save_comment_post() {

        $sp_info_id = $this->post("sp_info_id");
        $comment = $this->post("comment");

        $array = array(
            "comment" => $comment
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        $this->response($result, 200);
    }

    public function delete_sp_info_post() {

        $sp_info_id = $this->post("sp_info_id");

        $result = $this->Patient_model->delete_sp_info($sp_info_id);

        $this->response("result", 200);
    }

    public function search_person_post() {

        $option = $this->post("option");
        $id_card = $this->post("id_search");
        $fname = $this->post("name_search");
        $lname = $this->post("lastname_search");
        $gender = $this->post("gender_s");
        $age1 = $this->post("age_s1");
        $age2 = $this->post("age_s2");
        $weight1 = $this->post("weight_s1");
        $weight2 = $this->post("weight_s2");
        $sp_act = $this->post("sp_act");
        $symptom = $this->post("symptom");
        $day1 = $this->post("day1");
        $day2 = $this->post("day2");
        if($day1!=null&&$day1!=""){
            $day1 = $this->convert_date_ad($day1); 
        }
        
        if($day2!=null&&$day2!=""){
            $day2 = $this->convert_date_ad($day2);
        }
        
        $array = array(
            "id_card" => $id_card,
            "fname" => $fname,
            "lname" => $lname,
            "gender" => $gender,
            "age1" => $age1,
            "age2" => $age2,
            "weight1" => $weight1,
            "weight2" => $weight2,
            "sp_act" => $sp_act,
            "symptom" => $symptom,
            "day1" => $day1,
            "day2" => $day2
        );

        $result = $this->Patient_model->search_person($array, $option);



        $data = array();

        if (!isset($result['error'])) {
            foreach ($result as $r) {

                if ($r->exp == "1") {
                    $exp = "เคย";
                } else {
                    $exp = "ไม่เคย";
                }

                if ($r->gender == "male") {
                    $gender = "ชาย";
                } else {
                    $gender = "หญิง";
                }

                $rec_day = $this->convert_date_be($r->rec_day);

                $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                        "onclick='edit_person_info($r->person_id)' >แก้ไข</button>"
                        . "&nbsp;<button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-primary' " .
                        "onclick='manage_sp_act($r->person_id)' >อาการ/โรค</button>";
                $data[] = array(
                    "<span id='rec_day_" . $r->person_id . "' >" . $rec_day . "</span>",
                    "<span id='name_" . $r->person_id . "' >" . $r->prefix . " " . $r->fname . " " . $r->lname . "</span>",
                    "<span id='gender_" . $r->person_id . "' >" . $gender . "</span>",
                    "<span >" . $r->age . "</span>",
                    "<span  >" . $exp . "</span>",
                    $button
                );
            }
        }else{
            $data = array(
              "result" => "ไม่พบข้อมูล"  
            );
        }



        $this->response($data, 200);
    }
    
    public function base_get(){
        
       echo $_SERVER['SCRIPT_FILENAME'];

        
    }

}
