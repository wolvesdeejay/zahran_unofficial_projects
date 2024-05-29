<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Accessories</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <main class="container">
        <h2>Car Accessories</h2>
        
        <!-- Dropdown for Car Make -->
        <label for="car-make">Car Make:</label>
        <select id="car-make" class="form-select">
            <option value="">Select Car Make</option>
            <!-- Car makes populated by JavaScript -->
        </select>
        
        <!-- Dropdown for Car Model -->
        <label for="car-model">Car Model:</label>
        <select id="car-model" class="form-select" disabled>
            <option value="">Select Car Model</option>
            <!-- Car models populated by JavaScript -->
        </select>
        
        <!-- Dropdown for Car Year -->
        <label for="car-year">Car Year:</label>
        <select id="car-year" class="form-select" disabled>
            <option value="">Select Car Year</option>
            <!-- Car years populated by JavaScript -->
        </select>
        
        <!-- Display accessories -->
        <div id="accessories">
            <!-- Accessories populated by JavaScript -->
        </div>
    </main>

    <!-- JavaScript to Fetch Data -->
    <script>
        $(document).ready(function() {
            // Fetch car makes on page load
            $.getJSON('/public/car/makes', function(data) {
                var carMakeDropdown = $('#car-make');
                carMakeDropdown.empty().append('<option value="">Select Car Make</option>');
                data.forEach(function(item) {
                    carMakeDropdown.append('<option value="' + item.Make + '">' + item.Make + '</option>');
                });
            });

            // Fetch car models when a make is selected
            $('#car-make').change(function() {
                var make = $(this).val();
                var carModelDropdown = $('#car-model');

                carModelDropdown.empty().append('<option value="">Select Car Model</option>');
                if (make) {
                    $.getJSON('/public/car/models/' + make, function(data) {
                        carModelDropdown.prop('disabled', false); // Enable dropdown
                        data.forEach(function(item) {
                            carModelDropdown.append('<option value="' + item.Model + '">' + item.Model + '</option>');
                        });
                    });
                } else {
                    carModelDropdown.prop('disabled', true); // Disable if no make is selected
                }
            });

            // Fetch car years when a model is selected
            $('#car-model').change(function() {
                var make = $('#car-make').val();
                var model = $(this).val();
                var carYearDropdown = $('#car-year');

                carYearDropdown.empty().append('<option value="">Select Car Year</option>');
                if (model) {
                    $.getJSON('/public/car/years/' + make + '/' + model, function(data) {
                        carYearDropdown.prop('disabled', false); // Enable dropdown
                        data.forEach(function(item) {
                            carYearDropdown.append('<option value="' + item.Year + '">' + item.Year + '</option>');
                        });
                    });
                } else {
                    carYearDropdown.prop('disabled', true); // Disable if no model is selected
                }
            });

            // Fetch accessories when a year is selected
            $('#car-year').change(function() {
                var make = $('#car-make').val();
                var model = $('#car-model').val();
                var year = $(this).val();
                var accessoriesContainer = $('#accessories');

                accessoriesContainer.empty(); // Clear previous results
                if (year) {
                    $.getJSON('/public/car/accessories/' + make + '/' + model + '/' + year, function(data) {
                        data.forEach(function(item) {
                            accessoriesContainer.append('<div>' + 
                                '<img src="' + item.ImageURL + '" alt="' + item.Name + '" style="width:100px; height:100px;">' +
                                '<p>Name: ' + item.Name + '</p>' +
                                '<p>Description: ' + item.Description + '</p>' +
                                '<p>Price: ' + item.Price + '</p>' +
                                '</div>');
                        });
                    });
                }
            });
        });
    </script>
</body>
</html>
