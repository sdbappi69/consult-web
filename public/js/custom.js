function passwordModal() {
    var old_pass = $('#old_password').val('');
    var new_pass = $('#new_password').val('');
    var confirm_pass = $('#confirm_password').val('');
    $('#password_change_button').attr('disabled', true);
    $('#passwordModal').modal({
        show: true,
        backdrop: false
    });
}
$(document).ready(function () {
    $(".alert-message").delay(10000).fadeOut("slow");
    if(localStorage.getItem('skin') && localStorage.getItem('skin') === 'dark'){
        $('.night-mode-btn').html('Light mode <i class="fas fa-sun ml-1"></i>')
    }else{
        $('.night-mode-btn').html('Night mode <i class="fas fa-moon ml-1"></i>')
    }
    $('#new_password').keyup(function() {
        var old_pass = $('#old_password').val();
        var new_pass = $(this).val();
        var confirm_pass = $('#confirm_password').val();
        if (new_pass === confirm_pass && new_pass.length > 5 && confirm_pass.length > 5 && old_pass) {
            $(this).css({
                'border-color': 'green'
            });
            $('#confirm_password').css({
                'border-color': 'green'
            });
            $('#password_change_button').attr('disabled', false);
        } else {
            $(this).css({
                'border-color': 'red'
            });
            $('#password_change_button').attr('disabled', true);
            if (confirm_pass) {
                $('#confirm_password').css({
                    'border-color': 'red'
                });
            }
        }
    });
    $('#confirm_password').keyup(function() {
        var old_pass = $('#old_password').val();
        var new_pass = $('#new_password').val();
        var confirm_pass = $(this).val();
        if (new_pass === confirm_pass && new_pass.length > 5 && confirm_pass.length > 5 && old_pass) {
            $(this).css({
                'border-color': 'green'
            });
            $('#new_password').css({
                'border-color': 'green'
            });
            $('#password_change_button').attr('disabled', false);
        } else {
            $(this).css({
                'border-color': 'red'
            });
            $('#password_change_button').attr('disabled', true);
            if (new_pass) {
                $('#new_password').css({
                    'border-color': 'red'
                });
            }
        }
    });
    $('#old_password').keyup(function() {
        var old_pass = $('#old_password').val();
        var new_pass = $('#new_password').val();
        var confirm_pass = $('#confirm_password').val();
        if (new_pass === confirm_pass && new_pass.length > 5 && confirm_pass.length > 5 && old_pass) {
            $(this).css({
                'border-color': 'green'
            });
            $('#password_change_button').attr('disabled', true);
            $('#confirm_password').css({
                'border-color': 'green'
            });
            $('#password_change_button').attr('disabled', false);
        }
    });
})