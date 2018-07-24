<?php

class Patient_model extends CI_Model {

    function __construct() {
        parent::__construct(); // construct the Model class
    }

    public function get_prefix_list() {
//$query = $this->db->get('prefix');
        $query = $this->db->get('prefix');

        return $query->result();
    }

    public function get_person_status_list() {
        $query = $this->db->get('person_status');

        return $query->result();
    }

    public function get_edu_list() {
        $query = $this->db->get("education");

        return $query->result();
    }

    public function get_time_sp_list() {
        $query = $this->db->get("time_sp");

        return $query->result();
    }

    public function get_sp_list($type) {
//        $sql = 'SELECT * FROM person_info ps INNER JOIN prefix p on ps.prefix = p.id ';
//        $query = $this->db->query("person_info");
        $this->db->select('*, YEAR(CURRENT_TIMESTAMP) - YEAR(birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthday, 5)) as age ');
        $this->db->from('person_info');
        $this->db->join('prefix', 'person_info.prefix = prefix.id');
        switch ($type) {
            case "date":
                break;
            case "option":
                $this->db->order_by("fname", "asc");
                break;
            default:
                break;
        }
        //$this->db->order_by("rec_day", "asc");


        $query = $this->db->get();

        return $query->result();
    }

    public function check_id_card($id) {

        $where = array(
            "id_card" => $id
        );

        $this->db->where($where);
        $query = $this->db->get("person_info");

        if ($query->num_rows() > 0) {
            $array = array(
                "status" => "2"
            );
        } else {
            $array = array(
                "status" => "1"
            );
        }
        return $array;
    }

    public function get_evaluation_list() {

        $query = $this->db->get("evaluation");

        return $query->result();
    }

