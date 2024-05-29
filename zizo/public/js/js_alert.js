// Assuming you're using jQuery for AJAX requests
$('#registrationForm').submit(function(e) {
    e.preventDefault(); // Prevent the default form submission

    // Perform AJAX request
    $.ajax({
        type: 'POST',
        url: 'user/doRegister',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Registration successful, display success message
                alert("Registration successful. You can now login.");

                // Redirect to login page or any other page
                window.location.href = "login.html"; // Change "login.html" to your desired URL
            } else {
                // Registration failed, display validation errors
                // Loop through errors and display them to the user
                $.each(response.errors, function(key, value) {
                    alert(value); // Display each error message
                });
            }
        },
        error: function() {
            // Handle AJAX error if any
            alert('Error occurred during registration.');
        }
    });
});
