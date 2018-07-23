

<link href="<?php echo base_url("assets/my_css/index_page.css"); ?>" rel="stylesheet" >

<script src="<?php echo base_url("assets/my_js/sp_info.js"); ?>" ></script>

<link type="text/css" href="<?php echo base_url(); ?>assets/jQueryCalendarThai_Ui1.11.4/jquery-ui-1.11.4.custom.css" rel="stylesheet" />	

<!--<script type="text/javascript" src="<?php //echo base_url();                                                                                                                                                                            ?>assets/datepicker/js/jquery-1.4.4.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jQueryCalendarThai_Ui1.11.4/jquery-ui-1.11.4.custom.js"></script>

<!--<script type="text/javascript" src="<?php //echo base_url();                                                                                                                                                                            ?>assets/datepicker/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-confirm-master/dist/jquery-confirm.min.js"></script>
<link type="text/css" href="<?php echo base_url(); ?>assets/jquery-confirm-master/dist/jquery-confirm.min.css" rel="stylesheet" />


<?php

function convert_date_be($date) {
    //$date = $this->post("date");

    $ex_date = explode("-", $date);

    $year = $ex_date[0];
    $month = $ex_date[1];
    $day = $ex_date[2];

    $year = $year + 543;
    $new_date = $day . "/" . $month . "/" . $year;
    return $new_date;
}
?>


<div style="padding-top: 20px;padding-bottom: 20px;background-color:white;margin:auto;margin-top: 10px;width:98%;border: 1px solid ">
    <div  style="text-align: center" >
        <h2  >อาการและโรคของผู้ป่วยจำลอง: <span id='name'></span></h2>
    </div>
    <div style="text-align:center">
        <button type="button" style="height: 35px;padding: 5px 7px;" class="btn btn-success" onclick="add_sp_info()">เพิ่ม</button>
        &nbsp;
        <button type="button" style="height: 35px;padding: 5px 7px;" class="btn btn-primary" onclick="edit_person_info(<?php echo $id; ?>)">แก้ไขข้อมูล SP</button>
    </div>
    <div style="padding-top:10px">

        <table id="sp_info_table" class="table_sp" >
            <thead>
                <tr>
                    <th  style="width: 150px;">วันที่ </th>
                    <th  style="width: 200px;">ประเภทการกระทำ</th>
                    <th  style="">อาการ/โรค</th>
                    <th style="width: 150px;"> ผลการประเมิน </th>
                    <th style="">หมายเหตุ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="sp_info_data" >

            </tbody>
        </table>

    </div>




</div>


<!-- /////////////////////////////////////////   MODAL ADD   ///////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="add_sp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-add" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form id="form_sp_info" >
                    <!--/////////////////////////////////////////////////  FORM ///////////////////////////////////////////////////////////////-->

                    <div class="col">
                        <label class="label_1">วันที่ </label> &nbsp;<input type="text" name="date" id="date" class="rec_day">&nbsp;
                        <!--                        <label class="label_1">การกระทำ</label> -->
                        <select id="sp_act" name="sp_act" class="input-border" style="width: 200px">
                            <option value="0">------เลือการกระทำ--------</option>
                        </select>
                        <select id="symptom" name="symptom" class="input-border" style="width: 200px">
                            <option value="0">------เลือกอาการ/โรค--------</option>
                        </select>
                        &nbsp;
                        <label class="label_1">การประเมิน</label> 
                        <select id="evaluation" name="evaluation" class="input-border" >
                            <option value="" >--เลือก--</option>
                        </select>

                        <input type="hidden" name="person_id" id="person_id" >
                    </div>
                    <div class="col">



                        <label class="label_1">หมายเหตุ</label>
                        <textarea type="text" class="form-control" style="border-color: black;" id="comment" name="comment" ></textarea>
                    </div>

                    <!--/////////////////////////////////////////////////  FORM ///////////////////////////////////////////////////////////////-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="save_sp_info(<?php echo $id; ?>)">บันทึก</button>
            </div>
        </div>
    </div>
</div>


<!--   /////////////////////////////////////////   MODAL ADD END  /////////////////////////////////////////////////////////////////   -->

<!-- /////////////////////////////////////////   MODAL COMMENT   ///////////////////////////////////////////////////////////////// -->

