<link href="<?php echo base_url("assets/my_css/index_page.css"); ?>" rel="stylesheet" >

<script src="<?php echo base_url("assets/my_js/login.js"); ?>" ></script>
<!--<link type="text/css" href="<?php //echo base_url();                                                                                                                                        ?>assets/datepicker/css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />-->
<link type="text/css" href="<?php echo base_url(); ?>assets/jQueryCalendarThai_Ui1.11.4/jquery-ui-1.11.4.custom.css" rel="stylesheet" />	

<!--<script type="text/javascript" src="<?php //echo base_url();                                                                                                                                        ?>assets/datepicker/js/jquery-1.4.4.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jQueryCalendarThai_Ui1.11.4/jquery-ui-1.11.4.custom.js"></script>

<!--<script type="text/javascript" src="<?php //echo base_url();                                                                                                                                        ?>assets/datepicker/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-confirm-master/dist/jquery-confirm.min.js"></script>
<link type="text/css" href="<?php echo base_url(); ?>assets/jquery-confirm-master/dist/jquery-confirm.min.css" rel="stylesheet" />	

<div class="col login-form" style="text-align: center;margin-top: 50px" >
    <form id="login_form" method="post" action="http://localhost/sps/web/index.php/user/test">
        <div class="row">
            <div class="col" style="margin-top: 10px;text-align: center">
                <h2>เข้าสู่ระบบ</h2>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                Username
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="username" id="username" >
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                Password
            </div>
            <div class="col-md-5">
                <input type="password" class="form-control" name="password" id="password" >
            </div>
        </div>
        <div class="row" style="margin: 10px 0px 10px 0px;">
            <div class="col" style="text-align: center"> 
                <button  id="submit"  >
                    login
                </button>
            </div>
        </div>    

        <input type="hidden" name="full_name" id="full_name">

        <input type="hidden" name="usercde" id="usercde">
        <input type="hidden" name="fname" id="fname">
        <input type="hidden" name="lname" id="lname">
        <input type="hidden" name="grpcde" id="grpcde">
        <input type="hidden" name="ldate" id="ldate">
        <input type="hidden" name="lcomname" id="lcomname">
        <input type="hidden" name="percode" id="percode">
        <input type="hidden" name="otcode" id="otcode">
        <input type="hidden" name="idx" id="idx">
        <input type="hidden" name="fac_code" id="fac_code">
        <input type="hidden" name="tjob_id" id="tjob_id">
        <input type="hidden" name="user_name" id="user_name">
        <input type="hidden" name="user_date" id="user_date">
        <input type="hidden" name="tunt_id" id="tunt_id">
        <input type="hidden" name="t_work_id" id="t_work_id">
        <input type="hidden" name="token" id="token">



    </form>
</div>

<script >

    $(document).ready(function () {

        $("#login_form").submit(function (e) {

            e.preventDefault();
            login();
//            var user = $("#username").val();
//            var pass = $("#password").val();
//            var data1 = {
//                method: "login_mis",
//                user: user,
//                pass: pass,
//                output: "json",
//                _i: null
//            };
//            console.log(data1);
//
//            $.ajax({
//                url: 'http://172.17.8.144/centerservicemis/main.php',
//                type: 'post',
//                dataType: 'JSON',
//                contentType: 'application/json',
//                data: JSON.stringify(data1),
//                success: function (data) {
//
//                    //var obj = JSON.parse(data)
//                    console.log(data);
//
//                    if (data.c === 0) {
//                        var obj = data.v;
//                        var fname = obj.fname;
//                        var lname = obj.lname;
//                        var full = fname + " " + lname;
//                        console.log(obj.fname);
//
//                        $("#full_name").val(full);
//                        $("#usercde").val(obj.usercde);
//                        $("#fname").val(obj.fname);
//                        $("#lname").val(obj.lname);
//                        $("#grpcde").val(obj.grpcde);
//                        $("#ldate").val(obj.ldate);
//                        $("#lcomname").val(obj.lcomname);
//                        $("#percode").val(obj.percode);
//                        $("#idx").val(obj.idx);
//                        $("#fac_code").val(obj.fac_code);
//                        $("#tjob_id").val(obj.tjob_id);
//                        $("#user_name").val(obj.user_name);
//                        $("#user_date").val(obj.user_date);
//                        $("#tunt_id").val(obj.tunt_id);
//                        $("#t_work_id").val(obj.t_work_id);
//                        $("#token").val(obj.token);
//                        
//                    
////                         $("#form_login").submit();
//                       
//
//                    } else if (data.c === 1) {
//                        alert("worng");
//                    }
//                }, error: function (xx, yy, zz) {
//                    alert(zz + yy + zz);
//                }
//
//            });

        });
    });

</script>









