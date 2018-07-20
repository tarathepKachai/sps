<!--css-->
<link href="<?php echo base_url("assets/my_css/index_page.css"); ?>" rel="stylesheet" >

<script src="<?php echo base_url("assets/my_js/index_page.js"); ?>" ></script>
<!--<link type="text/css" href="<?php //echo base_url();                                                                                                                           ?>assets/datepicker/css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />-->
<link type="text/css" href="<?php echo base_url(); ?>assets/jQueryCalendarThai_Ui1.11.4/jquery-ui-1.11.4.custom.css" rel="stylesheet" />	

<!--<script type="text/javascript" src="<?php //echo base_url();                                                                                                                           ?>assets/datepicker/js/jquery-1.4.4.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jQueryCalendarThai_Ui1.11.4/jquery-ui-1.11.4.custom.js"></script>

<!--<script type="text/javascript" src="<?php //echo base_url();                                                                                                                           ?>assets/datepicker/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-confirm-master/dist/jquery-confirm.min.js"></script>
<link type="text/css" href="<?php echo base_url(); ?>assets/jquery-confirm-master/dist/jquery-confirm.min.css" rel="stylesheet" />	


<!-- css end   -->



<div  class="program_header" >
    <center><h1  >โปรแกรมผู้ป่วยจำลอง</h1></center>
</div>


<div style="padding-top : 20px ;">

    <table class="table_main">

        <tbody>
            <tr>
                <td class="menu_header">
                    เมนู  
                </td>
                <td style="border:  2px solid black;background-color: green;">

                </td>
            </tr>

            <tr>
                <td class="menu_choice enable_choice" id="choice_1" style="height:30px; overflow:hidden;">
                    บันทึกผู้ป่วยใหม่
                </td>
                <td style="padding: 10px;vertical-align: top;font-size: 15px" rowspan="5">
                    <!--Save Patient Data-->
                    <div style="display: block;"  id="choice1" class="scrollable">
                        <form name="patient_save" id="patient_save"  action="#" method="POST">
                            <input type="hidden" name="form_type" id="form_type" value="insert"  >
                            <!--FORM -------------------------------------------------------->
                            <div class="col-md-12">

                                <label class="label_1">วัน/เดือน/ปี </label> &nbsp; <input  type="text" name="rec_day" id="rec_day" class="rec_day" > 
                                <span class="error_report" id="rec_day_error" ></span> 
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12" ><label class="label_1" >คำนำหน้านาม  </label>

                                                    <select  name="prefix" id="prefix" class="input-border">

                                                    </select>
                                                    <label class="label_1" >เพศ  </label>
                                                    <select  name="gender" id="gender" class="input-border">
                                                        <option value="ชาย">ชาย</option>
                                                        <option value="หญิง">หญิง</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                                    <div class="col-md-4" >
                                        <fieldset >

                                            <div class="row">
                                                <div class="col-md-2" style="text-align:right">
                                                    <label class="label_1">ชื่อ</label>
                                                </div>
                                                <div class="col-md-10" >
                                                    <input id="fname"  name="fname" type="text" class="name_medium" style="width:100%" >
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                                    <div class="col-md-4" >
                                        <fieldset >
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="label_1">นามสกุล</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text"  id="lname" name="lname" class="name_medium" style="width:100%" >
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!--                            <label class="label_1" >คำนำหน้านาม </label>  
                                                        &nbsp;<label><input type="radio" class="radio_but" name="prefix" value="1" > ด.ญ. &nbsp; </label>
                                                        &nbsp;<label><input type="radio" class="radio_but" name="prefix" value="2" > ด.ช. &nbsp; </label>
                                                        &nbsp;<label><input type="radio" class="radio_but" name="prefix" value="3" > นาย &nbsp; </label>
                                                        &nbsp;<label><input type="radio" class="radio_but" name="prefix" value="4" > นาง &nbsp; </label>
                                                        &nbsp;<label><input type="radio" class="radio_but" name="prefix" value="5" > นางสาว &nbsp; </label>
                                                        <span class="error_report" id="prefix_error" ></span>-->
