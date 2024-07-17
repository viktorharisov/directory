$(document).ready(function() {
    $('#email, #login').on('blur', function() {
        var field = $(this);
        var fieldName = field.attr('name');
        var fieldValue = field.val();

        $.ajax({
            url: '/directory_project/scripts/register/check_availability.php',
            type: 'POST',
            data: { field: fieldName, value: fieldValue },
            success: function(response) {
                if (response === 'taken') {
                    field.next('.error-message').remove();
                    field.after('<div class="error-message">' + fieldName.charAt(0).toUpperCase() + fieldName.slice(1) + ' уже занят.</div>');
                } else {
                    field.next('.error-message').remove();
                }
            }
        });
    });

    $('form').on('submit', function(e) {
        var errors = $('.error-message');
        if (errors.length > 0) {
            e.preventDefault();
            alert('Пожалуйста, исправьте ошибки перед отправкой формы.');
        }
    });
});
