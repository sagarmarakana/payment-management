$(document).ready(function() {
    $('.select2').select2();
    $('#state').change();
});

$("#add-customer").validate({
    ignore: ':hidden',
     errorElement: 'span',
     rules: {
         name: 'required',
         user_type: 'required',
         email: {
            required: true,
            email: true,
         },
         mobile: {
            number: true,
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
         },
         mobile : {
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

$('#state').on('change', function(){
    var state_id = $(this).val();
    $.ajax({
        url: site_url + 'admin/customers/getCity',
        method: 'post',
        data: {
            state_id: state_id
        },
        dataType: 'json',
        success: function(response) {
            $('#city').html('');
            var city_id = $('#city').attr('data-val');
            // Add options
            $('#city').append('<option value="">Select City</option>');
            $.each(response.data, function(index, data) {
                if(parseInt(city_id) == parseInt(data['id'])) {
                    select = 'selected';
                } else {
                    select = '';
                }
                $('#city').append('<option value="' + data['id'] + '" data-name="' + data['city'] + '" ' + select + '>' + data['city'] + '</option>');
            });
        }
    });
});