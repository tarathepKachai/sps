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

    public function get_sp_list() {
//        $sql = 'SELECT * FROM person_info ps INNER JOIN prefix p on ps.prefix = p.id ';
//        $query = $this->db->query("person_info");
        $this->db->select('*, YEAR(CURRENT_TIMESTAMP) - YEAR(birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthday, 5)) as age ');
        $this->db->from('person_info');
        $this->db->join('prefix', 'person_info.prefix = prefix.id');
        // $this->db->where("person_id","13");
        $query = $this->db->get();

        return $query->result();
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
        $query = $this->db->get("symptom");

        return $query->result();
    }

    public function get_sp_act_list() {
        $query = $this->db->get("sp_act");

        return $query->result();
    }

    public function patient_save_data($array) {

        $query = $this->db->insert("person_info", $array);

        if ($query) {
            return 1;
        } else {
            return 0;
        }

        return 1;
    }

    public function patient_update_data($array, $person_id) {
        $where = array(
            "person_id" => $person_id
        );
        $this->db->set($array);
        $this->db->where($where);
        $this->db->update("person_info");
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

    public function delete_sp_info($sp_info_id) {

        $where = array(
            "sp_info_id" => $sp_info_id
        );

        $this->db->where($where);
        $result = $this->db->delete("sp_info");
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
        $this->db->select('*, YEAR(CURRENT_TIMESTAMP) - YEAR(birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthday, 5)) as age ');
        $this->db->from("person_info");
        $this->db->join('prefix', 'person_info.prefix = prefix.id');
        $this->db->join('sp_info', 'person_info.person_id = sp_info.person_id');

        if ($array['id_card'] != null && $array['id_card'] != "") {
            $this->db->where("id_card", $array['id_card']);
        }

        if ($array['fname'] != null && $array['fname'] != "") {
            $this->db->where("fname", $array['fname']);
        }

        if ($array['lname'] != null && $array['lname'] != "") {
            $this->db->where("lname", $array['lname']);
        }

        if ($option == "2") {
            if ($array['gender'] != 0) {
                $this->db->where("gender", $array['gender']);
            }
            if (($array['age1'] != null && $array['age1'] != "") && ($array['age2'] != null && $array['age2'] != "")) {
                $arr = array(
                    "age >= " => $array['age1'],
                    "age <= " => $array['age2']
                );

                $age1 = $array['age1'] - 1;
                $age2 = $array['age2'];

                $con = "birthday between date_add( curdate(), interval -$age2 year )
                       and date_add( curdate(), interval -$age1 year )";
                $this->db->where($con);
            }
            if ($array['weight1'] != "" && $array['weight2'] != "" && $array['weight1'] != null && $array['weight2'] != null) {
                if ($array['weight1'] > $array['weight2']) {
                    $temp = $array['weight1'];
                    $array['weight1'] = $array['weight1'];
                    $array['weight2'] = $temp;
                }
                $this->db->where("weight between $array[weight1] and $array[weight2]");
            }

            if ($array['day1'] != "" && $array['day2'] != "" && $array['day1'] != null && $array['day2'] != null) {
                $day2 = date('Y-m-d',strtotime($array['day2'] . "+1 days"));
                $day1 = $array['day1'];
                $this->db->where(" date between '$day1' and '$day2' ");
                
            }
        } else {
            
        }
        $this->db->group_by("id_card");
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

}