<!--                            <label class="label_1" >ชื่อ</label> <input type="text" class="name_medium" name="name" id="name"> 
                            <span class="error_report" id="name_error" ></span>
                            &nbsp;<label  class="label_1">นามสกุล</label> <input type="text" class="name_medium" name="lastname" id="lastname"> 
                            <span class="error_report" id="lastname_error" ></span>-->

                            <div class="col">
                                <!--                                <label class="label_1" >เพศ </label>  
                                                                &nbsp;<label><input type="radio" class="radio_but" name="gender"  value="1" > ชาย &nbsp; </label>
                                                                &nbsp;<label><input type="radio" class="radio_but" name="gender"  value="2" > หญิง &nbsp; </label>
                                                                <span class="error_report" id="gender_error" ></span>-->

                            </div>
<!--                            <label  class="label_1">เลขที่บัตรประชาชน</label> <input type="text" class="name_medium" maxlength="13" name="id_card" id="id_card">
                            <span class="error_report" id="id_card_error" ></span>
                            <br>-->
                            <div class="col" >
                                <label class="label_1">วัน/เดือน/ปีเกิด </label> &nbsp; <input type="text" name="birthday" id="birthday" class="rec_day" >
                                <span class="error_report" id="birthday_error" ></span> &nbsp;
                                <label class="label_1">เลขที่บัตรประชาชน </label>

                                <input type="text" name="txtID1" id="txtID1" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)"  /> - 
                                <input type="text" name="txtID2" id="txtID2" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" />  
                                <input type="text" name="txtID3" id="txtID3" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" /> 
                                <input type="text" name="txtID4" id="txtID4" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" />  
                                <input type="text" name="txtID5" id="txtID5" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" /> -
                                <input type="text" name="txtID6" id="txtID6" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" />  
                                <input type="text" name="txtID7" id="txtID7" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" />  
                                <input type="text" name="txtID8" id="txtID8" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" /> 
                                <input type="text" name="txtID9" id="txtID9" class="input-card"  maxlength=1  onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)"/>  
                                <input type="text" name="txtID10" id="txtID10" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" /> -
                                <input type="text" name="txtID11" id="txtID11" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" />  
                                <input type="text" name="txtID12" id="txtID12" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" /> -
                                <input type="text" name="txtID13" id="txtID13" class="input-card"  maxlength=1 onkeyup="keyup(this, event, 'save')" onkeypress="return Numbers(event)" /> 

                            </div>
                            <div class="col">
                                <label style="margin-top:10px" class="label_1" >น้ำหนัก(กก.) </label>  
                                <input type="text" class="text_short" name="weight" id="weight">
                                <span class="error_report" id="w_error" ></span> 
                                &nbsp; <label class="label_1" >ส่วนสูง(ซม.) </label>  
                                <input type="text" class="text_short" name="height" id="height"> 
                                <span class="error_report" id="h_error" ></span> 

                                <label class="label_1">สถานภาพ</label> 

                                <select name="status" id="status" class="input-border">

                                </select>
