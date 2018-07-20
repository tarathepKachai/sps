
function login() {
    var user = $("#username").val();
    var pass = $("#password").val();
    var data = {
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
        data: JSON.stringify(data),
        success: function (data) {

            //var obj = JSON.parse(data)
            //console.log(data);

            if (data.c === "0") {

            } else if (data.c === "1") {

            }

            var obj = data.v;
            var fname = obj.fname;
            var lname = obj.lname;
            var full = fname + " " + lname;
            $("#full_name").val(full);
            alert($("#full_name").val());

        }, error: function (xx, yy, zz) {
            alert(zz + yy + zz);
        }

    });
}
