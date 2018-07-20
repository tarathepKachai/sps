<link href="<?php echo base_url("assets/my_css/index_page.css"); ?>" rel="stylesheet" >

<script src="<?php echo base_url("assets/my_js/login.js");     ?>" ></script>
<!--<link type="text/css" href="<?php //echo base_url();                                                                                                                               ?>assets/datepicker/css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />-->
<link type="text/css" href="<?php echo base_url(); ?>assets/jQueryCalendarThai_Ui1.11.4/jquery-ui-1.11.4.custom.css" rel="stylesheet" />	

<!--<script type="text/javascript" src="<?php //echo base_url();                                                                                                                               ?>assets/datepicker/js/jquery-1.4.4.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jQueryCalendarThai_Ui1.11.4/jquery-ui-1.11.4.custom.js"></script>

<!--<script type="text/javascript" src="<?php //echo base_url();                                                                                                                               ?>assets/datepicker/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-confirm-master/dist/jquery-confirm.min.js"></script>
<link type="text/css" href="<?php echo base_url(); ?>assets/jquery-confirm-master/dist/jquery-confirm.min.css" rel="stylesheet" />	

<div class="col login-form" style="text-align: center;margin-top: 50px" >
    <form method="post" action="<?php echo base_url('index.php/user/index'); ?>">
        <div class="row">
            <div class="col" style="margin-top: 10px;text-align: center">
                xx
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                Username
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="username" id="username">
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-2">
            </div>
            <div class="col-md-3">
                Password
            </div>
            <div class="col-md-5">
                <input type="password" class="form-control" name="password" id="password">
            </div>
        </div>
        <div class="row" style="margin: 10px 0px 10px 0px;">
            <div class="col" style="text-align: center"> 
                <button type="button" id="submit" onclick="login()">
                    login
                </button>
            </div>
        </div>    
        
        <input type="hidden" name="full_name" id="full_name">
    </form>
</div>