<!--                                &nbsp;<label><input type="checkbox" class="radio_but" name="status1" id="status1" value="1" > โสด &nbsp; </label>
                                &nbsp;<label><input type="checkbox" class="radio_but" name="status2" id="status2" value="2" > สมรส &nbsp; </label>
                                &nbsp;<label><input type="checkbox" class="radio_but" name="status3" id="status3" value="3" > หย่าร้าง &nbsp; </label>-->

                                &nbsp;<label><input type="checkbox" class="radio_but" name="child" id="child" value="1" > มีบุตร &nbsp; </label>
                                <span class="error_report" id="status_error" ></span>
                            </div>
                            <div class="col">
                                <label class="label_1" >ตำหนิ/แผลเป็น </label>  
                                <input type="text" class="rec_day" style="width: 300px" name="scar" id="scar"> 
                                <span class="error_report" id="scar_error" ></span> 
                            </div>

                            <div class="col">
                                <label class="label_1" >อาชีพ</label> <input type="text" style="width:30%" name="job" id="job" class="name_medium" > 
                                &nbsp;<label class="label_1" >ที่ทำงาน</label> <input type="text" style="width:30%" name="workplace" id="workplace" class="name_medium" >  
                                &nbsp;<label class="label_1" >โทรศัพท์</label> <input type="text" maxlength="10" name="tel_work" id="tel_work" class="name_medium" >  

                            </div>

                            <hr>
                            <div class="col">
                                <label class="label_1">ที่อยู่ปัจจุบัน</label><br>
                                <label  style="margin-left:13px;">บ้านเลขที่</label> 
                                <input type="text" style="width:10%;margin-left:11px" class="text_short" name="address" id="address"> 
                                หมู่ <input type="text" style="width:10%" class="text_short" name="mu" id="mu"> 
                                ถนน <input type="text" style="width:20%" class="text_short" name="road" id="road">
                                ตำบล/แขวง <input type="text" style="width:20%" class="text_short" name="tambol" id="tambol"><br>

                            </div>
                            <div class="col" style="margin-top:10px">
                                <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">อำเภอ</label>
                                <input type="text" class="text_short" name="amphur" id="amphur"> 
                                จังหวัด <input type="text" class="text_short" name="province" id="province">
                                โทรศัพท์ที่สามารถติดต่อได้ <input type="text" maxlength="10" class="name_medium" name="tel" id="tel">
                            </div>
                            <div class="col" style="margin-top:10px">
                                <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm">โทรสาร</label>
                                <input style="margin-top: 7px" type="text" class="name_medium" name="fax" id="fax"> 
                                Line ID <input type="text" class="name_medium" name="line_id" id="line_id">
                                E-mail <input type="email" class="name_medium" name="email" id="email">
                            </div>
                            <div class="col" style="margin-top:10px">
                                <label for="colFormLabelSm" class="label_1">บุคคลที่สามารถติดต่อได้ในกรณีฉุกเฉิน</label>
                                <input style="margin-top: 7px" type="text" class="name_medium" name="person_em" id="person_em"> 
                                <label class="label_1" >โทรศัพท์</label>
                                <input style="margin-top: 7px" type="text" maxlength="10" class="name_medium" name="tel_em" id="tel_em"> 
                            </div>
                            <hr>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="label_1" >วุฒิการศึการสูงสุด</label> 
                                    </div>
                                    <div class="col-md-10" id="edu_sec">
                                        <select name="edu" id="edu" class="input-border" >

                                        </select>
                                        <span id="edu_ex" style="display:none"  >สาขา &nbsp;<input type="text" class="wide_box" id="edu_detail" name="edu_detail" ></span>
                                        <!--                                        <div class="form-check form-check-inline">
                                                                                    <label class="form-check-label" >
                                                                                        <input class="form-check-input" type="radio" name="degree" value="1">
                                                                                        ประถมศึกษา</label>
                                                                                </div> 
                                                                                <div class="form-check form-check-inline">
                                                                                    <label class="form-check-label" >
                                                                                        <input class="form-check-input" type="radio" name="degree" value="2">
                                                                                        มัธยมศึกษาตอนต้น</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <label class="form-check-label" >
                                                                                        <input class="form-check-input" type="radio" name="degree" value="3">
                                                                                        มัธยมศึกษาตอนปลาย/เทียบเท่า</label>
                                                                                </div>
                                        
                                                                                <div class="col"></div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <label class="form-check-label" >
                                                                                        <input class="form-check-input" type="radio" name="degree" value="5">
                                                                                        อนุปริญญา/หรือเทียบเท่า</label>
                                                                                </div> 
                                                                                <div class="form-check form-check-inline">
                                                                                    <label class="form-check-label" >
                                                                                        <input class="form-check-input" type="radio" name="degree" value="6">
                                                                                        ปริญญาตรีขึ้นไป</label> &nbsp;
                                                                                    <input type="text" class="name_medium" style="width:150px" name="degree_detail" id="degree_detail">
                                                                                </div>-->
                                    </div>
                                </div>
                            </div>
