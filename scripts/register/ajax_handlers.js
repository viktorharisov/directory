$(document).ready(function() {
    function displayError(field, message) {
        field.next('.error-message').remove();
        field.after('<div class="error-message">' + message + '</div>');
    }

    $('#email, #login').on('blur', function() {
        var field = $(this);
        var fieldName = field.attr('name');
        var fieldValue = field.val();

        $.ajax({
            url: '/scripts/register/check_availability.php',
            type: 'POST',
            data: { field: fieldName, value: fieldValue },
            success: function(response) {
                if (response === 'taken') {
                    displayError(field, fieldName.charAt(0).toUpperCase() + fieldName.slice(1) + ' уже занят.');
                } else if (response === 'invalid') {
                    displayError(field, 'Некорректный ' + fieldName + '.');
                } else {
                    field.next('.error-message').remove();
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });

    $('#password').on('blur', function() {
        var password = $(this).val();
        var errorMessage = '';
        if (password.length < 6) {
            errorMessage = 'Пароль должен содержать минимум 6 символов.';
        } else if (!/[A-Za-z]/.test(password)) {
            errorMessage = 'Пароль должен содержать хотя бы одну букву.';
        } else if (!/[0-9]/.test(password)) {
            errorMessage = 'Пароль должен содержать хотя бы одну цифру.';
        }

        $(this).next('.error-message').remove();
        if (errorMessage) {
            $(this).after('<div class="error-message">' + errorMessage + '</div>');
        }
    });

    $('#togglePassword').on('click', function() {
        var passwordField = $('#password');
        var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);
        $(this).text(type === 'password' ? 'Показать' : 'Скрыть');
    });

    $('form').on('submit', function(e) {
        var errors = $('.error-message');
        if (errors.length > 0) {
            e.preventDefault();
            alert('Пожалуйста, исправьте ошибки перед отправкой формы.');
        }
    });
});
