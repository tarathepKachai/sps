

$(document).ready(function () {

    $('#edit_modal').on('hidden.bs.modal', function () {
        $("#patient_edit")[0].reset();
        $("#patient_edit textarea[name=exp_1_detail]").text("");
        $("#patient_edit textarea[name=exp_2_detail]").text("");
        $("#patient_edit textarea[name=exp_3_detail]").text("");
        $("#patient_edit textarea[name=exp_4_detail]").text("");
    });

    $("form").attr('autocomplete', 'off');
});


function close_modal() {
    $("#patient_edit")[0].reset();
    $("#patient_edit").modal("hide");
    $("#patient_edit textarea[name=exp_1_detail]").text("");
    $("#patient_edit textarea[name=exp_2_detail]").text("");
    $("#patient_edit textarea[name=exp_3_detail]").text("");
    $("#patient_edit textarea[name=exp_4_detail]").text("");
}

function add_sp_info() {
    $('#sp_act')
            .find('option').not(':first')
            .remove()
            .end()
            ;
    $('#symptom')
            .find('option').not(':first')
            .remove()
            .end()
            ;
    $('#evaluation')
            .find('option').not(':first')
            .remove()
            .end()
            ;
    $("#add_sp_modal").modal("show");

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

    $.ajax({
        url: api_url + "evaluation_list",
        type: "GET",
        success: function (data) {
            console.log(data);
            $.each(data, function (idx, obj) {
                $("#evaluation").append('<option value="' + obj.eva_id + '">' + obj.eva_desc + '</option>');
            });
        }
    });


}

function save_sp_info() {
    var act = $("#sp_act").val();
    var symp = $("#symptom").val();

    if (act === "0" || symp === "0") {
        $.confirm({
            title: "แจ้งเตือน !",
            content: "กรุณาเลือก<br>การกระทำ,อาการ/โรค",
            type: "red",
            buttons: {
                ok: {
                    text: "ตกลง"
                }
            }
        });
    } else {
        $.ajax({
            url: api_url + "save_sp_info",
            type: "POST",
            data: $("#form_sp_info").serialize(),
            success: function (data) {
                $.confirm({
                    title: 'แจ้งเตือน',
                    content: 'เพิ่มข้อมูลสำเร็จ!',
                    type: 'green',
                    buttons: {
                        ok: {
                            text: 'ok',
                            action: function () {
                                window.location.reload();
                            }
                        }
                    }
                });
            }
        });
    }


}

function comment_sp(id) {

    $("#comment_modal").modal("show");
    $("#comment_form")[0].reset();

    var temp_com = id.split("_");
    var data = temp_com[1];
    //console.log(data);
    $("#sp_info_id").val(data);
    var comment = $("#input_comment_" + temp_com[1]).val();

    $("#comment_edit").val(comment);

}

function date_sp(id) {

    $("#date_modal").modal("show");
    $("#date_form")[0].reset();

   
    var data = id;
    //console.log(data);
    $("#sp_info_id").val(data);
    var comment = $("#date_" + data).val();
    console.log(comment);
    $("#date_edit").val(comment);
     console.log($("#date_edit").val());

}

function eva_update(sp_info_id) {
    //alert(sp_info_id + "//" + person_id);
    var temp = sp_info_id.split("_");
    var id = temp[1];
    //console.log(id);
    var eva = $("#" + sp_info_id).val();

    $.ajax({
        url: api_url + "update_evaluation",
        type: "POST",
        data: {
            sp_info_id: id,
            person_id: person_id,
            evaluation: eva
        },
        success: function (data) {
            console.log(data);
            $.confirm({

                title: 'แจ้งเตือน',
                content: 'ประเมินสำเร็จ !',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    ok: {
                        btnClass: 'btn-green'
                    }
                }
            });
        }
    });
}

function symp_update(sp_info_id) {
    //alert(sp_info_id + "//" + person_id);
    var temp = sp_info_id.split("_");
    var id = temp[1];
    console.log(id);
    var symp = $("#" + sp_info_id).val();

    $.ajax({
        url: api_url + "update_symptom",
        type: "POST",
        data: {
            sp_info_id: id,
            person_id: person_id,
            symptom: symp
        },
        success: function (data) {
            console.log(data);
            $.confirm({

                title: 'แจ้งเตือน',
                content: 'แก้ไขสำเร็จ !',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    ok: {
                        btnClass: 'btn-green'
                    }
                }
            });
        }
    });
}

function act_update(sp_info_id) {
    //alert(sp_info_id + "//" + person_id);
    var temp = sp_info_id.split("_");
    var id = temp[1];
    console.log(id);
    var act = $("#" + sp_info_id).val();

    $.ajax({
        url: api_url + "update_sp_act",
        type: "POST",
        data: {
            sp_info_id: id,
            person_id: person_id,
            sp_act_id: act
        },
        success: function (data) {
            // console.log(data);
            $.confirm({
                title: 'แจ้งเตือน',
                content: 'แก้ไขสำเร็จ !',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    ok: {
                        btnClass: 'btn-green'
                    }
                }
            });
        }
    });
}

