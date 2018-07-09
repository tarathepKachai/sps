var check_sub = 0;
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
yyyy = yyyy + 543;
if (dd < 10) {
    dd = '0' + dd
}

if (mm < 10) {
    mm = '0' + mm
}

today = mm + '/' + dd + '/' + yyyy;

$(document).ready(function () {
    $('.modal-switch-btn').click(function () {
        var prevPopup = $(this).attr("data-previouspopup-toggle");
        $(prevPopup).modal('show');
    });
    get_form_option();

    $("#search_option").change(function () {
        console.log($('#search_table').css('display'));
        console.log($('#search_table2').css('display'));

        if ($('#table2').css('display') === "none") {
            $('#table2').css('display', 'block');
            $('#table1').css('display', 'none');

        } else {
            $('#table2').css('display', 'none');
            $('#table1').css('display', 'block');
        }
    });

    //$('#example').DataTable();
    var myTable = $('#search_table').DataTable({
        "pageLength": 5,
        "ajax": {
            url: api_url+"api/Patient/sp_data_table",
            type: 'POST',
            "dataSrc": function (json) {
                //Make your callback here.
                dataReport = json.data;
                console.log(dataReport);
                return json.data;
            }
        },
        dom: 'Bflrtip',
        buttons: {
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'รายงาน ' + today,
                    className: 'copyButton',
                    customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        //$('row c[r^="C"]', sheet).attr('s', '2');
                    },
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                }, {
                    extend: 'colvis',
                    className: 'copyButton',
                }
            ]}
    });

    var myTable2 = $('#search_table2').DataTable({
        "pageLength": 5,
        "ajax": {
            url: api_url + "sp_info_data_table",
            type: 'GET',
            "dataSrc": function (json) {
                //Make your callback here.
                dataReport = json.data;
                console.log(dataReport);
                return json.data;
            }
        },
        dom: 'Bflrtip',
        buttons: {
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'รายงาน ' + today,
                    className: 'copyButton',
//                    messageTop: 'This print was produced using the Print button for DataTables',
                    customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];

                        //$('row c[r^="C"]', sheet).attr('s', '2');


                    }
                }, {
                    extend: 'colvis',
                    className: 'copyButton',
                }
            ]}
    });

//    $('#search_table').on('click', 'tbody tr', function () {
//        myTable.row(this).edit();
//    });
    // GET PREFIX LIST 

    $.ajax({
        url: api_url + "prefix_list",
        type: "get",
        success: function (data) {

            $.each(data, function (idx, obj) {
                $('#prefix').append('<option value="' + obj.id + '" >' + obj.prefix + '</option>');
            });

        },
        error: function (xhr, status, error) {
            console.log(xhr + " " + status + " " + " " + error);
        }
    });

    $.ajax({
        url: api_url + "person_status_list",
        type: "get",
        success: function (data) {
            console.log(data);

            $.each(data, function (idx, obj) {
                $('#status').append('<option value="' + obj.id + '" >' + obj.status + '</option>');
            });

        },
        error: function (xhr, status, error) {
            console.log(xhr + " " + status + " " + " " + error);
        }
    });

    $.ajax({
        url: api_url + "edu_list",
        type: "get",
        success: function (data) {
            console.log(data);

            $.each(data, function (idx, obj) {
                $('#edu').append('<option value="' + obj.id + '" >' + obj.edu_name + '</option>');
                if (obj.id === 5) {
                    $('#edu_sec').append('ตั้งแต่ ');
                }
            });

        },
        error: function (xhr, status, error) {
            console.log(xhr + " " + status + " " + " " + error);
        }
    });

    $.ajax({
        url: api_url + "time_sp_list",
        type: "get",
        success: function (data) {
            console.log(data);

            $.each(data, function (idx, obj) {
                $('#time_sp').append('<option value="' + obj.time_code + '" >' + obj.time_name + '</option>');
            });

        },
        error: function (xhr, status, error) {
            console.log(xhr + " " + status + " " + " " + error);
        }
    });

    $.ajax({
        url: api_url + "sp_act_list",
        type: "get",
        success: function (data) {
            $.each(data, function (idx, obj) {
                $('#sp_act').append('<option value="' + obj.sp_act_id + '" >' + obj.sp_act_name + '</option>');
            });
        }
    });

    $.ajax({
        url: api_url + "symptom_list",
        type: "GET",
        success: function (data) {

            $.each(data, function (idx, obj) {

                $("#symptom").append('<option value="' + obj.symp_id + '" >' + obj.symp_name + '</option>');
            });

        }

    });


