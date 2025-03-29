<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your ShoppingCart</title>
    <style>
        body{
            background-image: url("tree-6147402_1920.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }
        .cart-item { margin-bottom: 10px; }
        .cart {
            margin: 20px;
            background-color: transparent;
            backdrop-filter: blur(30px);
            padding: 10px;
            border: rgba(245, 245, 245, 0.19) 2px solid;
            border-radius: 20px;
        }
        h1{
            margin: 30px;
            text-align: center;
            color: lightgoldenrodyellow;
            text-shadow: 2px 2px 2px #036488;
        }
        .cart p{
            color: #ffffff;
        }
        #cartPhoto{
            width: 55px;
            height: 55px;
            border-radius: 50%;
            margin-bottom: 13px;
            transform: scale(0.93);
        }
        #par{
            margin-top: -50px;
            margin-left: 60px;
        }
        #removeBtn{
            position: absolute;
            margin-top: -36px;
            margin-left: 195px;
            border-radius: 20%;
            background-color: #f31c08;
            color: whitesmoke;
            border: none;
        }
        #removeBtn:hover{
            cursor: pointer;
            transform: scale(1.1);
        }

        #totali{
            position: relative;
            top: 10px;
            left: 90px;
            color: black;
        }
        a{
            text-decoration: none;
            display: block;
            text-align: center;
            width: 90px;
            height: 45px;
            border-radius: 10%;
            position: absolute;
            left: 330px;
            background-color: transparent ;
            color: #e6f807;
            font-weight: bold;
            text-shadow: 2px 2px 2px #040303;
            transform: scale(1.1);

        }
        a:hover{
            transform: scale(1.1);
        }


    </style>
</head>
<body>
<h1>Your Shopping Cart</h1>
<div id="cart" class="cart">
    <img src="empty-cart%20(1).png" alt="cart"></img>
    <p>Loading cart...</p>
</div>
<a href="home.php">Back to Destinations</a>
<script >
    const cartContainer = document.getElementById('cart');
    let cart = JSON.parse(localStorage.getItem('cart')) || {};

    // Display Cart
    function displayCart() {
        cartContainer.innerHTML = '';
        const cartItems = Object.values(cart);

        if (cartItems.length === 0) {
                cartContainer.innerHTML = '<p>Nuk ke ruajtur asnje pakete</p>';
            return;
        }

        let totalPrice = 0;
        cartItems.forEach(item => {
            totalPrice += item.price * item.quantity;
            const cartItemDiv = document.createElement('div');
            cartItemDiv.className = 'cart-item';
            cartItemDiv.innerHTML = `

       <img src="${item.image}" alt="${item.name}" id="cartPhoto"></img>
      <p id="par"> ${item.name} - $${item.price} x ${item.quantity}</p>
      <button onclick="removeFromCart('${item.id}')" id="removeBtn">Fshi</button>

    `;
            cartContainer.appendChild(cartItemDiv);
        });

        const totalDiv = document.createElement('div');
        totalDiv.innerHTML = `<p id="totali"><strong>Total: ${totalPrice}€</strong></p>`;
        cartContainer.appendChild(totalDiv);
    }

    // Remove from Cart
    function removeFromCart(id) {
        delete cart[id];
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCart();
    }

    displayCart();
</script>
</body>
</html>