<div class="modal fade" id="comment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-comment" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มหมายเหตุ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form id="comment_form" >
                    <!--/////////////////////////////////////////////////  FORM ///////////////////////////////////////////////////////////////-->
                    <input type="hidden" name="sp_info_id" id="sp_info_id" >
                    <div class="col">

                        <label class="label_1">หมายเหตุ</label>
                        <textarea type="text" class="form-control" style="border-color: black;" id="comment_edit" name="comment_edit" ></textarea>
                    </div>
                    <!--/////////////////////////////////////////////////  FORM ///////////////////////////////////////////////////////////////-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="save_comment()">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<!--   /////////////////////////////////////////   MODAL COMMENT END  /////////////////////////////////////////////////////////////////   -->



<script>
    var person_id =<?php echo $id; ?>;
    var tempV = "";
    var j = "1";
    $(document).ready(function () {

        get_form_option();

        var d = new Date();
        var toDay = d.getDate() + '/'
                + (d.getMonth() + 1) + '/'
                + (d.getFullYear() + 543);

        // Datepicker
        $("#datepicker1").datepicker({dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']});

        var option_select = {changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']};
        $("#form_sp_info input#date").datepicker();
        $("#patient_edit input#rec_day_s").datepicker();
        $("#patient_edit input#birthday_s").datepicker();


        //$("#patient_save input#searc").datepicker();


        $.datepicker.regional['th'] = {
            changeMonth: true,
            changeYear: true,
            //defaultDate: GetFxupdateDate(FxRateDateAndUpdate.d[0].Day),
            yearOffSet: 543,
            dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
            constrainInput: true,
            defaultDate: toDay,
            prevText: 'ก่อนหน้า',
            nextText: 'ถัดไป',
            yearRange: '-150:+20',
            buttonText: 'เลือก',
            dateFormat: 'dd/mm/yy'
        };
        $.datepicker.setDefaults($.datepicker.regional['th']);


        $("#form_sp_info input#date").datepicker("setDate", new Date());

        $("#patient_edit input#rec_day_s").datepicker("setDate", new Date());
        $("#patient_edit input#birthday_s").datepicker("setDate", new Date());



        $("#person_id").val(person_id);

        $.ajax({
            url: api_url + "get_sp_data",
            type: "POST",
            data: {
                id: person_id
            },
            success: function (data) {
                var res = data[0];
                var name = res.prefix + " " + res.fname + " " + res.lname;
                $("#name").html(name);


            }
        });
        
        
        $.ajax({
        url: api_url + "sp_act_list",
        type: "get",
        success: function (data) {
            var txt = "";
     

            $.each(data, function (idx, obj) {
                txt += '<label >' + obj.sp_act_name + '</label>';
                txt += '<textarea  class="form-control" readonly style="background-color:white" name="exp_' + obj.sp_act_id + '_detail" id="exp_' + obj.sp_act_id + '_detail"></textarea> ';
            });

            $("#exp_d").append(txt);
        }
    });

        $.ajax({
            url: api_url + "get_sp_info_by_id",
            type: "POST",
            data: {
                id: person_id
            },
            success: function (data) {

                var str = "";

                console.log(data);
                if (data.error !== "0") {
                    $.each(data, function (idx, obj) {
                        console.log("ok");
                        str = "";
                        str += "<tr>";
                        str += "<td>";
                        str += convert_date_ad(obj.date);
                        str += "</td>";
                        str += "<td>";
                        str += "<select id='act_" + obj.sp_info_id + "' style='position:relative;width:95%;' name='act_" + obj.sp_info_id + "' onChange='act_update(this.id)' ></select> ";
                        //str += obj.sp_act_name;
                        str += "</td>";
                        str += "<td>";
                        str += "<select id='symp_" + obj.sp_info_id + "' style='position:relative;width:95%;' name='symp_" + obj.sp_info_id + "' onChange='symp_update(this.id)' ></select> ";
                        //str += obj.symp_name;
                        str += "</td>";
                        str += "<td>";
                        str += "<select id='eva_" + obj.sp_info_id + "' name='eva_" + obj.sp_info_id + "' onChange='eva_update(this.id)' ></select> ";
                        str += "</td>";
                        str += "<td id='comment_" + obj.sp_info_id + "' onClick='comment_sp(this.id)' >";
                        str += "<input type='text' id='input_comment_" + obj.sp_info_id + "' name='input_comment" + obj.sp_info_id + "' class='name_medium' readonly value='" + obj.comment + "'>"
                        //str += obj.comment;
                        str += "</td>";
                        str += "<td>";
                        str += "<button class='btn btn-danger' style='' onClick='delete_sp_info(this.id,"+obj.person_id+")' id='" + obj.sp_info_id + "' > ลบ </button>";
                        str += "</td>";

                        $("#sp_info_data").append(str);

                        var y = "1";
                        $.ajax({
                            url: api_url + "sp_act_list",
                            type: "get",
                            success: function (data) {
                                $.each(data, function (idx2, obj2) {
//                                    if (y === "1") {
//                                        $('#act_' + obj.sp_info_id).append('<option value="0" >ประเมิน</option>');
//                                        y++;
//                                    }
                                    if (obj.sp_act_id === obj2.sp_act_id) {
                                        $('#act_' + obj.sp_info_id).append('<option selected value="' + obj2.sp_act_id + '" >' + obj2.sp_act_name + '</option>');
                                    } else {
                                        $('#act_' + obj.sp_info_id).append('<option value="' + obj2.sp_act_id + '" >' + obj2.sp_act_name + '</option>');
                                    }

                                });
                            }
                        });

                        var j = "1";
                        $.ajax({
                            url: api_url + "symptom_list",
                            type: "get",
                            success: function (data) {
                                $.each(data, function (idx2, obj2) {
//                                    if (j === "1") {
//                                        $('#symp_' + obj.sp_info_id).append('<option value="0" >ประเมิน</option>');
//                                        j++;
//                                    }
                                    if (obj.symp_id === obj2.symp_id) {
                                        $('#symp_' + obj.sp_info_id).append('<option selected value="' + obj2.symp_id + '" >' + obj2.symp_name + '</option>');
                                    } else {
                                        $('#symp_' + obj.sp_info_id).append('<option value="' + obj2.symp_id + '" >' + obj2.symp_name + '</option>');
                                    }

                                });
                            }
                        });

                        var x = "1";
                        $.ajax({
                            url: api_url + "evaluation_list",
                            type: "get",
                            success: function (data) {

                                $.each(data, function (idx2, obj2) {
                                    if (x === "1") {
                                        $('#eva_' + obj.sp_info_id).append('<option value="0" >ประเมิน</option>');
                                        //console.log("logJ:" + j);
                                        x++;
                                    }
                                    if (obj.evaluation === obj2.eva_id) {
                                        $('#eva_' + obj.sp_info_id).append('<option selected value="' + obj2.eva_id + '" >' + obj2.eva_id + '</option>');
                                    } else {
                                        $('#eva_' + obj.sp_info_id).append('<option value="' + obj2.eva_id + '" >' + obj2.eva_id + '</option>');
                                    }

                                });
                            }
                        });

//                        if (obj.evaluation === null || obj.evaluation === "") {
//                        } else {
//                            console.log(obj.sp_info_id + "/" + obj.evaluation);
//                            $('#eva_' + obj.sp_info_id + ' option[value="' + obj.evaluation + '"]').attr("selected", true);
//                        }
                    });

                } else {
                    str += "<tr><td colspan='5'>ไม่มีข้อมูล</td></tr>";
                    $("#sp_info_data").html(str);
                }

            }
        });

        $('#add_sp_modal').on('hidden.bs.modal', function () {
            $("#form_sp_info")[0].reset();
        });

        $('#edu_s').change(function () {
            if ($(this).val() == '5') { // or this.value == 'volvo'
                $("#edu_ex_s").css("display", "inline");
                //$("#edu_detail").attr("disable",false);
            } else {
                $("#edu_ex_s").css("display", "none");
                //$("#edu_detail").attr("disable",true);
            }
        });

    });

    function convert_date_ad(date) {
        var array = date.split("-");
        var day = array[2];
        var month = array[1];
        var year = parseInt(array[0]) + 543;

        return day + "/" + month + "/" + year;
    }

</script>