// SP LIST >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//    $.ajax({
//        url: api_url + "sp_list",
//        type: "get",
//        success: function (data) {
//            console.log(data);
//
//            var str = "";
//
//            $.each(data, function (idx, obj) {
//                if (obj.gender === "male") {
//                    var gender = "ชาย";
//                } else {
//                    var gender = "หญิง";
//                }
//                str += "<tr>";
//                str += "<td>";
//                str += obj.rec_day;
//                str += "</td>";
//                str += "<td>";
//                str += obj.prefix + " " + obj.fname + " " + obj.lname;
//                str += "</td>";
//                str += "<td>";
//                str += gender;
//                str += "</td>";
//                str += "<td>";
//                str += obj.fname;
//                str += "</td>";
//                str += "<td>";
//                str += obj.fname;
//                str += "</td>";
//                str += "<td>";
//                str += ` <button type="button" style="height: 30px;padding: 2px 5px;" class="btn btn-success" ` +
//                        `onclick="edit_person_info('` + obj.person_id + `')" >
//                                                แก้ไข
//                                            </button>`;
//                str += "</td>";
//                str += "</tr>";
//            });
//
//            $("#search_data").html(str);
//            
//        },
//        error: function (xhr, status, error) {
//            console.log(xhr + " " + status + " " + " " + error);
//        }
//    });

//     $.ajax({
//        url: api_url + "act_list",
//        type: "get",
//        success: function (data) {
//            console.log(data);
//
//            $.each(data, function (idx, obj) {
//                $('#time_sp').append('<option value="' + obj.time_code + '" >' + obj.time_name + '</option>');
//            });
//
//        },
//        error: function (xhr, status, error) {
//            console.log(xhr + " " + status + " " + " " + error);
//        }
//    });




//    $('#edu option').each(function () {
//        if ($(this).is(':selected')) {
//            if (this.value == "5") {
//                $("#edu_ex").css("display", "block");
//            }
//        }
//    });

    $('#edu').change(function () {
        if ($(this).val() == '5') { // or this.value == 'volvo'
            $("#edu_ex").css("display", "inline");
            //$("#edu_detail").attr("disable",false);
        } else {
            $("#edu_ex").css("display", "none");
            //$("#edu_detail").attr("disable",true);
        }
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

    $("input[name='prefix']").click(function () {
        $("#prefix_error").html("");
    });

    $('form#patient_save :input').keydown(function (e) {
        if (e.which === 13) {
            var index = $('input').index(this) + 1;
            $('input').eq(index).focus();
        }
    });

    $('form#patient_edit :input').keydown(function (e) {
        if (e.which === 13) {
            var index = $('input').index(this) + 1;
            $('input').eq(index).focus();
        }
    });



    $("input").focusout(function () {

        if (this.value !== '') {
            var id = this.id;
            $('#' + id).css({"box-shadow": "0px 0px 0px black", "border-color": "black"});
        } else {
            $('#' + id).css({"box-shadow": "0px 0px 0px red", "border-color": "red"});
        }
    });

    $("textarea").focusout(function () {
        var dd = this.style.boxShadow;

        if (this.value !== '') {
            var id = this.id;
            $('#' + id).css({"box-shadow": "0px 0px 0px black", "border-color": "black"});
        } else {
            $('#' + id).css({"box-shadow": "0px 0px 0px red", "border-color": "red"});
        }
    });

    $("#rec_day").click(function () {

        $('#rec_day').css({"box-shadow": "0px 0px 0px black", "border-color": "black"});
    });

    $("#birthday").click(function () {

        $('#birthday').css({"box-shadow": "0px 0px 0px black", "border-color": "black"});
    });



    $("#choice_1").click(function () {
        $("#choice_1").removeClass("disable_choice");
        $("#choice_1").addClass("enable_choice");
        $("#choice1").css({"display": "block"});

        $("#choice_2").removeClass("enable_choice");
        $("#choice_2").addClass("disable_choice");
        $("#choice2").css({"display": "none", "background-color": "white"});


        $("#choice_3").removeClass("enable_choice");
        $("#choice_3").addClass("disable_choice");
        $("#choice3").css({"display": "none", "background-color": "white"});
    });

    $("#choice_2").click(function () {
        $("#choice_1").removeClass("enable_choice");
        $("#choice_1").addClass("disable_choice");
        $("#choice1").css({"display": "none", "background-color": "white"});

        $("#choice_2").removeClass("disable_choice");
        $("#choice_2").addClass("enable_choice");
        $("#choice2").css("display", "block");


        $("#choice_3").removeClass("enable_choice");
        $("#choice_3").addClass("disable_choice");
        $("#choice3").css({"display": "none", "background-color": "white"});
    });

    $("#choice_3").click(function () {
        $("#choice_1").removeClass("enable_choice");
        $("#choice_1").addClass("disable_choice");
        $("#choice1").css({"display": "none", "background-color": "white"});

        $("#choice_2").removeClass("enable_choice");
        $("#choice_2").addClass("disable_choice");
        $("#choice2").css({"display": "none", "background-color": "white"});

        $("#choice_3").removeClass("disable_choice");
        $("#choice_3").addClass("enable_choice");
        $("#choice3").css("display", "block");
    });


    $("#test").submit(function (e) {
        console.log("aa");
        e.preventDefault();




    });

//    $("#search_option").change(function () {
//        if (this.value === "1") {
//            $("#search_1").css({"display": "block"});
//            $("#search_2").css({"display": "none"});
//            $("#search_3").css({"display": "none"});
//        } else if (this.value === "2") {
//            $("#search_1").css({"display": "none"});
//            $("#search_2").css({"display": "block"});
//            $("#search_3").css({"display": "none"});
//        } else if (this.value === "3") {
//            $("#search_1").css({"display": "none"});
//            $("#search_2").css({"display": "none"});
//            $("#search_3").css({"display": "block"});
//        }
//    });

    $('#edit_modal').on('hidden.bs.modal', function () {
        $("#patient_edit")[0].reset();
    });

});

