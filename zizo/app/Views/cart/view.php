
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    

    	<!-- Custom CSS -->
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
	<style>
		footer {
		position: absolute;
		bottom: 0;
		width: 100%;
		background-color: #343a40;
		color: white;
		text-align: center;
		padding: 20px;
        }
		
    </style>
</head>

<body>
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
                    
                    <ul class="navbar-nav ms-auto"> <!-- Changed from 'ml-auto' to 'ms-auto' -->
                        <!-- Shopping cart icon -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('cart/view') ?>">
                                <i class="bi bi-cart icon-blue"></i> <!-- Blue shopping cart icon -->
                                Cart
                            </a>
                        </li>
                         
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h1> Shopping Cart</h1>

    <?php if (empty($cartItems)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($cartItems as $item): ?>
                <li>
                    <?= $item['accessory']['name'] ?> - 
                    <?= $item['quantity'] ?> x 
                    $<?= number_format($item['accessory']['price'], 2) ?> = 
                    $<?= number_format($item['total'], 2) ?>
                    [<a href="<?= site_url('/cart/remove/' . $item['accessory']['id']) ?>">Remove</a>]
                </li>
            <?php endforeach; ?>
        </ul>

        <p>
            <strong>Total:</strong> $
            <?php 
            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item['total'];
            }
            echo number_format($total, 2); 
            ?>
        </p>
    <?php endif; ?>

    <a href="/">Continue Shopping</a>
	 <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="mb-0">Car Accessories Store &copy; 2024</p>
        </div>
    </footer>
</body>
</html>
