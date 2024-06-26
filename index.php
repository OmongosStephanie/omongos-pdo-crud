<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        body {
            background: url(https://static.vecteezy.com/system/resources/previews/001/882/922/non_2x/book-seamless-pattern-background-vector.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white; /* Set text color to white for better readability */
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            margin-bottom: 20px; /* Add margin below the navbar */
        }

        /* Define a class for the grid */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Responsive grid with minimum item width of 250px */
            gap: 40px; /* Gap between grid items */
            padding: 20px; /* Add padding around the grid container */
            width: 80%; /* Set width to 80% */
            margin: 0 auto; /* Center the grid */
        }

        /* Style for individual cards */
        .card {
            width: 100%; /* Ensure cards take full width of their container */
            background-color: rgba(255, 255, 255, 0.8); /* Set background to transparent white */
            border: none; /* Remove card border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add slight shadow for better readability */
            transition: transform 0.2s ease, box-shadow 0.2s ease; /* Smooth transition for hover effects */
            border-radius: 15px; /* Rounded corners */
            overflow: hidden; /* Ensure child elements don't overflow */
            margin-bottom: 20px; /* Add margin below each card */
        }

        .card:hover {
            transform: translateY(-5px); /* Slight lift on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Darker shadow on hover */
        }

        .card-img-top {
            width: 100%; /* Ensure the image fills its container */
            height: 200px; /* Fixed height for card images */
            object-fit: cover; /* Ensure the image covers the entire container */
            border-top-left-radius: 15px; /* Match card's rounded corners */
            border-top-right-radius: 15px; /* Match card's rounded corners */
        }

        .card-body {
            padding: 15px; /* Add padding inside the card */
        }

        .card-title {
            color: black; /* Set text color to black for better readability */
            font-size: 1.25rem; /* Slightly larger font size for titles */
            margin-bottom: 10px; /* Space between title and other content */
            font-weight: bold; /* Bold titles */
        }

        .card-text, .price {
            color: black; /* Set text color to black for better readability */
            margin-bottom: 10px; /* Space between text elements */
        }

        .price {
            font-weight: bold; /* Bold price */
        }

        .btn-success {
            background-color: #28a745; /* Green background for button */
            border: none; /* Remove button border */
            border-radius: 20px; /* Rounded button */
            padding: 10px 20px; /* Padding inside button */
            transition: background-color 0.2s ease, transform 0.2s ease; /* Smooth transition for hover effects */
            margin-top: 10px; /* Add margin above the button */
        }

        .btn-success:hover {
            background-color: #218838; /* Darker green on hover */
            transform: translateY(-2px); /* Slight lift on hover */
        }

        /* Style for the cart */
        #cartContainer {
            position: fixed;
            top: 4em;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Set background to transparent white */
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        /* Style for the search bar */
        .form-inline {
            background-color: rgba(255, 255, 255, 0.9); /* Transparent white background */
            padding: 5px;
            border-radius: 5px;
        }

        .form-control {
            background-color: white; /* White background */
            color: black; /* Black text color */
            border: none; /* Remove border */
        }

        .btn-outline-success {
            color: black; /* Black text color */
            border-color: black; /* Black border color */
        }

        .btn-outline-success:hover {
            background-color: black; /* Black background on hover */
            color: white; /* White text color on hover */
        }

        .navbar-brand img {
            border-radius: 50%; /* Make the logo circular */
        }

        /* Style for the modal */
        .modal-body p {
            color: black; /* Set text color to black */
        }

        .modal-title {
            color: black;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMnywqjMLWBSefb3MPTYXNnT6p5voyIU0YBw&s" width="30" height="30" class="d-inline-block align-top" alt="Softball Logo">
            <span style="color: black;">Luna Book Store</span>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div id="productsDisplay" class="card-grid"></div>
    <!-- Cart Display Area -->
    <div id="cartContainer"></div>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Product details will be filled here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="admin/payment/payment.php" class="btn btn-primary" id="buyButton">Buy</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        fetch('./products/products-api.php')
            .then(response => response.json())
            .then(data => {
                const booksContainer = document.getElementById('productsDisplay');
                data.forEach(product => {
                    const cardHTML = `
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="${product.img}">
                            <div class="card-body">
                                <h5 class="card-title">${product.title}</h5><br><span class="price">Price: ₱${product.rrp}</span><br>
                                <p class="card-text">${product.description}.</p>
                                <p class="card-text"><br>Quantity: ${product.quantity}</p>
                                <button class="btn btn-success" onclick="showProductModal('${product.title}', '${product.rrp}')">
                                    <i class="fas fa-cart-plus"></i> <!-- Add to Cart icon -->
                                    Add to Cart
                                </button>
                            </div>
                    </div>
                    `;
                    booksContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        // Function to display the product modal
        function showProductModal(title, price) {
            document.getElementById('modalBody').innerHTML =
            `
                <p>Name: ${title}</p>
                <p>Price: ₱${price}</p>
            `;
            $('#productModal').modal('show');
        }

        // Initialize cart object
        let cart = {};

        // Function to add a product to the cart
        function addToCart(productId) {
            // Add the product to the cart
            if (cart[productId]) {
                cart[productId]++;
            } else {
                cart[productId] =
                cart[productId] = 1;
            }
            // Display the updated cart
            displayCart();
        }

        // Function to display the cart with the items added and deduct the values from the quantity data field
        function displayCart() {
            const cartContainer = document.getElementById('cartContainer');
            let cartHTML = '<h3>Cart</h3>';
            // Iterate over the cart items and display them
            for (const [productId, quantity] of Object.entries(cart)) {
                cartHTML += `<p>Product ID: ${productId}, Quantity: ${quantity}</p>`;
                // Here, you can update the quantity data field for the corresponding product
            }
            // Update the cart display
            cartContainer.innerHTML = cartHTML;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