function submit() {



//    if (!$("#patient_save input[name='prefix']").is(':checked')) {
//        $("#patient_save input#prefix_error").html("กรุณาเลือกคำนำหน้านาม");
//    } else {
//        $("#patient_save input#prefix_error").html("");
//    }
//
//
//    if (!$("#patient_save input[name='time_sp']").is(':checked')) {
//        $("#patient_save input#come_error").html("กรุณาเลือกข้อมูล");
//    } else {
//        $("#patient_save input#come_error").html("");
//    }

    if (!$("#patient_save input[name='exp']").is(':checked')) {
        $("#patient_save input#exp_error").html("กรุณาเลือกข้อมูล");
    } else {
        var value = $('#patient_save input[name=exp]:checked').val();
        if (value === "1" && !$("#patient_save input[name='exp_1']").is(':checked') && !$("#patient_save input[name='exp_2']").is(':checked') && !$("#patient_save input[name='exp_3']").is(':checked') && !$("#patient_save input[name='exp_4']").is(':checked')) {
            $("#patient_save input#exp_error").html("กรุณาเลือกข้อมูล");
        } else {
            $("#patient_save input#exp_error").html("");
        }

    }

    if (!$("#patient_save input[name='exp']").is(':checked')) {
        $("#patient_save input#exp_error").html("กรุณาเลือกข้อมูล");
    } else {
        $("#patient_save input#exp_error").html("");
    }
//    var i =0;
    $('form#patient_save :input').each(
            function (i, el) {
                var id_input = el.id;

                if (id_input !== "exp_1_detail" && id_input !== "exp_2_detail" && id_input !== "exp_3_detail" && id_input !== "exp_4_detail" && id_input !== "road" && id_input !== "fax" && id_input !== "scar"
                        && id_input !== "line_id" && id_input !== "email") {
//                    i++;
//                    console.log(i);
                    if ((!el.value || el.value === '')) {
                        el.placeholder = 'กรอกข้อมูล';
                        el.style.boxShadow = "0px 0px 10px red";
                        el.style.borderColor = "red";
                        /* or:
                         el.placeholder = $('label[for=' + el.id + ']').text();
                         */
                    } else {
                        el.style.boxShadow = "0px 0px 0px black";
                        el.style.borderColor = "black";
                    }
                }
            });





    $('textarea').each(
            function (i, el) {

                if (!el.value || el.value === '') {
                    el.placeholder = 'กรอกข้อมูล';
                    el.style.boxShadow = "0px 0px 10px red";
                    el.style.borderColor = "red";
                    /* or:
                     el.placeholder = $('label[for=' + el.id + ']').text();
                     */
                } else {
                    el.style.boxShadow = "0px 0px 0px black";
                    el.style.borderColor = "black";
                }
            });

    var check = check_submit();

//    VALIDATE END

    // var check = true;
    //console.log(check);
    if (check === false) {
        $.confirm({

            title: 'แจ้งเตือน',
            content: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
            type: 'red',
            typeAnimated: true,
            buttons: {
                ok: {
                    btnClass: 'btn-red',

                }

            }
        });


    } else {

        //save_data();

    }
    save_data();


}

