<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
class Patient extends CI_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model("Patient_model");
    }

    public function patient_save() {
        header('Content-Type: application/json');
        $data = array(
            "input" => $this->input->post("username")
        );

        echo json_encode($data);
        // แสดงรายการข่าวทั้งหมด
    }

    public function user() {
        $data = array(
            "status" => "success",
            "username" => $this->get("username")
        );
        echo json_encode($data);
        // แสดงรายการข่าวทั้งหมด
    }

    public function prefix() {
        header('Content-Type: application/json');

        $data = $this->Patient_model->get_prefix_list();

        echo json_encode($data);
    }

    public function person_status() {
        header('Content-Type: application/json');
        $data = $this->Patient_model->get_person_status_list();

        echo json_encode($data);
    }

    public function edu_list() {
        header('Content-Type: application/json');
        $data = $this->Patient_model->get_edu_list();

        echo json_encode($data);
    }

    public function time_sp_list() {
        header('Content-Type: application/json');
        $data = $this->Patient_model->get_time_sp_list();

        echo json_encode($data);
    }

    public function version() {
        header('Content-Type: application/json');
        $a = CI_VERSION;
        echo json_encode($a);
    }

    public function sp_list() {

        header('Content-Type: application/json');
        $data = $this->Patient_model->get_sp_list("option");

        echo json_encode($data);
    }

    public function get_sp_by_id() {
        header('Content-Type: application/json');
        $id = $this->input->post("id");
        $result = $this->Patient_model->get_sp_by_id($id);

        echo json_encode($result);
    }

    public function get_sp_data() {
        header('Content-Type: application/json');
        $id = $this->input->post("id");
        $result = $this->Patient_model->get_sp_data($id);

        echo json_encode($result);
    }

    public function symptom_list() {
        header('Content-Type: application/json');
        $data = $this->Patient_model->get_symptom_list();

        echo json_encode($data);
    }

    public function sp_act_list() {
        header('Content-Type: application/json');

        $data = $this->Patient_model->get_sp_act_list();

        echo json_encode($data);
    }

    public function get_sp_info_by_id() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');
        $id = $this->input->post("id");

        $result = $this->Patient_model->get_sp_info_by_id($id);
        if ($result == 0) {
            $result = array(
                "error" => "0"
            );
        }

        echo json_encode($result);
    }

    public function evaluation_list() {
        header('Content-Type: application/json');

        $data = $this->Patient_model->get_evaluation_list();

        echo json_encode($data);
    }

    public function sp_data_table() {
        header('Content-Type: application/json');
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $sp = $this->Patient_model->get_sp_list("date");

        $data = array();

        foreach ($sp as $r) {

            if ($r->exp == "1") {
                $exp = "เคย";
            } else {
                $exp = "ไม่เคย";
            }

//            if ($r->gender == "male") {
//                $gender = "ชาย";
//            } else {
//                $gender = "หญิง";
//            }
            $gender = $r->gender;
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

    public function manage_choice_table() {
        header('Content-Type: application/json');
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $choice = $this->input->post("manage_choice");

        if ($choice == "0") {
            $sp = $this->Patient_model->get_prefix_list();
            $txt = "prefix";
        } else if ($choice == "1") {
            $sp = $this->Patient_model->get_prefix_list();
            $txt = "prefix";
        } else if ($choice == "2") {
            $sp = $this->Patient_model->get_sp_act_list();
            $txt = "sp_act";
        } else if ($choice == "3") {
            $sp = $this->Patient_model->get_symptom_list();
            $txt = "symptom";
        } else if ($choice == "4") {
            $sp = $this->Patient_model->get_edu_list();
            $txt = "education";
        } else if ($choice == "5") {
            $sp = $this->Patient_model->get_time_sp_list();
            $txt = "time_sp";
        }

        $data = array();

        foreach ($sp as $r) {
            if ($choice == "0") {
                $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                        "onclick='edit_choice($r->id)' >แก้ไข</button>";
                $cell = "<span id='rec_day_' >$r->prefix</span>";
            } else if ($choice == "1") {
                $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                        "onclick='edit_choice($r->id)' >แก้ไข</button>";
                $cell = "<span id='rec_day_' >$r->prefix</span>";
            } else if ($choice == "2") {
                $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                        "onclick='edit_choice($r->sp_act_id)' >แก้ไข</button>";
                $cell = "<span id='rec_day_' >$r->sp_act_name</span>";
            } else if ($choice == "3") {
                $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                        "onclick='edit_choice($r->symp_id)' >แก้ไข</button>";
                $cell = "<span id='rec_day_' >$r->symp_name</span>";
            } else if ($choice == "4") {
                $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                        "onclick='edit_choice($r->id)' >แก้ไข</button>";
                $cell = "<span id='rec_day_' >$r->edu_name</span>";
            } else if ($choice == "5") {
                $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                        "onclick='edit_choice($r->time_code)' >แก้ไข</button>";
                $cell = "<span id='rec_day_' >$r->time_name</span>";
            }


            $data[] = array(
                $cell,
                $button
            );
        }

        $total = count($sp);

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "data" => $data
        );

        echo json_encode($output);
        exit();
    }

    public function sp_info_data_table() {
        header('Content-Type: application/json');
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
                $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                        "onclick='edit_sp_info($r->sp_info_id)' >แก้ไข</button>";
                $data[] = array(
                    "<span id='date_" . $r->sp_info_id . "' >" . $date . "</span>",
                    "<span id='name_" . $r->person_id . "' ><a href='#' onclick='manage_sp_act($r->person_id)' >" . $r->prefix . " " . $r->fname . " " . $r->lname . "</a></span>",
                    "<span id='sp_act" . $r->sp_info_id . "' >" . $r->sp_act_name . " </span>",
                    "<span id='symp_" . $r->sp_info_id . "' >" . $r->symp_name . " </span>",
                    "<span id='evaluation_" . $r->sp_info_id . "' >" . $r->evaluation . "</span>",
                    "<span id='comment_" . $r->sp_info_id . "' >" . $r->comment . "</span>",
                    $button
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

    public function sp_save() {
        header('Content-Type: application/json');
        $id_card = "";

        for ($i = 0; $i < 13; $i++) {
            $next = $i + 1;
            $temp = "txtID" . $next;
            $id_card .= $this->input->post($temp);
        }

        if ($this->input->post("form_type") == "insert") {
            $check_id_card = $this->Patient_model->check_id_card($id_card);

            if ($check_id_card['status'] == "2") {
                echo json_encode($check_id_card);
                exit();
            }
            $exp = "0";
        } else {
            $exp = "1";
        }



        if ($this->input->post('child')) {
            $child = "1";
        } else {
            $child = "0";
        }
        $prefix = $this->input->post("prefix");
        if ($prefix == "1" || $prefix == "3") {
            $gender = "male";
        } else {
            $gender = "female";
        }

        $gender = $this->input->post("gender");

        $rec_day = $this->convert_date_ad($this->input->post("rec_day"));
        $birthday = $this->convert_date_ad($this->input->post("birthday"));


        //$age = $this->cal_age($this->input->post("birthday"));

        $array = array(
            "rec_day" => $rec_day,
            "prefix" => $this->input->post("prefix"),
            "fname" => $this->input->post("fname"),
            "lname" => $this->input->post("lname"),
            "birthday" => $birthday,
            "id_card" => $id_card,
            "weight" => $this->input->post("weight"),
            "height" => $this->input->post("height"),
            "status" => $this->input->post("status"),
            "child" => $child,
            "scar" => $this->input->post("scar"),
            "job" => $this->input->post("job"),
            "workplace" => $this->input->post("workplace"),
            "tel_work" => $this->input->post("tel_work"),
            "address" => $this->input->post("address"),
            "mu" => $this->input->post("mu"),
            "road" => $this->input->post("road"),
            "tambol" => $this->input->post("tambol"),
            "amphur" => $this->input->post("amphur"),
            "province" => $this->input->post("province"),
            "tel" => $this->input->post("tel"),
            "fax" => $this->input->post("fax"),
            "line_id" => $this->input->post("line_id"),
            "email" => $this->input->post("email"),
            "person_em" => $this->input->post("person_em"),
            "tel_em" => $this->input->post("tel_em"),
            "edu" => $this->input->post("edu"),
            "edu_detail" => $this->input->post("edu_detail"),
            "admission" => $this->input->post("admission"),
            "disease" => $this->input->post("disease"),
            "reason" => $this->input->post("reason"),
//            "exp_1" => $this->input->post("exp_1_detail"),
//            "exp_2" => $this->input->post("exp_2_detail"),
//            "exp_3" => $this->input->post("exp_3_detail"),
//            "exp_4" => $this->input->post("exp_4_detail"),
            "time_sp" => $this->input->post("time_sp"),
            "last_update" => date("Y-m-d H:i:s"),
            "gender" => $gender
        );

        if ($this->input->post("form_type") == "insert") {
            $arr_temp = array(
                "exp" => "0"
            );
            $array2 = array_merge($array, $arr_temp);
        }


        if ($this->input->post("form_type") != "update") {

            $result = $this->Patient_model->patient_save_data($array2);
            $txt = "insert";
        } else {
            $person_id = $this->input->post("person_id");
            $result = $this->Patient_model->patient_update_data($array, $person_id);
            $txt = "update";
        }

        $a = array(
            "txt" => $txt,
            "q" => $result
        );

        // insert sp_info
        $array2 = array(
            "date" => $rec_day,
            "person_id" => $person_id,
            "sp_act_id" => $this->input->post("sp_act_first"),
            "symp_id" => $this->input->post("symptom_first"),
            "datetime" => date("Y-m-d H:i:s"),
            "last_update" => date("Y-m-d H:i:s")
        );

        $data2 = $this->Patient_model->insert_sp_info($array2);

        echo json_encode($result);
    }

    public function convert_date_ad($date) {

        //$date = $this->input->post("date");
        $ex_date = explode("/", $date);

        $year = $ex_date[2];
        $month = $ex_date[1];
        $day = $ex_date[0];

        $year = $year - 543;

        $new_date = $year . "-" . $month . "-" . $day;

        return $new_date;
    }

    public function convert_date_be($date) {
        //$date = $this->input->post("date");

        $ex_date = explode("-", $date);

        $year = $ex_date[0];
        $month = $ex_date[1];
        $day = $ex_date[2];

        $year = $year + 543;
        $new_date = $day . "/" . $month . "/" . $year;
        return $new_date;
    }

    public function save_sp_info() {
        header('Content-Type: application/json');
        //$person_id = $this->input->post("person_id");

        $date = $this->convert_date_ad($this->input->post("date"));

        $array = array(
            "date" => $date,
            "person_id" => $this->input->post("person_id"),
            "sp_act_id" => $this->input->post("sp_act"),
            "symp_id" => $this->input->post("symptom"),
            "evaluation" => $this->input->post("evaluation"),
            "comment" => $this->input->post("comment"),
            "datetime" => date("Y-m-d H:i:s"),
            "last_update" => date("Y-m-d H:i:s")
        );

        $data = $this->Patient_model->insert_sp_info($array);


        echo json_encode($data);
    }

    public function cal_age($bd) {
        $birthDate = $bd;
        //explode the date to get month, day and year
        $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
        return $age + 543;
    }

    public function update_sp_act() {
        header('Content-Type: application/json');
        $sp_info_id = $this->input->post("sp_info_id");
        $sp_act_id = $this->input->post("sp_act_id");

        $array = array(
            "sp_act_id" => $sp_act_id
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        echo json_encode($result);
    }

    public function update_sp_info() {
        header('Content-Type: application/json');
        $sp_info_id = $this->input->post("sp_info_id");
        $sp_act_id = $this->input->post("sp_act");
        $symptom = $this->input->post("symptom");
        $evaluation = $this->input->post("evaluation");
        $comment = $this->input->post("comment");
        $date = $this->convert_date_ad($this->input->post("date"));
        $array = array(
            "sp_act_id" => $sp_act_id,
            "symp_id" => $symptom,
            "evaluation" => $evaluation,
            "comment" => $comment,
            "date" => $date
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        echo json_encode($result);
    }

    public function update_evaluation() {
        header('Content-Type: application/json');
        $sp_info_id = $this->input->post("sp_info_id");
        $eva = $this->input->post("evaluation");

        if ($eva == "0") {
            $eva = "";
        }

        $array = array(
            "evaluation" => $eva
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        echo json_encode($result);
    }

    public function update_symptom() {
        header('Content-Type: application/json');
        $sp_info_id = $this->input->post("sp_info_id");
        $symp = $this->input->post("symptom");

        $array = array(
            "symp_id" => $symp
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        echo json_encode($result);
    }

    public function save_comment() {
        header('Content-Type: application/json');
        $sp_info_id = $this->input->post("sp_info_id");
        $comment = $this->input->post("comment");

        $array = array(
            "comment" => $comment
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        echo json_encode($result);
    }

    public function save_date_sp_info() {
        header('Content-Type: application/json');
        $sp_info_id = $this->input->post("sp_info_id");
        //$date = $this->input->post("date");
        $date = $this->convert_date_ad($this->input->post("date"));
        $array = array(
            "date" => $date
        );

        $result = $this->Patient_model->update_sp_info($array, $sp_info_id);

        echo json_encode($result);
    }

    public function delete_sp_info() {
        header('Content-Type: application/json');
        $sp_info_id = $this->input->post("sp_info_id");
        $person_id = $this->input->post("person_id");
        $result = $this->Patient_model->delete_sp_info($sp_info_id, $person_id);

        echo json_encode($result);
    }

    public function search_person() {
        header('Content-Type: application/json');
        $option = $this->input->post("option");
        $id_card = $this->input->post("id_search");
        $fname = $this->input->post("name_search");
        $lname = $this->input->post("lastname_search");
        $gender = $this->input->post("gender_s");
        $age1 = $this->input->post("age_s1");
        $age2 = $this->input->post("age_s2");
        $weight1 = $this->input->post("weight_s1");
        $weight2 = $this->input->post("weight_s2");
        $sp_act = $this->input->post("sp_act");
        $symptom = $this->input->post("symptom");
        $day1 = $this->input->post("day1");
        $day2 = $this->input->post("day2");
        $eva_check = $this->input->post("eva_check");


        if ($day1 != null && $day1 != "") {
            $day1 = $this->convert_date_ad($day1);
        }

        if ($day2 != null && $day2 != "") {
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
            "day2" => $day2,
            "eva_check" => $eva_check
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
                        "onclick='edit_person_info($r->p_id)' >แก้ไข</button>"
                        . "&nbsp;<button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-primary' " .
                        "onclick='manage_sp_act($r->p_id)' >อาการ/โรค</button>";
                $data[] = array(
                    "<span id='rec_day_" . $r->p_id . "' >" . $rec_day . "</span>",
                    "<span id='name_" . $r->p_id . "' >" . $r->prefix . " " . $r->fname . " " . $r->lname . "</span>",
                    "<span id='gender_" . $r->p_id . "' >" . $r->gender . "</span>",
                    "<span >" . $r->age . "</span>",
                    "<span  >" . $exp . "</span>",
                    $button
                );
            }
        } else {
            $data = array(
                "result" => "ไม่พบข้อมูล"
            );
        }

        echo json_encode($data);
    }

    public function search_sp_info() {
        header('Content-Type: application/json');
        $option = $this->input->post("option");
        $id_card = $this->input->post("id_search");
        $fname = $this->input->post("name_search");
        $lname = $this->input->post("lastname_search");
        $gender = $this->input->post("gender_s");
        $age1 = $this->input->post("age_s1");
        $age2 = $this->input->post("age_s2");
        $weight1 = $this->input->post("weight_s1");
        $weight2 = $this->input->post("weight_s2");
        $sp_act = $this->input->post("sp_act");
        $symptom = $this->input->post("symptom");
        $day1 = $this->input->post("day1");
        $day2 = $this->input->post("day2");
        $eva_check = $this->input->post("eva_check");


        if ($day1 != null && $day1 != "") {
            $day1 = $this->convert_date_ad($day1);
        }

        if ($day2 != null && $day2 != "") {
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
            "day2" => $day2,
            "eva_check" => $eva_check
        );

        $result = $this->Patient_model->search_sp_info($array, $option);

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

                $date = $this->convert_date_be($r->date);

                $button = " <button type='button' style='height: 30px;padding: 2px 5px;' class='btn btn-success' " .
                        "onclick='edit_sp_info($r->sp_info_id)' >แก้ไข</button>";
                $data[] = array(
                    "<span id='date_" . $r->sp_info_id . "' >" . $date . "</span>",
                    "<span id='name_" . $r->person_id . "' ><a href='#' onclick='manage_sp_act($r->person_id)' >" . $r->prefix . " " . $r->fname . " " . $r->lname . "</a></span>",
                    "<span id='sp_act" . $r->sp_info_id . "' >" . $r->sp_act_name . " </span>",
                    "<span id='symp_" . $r->sp_info_id . "' >" . $r->symp_name . " </span>",
                    "<span id='evaluation_" . $r->sp_info_id . "' >" . $r->evaluation . "</span>",
                    "<span id='comment_" . $r->sp_info_id . "' >" . $r->comment . "</span>",
                    $button
                );
            }
        } else {
            $data = array(
                "result" => "ไม่พบข้อมูล"
            );
        }



        echo json_encode($data);
    }

    public function get_single_sp_info() {
        header('Content-Type: application/json');
        $id = $this->input->post("id");

        $result = $this->Patient_model->get_single_sp_info($id);
        echo json_encode($result);
    }

    public function save_sp_info_list() {
        header('Content-Type: application/json');
        $sp_act = $this->input->post("sp_act_list");
        $symptom_list = $this->input->post("symptom_list");
        $date = $this->input->post("date_list");
        $date_ad = $this->convert_date_ad($date);
        if ($sp_act == "0") {
            $array = array(
                "status" => "act"
            );
            echo json_encode($array);
            exit();
        }

        if ($symptom_list == "0") {
            $array = array(
                "status" => "symp"
            );
            echo json_encode($array);
            exit();
        }

        $array = array();
        $check = "yes";
        for ($i = 0; $i < 16; $i++) {
            $no = $i + 1;


            if ($this->input->post("person_" . $no) != "0") {
                $temp_arr = array(
                    "person_id" => $this->input->post("person_" . $no),
                    "sp_act_id" => $sp_act,
                    "symp_id" => $symptom_list,
                    "date" => $date_ad,
                    "evaluation" => $this->input->post("eva_" . $no),
                    "comment" => $this->input->post("com_" . $no),
                    "datetime" => date("Y-m-d H:i:s"),
                    "last_update" => date("Y-m-d H:i:s")
                );
                array_push($array, $temp_arr);
            }
        }

        if (count($array) == "0") {

            $array = array(
                "status" => "p"
            );
            echo json_encode($array);
            exit();
        } else {
            $array = $this->Patient_model->insert_sp_info_list($array);
            $array = array(
                "status" => "ok"
            );
            echo json_encode($array);
            exit();
        }
        //var_dump($array);
    }

    public function add_choice() {
        header('Content-Type: application/json');

        $manage_choice = $this->input->post("manage_choice");
        $choice_data = $this->input->post("manage_choice_data");

        $result = $this->Patient_model->add_choice($manage_choice, $choice_data);

        echo json_encode($result);
    }

    public function base() {

        echo $_SERVER['SCRIPT_FILENAME'];
    }

    public function guzz() {

        $x = $this->input->post("x");
        $c = $this->input->post("c");
        if ($x == "123") {
            $array = array(
                "success" => true,
                "x" => $x,
                "c" => $c
            );
        } else {
            $array = array(
                "success" => alse,
                "x" => $x,
                "c" => $c
            );
        }


        echo json_encode($array);
    }

    public function update_choice() {
        header('Content-Type: application/json');

        $choice = $this->input->post("choice");
        $choice_data = $this->input->post("choice_data");
        $id = $this->input->post("choice_id");
        $result = $this->Patient_model->update_choice($choice, $choice_data, $id);

        echo json_encode($choice);
    }

    public function get_choice() {
        header('Content-Type: application/json');

        $id = $this->input->post("id");
        $choice_data = $this->input->post("choice");
        $result = $this->Patient_model->Get_choice($id, $choice_data);

        echo json_encode($result);
    }

}
