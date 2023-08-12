$(document).ready(function() {
    $('.select2').select2();
});

 function id_encrypt(string) {
    var key = 'FbcCY2yCFBwVCUE9R+6kJ4fAL4BJxxjd';
    var iv = 'e16ce913a20dadb8';
    var encrypted = CryptoJS.AES.encrypt(string, CryptoJS.enc.Utf8.parse(key), {
        iv: CryptoJS.enc.Utf8.parse(iv)
    });
    var str = encrypted.toString();
    return window.btoa(str);
}

function unixtimetodate(x) {
    let offset = 4;
    var html = moment(x * 1000).utcOffset(offset).format("D MMM YYYY") + ' <small>' + moment(x * 1000).utcOffset(offset).format("hh:mm A") + '</small>';
    return html;
}

function users_action(x, name, fields){
    x = id_encrypt(x);
    var link = '';
    link += '<a class="action-icon waves-effect waves-light text-success" href="' + site_url + 'admin/users/edit/' + x + '" style="color:#6C757D;" title="Edit User"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp'; 
    link += "<a href='javascript:void(0)' title='Delete User' title='Delete User' class='po action-icon waves-effect waves-light text-danger' data-html='true' data-placement='left' data-toggle='popover' data-original='alert primary' data-trigger='focus' data-content=\"<p>Are you sure, you want to delete User?</p><a class='btn btn-danger po-delete' href='" + site_url + "admin/users/delete/" + x + "'>Yes I'm sure</a>&nbsp;&nbsp;<a class='btn btn-light po-close'>No</a>\" ><i class='icon-trash'></i></a>&nbsp;&nbsp;";
    return link;
 }

$("#add_user").validate({
    ignore: ':hidden',
     errorElement: 'span',
     rules: {
         name: 'required',
         email: {
            required: true,
            email: true,
            remote: {
                url: site_url + 'admin/users/check_email',
                type: "post",
                data: {
                    login: function() {
                        return $('input[name="email"]').val();
                    }
                }
            }
         },
         password: {
            required: true,
            minlength: 6
         },
         cpassword: {
            equalTo: "#passwords",
            required: true,
         },
     },
     messages: {
         name: "Please enter Name",
         email: {
            required: "Please enter Email.",
            email: "Please enter valid Email.",
            remote: "Email already in use.",
         },
         password: {
            required: "Please enter Password",
            minlength: "Password should be minimum 6 characters",
         },
         cpassword: {
            equalTo: "Password does not match.",
            required: "Please enter confirm Password",
         },
     },
     errorPlacement: function(error, element) {
         if (element.parent('.form-group').length) {
             error.appendTo(element.parent());
         }
     }
 });

$("#edit_user").validate({
    ignore: ':hidden',
     errorElement: 'span',
     rules: {
         name: 'required',
         cpassword: {
            equalTo: "#passwords",
            minlength: 6,
         },
     },
     messages: {
         name: "Please enter Name",
         user_type: "Please select user type",
         cpassword: {
            equalTo: "Password does not match.",
            minlength: "Password should be minimum 6 characters",
         },
     },
     errorPlacement: function(error, element) {
         if (element.parent('.form-group').length) {
             error.appendTo(element.parent());
         }
     }
});


$(document).on('click', '[data-target="#lightbox"]', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $(".popup-image").attr('src', href);
        $("#lightbox").modal();
});

function image_qr(x) {
    return '<div class="text-left"><a href="' + x + '" data-target="#lightbox" class="company-image"><img src="' + x + '"></a></div>';
}