function check_submit() {

    //console.log($("#patient_save").serialize());
    var suc = "1";
    $('form#patient_save :input').each(
            function (i, el) {
                var id_input = el.id;

                if (id_input !== "exp_1_detail" && id_input !== "exp_2_detail" && id_input !== "exp_3_detail" && id_input !== "exp_4_detail" && id_input !== "road" && id_input !== "fax" && id_input !== "scar"
                        && id_input !== "line_id" && id_input !== "email") {
                    if ((el.value === null || el.value === '')) {
                        suc = "0";
                        console.log(el.id);
                    } else {
                        if (id_input === "edu_detail") {
                            var value = $("#patient_save select#edu").val();
                            if ((el.value === null || el.value === '')) {
                                suc = "0";
                                console.log(el.id);
                            }
                        }
                    }
                }
            });

    $('form#patient_save textarea').each(
            function (i, el) {

                if (($("#" + el.id).val() === null || $("#" + el.id).val() === '')) {
                    suc = "0";
                    console.log(el.id + ">>" + $("#" + el.id).val());

                } else {
                    // do nothing
                }
            });

    if (suc === "0") {
        return false;
    } else {
        return true;
    }

}



function search_submit() {


    $.ajax({
        url: api_url + "search_person",
        type: "POST",
        data: $("#search_form").serialize(),
        success: function (data) {

            console.log(data.length);
            console.log(data);
            var len = data.length;
            var arr = [];
//            $('#search_table').DataTable();
            $("#load").css("display", "block");

            $('#search_table').dataTable().fnClearTable();

            if (!data.result) {
                $('#search_table').dataTable().fnAddData(data);
            } else {
                console.log("not found");
            }

            setTimeout(function () {
                $("#load").css("display", "none");
            }, 300);

        }
    });
    
    
    
//    $.ajax({
//        url: api_url + "search_sp_info",
//        type: "POST",
//        data: $("#search_form").serialize(),
//        success: function (data) {
//
//            console.log(data.length);
//            console.log(data);
//            var len = data.length;
//            var arr = [];
////            $('#search_table').DataTable();
//            //$("#load").css("display", "block");
//
//            $('#search_table2').dataTable().fnClearTable();
//
//            if (!data.result) {
//                $('#search_table2').dataTable().fnAddData(data);
//            } else {
//                console.log("not found");
//            }
//
//            setTimeout(function () {
//                $("#load").css("display", "none");
//            }, 300);
//
//        }
//    });
}

function test_t() {
    $.ajax({
        url: client_url + "guzzle",
        type: "POST",
//        contentType: false,
//        processData: false,
        dataType: "JSON",
//        data: {
//            username: $("#username").val()
//        },
        data: $("#test").serialize(),
        success: function (data) {
            console.log(data);
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR + " " + textStatus + " " + errorThrown);
        }
    });
}

function save_data() {
    //var formData = new FormData($("#patient_save")[0]);



    $.ajax({
        url: api_url + "sp_save",
        type: "POST",
        dataType: "JSON",
        data: $("#patient_save").serialize(),
        success: function (data) {
            $.confirm({

                title: 'แจ้งเตือน',
                content: 'เพิ่มข้อมูลสำเร็จ!',
                type: 'Green',
                typeAnimated: true,
                buttons: {
                    ok: {
                        btnClass: 'btn-green',

                    }

                }
            });
            $("form#patient_save")[0].reset();
//            window.location.reload();
            //console.log(data);

        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR + " " + textStatus + " " + errorThrown);
        }
    });
    //console.log($("#patient_save").serialize());


}

