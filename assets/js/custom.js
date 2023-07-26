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

// Datatable call back
function customer_action(x){
    x = id_encrypt(x);
    var link = '';
    link += '<a class="btn btn-info btn-sm" href="' + site_url + 'admin/customers/edit/' + x + '" style="color:#6C757D;" title="Edit Customer" data-toggle="data-toggle/data-dismiss" data-target="#customModel">Edit</a>&nbsp;&nbsp;';

    link += "<a href='javascript:void(0)' title='Delete User' title='Delete Customer' class='po action-icon waves-effect waves-light text-danger' data-html='true' data-placement='left' data-toggle='popover' data-original='alert primary' data-trigger='focus' data-content=\"<p>Are you sure, you want to delete customer?</p><a class='btn btn-danger po-delete' href='" + site_url + "admin/customers/delete/" + x + "'>Yes I'm sure</a>&nbsp;&nbsp;<a class='btn btn-light po-close'>No</a>\" ><i class='icon-trash'></i></a>&nbsp;&nbsp;";
    return link;
}

function users_action(x, name, fields){
    x = id_encrypt(x);
    var link = '';
    link += '<a class="action-icon waves-effect waves-light text-success" href="' + site_url + 'admin/users/edit/' + x + '" style="color:#6C757D;" title="Edit User"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp'; 
    link += "<a href='javascript:void(0)' title='Delete User' title='Delete User' class='po action-icon waves-effect waves-light text-danger' data-html='true' data-placement='left' data-toggle='popover' data-original='alert primary' data-trigger='focus' data-content=\"<p>Are you sure, you want to delete User?</p><a class='btn btn-danger po-delete' href='" + site_url + "admin/customers/delete/" + x + "'>Yes I'm sure</a>&nbsp;&nbsp;<a class='btn btn-light po-close'>No</a>\" ><i class='icon-trash'></i></a>&nbsp;&nbsp;";
    return link;
 }

$("#add_user").validate({
    ignore: ':hidden',
     errorElement: 'span',
     rules: {
         name: 'required',
         user_type: 'required',
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
         mobile_number: {
            required: true,
            minlength : 10,
            maxlength : 10,
         },
     },
     messages: {
         name: "Please enter Name",
         user_type: "Please select user type",
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
         mobile_number : {
            required: "Please Enter Mobile number",
            minlength: "Please Enter 10 digit number",
            maxlength :  "Please Enter 10 digit number",
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
         user_type: 'required',
         cpassword: {
            equalTo: "#passwords",
            minlength: 6,
         },
         mobile_number: {
            required: true,
            minlength : 10,
            maxlength : 10,
         },
     },
     messages: {
         name: "Please enter Name",
         user_type: "Please select user type",
         cpassword: {
            equalTo: "Password does not match.",
            minlength: "Password should be minimum 6 characters",
         },
         mobile_number : {
            required: "Please Enter Mobile number",
            minlength: "Please Enter 10 digit number",
            maxlength :  "Please Enter 10 digit number",
         },
     },
     errorPlacement: function(error, element) {
         if (element.parent('.form-group').length) {
             error.appendTo(element.parent());
         }
     }
});

function product_action(x, name, fields){
    x = id_encrypt(x);
    var link = '';
    link += '<a class="action-icon waves-effect waves-light text-success" href="' + site_url + 'admin/products/edit/' + x + '" style="color:#6C757D;" title="Edit Product"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp'; 
    link += "<a href='javascript:void(0)' title='Delete Product' title='Delete Product' class='po action-icon waves-effect waves-light text-danger' data-html='true' data-placement='left' data-toggle='popover' data-original='alert primary' data-trigger='focus' data-content=\"<p>Are you sure, you want to delete Product?</p><a class='btn btn-danger po-delete' href='" + site_url + "admin/products/delete/" + x + "'>Yes I'm sure</a>&nbsp;&nbsp;<a class='btn btn-light po-close'>No</a>\" ><i class='icon-trash'></i></a>&nbsp;&nbsp;";
    return link;
 }

$("#add_product").validate({
    ignore: ':hidden',
     errorElement: 'span',
     rules: {
         name: 'required',
         product_type: 'required',
         size: 'required',
         quantity: 'required',
         core: 'required',
         packing: 'required',
         list_price: 'required',
         min_discount: 'required',
         max_discount: {
            required: true,
            min: function() {
                return parseInt($('#MinimumDiscount').val());
            }
         },
     },
     messages: {
         name: "Please enter Name",
         product_type: "Please select Product Type",
         size: "Please enter Size",
         quantity: "Please enter Quantity",
         core: "Please enter Core",
         packing: "Please enter Packing",
         list_price: "Please enter List Price",
         min_discount: "Please enter Minimum Discount",
         max_discount: {
            required: "Please enter Maximum Discount",
            min: "Please enter a value greater than Minimum Discount",
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

function comapany_image(x) {
    var image_link = (x == null || x == '') ? 'uploads/no_image.png' : x;
    return '<div class="text-left"><a href="' + site_url + image_link + '" data-target="#lightbox" class="company-image"><img src="' + site_url + image_link + '"></a></div>';
}

function company_action(x, name, fields){
    x = id_encrypt(x);
    var link = '';
    link += '<a class="action-icon waves-effect waves-light text-success" href="' + site_url + 'admin/company_management/edit/' + x + '" style="color:#6C757D;" title="Edit Company"><i class="icon-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp'; 
    link += "<a href='javascript:void(0)' title='Delete Company' title='Delete Company' class='po action-icon waves-effect waves-light text-danger' data-html='true' data-placement='left' data-toggle='popover' data-original='alert primary' data-trigger='focus' data-content=\"<p>Are you sure, you want to delete Company?</p><a class='btn btn-danger po-delete' href='" + site_url + "admin/company_management/delete/" + x + "'>Yes I'm sure</a>&nbsp;&nbsp;<a class='btn btn-light po-close'>No</a>\" ><i class='icon-trash'></i></a>&nbsp;&nbsp;";
    return link;
 }

$("#add_company").validate({
    ignore: ':hidden',
     errorElement: 'span',
     rules: {
         name: 'required',
         logo: 'required',
     },
     messages: {
         name: "Please enter Name",
         logo: "Please select Logo",
     },
     errorPlacement: function(error, element) {
         if (element.parent('.form-group').length) {
             error.appendTo(element.parent());
         }
     }
 });

$("#edit_company").validate({
    ignore: ':hidden',
     errorElement: 'span',
     rules: {
         name: 'required',
     },
     messages: {
         name: "Please enter Name",
     },
     errorPlacement: function(error, element) {
         if (element.parent('.form-group').length) {
             error.appendTo(element.parent());
         }
     }
 });