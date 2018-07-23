
function login() {
    var user = $("#username").val();
    var pass = $("#password").val();
    var data1 = {
        method: "login_mis",
        user: user,
        pass: pass,
        output: "json",
        _i: null
    };

    $.ajax({
        url: 'http://172.17.8.144/centerservicemis/main.php',
        type: 'post',
        dataType: 'JSON',
        contentType: 'application/json',
        data: JSON.stringify(data1),
        success: function (data) {

            //var obj = JSON.parse(data)
            //console.log(data);

            if (data.c === 0) {
                var obj = data.v;
                var fname = obj.fname;
                var lname = obj.lname;
                var full = fname + " " + lname;
                console.log(obj);

                $("#full_name").val(full);
                $("#usercde").val(obj.usercde);
                $("#fname").val(obj.fname);
                $("#lname").val(obj.lname);
                $("#grpcde").val(obj.grpcde);
                $("#ldate").val(obj.ldate);
                $("#lcomname").val(obj.lcomname);
                $("#percode").val(obj.percode);
                $("#idx").val(obj.idx);
                $("#fac_code").val(obj.fac_code);
                $("#tjob_id").val(obj.tjob_id);
                $("#user_name").val(obj.user_name);
                $("#user_date").val(obj.user_date);
                $("#tunt_id").val(obj.tunt_id);
                $("#t_work_id").val(obj.t_work_id);
                $("#token").val(obj.token);
//                $('#login_form').unbind().submit();
//                console.log("test");
                $.ajax({
                    url: client_url + "user/login_session",
                    type: "post",
                    data: $("#login_form").serialize(),
                    success: function (res) {
                        window.location.href = client_url + "user/index";
                    }, error: function (xx, yy, zz) {
                        alert(xx + yy + zz);
                    }
                });

            } else if (data.c === 1) {
                alert("wrong");
            }

        }, error: function (xx, yy, zz) {
            alert(zz + yy + zz);
        }

    });

}