function view_user(id) {
    $("#user_sp").modal("show");

}

// id card

function Numbers(e) {
    var keynum;
    var keychar;
    var numcheck;
    if (window.event) {// IE
        keynum = e.keyCode;
    } else if (e.which) {// Netscape/Firefox/Opera
        keynum = e.which;
    }
    if (keynum == 13 || keynum == 8 || typeof (keynum) == "undefined") {
        return true;
    }
    keychar = String.fromCharCode(keynum);
    numcheck = /^[0-9]$/;
    return numcheck.test(keychar);
}

function keyup(obj, e, type) {
    var keynum;
    var keychar;
    var id = '';
    if (window.event) {// IE
        keynum = e.keyCode;
    } else if (e.which) {// Netscape/Firefox/Opera
        keynum = e.which;
    }
    keychar = String.fromCharCode(keynum);
    if (type === "save") {
        var tagInput = $("#patient_save input");
    } else if (type === "update") {
        var tagInput = $("#patient_edit input");
    }

    for (i = 0; i <= tagInput.length; i++) {
        console.log(tagInput[i] + ':::' + obj);
        if (tagInput[i] == obj) {
            var prevObj = tagInput[i - 1];
            var nextObj = tagInput[i + 1];
            //console.log(prevObj.id+"/"+nextObj.id);
            break;
        }
    }
    if (obj.value.length == 0 && keynum == 8)
        prevObj.focus();

    if (obj.value.length == obj.getAttribute('maxlength')) {
        for (i = 0; i <= tagInput.length; i++) {
            if (tagInput[i].id.substring(0, 5) == 'txtID') {
                if (tagInput[i].value.length == tagInput[i].getAttribute('maxlength')) {
                    id += tagInput[i].value;
                    if (tagInput[i].id == 'txtID13')
                        break;
                } else {

                    tagInput[i].focus();
                    return;
                }
            }
        }
        if (checkID(id)) {
            console.log(nextObj.id);
            nextObj.focus();

        } else {
            alert('รหัสประชาชนไม่ถูกต้อง');
        }


        nextObj.focus();
    }

}

function checkID(id) {
//    console.log(id.length);
//    if (id.length != 13) {
//        console.log("len");
//        return false;
//    }
//
//    for (i = 0, sum = 0; i < 12; i++)
//        sum += parseFloat(id.charAt(i)) * (13 - i);
//    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) {
//        console.log(sum);
//        return false;
//
//    }
    return true;
}

function edit_person_info(id) {
    //$("#patient_edit")[0].reset();

    $("#patient_edit input#rec_day").datepicker("setDate", new Date());

    $("#patient_edit input#birthday_s").datepicker("setDate", new Date());




    $("#edit_modal").modal('show');

    $.ajax({
        url: api_url + "get_sp_by_id",
        type: "POST",
        data: {
            id: id
        },
        success: function (data) {
            console.log(data[0]);
            var array = data[0];

            var inpt_arr = ['exp', 'child'];
            $.each(array, function (idx, obj) {
//                console.log(idx + " " + obj);
                if (idx === "exp" || idx === "child") {
                    switch (idx) {
                        case "child":
                            if (obj === "1") {
                                $("#patient_edit input[name=child]").prop('checked', true);
                            }
                            break;
                        case "exp":
                            if (obj === "1") {
                                $("#exp01").prop('checked', true);
                            } else {
                                $("#exp02").prop('checked', true);
                            }
                            break;
                        default:
                            break;
                    }
                } else {


                    if (idx === "exp_1" || idx === "exp_2" || idx === "exp_3" || idx === "exp_4") {
                        $("#patient_edit input[name=" + idx + "_detail]").val(obj);
                        if (obj !== null && obj !== "" && obj !== "-") {
                            $("#patient_edit input[name=" + idx + "]").prop('checked', true);
                        }
                        //console.log("detail " + idx + "/ " + obj);
                    } else if (idx === "id_card") {
                        var j = 0;
                        for (i = 0; i < 13; i++) {
                            j = i + 1;

                            var val = obj.slice(i, j);
                            $("#patient_edit input[name=txtID" + j + "]").val(val);
                        }
                    } else if (idx === "reason" || idx === "admission") {
                        if (idx === "reason") {
                            $("#patient_edit textarea[name=reason]").val(obj);
                        } else {
                            $("#patient_edit textarea[name=admission]").val(obj);
                        }
                    } else if (idx === "prefix" || idx === "edu" || idx === "status" || idx === "time_sp") {

                        $('#' + idx + '_s option[value="' + obj + '"]').attr("selected", true);
                        if (idx === "edu" && obj === "5") {
                            $("#edu_ex_s").css("display", "inline");
                        }
                    } else if (idx === "rec_day" || idx === "birthday") {
                        var date = convert_date_ad(obj);
                        $("#patient_edit input[name=" + idx + "]").val(date);


                    } else if (idx === "edu_detail") {
                        $("#edu_detail_s").val(obj);
                    } else {
                        $("#patient_edit input[name=" + idx + "]").val(obj);
                    }
                }



            });

        },
        error: function (xhr, status, error) {
            console.log(xhr + " " + status + " " + " " + error);
        }
    });

}


