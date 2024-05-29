
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="/public/css/style.css">
    	<!-- Custom CSS -->
   
        <style>
        /* Add custom styles here */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            margin-top: auto;
        }
    </style>	
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">ZizoStore77</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">Home</a>
                        </li>
                        
                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>
    <!-- Main Content -->
	<!-- PHP session check and JavaScript alert -->

<!-- Include the JavaScript file -->
    <script src="/js/js.alert.js"></script>
    <main>
        <div class="registration-form">
            <h2 class="text-center">User Registration</h2>
            <!-- Registration form -->
            <form id="registrationForm" action="<?= site_url('user') ?>" method="post">

                <?= csrf_field() ?>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('firstName')) : ?>
					<div class="text-danger"><?= $validation->getError('firstName') ?></div>
				<?php endif; ?>
                <!-- Form fields -->
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name:</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('lastName')) : ?>
					<div class="text-danger"><?= $validation->getError('lastName') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name:</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('email')) : ?>
					<div class="text-danger"><?= $validation->getError('email') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('phone')) : ?>
					<div class="text-danger"><?= $validation->getError('phone') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('address')) : ?>
					<div class="text-danger"><?= $validation->getError('address') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('city')) : ?>
					<div class="text-danger"><?= $validation->getError('city') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="city" class="form-label">City:</label>
                    <input type="text" name="city" id="city" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('state')) : ?>
					<div class="text-danger"><?= $validation->getError('state') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="state" class="form-label">State:</label>
                    <input type="text" name="state" id="state" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('zip_code')) : ?>
					<div class="text-danger"><?= $validation->getError('zip_code') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="zip_code" class="form-label">Zip Code:</label>
                    <input type="text" name="zip_code" id="zip_code" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('username')) : ?>
					<div class="text-danger"><?= $validation->getError('username') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('password')) : ?>
					<div class="text-danger"><?= $validation->getError('password') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
				<!-- Display validation errors for the firstName field -->
				<?php if (isset($validation) && $validation->hasError('confirmpassword')) : ?>
					<div class="text-danger"><?= $validation->getError('confirmpassword') ?></div>
				<?php endif; ?>
                <div class="mb-3">
                    <label for="confirmpassword" class="form-label">Confirm Password:</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" autocomplete="new-password" required>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </main>

    <!-- Footer -->
		<footer>
			<div class="container text-center">
				<p class="mb-0">Car Accessories Store &copy; 2024</p>
			</div>
		</footer>
	


    <!-- Bootstrap Bundle with Popper -->
	
   
</body>

</html>