function save_comment() {
    //console.log(sp_info_id);
    //var temp = sp_info_id.split("_");
    var id = $("#sp_info_id").val();

    var comment = $("#comment_edit").val();

    $.ajax({
        url: api_url + "save_comment",
        type: "POST",
        data: {
            comment: comment,
            sp_info_id: id
        },
        success: function (data) {

            if (comment === null || comment === "") {
                $("#input_comment_" + id).val("");
            } else {
                $("#input_comment_" + id).val(comment);
            }

            $.confirm({
                title: 'แจ้งเตือน',
                content: 'แก้ไขสำเร็จ !',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    ok: {
                        btnClass: 'btn-green'
                    }
                }
            });
            $("#comment_modal").modal("hide");
        }
    });
}

function save_date() {
    //console.log(sp_info_id);
    //var temp = sp_info_id.split("_");
    var id = $("#sp_info_id").val();

    var date = $("#date_edit").val();

    $.ajax({
        url: api_url + "save_date_sp_info",
        type: "POST",
        data: {
            date: date,
            sp_info_id: id
        },
        success: function (data) {

            if (date === null || date === "") {
                $("#date_" + id).val("");
            } else {
                $("#date_" + id).val(date);
            }

            $.confirm({
                title: 'แจ้งเตือน',
                content: 'แก้ไขสำเร็จ !',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    ok: {
                        btnClass: 'btn-green'
                    }
                }
            });
            $("#date_modal").modal("hide");
        }
    });
}

function delete_sp_info(id, person_id) {

    //console.log(id);

    $.confirm({
        title: 'Confirm!',
        content: 'ต้องการลบ ?',
        type: "red",
        typeAnimated: true,
        buttons: {
            ลบ: function () {
                $.ajax({
                    url: api_url + "delete_sp_info",
                    type: "POST",
                    data: {
                        sp_info_id: id,
                        person_id: person_id
                    },
                    success: function (data) {
                        $.confirm({
                            title: 'แจ้งเตือน',
                            content: 'ลบสำเร็จ!',
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                ok: {
                                    text: 'ok',
                                    action: function () {
                                        window.location.reload();
                                    }
                                }
                            }
                        });
                    }
                });

            },
            ยกเลิก: function () {

            }
        }
    });

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
                    } else if (idx === "gender") {
                        $('#' + idx + '_s option[value="' + obj + '"]').attr("selected", true);
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



    // ADD DATA TO TEXT AREA

    $.ajax({
        url: api_url + "get_sp_info_by_id",
        type: "POST",
        data: {
            id: id
        },
        success: function (data) {
            console.log(data);
            var txt = "";
            var exp1 = "";
            var exp2 = "";
            var exp3 = "";
            var exp4 = "";

            $.each(data, function (idx, obj) {

                if (obj.sp_act_id === "1") {
                    if (!$("#patient_edit textarea[name=exp_1_detail]").val()) {
                        // console.log($("#patient_edit textarea[name=exp_1_detail]").text());
//                        console.log("exp1");
                        exp1 = obj.symp_name;
                    } else {
                        exp1 = " , " + obj.symp_name;
                    }

                    $("#patient_edit textarea[name=exp_1_detail]").append(exp1);
                } else if (obj.sp_act_id === "2") {
                    if (!$("#patient_edit textarea[name=exp_2_detail]").val()) {
                        exp2 = obj.symp_name;
                    } else {
                        exp2 = " , " + obj.symp_name;
                    }
                    $("#patient_edit textarea[name=exp_2_detail]").append(exp2);
                } else if (obj.sp_act_id === "3") {
                    if (!$("#patient_edit textarea[name=exp_3_detail]").val()) {
                        exp3 = obj.symp_name;
                    } else {
                        exp3 = " , " + obj.symp_name;
                    }
                    $("#patient_edit textarea[name=exp_3_detail]").append(exp3);
                } else if (obj.sp_act_id === "4") {
                    if (!$("#patient_edit textarea[name=exp_4_detail]").val()) {
                        exp4 = obj.symp_name;
                    } else {
                        exp4 = " , " + obj.symp_name;
                    }
                    $("#patient_edit textarea[name=exp_4_detail]").append(exp4);
                }
            });

            if (!$("#patient_edit textarea[name=exp_1_detail]").val() && !$("#patient_edit textarea[name=exp_2_detail]").val()
                    && !$("#patient_edit textarea[name=exp_3_detail]").val() && !$("#patient_edit textarea[name=exp_4_detail]").val()) {
                $("#exp02").prop("checked", true);
            } else {
                $("#exp01").prop("checked", true);
            }
//            $("#patient_edit textarea[name=exp_1_detail]").text(exp1);
//            $("#patient_edit textarea[name=exp_2_detail]").text(exp2);
//            $("#patient_edit textarea[name=exp_3_detail]").text(exp3);
//            $("#patient_edit textarea[name=exp_4_detail]").text(exp4);
        }
    });

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
                    $('#patient_edit #edu_sec_s').append('ตั้งแต่');
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

function update_sp() {
//console.log($("#patient_edit").serialize());

    $.ajax({
        url: api_url + "sp_save",
        type: "post",
        data: $("#patient_edit").serialize(),
        success: function (data) {
            $("#edit_modal").modal("hide");
            $.confirm({
                title: 'แจ้งเตือน',
                content: 'แก้ไขสำเร็จ !',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    ok: {
                        btnClass: 'btn-green'
                    }
                }
            });
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
        }
    });

}








