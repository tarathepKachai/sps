<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">


        <title><?php echo $title; ?></title>
        <script src="<?php echo base_url(); ?>assets/jQueryCalendarThai_Ui1.11.4/jquery-1.12.3.js"></script>


        <script src="<?php echo base_url("assets/bootstrap-4.1.1-dist/js/bootstrap.min.js"); ?>" ></script>
        <link href="<?php echo base_url("assets/bootstrap-4.1.1-dist/css/bootstrap.min.css"); ?>" rel="stylesheet" >
<!--        <script src="<?php //echo base_url();      ?>assets/data-table-bootstrap4/js/jquery.dataTables.min.js"></script>
        <script src="<?php //echo base_url();      ?>assets/data-table-bootstrap4/js/dataTables.bootstrap4.min.js"></script>-->
        <!--        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.1/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.css"/>
        
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.1/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/datatables.min.js"></script>-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/sort_date.js"></script>
        <script>
            var client_url = "http://" + window.location.hostname + "/sps/web/index.php/";
            var api_url = "http://" + window.location.hostname + "/sps/Restserver/index.php/";
        </script>

    </head>
    <body >

        <div  class="program_header" >
            <center><h1  >โปรแกรมผู้ป่วยจำลอง</h1></center>
        </div>