<!--                            &nbsp; <input type="text" name="degree" id="degree" class="name_medium" style="width: 400px;margin-top:7px;">-->

                            <!--                            <div class="col">
                                                            <label class="label_1">ประสบการณ์การเป็นผู้ป่วยจำลอง (SP)</label>
                                                            <span class="error_report" id="exp_error" ></span>
                                                            <br>
                                                            <label class="label_1"><input type="radio" class="radio_but" style="margin-left:20px;" name="exp"  value="1" /> เคย </label> 
                                                            <label ><input type="checkbox" class="radio_but" style="margin-left:10px;"  name="exp_1" id="exp_1" value="1" /> ซักประวัติอาการ </label>  <input type="text" class="name_medium" style="width: 250px"  name="exp_1_detail" id="exp_1_detail">
                                                            <label ><input type="checkbox" class="radio_but" style="margin-left:10px;"  name="exp_2" id="exp_2" value="2"/> ให้คำแนะนำอาการ/โรค </label>  <input type="text" class="name_medium" style="width: 250px"  name="exp_2_detail" id="exp_2_detail">
                                                            <br>
                                                            <label ><input type="checkbox" class="radio_but" style="margin-left:78px;"  name="exp_3" id="exp_3" value="3"/> ตรวจร่างกายอาการ </label>  <input type="text" class="name_medium" style="width: 250px"  name="exp_3_detail" id="exp_3_detail">
                                                            <label ><input type="checkbox" class="radio_but" style="margin-left:10px;"  name="exp_4" id="exp_4" value="4"/> การทำหัตถการ </label>  <input type="text" class="name_medium" style="width: 250px"  name="exp_4_detail" id="exp_4_detail">
                                                            <br>
                                                            <label class="label_1"><input type="radio" class="radio_but" style="margin-left:20px;" name="exp" value="2" /> ไม่เคย </label> 
                                                        </div>-->


                            <hr>
                            <div class="col">
                                <label class="label_1">ประวัติการเจ็บป่วย หรือ รับการผ่าตัด</label>
                                <br>
                                <textarea name="admission" id="admission" class="form-control" style="border-color: black;"></textarea> 
                                <br>
                            </div>

                            <div class="col">
                                <label class="label_1" >โรคประจำตัว</label> 
                                &nbsp; <input type="text" class="name_medium" name="disease" id="disease" style="width: 700px;"><br>
                            </div>
                            <div class="col">
                                <label class="label_1">เหตุผลในการสมัครเป็นผู้ป่วยจำลอง</label>
                                <br>
                                <textarea name="reason" id="reason" class="form-control" style="border-color: black;"></textarea> 
                                <br>
                            </div>

                            <div class="col">
                                <label class="label_1" >ช่วงเวลาที่สะดวกในการมาทำงานเป็นผู้ป่วยจำลอง</label>
                                &nbsp;<span class="error_report" id="come_error" ></span>
                                <div class="col">
                                    <!--                                    <div class="row">
                                                                            <div class="col">
                                                                                <label><input type="radio" name="time_to_come" value="1"> ทุกครั้งเมื่อคณะแพทยศาสตร์ต้องการ </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label><input type="radio" name="time_to_come" value="2"> บางครั้งตามแต่เวลาและโอกาสจะเอื้ออำนวย </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="col">
                                                                                    <label class="form-check-label" >
                                                                                        <input class="form-check-input" type="radio" name="time_to_come_2" value="1">
                                                                                        วันจันทร์ - ศุกร์ (เวลาราชการ)</label>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label class="form-check-label" >
                                                                                        <input class="form-check-input" type="radio" name="time_to_come_2" value="2">
                                                                                        วันเสาร์ - อาทิตย์</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <label><input type="radio" name="time_to_come" value="3"> ไม่แน่ใจยังไม่ได้ตัดสินใจ </label>
                                                                            </div>
                                                                        </div>-->
                                    <select name="time_sp" id="time_sp" class="input-border" >

                                    </select>
                                </div>



                            </div>
                            <!-------------------    FORM -------------------------------------------------------------------------------------------------->
                        </form>
                        <center><button style="margin-top:15px" onclick="submit()" class="btn btn-primary">บันทึก</button></center>

                    </div>

                    <!--Search Patient-->
                    <div style="display: none;" id="choice2" class="scrollable">
                        <!------------------------   FORM SEARCH   ------------------------------------------***************************************-->
                        <form name="search_form" id="search_form" >
                            <label class="label_1">แสดง</label>
                            <select name="search_option" id="search_option" >
                                <option value="1" >--รายชื่อผู้ป่วยจำลอง--</option>
                                <option value="2" >--ผลประเมิน--</option>
                            </select>
                            &nbsp; <label class="label_1">เลขที่บัตรประชาชน</label>
                            <input type="text" name="id_search" id="id_search" maxlength="13" class="text_short" style="width: 130px">   
                            &nbsp; <label class="label_1">ชื่อ</label>&nbsp; <input type="text" name="name_search" id="name_search" class="name_medium">   &nbsp;
                            &nbsp; <label class="label_1">นามสกุล</label> &nbsp;<input type="text" name="lastname_search" id="lastname_search" class="name_medium">   &nbsp;
                            <button type="button"  onclick="search_submit()" class="button-search" >ค้นหา</button>
                            <!--                        <button type="button" style="height: 30px;padding: 2px;" class="btn btn-success" data-toggle="modal" data-target="#sp_modal">
                                                        แก้ไข
                                                    </button>-->
                            <input type="hidden" name="option" id="option" value="1" >
                            <div id="search_1" class="col" style="padding-left: 10px"  >
                                <a onClick="more_opt()"  href="#" id="more_opt" style="font-size: 15px" >ตัวเลือกการค้นหาเพิ่มเติม</a> <br>
                                <div style="margin-top:10px;display:none" id="more_sec"  >
                                    <div class="col">
                                        <label> เพศ </label>
                                        <select id="gender_s" name="gender_s" class="input-border">
                                            <option value="0" >--เลือก--</option>
                                            <option value="ชาย">ชาย</option>
                                            <option value="หญิง">หญิง</option>
                                        </select>
                                        &nbsp; &nbsp; อายุ (ปี)&nbsp; <input type="text" name="age_s1" id="age_s1" class="text_short" > 
                                        ถึง <input type="text" name="age_s2" id="age_s2" class="text_short" >
                                        &nbsp; &nbsp; น้ำหนัก (กก.)&nbsp; <input type="text" name="weight_s1" id="weight_s1" class="text_short" > 
                                        ถึง <input type="text" name="weight_s2" id="weight_s2" class="text_short" >
                                    </div>
                                    <div class="col">
                                        ประสบการณ์ <select id="sp_act" name="sp_act" class="input-border">
                                            <option value="0" >--กรุณาเลือกประเภทการกระทำ--</option>
                                        </select>
                                        <select id="symptom" name="symptom" class="input-border">
                                            <option value="0" >--กรุณาเลือกอาการ/โรค--</option>
                                        </select><br>
                                    </div>
                                    <div class="col" style="padding-top:5px">
                                        <label class="label_1">วันที่ </label> <input type="text" name="day1" id="day1" class="rec_day" >
                                        &nbsp; <label class="label_1">ถึง </label>&nbsp; <input type="text" name="day2" id="day2" class="rec_day" >
                                    </div>
                                </div>
                            </div>

                        </form>
                        <!--                        <div id="search_1" style="padding-left: 10px" >
                                                    <label class="label_1">อายุ</label>
                                                    <input type="text" name="age1_s" id="age1_s" class="age_box">  ปี &nbsp; ถึง &nbsp;
                                                    <input type="text" name="age2_s" id="age2_s" class="age_box">  ปี &nbsp;
                                                    <label class="label_1"> เพศ </label>
                                                    &nbsp;<label><input type="radio" class="radio_but" name="gender_s1" value="1" > ชาย</label>
                                                    &nbsp;<label><input type="radio" class="radio_but" name="gender_s1" value="2"> หญิง</label>
                                                </div>
                        
                                                <div id="search_2" style="display:none;padding-left: 10px">
                                                    <label class="label_1">เพศ</label> 
                                                    &nbsp; <label><input type="radio" class="radio_but" name="gender_s2" value="1" > ชาย</label>
                                                    &nbsp; <label><input type="radio" class="radio_but" name="gender_s2" value="2"> หญิง</label>
                        
                                                    &nbsp; <label class="label_1">น้ำหนัก</label>
                                                    <input type="text" name="weight2" id="weight2" class="text_short">  กก.
                        
                                                </div>
                        
                                                <div id="search_3" style="display:none;padding-left: 10px"> 
                                                    <label class="label_1">เพศ</label> 
                                                    &nbsp;<label><input type="radio" class="radio_but" name="gender_s3" value="1">ชาย</label>
                                                    &nbsp;<label><input type="radio" class="radio_but" name="gender_s3" value="2">หญิง</label>
                                                    &nbsp;<label class="label_1">ประสบการณ์</label> &nbsp;
                        
                        
                                                    <select name="exp_s" id="exp_s"   >
                        
                        
                                                    </select>
                                                </div>-->


                        <hr>
                        <div class="col" style="display:none">
                            <div class="row">
                                <div class="col-md-1"><label class="label_1">SORT</label></div>
                                <div class="col-md-5">
                                    <label><input type="checkbox" class="radio_but" name="symptom_sort" id="symptom_sort" >&nbsp;อาการโรค</label> &nbsp;
                                    <label><input type="checkbox" class="radio_but" name="age_sort" id="age_sort"  >&nbsp;อายุ</label> &nbsp;
                                    <label><input type="checkbox" class="radio_but" name="weight_sort" id="weight_sort" >&nbsp;น้ำหนัก</label> &nbsp;
                                    <label><input type="checkbox" class="radio_but" name="gender_sort" id="gender_sort" >&nbsp;เพศ</label> &nbsp;
                                    <label><input type="checkbox" class="radio_but" name="grade_sort" id="grade_sort" >&nbsp;ผลประเมิน</label> &nbsp;
                                </div>
                            </div>
                        </div>




                        <hr style="border-color: black">
                        <!--Example table-->
                        <div class="col" id="table1" >
                            <table class="table table-bordered table-hover" id="search_table" style="width:100%;border: 1px solid black">
                                <thead>
                                    <tr>
                                        <th>วันที่</th>
                                        <th>ชื่อ</th>
                                        <th>เพศ</th>
                                        <th>อายุ(ปี)</th>
                                        <th>ประสบการณ์</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="search_data">


                                </tbody>

                            </table>

                        </div>

                        <div class="col" id="table2" style="display:none">
                            <table class="table table-bordered table-hover" id="search_table2" style="width:100%;border: 1px solid black;">
                                <thead>
                                    <tr>
                                        <th  style="width: 150px;">วันที่ </th>
                                        <th  style="width: 150px;">ชื่อ </th>
                                        <th  style="width: 200px;">ประเภทการกระทำ</th>
                                        <th  style="">อาการ/โรค</th>
                                        <th style="width: 150px;"> ผลการประเมิน </th>
                                        <th style="">หมายเหตุ</th>
                                        <th style="">Action</th>

                                    </tr>
                                </thead>
                                <tbody id="search_data2">


                                </tbody>

                            </table>
                        </div>
                        <!-- Edit Button-->
                        <!--                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                                    แก้ไข
                                                </button>-->

                        <!-- Modal Edit --> 


                        <!------------------------   FORM SEARCH   ------------------------------------------***************************************-->
                    </div>
                    <div style="display: none;" id="choice3" class="scrollable">


                        <form id="form_save_list" >
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" name="date_list"id="date_list" style="height:35px;width:100%;padding-left:10px" class="input-border" >
                                    </div>
                                    <div class="col-md-5">
                                        <select id="sp_act_list" name="sp_act_list" style="height:35px;width:100%;padding-left:10px" class="input-border" >
                                            <option value="0">เลือกการกระทำ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select id="symptom_list" name="symptom_list" style="height:35px;width:100%;padding-left:10px" class="input-border" >
                                            <option value="0">เลือกอาการ/โรค</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row" style="margin-top:5px">
                                    <?php
                                    for ($i = 0; $i < 16; $i++) {
                                        $no = $i + 1;
                                        ?>
                                        <div class="col-md-12" style="margin-top:2px">
                                            <div class="row" >
                                                <div class="col-md-3" >

                                                    <table style="width:100%">
                                                        <tr>
                                                            <td style="width:22px">
                                                                <?php echo $no . ". "; ?>
                                                            </td>
                                                            <td >
                                                                <select class="input-border" style="height:30px;width:90%;padding-left:10px " name="person_<?php echo $i + 1; ?>" id="person_<?php echo $i + 1; ?>" >
                                                                    <option value="0">เลือกชื่อผู้ป่วยจำลอง</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                                <div class="col-md-4" >
                                                    <select class="input-border" style="height:30px;width:100%;padding-left:10px" name="eva_<?php echo $i + 1; ?>" id="eva_<?php echo $i + 1; ?>" >
                                                        <option value="0">เลือกผลประเมิน</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5" >
                                                    <textarea placeholder="หมายเหตุ" class="input-border" style="height:30px;width:100%;padding-left:10px" name="com_<?php echo $i + 1; ?>" id="com_<?php echo $i + 1; ?>"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col">

                            </div>

                        </form>
                        <div style="text-align:center;margin-top: 10px">
                            <button type="button" class="btn btn-primary" onclick="save_list()" id="butt">บันทึก</button>
                        </div>
                    </div>

                    <div style="display: none;" id="choice4" class="scrollable">
                        <form id="form_manage"> 
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select name="manage_choice" id="manage_choice" class="form-control input-border" style="width:100%;padding-left: 10px;">

                                            <option value="1">คำนำหน้าชื่อ</option>
                                            <option value="2">การกระทำ</option>
                                            <option value="3">อาการ/โรค</option>
                                            <option value="4">วุฒิการศึกษา</option>
                                            <option value="5">เวลาที่ผู้ป่วยจำลองสะดวก</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="manage_choice_data" id="manage_choice_data" class="form-control input-border" >

                                    </div>
                                    <div class="col-md-1" style="text-align:center">
                                        <button type="button" onclick="add_choice()" class="btn btn-primary">บันทึก</button>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:10px">
                                    <div class="col" >
                                        <table  style="border: 1px solid black;width: 90%" class="table table-bordered" id="manage_table" > 
                                            <thead name="manage_head" id="manage_head" >
                                                <tr>
                                                    <th style="width:90%">รายการ</th>
                                                    <th style="width:10%"></th>
                                                </tr>
                                            </thead>
                                            <tbody name="manage_body" id="manage_body" >
                                                <tr>
                                                    <td >

                                                    </td>
                                                    <td >

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="choice_now" id="choice_now" value="prefix">
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="menu_choice" style="height:30px; overflow:hidden;" id="choice_3">
                    บันทึกตามอาการ
                </td>

            </tr>
            <tr>
                <td class="menu_choice" style="height:30px; overflow:hidden;" id="choice_2">
                    ค้นหา
                </td>
            </tr>
            <tr>
                <td class="menu_choice" style="height:30px; overflow:hidden;" id="choice_4">
                    จัดการตัวเลือกระบบ
                </td>
            </tr>
            <tr>
                <td style="height: 50vh;border: 2px solid black; ">

                </td>

            </tr>
        </tbody>
    </table>

</div>



<div id='load' class="loading style-2" style='display:none'><div class="loading-wheel"></div></div>

<script type="text/javascript">
    $(function () {
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
        $("#patient_save input#rec_day").datepicker();

        $("#patient_save input#birthday").datepicker();

        $("#patient_edit input#rec_day_s").datepicker();
        $("#patient_edit input#birthday_s").datepicker();

        $("#form_save_list input#date_list").datepicker();

        $("#search_form input#day1").datepicker();
        $("#search_form input#day2").datepicker();
        $("#form_sp_info input#date").datepicker();

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

        $(function () {
            $("#patient_save input#rec_day").datepicker("setDate", new Date());
            $("#patient_save input#birthday").datepicker("setDate", new Date());
            $("#patient_save input#birthday").val("");

            $("#patient_edit input#rec_day_s").datepicker("setDate", new Date());
            $("#patient_edit input#birthday_s").datepicker("setDate", new Date());

            $("#form_save_list input#date_list").datepicker("setDate", new Date());

            $("#search_form input#day1").datepicker("setDate", new Date());
            $("#search_form input#day2").datepicker("setDate", new Date());
            $("#search_form input#day1").val("");

            $("#search_form input#day2").val("");

        });



    });
</script>