function update_sp() {
//console.log($("#patient_edit").serialize());

    $.ajax({
        url: api_url + "sp_save",
        type: "post",
        data: $("#patient_edit").serialize(),
        success: function (data) {
            $("#edit_modal").modal("hide");
            $.alert({
                title: 'แจ้งเตือน',
                content: 'แก้ไขข้อมูลสำเร็จ',
            });

        }
    });

}

function close_modal() {
    $("#patient_edit")[0].reset();
}

function get_form_option() {

    $.ajax({
        url: api_url + "prefix_list",
        type: "get",
        success: function (data) {
            var str = "";
            $.each(data, function (idx, obj) {

                str += '<option value="' + obj.id + '" >' + obj.prefix + '</option>';
            });
            $('#patient_edit #prefix_s').html(str);
        },
        error: function (xhr, status, error) {
            console.log(xhr + " " + status + " " + " " + error);
        }
    });

    $.ajax({
        url: api_url + "person_status_list",
        type: "get",
        success: function (data) {
            console.log(data);

            $.each(data, function (idx, obj) {
                $('#patient_edit #status_s').append('<option value="' + obj.id + '" >' + obj.status + '</option>');
            });

        },
        error: function (xhr, status, error) {
            console.log(xhr + " " + status + " " + " " + error);
        }
    });

    $.ajax({
        url: api_url + "edu_list",
        type: "get",
        success: function (data) {
            console.log(data);

            $.each(data, function (idx, obj) {
                $('#patient_edit #edu_s').append('<option value="' + obj.id + '" >' + obj.edu_name + '</option>');
                if (obj.id === 5) {
                    $('#patient_edit #edu_sec_s').append('ตั้งแต่ ');
                }
            });

        },
        error: function (xhr, status, error) {
            console.log(xhr + " " + status + " " + " " + error);
        }
    });

    $.ajax({
        url: api_url + "time_sp_list",
        type: "get",
        success: function (data) {
            console.log(data);

            $.each(data, function (idx, obj) {
                $('#patient_edit #time_sp_s').append('<option value="' + obj.time_code + '" >' + obj.time_name + '</option>');
            });

        },
        error: function (xhr, status, error) {
            console.log(xhr + " " + status + " " + " " + error);
        }
    });
}

function convert_date_ad(date) {
    var array = date.split("-");
    var day = array[2];
    var month = array[1];
    var year = parseInt(array[0]) + 543;

    return day + "/" + month + "/" + year;
}

function manage_sp_act(id) {
//    $("#edit_modal").modal("hide");
//    $("#sp_modal").modal("show");
var w =screen.availWidth;
    w = w-100;
    var h = screen.availHeight;
    h = h-100;
    window.open(client_url + "sp/get_sp_info/" + id, 'window name', "width="+w+",height="+h+",left=30,top=30,resizable=yes,scrollbars=yes");
}

function back_to_edit() {

    $("#edit_modal").modal("show");
}

function more_opt() {

    if ($('#more_sec').css('display') == 'none') {
        $("#more_sec").css('display', 'block');
        $("#more_opt").html("ซ่อนตัวเลือกการค้นหา");
        $("#option").val('2');
    } else {
        $("#more_sec").css('display', 'none');
        $("#more_opt").html("ตัวเลือกการค้นหาเพิ่มเติม");
        $("#option").val('1');
    }
}