    public function get_sp_by_id($id) {
        $this->db->select('*');
        $this->db->from('person_info');
//$this->db->join('prefix', 'person_info.prefix = prefix.id');
        $this->db->where("person_id", $id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_sp_data($id) {
        $this->db->select('*');
        $this->db->from('person_info');
        $this->db->join('prefix', 'person_info.prefix = prefix.id');
        $this->db->where("person_id", $id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_symptom_list() {
        $this->db->order_by("symp_name", "asc");
        $query = $this->db->get("symptom");

        return $query->result();
    }

    public function get_sp_act_list() {
        $this->db->order_by("sp_act_name", "asc");
        $query = $this->db->get("sp_act");

        return $query->result();
    }

    public function patient_save_data($array) {


        $this->db->where("id_card", $array['id_card']);
        $query1 = $this->db->get("person_info");

        if ($query1->num_rows() > 0) {
            $return = array(
                "status" => "0"
            );
        } else {
            $query2 = $this->db->insert("person_info", $array);
            $return = array(
                "status" => "1"
            );
        }

        return $return;
    }

    public function patient_update_data($array, $person_id) {
        $where = array(
            "person_id" => $person_id
        );
        $this->db->set($array);
        $this->db->where($where);
        $this->db->update("person_info");
        $sql = $this->db->last_query();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return 0;
        } else {
            return 1;
        }
    }

    public function get_sp_info_by_id($id) {

        $where = array(
            "person_id" => $id
        );
        $this->db->where($where);
        $this->db->join('sp_act', 'sp_info.sp_act_id = sp_act.sp_act_id');
        $this->db->join('symptom', 'sp_info.symp_id = symptom.symp_id');
        $query = $this->db->from("sp_info")->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array("error" => "0");
        }
    }

    public function get_single_sp_info($id) {

        $where = array(
            "sp_info_id" => $id
        );
        $this->db->where($where);
        $query = $this->db->get("sp_info");

        return $query->result();
    }

    public function get_total_sp() {
        $query = $this->db->select("COUNT(*) as num")->get("person_info");
        $result = $query->row();
        if (isset($result))
            return $result->num;
        return 0;
    }

    public function get_total_sp_info($id) {
        $this->db->where("person_id", $id);
        $query = $this->db->select("COUNT(*) as num")->get("sp_info");
        $result = $query->row();
        if (isset($result))
            return $result->num;
        return 0;
    }

    public function get_total_sp_info_all() {

        $query = $this->db->select("COUNT(*) as num")->get("sp_info");
        $result = $query->row();
        if (isset($result))
            return $result->num;
        return 0;
    }

    public function insert_sp_info($array) {

        $this->db->insert("sp_info", $array);

        $result = array(
            "success" => true
        );

        $this->db->set("exp", "1");
        $this->db->where("person_id", $array['person_id']);
        $this->db->update("person_info");

        return $result;
    }

    public function update_sp_info($array, $sp_info_id) {

        $where = array(
            "sp_info_id" => $sp_info_id
        );
        $this->db->set($array);
        $this->db->where($where);
        $this->db->update("sp_info");
        $sql = $this->db->last_query();
        return array($sql);
    }

    public function update_symptom($array, $sp_info_id) {

        $where = array(
            "sp_info_id" => $sp_info_id
        );
        $this->db->set($array);
        $this->db->where($where);
        $this->db->update("sp_info");
//$sql = $this->db->last_query();
        return array("success" => true);
    }

    public function update_sp_act($array, $sp_info_id) {

        $where = array(
            "sp_info_id" => $sp_info_id
        );
        $this->db->set($array);
        $this->db->where($where);
        $this->db->update("sp_info");
//$sql = $this->db->last_query();
        return array("success" => true);
// "success"=>true
    }

    public function save_comment($array, $sp_info_id) {

        $where = array(
            "sp_info_id" => $sp_info_id
        );

        $this->db->set($array);
        $this->db->where($where);
        $this->db->update("sp_info");
    }

    public function delete_sp_info($sp_info_id, $person_id) {

        $where = array(
            "sp_info_id" => $sp_info_id
        );

        $this->db->where($where);
        $result = $this->db->delete("sp_info");

        $this->db->where("person_id", $person_id);
        $query = $this->db->get("sp_info");

        if ($query->num_rows() == 0) {
            $this->db->set("exp", "0");
            $this->db->where("person_id", $person_id);
            $this->db->update("person_info");
        }

        return $result;
    }

    public function get_sp_info_list() {
        $this->db->join('person_info', 'person_info.person_id = sp_info.person_id');
        $this->db->join('prefix', 'person_info.prefix = prefix.id');
        $this->db->join('symptom', 'sp_info.symp_id = symptom.symp_id');
        $this->db->join('sp_act', 'sp_info.sp_act_id = sp_act.sp_act_id');
        $query = $this->db->get("sp_info");

        return $query->result();
    }

    public function search_person($array, $option) {
        $this->db->select('*, YEAR(CURRENT_TIMESTAMP) - YEAR(birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthday, 5)) as age, p.person_id as p_id');
        $this->db->from("person_info p");
        $this->db->join('prefix', 'p.prefix = prefix.id');
        $this->db->join('sp_info', 'p.person_id = sp_info.person_id', 'left');

        if ($array['id_card'] != null && $array['id_card'] != "") {
            $this->db->where("id_card", $array['id_card']);
        }

        if ($array['fname'] != null && $array['fname'] != "") {
            $this->db->where("fname", $array['fname']);
        }

        if ($array['lname'] != null && $array['lname'] != "") {
            $this->db->where("lname", $array['lname']);
        }

        if ($array['eva_check'] == '1') {
            $ev = "evaluation <> '0'";
            $this->db->where($ev);
        } else if ($array['eva_check'] == "2") {
            $ev = "evaluation = '0'";
            $this->db->where($ev);
        }

        if ($option == "2") {
            if ($array['gender'] != "0") {
                $this->db->where("gender", $array['gender']);
            }
            if (($array['age1'] != null && $array['age1'] != "")) {
                if (($array['age1'] != null && $array['age1'] != "") && ($array['age2'] != null && $array['age2'] != "")) {
//                    $arr = array(
//                        "age >= " => $array['age1'],
//                        "age <= " => $array['age2']
//                    );

                    $age1 = $array['age1'] - 1;
                    $age2 = $array['age2'];

                    $con = "birthday between date_add( curdate(), interval -$age2 year )
                       and date_add( curdate(), interval -$age1 year )";
                } else {
                    $con = "(YEAR(CURRENT_TIMESTAMP) - YEAR(birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthday, 5))) = '$array[age1]'";
                }

                $this->db->where($con);
            }
            if ($array['weight1'] != "" && $array['weight1'] != null) {
//$this->db->where("weight", $array['weight1']);

                if ($array['weight1'] != "" && $array['weight1'] != null && $array['weight2'] != "" && $array['weight2'] != null) {
                    if ($array['weight1'] > $array['weight2']) {
                        $temp = $array['weight1'];
                        $array['weight1'] = $array['weight1'];
                        $array['weight2'] = $temp;
                    }
                    $this->db->where("weight between $array[weight1] and $array[weight2]");
                } else {
                    $this->db->where("weight", $array['weight1']);
                }
            }

            if ($array['day1'] != "" && $array['day1'] != null) {
                if ($array['day1'] != "" && $array['day1'] != null && $array['day2'] != null && $array['day2'] != "") {
                    $day2 = date('Y-m-d', strtotime($array['day2'] . "+1 days"));
                    $day1 = $array['day1'];
                    $this->db->where(" rec_day between '$day1' and '$day2' ");
                } else {
                    $this->db->where(" rec_day = '$array[day1]' ");
                }
            }

            if ($array['sp_act'] != "" && $array['sp_act'] != null && $array['sp_act'] != "0") {
                $this->db->where("sp_act_id", $array['sp_act']);
            }

            if ($array['symptom'] != "" && $array['symptom'] != null && $array['symptom'] != "0") {
                $this->db->where("symp_id", $array['symptom']);
            }
        } else {
            
        }
        $this->db->group_by("p.person_id");
        $result = $this->db->get();
        $sql = $this->db->last_query();

        if ($result->num_rows() > 0) {
            $data = $result->result();
        } else {
            $data = array(
                "error" => "data's not found"
            );
        }

        return $data;
    }

    public function search_sp_info($array, $option) {
        $this->db->select('*, YEAR(CURRENT_TIMESTAMP) - YEAR(birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthday, 5)) as age');

        $this->db->join('person_info', 'person_info.person_id = sp_info.person_id');
        $this->db->join('prefix', 'person_info.prefix = prefix.id');
        $this->db->join('symptom s', 'sp_info.symp_id = s.symp_id');
        $this->db->join('sp_act', 'sp_info.sp_act_id = sp_act.sp_act_id');


        if ($array['id_card'] != null && $array['id_card'] != "") {
            $this->db->where("id_card", $array['id_card']);
        }

        if ($array['fname'] != null && $array['fname'] != "") {
            $this->db->where("fname", $array['fname']);
        }

        if ($array['lname'] != null && $array['lname'] != "") {
            $this->db->where("lname", $array['lname']);
        }

        if ($array['eva_check'] == '1') {
            $ev = "evaluation <> '0'";
            $this->db->where($ev);
        } else if ($array['eva_check'] == "2") {
            $ev = "evaluation = '0'";
            $this->db->where($ev);
        }

        if ($option == "2") {
            if ($array['gender'] != "0") {
                $this->db->where("gender", $array['gender']);
            }
            if (($array['age1'] != null && $array['age1'] != "")) {
                if (($array['age1'] != null && $array['age1'] != "") && ($array['age2'] != null && $array['age2'] != "")) {
                    $arr = array(
                        "age >= " => $array['age1'],
                        "age <= " => $array['age2']
                    );

                    $age1 = $array['age1'] - 1;
                    $age2 = $array['age2'];

                    $con = "birthday between date_add( curdate(), interval -$age2 year )
                       and date_add( curdate(), interval -$age1 year )";
                } else {
                    $con = "(YEAR(CURRENT_TIMESTAMP) - YEAR(birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthday, 5))) = '$array[age1]' ";
                }

                $this->db->where($con);
            }
            if ($array['weight1'] != "" && $array['weight1'] != null) {
                //$this->db->where("weight", $array['weight1']);

                if ($array['weight1'] != "" && $array['weight1'] != null && $array['weight2'] != "" && $array['weight2'] != null) {
                    if ($array['weight1'] > $array['weight2']) {
                        $temp = $array['weight1'];
                        $array['weight1'] = $array['weight1'];
                        $array['weight2'] = $temp;
                    }
                    //$this->db->where("weight", $array['weight1']);
                    $this->db->where("weight between $array[weight1] and $array[weight2]");
                } else {
                    $this->db->where("weight", $array['weight1']);
                }
            }

            if ($array['day1'] != "" && $array['day1'] != null) {
                if ($array['day1'] != "" && $array['day1'] != null && $array['day2'] != null && $array['day2'] != "") {
                    $day2 = date('Y-m-d', strtotime($array['day2'] . "+1 days"));
                    $day1 = $array['day1'];
                    $this->db->where(" date between '$day1' and '$day2' ");
                } else {
                    $this->db->where(" date = '$array[day1]' ");
                }
            }

            if ($array['sp_act'] != "" && $array['sp_act'] != null && $array['sp_act'] != "0") {
                $this->db->where("sp_info.sp_act_id", $array['sp_act']);
            }

            if ($array['symptom'] != "" && $array['symptom'] != null && $array['symptom'] != "0") {
                $this->db->where("s.symp_id", $array['symptom']);
            }
        }
        $this->db->order_by("date", "desc");
        $result = $this->db->get("sp_info");
        $sql = $this->db->last_query();

        if ($result->num_rows() > 0) {
            $data = $result->result();
        } else {
            $data = array(
                "error" => "data's not found"
            );
        }

        return $data;
    }

    public function insert_sp_info_list($array) {
        $num = count($array);

        for ($i = 0; $i < $num; $i++) {

            $this->db->set($array[$i]);
            $this->db->insert("sp_info");

            //var_dump($array[$i]);
        }


        return "1";
    }

    public function add_choice($choice, $ch_data) {


        switch ($choice) {
            case "1":
                $this->db->where("prefix", $ch_data);
                $query = $this->db->get("prefix");
                if ($query->num_rows() > 0) {
                    $array = array(
                        "status" => "dup"
                    );
                } else {
                    $arr = array(
                        "prefix" => $ch_data
                    );
                    $this->db->set($arr);
                    $this->db->insert("prefix");
                    $array = array(
                        "status" => "ok"
                    );
                }

                break;
            case "2":
                $this->db->where("sp_act", $ch_data);
                $query = $this->db->get("sp_act");
                if ($query->num_rows() > 0) {
                    $array = array(
                        "status" => "dup"
                    );
                } else {
                    $arr = array(
                        "sp_act_name" => $ch_data
                    );
                    $this->db->set($arr);
                    $this->db->insert("sp_act");
                    $array = array(
                        "status" => "ok"
                    );
                }
                break;
            case "3":
                $this->db->where("symp_name", $ch_data);
                $query = $this->db->get("symptom");
                if ($query->num_rows() > 0) {
                    $array = array(
                        "status" => "dup"
                    );
                } else {
                    $arr = array(
                        "symp_name" => $ch_data
                    );
                    $this->db->set($arr);
                    $this->insert("symptom");
                    $array = array(
                        "status" => "ok"
                    );
                }
                break;
            case "4":
                $this->db->where("edu_name", $ch_data);
                $query = $this->db->get("education");
                if ($query->num_rows() > 0) {
                    $array = array(
                        "status" => "dup"
                    );
                } else {
                    $arr = array(
                        "edu_name" => $ch_data
                    );
                    $this->db->set($arr);
                    $this->db->insert("education");
                    $array = array(
                        "status" => "ok"
                    );
                }
                break;
            case "5":
                $this->db->where("time_name", $ch_data);
                $query = $this->db->get("time_sp");
                if ($query->num_rows > 0) {
                    $array = array(
                        "status" => "dup"
                    );
                } else {
                    $arr = array(
                        "time_name" => $ch_data
                    );
                    $this->db->set($arr);
                    $this->db->insert("time_sp");
                    $array = array(
                        "status" => "ok"
                    );
                }
                break;
            default:
                break;
        }

        return $array;
    }

    public function Get_choice($id, $choice) {
        $field = "";
        if ($choice == "prefix") {
            $table = "prefix";
            $field = "prefix";
            $where = array(
                "id" => $id
            );
        } else if ($choice == "sp_act") {
            $table = "sp_act";

            $where = array(
                "sp_act_id" => $id
            );
            $field = "sp_act_name";
        } else if ($choice == "symptom") {
            $table = "symptom";
            $field = "symp_name";
            $where = array(
                "symp_id" => $id
            );
        } else if ($choice == "education") {
            $table = "education";
            $field = "edu_name";
            $where = array(
                "id" => $id
            );
        } else if ($choice == "time_sp") {
            $table = "time_sp";
            $field = "time_name";
            $where = array(
                "time_code" => $id
            );
        }
        $this->db->where($where);
        $query = $this->db->get($table);

        foreach ($query->result_array() as $row) {

            $data = array(
                "data" => $row[$field]
            );
        }
        return $data;
    }

    public function update_choice($choice, $data, $id) {
        if ($choice == "prefix") {
            $table = "prefix";
            $field = "prefix";
            $where = array(
                "id" => $id
            );
        } else if ($choice == "sp_act") {
            $table = "sp_act";

            $where = array(
                "sp_act_id" => $id
            );
            $field = "sp_act_name";
        } else if ($choice == "symptom") {
            $table = "symptom";
            $field = "symp_name";
            $where = array(
                "symp_id" => $id
            );
        } else if ($choice == "education") {
            $table = "education";
            $field = "edu_name";
            $where = array(
                "id" => $id
            );
        } else if ($choice == "time_sp") {
            $table = "time_sp";
            $field = "time_name";
            $where = array(
                "time_code" => $id
            );
        }
        $arr = array(
            $field => $data
        );
        $this->db->where($where);
        $this->db->set($arr);
        $this->db->update($table);
        $sql = $this->db->last_query();


        $query = $this->db->get($table);
        return $query->result();
    }

}
