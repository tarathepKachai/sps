<div class="modal fade" id="sp_info_modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-add"   role="document">
        <div class="modal-content" >
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form id="form_sp_info" >
                    <!--/////////////////////////////////////////////////  FORM ///////////////////////////////////////////////////////////////-->

                    <div class="col">
                        <label class="label_1">วันที่ </label> &nbsp;<input type="text" name="date" id="date" class="rec_day">&nbsp;
                        <!--                        <label class="label_1">การกระทำ</label> -->
                        <input type="hidden" name="sp_info_id" id="sp_info_id_m" >
                        <select id="sp_act_m" name="sp_act" class="input-border" style="width: 200px">
                            <option value="0">------เลือการกระทำ--------</option>
                        </select>
                        <select id="symptom_m" name="symptom" class="input-border" style="width: 200px">
                            <option value="0">------เลือกอาการ/โรค--------</option>
                        </select>
                        &nbsp;
                        <label class="label_1">การประเมิน</label> 
                        <select id="evaluation_m" name="evaluation" class="input-border" >
                            <option value="0" >--เลือก--</option>
                        </select>

                        <input type="hidden" name="person_id" id="person_id" >
                    </div>
                    <div class="col">



                        <label class="label_1">หมายเหตุ</label>
                        <textarea type="text" class="form-control" style="border-color: black;" id="comment_m" name="comment" ></textarea>
                    </div>

                    <!--/////////////////////////////////////////////////  FORM ///////////////////////////////////////////////////////////////-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="close_modal_sp()" data-dismiss="modal">Close</button>
                <!--                <button type="button" id="manage_btn"  class="btn btn-primary" onclick="manage_sp_act()">เพิ่ม อาการ/โรค</button>-->
                <button type="button" id="save_btn" class="btn btn-primary" onclick="update_sp_info()" >Save changes</button>
            </div>
        </div>
    </div>
</div>

