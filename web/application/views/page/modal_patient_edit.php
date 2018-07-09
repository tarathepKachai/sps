<div class="modal fade" id="edit_modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-edit"   role="document">
        <div class="modal-content" >
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form name="patient_edit" id="patient_edit"  action="#" method="POST">
                    <!--FORM -------------------------------------------------------->
                    <input type="hidden" name="form_type" id="form_type" value='update'  >
                    <input type="hidden" name="person_id" id="person_id"  >
                    <div class="col-md-12">

                        <label class="label_1">วัน/เดือน/ปี </label> &nbsp; <input  type="text" name="rec_day" id="rec_day_s" class="rec_day" > 
                        <span class="error_report" id="rec_day_error" ></span>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-7" style="width:350px"><label class="label_1" >คำนำหน้านาม </label></div>
                                        <div class="col-md-5"> <label>
                                                <select name="prefix" id="prefix_s" class="input-border">
                                                    
                                                </select>
<!--                                                        <input  type="radio" class="radio_but" name="prefix" value="1" > ด.ญ. &nbsp; </label>
                                            <label><input type="radio" class="radio_but" name="prefix" value="2" > ด.ช. &nbsp; </label>
                                            <label><input type="radio" class="radio_but" name="prefix" value="3" > นาย &nbsp; </label>
                                            <label><input type="radio" class="radio_but" name="prefix" value="4" > นาง &nbsp; </label>
                                            <label><input type="radio" class="radio_but" name="prefix" value="5" > นางสาว &nbsp; </label>-->
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
                        <label class="label_1">วัน/เดือน/ปีเกิด </label> &nbsp; <input type="text" name="birthday" id="birthday_s" class="rec_day" >
                        <span class="error_report" id="birthday_error" ></span> &nbsp;
                        <label class="label_1">เลขที่บัตรประชาชน </label>

                        <input type="text" name="txtID1" id="txtID1" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)"  /> - 
                        <input type="text" name="txtID2" id="txtID2" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" />  
                        <input type="text" name="txtID3" id="txtID3" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" /> 
                        <input type="text" name="txtID4" id="txtID4" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" />  
                        <input type="text" name="txtID5" id="txtID5" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" /> -
                        <input type="text" name="txtID6" id="txtID6" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" />  
                        <input type="text" name="txtID7" id="txtID7" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" />  
                        <input type="text" name="txtID8" id="txtID8" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" /> 
                        <input type="text" name="txtID9" id="txtID9" class="input-card"  maxlength=1  onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)"/>  
                        <input type="text" name="txtID10" id="txtID10" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" /> -
                        <input type="text" name="txtID11" id="txtID11" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" />  
                        <input type="text" name="txtID12" id="txtID12" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" /> -
                        <input type="text" name="txtID13" id="txtID13" class="input-card"  maxlength=1 onkeyup="keyup(this, event,'update')" onkeypress="return Numbers(event)" /> 

                    </div>
                    <div class="col">
                        <label style="margin-top:10px" class="label_1" >น้ำหนัก(กก.) </label>  
                        <input type="text" class="text_short" name="weight" id="weight">
                        <span class="error_report" id="w_error" ></span> 
                        &nbsp; <label class="label_1" >ส่วนสูง(ซม.) </label>  
                        <input type="text" class="text_short" name="height" id="height"> 
                        <span class="error_report" id="h_error" ></span> 

                        <label class="label_1">สถานภาพ</label> 

                        <select name="status" id="status_s" class="input-border">

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
                        &nbsp;<label class="label_1" >โทรศัพท์</label> <input type="text"  name="tel_work" id="tel_work" class="name_medium" >  

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
                        <input style="margin-top: 7px" type="text" class="name_medium" name="tel_em" id="tel_em"> 
                    </div>
                    <hr>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="label_1" >วุฒิการศึการสูงสุด</label> 
                            </div>
                            <div class="col-md-10" id="edu_sec_s">
                                <select name="edu" id="edu_s" class="input-border" >

                                </select>
                                <span id="edu_ex_s" style="display:none"  >สาขา &nbsp;<input type="text" class="wide_box" id="edu_detail_s" name="edu_detail" ></span>
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

                    <div class="col">
                        <label class="label_1">ประสบการณ์การเป็นผู้ป่วยจำลอง (SP)</label>
                        <span class="error_report" id="exp_error" ></span>
                        <br>
                        <label class="label_1"><input type="radio" class="radio_but" style="margin-left:20px;" id="exp01" name="exp"  value="1" /> เคย </label> 
                        <label ><input type="checkbox" class="radio_but" style="margin-left:10px;"  name="exp_1" id="exp_1" value="1" /> ซักประวัติอาการ </label>  <input type="text" class="name_medium" style="width: 250px"  name="exp_1_detail" id="exp_1_detail">
                        <label ><input type="checkbox" class="radio_but" style="margin-left:10px;"  name="exp_2" id="exp_2" value="2"/> ให้คำแนะนำอาการ/โรค </label>  <input type="text" class="name_medium" style="width: 250px"  name="exp_2_detail" id="exp_2_detail">
                        <br>
                        <label ><input type="checkbox" class="radio_but" style="margin-left:78px;"  name="exp_3" id="exp_3" value="3"/> ตรวจร่างกายอาการ </label>  <input type="text" class="name_medium" style="width: 250px"  name="exp_3_detail" id="exp_3_detail">
                        <label ><input type="checkbox" class="radio_but" style="margin-left:10px;"  name="exp_4" id="exp_4" value="4"/> การทำหัตถการ </label>  <input type="text" class="name_medium" style="width: 250px"  name="exp_4_detail" id="exp_4_detail">
                        <br>
                        <label class="label_1"><input type="radio" class="radio_but" style="margin-left:20px;" id="exp02" name="exp" value="2" /> ไม่เคย </label> 
                    </div>


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
                            <select name="time_sp" id="time_sp_s" class="input-border" >

                            </select>
                        </div>



                    </div>
                    <!--FORM -------------------------------------------------------->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="close_modal()" data-dismiss="modal">Close</button>
<!--                <button type="button" id="manage_btn"  class="btn btn-primary" onclick="manage_sp_act()">เพิ่ม อาการ/โรค</button>-->
                <button type="button" id="save_btn" class="btn btn-primary" onclick="update_sp()" >Save changes</button>
            </div>
        </div>
    </div>
</div>

