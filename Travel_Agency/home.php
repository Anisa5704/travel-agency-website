
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: transparent;
            padding: 0 20px;
            height: 60px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .navbar-logo {
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar-nav li {
            position: relative;
        }

        .navbar-nav a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.7);
            padding: 15px 20px;
            display: flex;
            align-items: center;
            font-size: 16px;
            transition: 0.3s ease-in-out;
        }

        .navbar-nav a i {
            margin-right: 8px;
        }

        .navbar-nav a:hover {
            color: #5161ce;
            background-color: white;
            border-radius: 15px;
        }

        .navbar-nav li.navactive a {
            color: #5161ce;
            background-color: white;
            border-radius: 15px;
        }

        /*butoni*/
        .navbar-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        .navbar-nav {
            flex-direction: row;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-wrap: wrap;

            }

            .navbar-nav {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: transparent;
                backdrop-filter: blur(10px);
                opacity: 1;
                z-index: 10;
            }

            .navbar-nav.open {
                display: flex;
            }

            .navbar-nav a {
                justify-content: center;
                padding: 10px 0;
            }

            .navbar-toggle {
                display: block;
            }
        }
    </style>
    <style>
        .home{
            display: block;
            align-items: center;
            min-height: 100vh ;
            background: url("Screenshot 1.png");
            background-size: cover;
            background-position: center;
            margin-top: -80px;
        }
        .home .content span{
            display: block;
            padding: 120px 100px;
            font-size: 30px;
            font-family: "EB Garamond",sans-serif;
            font-weight: bold;
            color : whitesmoke;
        }

        .animated-button {
            background-color: rgb(193, 191, 187);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: background-color 0.3s;
            margin-left:30%;
            top: -80px;
        }


        .animated-button:hover {
            background-color: #298eb9;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
            }
            50% {
                transform: scale(1.1);
                box-shadow: 0 0 15px rgba(52, 152, 219, 0.7);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
            }
        }

        .animated-button {
            animation: pulse 2s infinite;
        }


        .heading{

            text-align: center;
            margin-bottom: 2rem;
            font-family: "EB Garamond",sans-serif;
            font-size: 2rem;
            /*text-transform: uppercase;*/
            color: rgba(119, 81, 30, 0.95);
        }

        /*Paketat*/
        .destinations{
            display: flex;
            flex-wrap: wrap;
            gap: 3%;
            justify-content: center;
            margin-left: 15px;
            margin-right: 15px;

        }
        .card {
            background: #ffffff;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-image {
            height: 150px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f9f9f9;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image fits nicely */
        }


        .card-price {
            position: absolute;
            top: 150px;
            right: 0;
            background: #1ab394; /* Green color */
            color: #ffffff;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 0 0 0 8px;
            font-size: 16px;
        }

        .card-content {
            padding: 16px;
        }

        .category {
            color: #999999;
            font-size: 14px;
            margin-bottom: 4px;
        }

        h3 {
            margin: 0 0 10px 0;
            color: #333333;
            font-size: 20px;
        }

        p {
            margin: 0 0 12px 0;
            color: #666666;
            font-size: 14px;
        }

        .info-button {
            display: inline-block;
            background: none;
            color: #1ab394;
            border: 1px solid #1ab394;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.2s, color 0.2s;
        }

        /* stilizimi  i shopping cart */
        .info-button:hover {
            background: #1ab394;
            color: #ffffff;
        }

        .cart-buttonImg{
            margin-left: 150px;
            transform: scale(0.85);
            transform-origin: center;
            background-color: transparent;
            border: none;
        }
        .cart-buttonImg:hover{
            transform: scale(1);
            transform-origin: center;
        }



        #destination1{
            margin-top: 15px;
            float:left;
        }

        #destination2{
            margin-top: 15px;
            float: left;
            /*margin-left: 3%;*/
        }
        #destination3{
            margin-top: 15px;
            float: left;
            /*margin-left: 3%;*/
        }
        #destination4{
            margin-top: 15px;
            float:left;
        }
        #destination5{
            margin-top: 15px;
            float: left;
        }
        #destination6{
            margin-top: 15px;
            float: left;
        }
        #destination7{
            margin-top: 15px;
            float: left;
        }

        /*Butoni Hide*/
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 15px 30px;
            border: 0;
            position: relative;
            overflow: hidden;
            border-radius: 10rem;
            transition: all 0.02s;
            font-weight: bold;
            cursor: pointer;
            color: rgb(37, 37, 37);
            z-index: 0;
            box-shadow: 0 0px 7px -5px rgba(0, 0, 0, 0.5);
            margin-top: 20px;
            margin-left: 50%;
        }

        .button:hover {
            background: rgb(193, 228, 248);
            color: rgb(33, 0, 85);
        }

        .button:active {
            transform: scale(0.97);
        }

        .hoverEffect {
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        .hoverEffect div {
            background: rgb(222, 0, 75);
            background: linear-gradient(
                    90deg,
                    rgba(222, 0, 75, 1) 0%,
                    rgba(191, 70, 255, 1) 49%,
                    rgba(0, 212, 255, 1) 100%
            );
            border-radius: 40rem;
            width: 10rem;
            height: 10rem;
            transition: 0.4s;
            filter: blur(20px);
            animation: effect infinite 3s linear;
            opacity: 0.5;
        }

        .button:hover .hoverEffect div {
            width: 8rem;
            height: 8rem;
        }

        @keyframes effect {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        #hiddenDestination1{
            margin-top: 15px;
            float:left;
        }

        #hiddenDestination2{
            margin-top: 15px;
            float: left;
        }
        #hiddenDestination3{
            margin-top: 15px;
            float: left;
        }
        #hiddenDestination4{
            margin-top: 15px;
            float:left;
        }
        #hiddenDestination5{
            margin-top: 15px;
            float:left;
        }

        #hiddenDestination6{
            margin-top: 15px;
            float: left;
        }
        #hiddenDestination7{
            margin-top: 15px;
            float: left;
        }
        #hiddenDestination8{
            margin-top: 15px;
            float:left;
        }
        #hiddenDestination9{
            margin-top: 15px;
            float:left;
        }

        #hiddenDestination10{
            margin-top: 15px;
            float: left;
        }
        #hiddenDestination11{
            margin-top: 15px;
            float: left;
        }
        #hiddenDestination12{
            margin-top: 15px;
            float:left;
        }
    </style>

    <!--FOOTER-->
    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            line-height: 1.2;
        }

        footer{
            display: flex;
            flex-wrap: wrap;
            margin-top: auto;
            background-color: rgba(156, 255, 161, 0.3);
            padding: 60px 10%;
        }

        ul{
            list-style: none;
        }

        .footer-col{
            width: 25%;
        }

        .footer-col h4{
            position: relative;
            margin-bottom: 20px;
            font-size: 15px;
            color: rgb(35, 86, 253);
            text-transform: capitalize;
        }

        .footer-col h4::before{
            content: '';
            position: absolute;
            left: 0;
            bottom: -4px;
            background-color: rgb(39, 241, 16);
            height: 2px;
            width: 40px;
        }

        ul li:not(:last-child){
            margin-bottom: 8px;
        }

        ul li a{
            display: block;
            font-size: 14px;
            text-transform: capitalize;
            color: #71ef09;
            text-decoration: none;
            transition: 0.4s;
        }

        ul li a:hover{
            color: white;
            padding-left: 2px;
        }

        .links a{
            display: inline-block;
            height: 44px;
            width: 44px;
            color: white;
            background-color: rgb(35, 86, 253);
            margin: 0 8px 8px 0;
            text-align: center;
            line-height: 44px;
            border-radius: 50%;
            transition: 0.4s;
        }

        .links a:hover{
            color: #4d4f55;
            background-color: white;
        }

        @media(max-width: 740px){
            .footer-col{
                width: 50%;
                margin-bottom: 30px;
                text-align: center;
            }

            .footer-col h4::before{
                all: unset;
            }
        }

        @media(max-width: 555px){
            .footer-col{
                width: 100%;
            }
        }</style>
</head>
<body>
<nav class="navbar">
    <div class="navbar-logo">Albania Horizons</div>
    <button class="navbar-toggle" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <ul class="navbar-nav">
        <li><a href="About.php" target="_blank"><i class="fas fa-info-circle"></i>About</a></li>
        <li class="navactive"><a href="#"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="#"><i class="fas fa-paint-brush"></i>Personalizo</a></li>
        <li><a href="#"><i class="fas fa-calendar-alt"></i>Calendar</a></li>
        <li><a href="#"><i class="fas fa-user"></i>User</a></li>
        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i>Cart</a></li>
    </ul>
</nav>

<!--Home Photo-->

<section class="home" id="home">
    <div class="content">
        <span>Aty ku ëndrrat dhe horizontet takohen ...<span>
        <button onclick="scrollToElement('trending')" class="animated-button">Zbulo</button>
    </div>
</section>

<!--Paketat me te mira-->
<h1 class="heading" id="trending">Trending</h1>

<section id="destinations" class="destinations">
    <div class="card" id="destination1">
        <div class="card-image" >
            <img src="brezovica.jpg" alt="brezovica Image">

        </div>
        <div class="card-price" data-price="50">
            50€
        </div>
        <div class="card-content">
            <p class="category">Mal</p><p class="category">Winter</p>
            <h3>Brezovica</h3>
            <p>Brezovicë-Prevallë-Prizren</p>
            <a href="#" class="info-button">Info →</a>
            <button class="cart-buttonImg" onclick="addToCart('destination1')">
                <img src="empty-cart%20(1).png" alt="cart img" class="cart-img">
            </button>
        </div>
    </div>

    <div class="card" id="destination2">
        <div class="card-image">
            <img src="korce.jpg" alt="korca Image">

        </div>
        <div class="card-price" data-price="40">
            40€
        </div>
        <div class="card-content">
            <p class="category">Winter</p> <p class="category">City</p>
            <h3>Korçë</h3>
            <p>Korçë</p>
            <a href="#" class="info-button">Info →</a>
            <button class="cart-buttonImg" onclick="addToCart('destination2')">
                <img src="empty-cart%20(1).png" alt="cart img" class="cart-img">
            </button>
        </div>
    </div>

    <div class="card" id="destination3">
        <div class="card-image">
            <img src="boge.jpg" alt="boge Image">
        </div>
        <div class="card-price" data-price="30">
            30€
        </div>
        <div class="card-content">
            <p class="category">Mal</p> <p class="category">Winter</p>
            <h3>Bogë-Pejë</h3>
            <p>Bogë</p>
            <a href="#" class="info-button">Info →</a>
            <button class="cart-buttonImg" onclick="addToCart('destination3')">
                <img src="empty-cart%20(1).png" alt="cart img" class="cart-img">
            </button>
        </div>
    </div>

    <div class="card" id="destination4">
        <div class="card-image">
            <img src="valbne.jpg" alt="valbone Image">
        </div>
        <div class="card-price" data-price="30">
            30€
        </div>
        <div class="card-content">
            <p class="category">Mal</p> <p class="category">Winter</p>
            <h3>Valbonë</h3>
            <p>Valbonë</p>
            <a href="#" class="info-button">Info →</a>
            <button class="cart-buttonImg" onclick="addToCart('destination4')">
                <img src="empty-cart%20(1).png" alt="cart img" class="cart-img">
            </button>
        </div>

    </div>

    <div class="card" id="destination5">
        <div class="card-image">
            <img src="Church-of-Theth.webp" alt="theth Image">
        </div>
        <div class="card-price" data-price="22">
            22€
        </div>
        <div class="card-content">
            <p class="category">Natyrë</p> <p class="category">Winter</p>
            <h3>Theth</h3>
            <p>Theth-Qafë Thore</p>
            <a href="#" class="info-button">Info →</a>
            <button class="cart-buttonImg" onclick="addToCart('destination5')">
                <img src="empty-cart%20(1).png" alt="cart img" class="cart-img">
            </button>
        </div>
    </div>

    <div class="card" id="destination6">
        <div class="card-image">
            <img src="Drilon-5.jpg" alt="pogradec Image">
        </div>
        <div class="card-price" data-price="25">
            25€
        </div>
        <div class="card-content">
            <p class="category">Liqen</p> <p class="category">Natyrë</p>
            <h3>Pogradec</h3>
            <p>Drilon-Tushemisht</p>
            <a href="#" class="info-button">Info →</a>
            <button class="cart-buttonImg" onclick="addToCart('destination6')">
                <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
            </button>
        </div>
    </div>

    <div class="card" id="destination7">
        <div class="card-image">
            <img src="Dardhe.jpg" alt="theth Image">
        </div>
        <div class="card-price" data-price="22">
            22€
        </div>
        <div class="card-content">
            <p class="category">Natyrë</p> <p class="category">Winter</p>
            <h3>Dardhë</h3>
            <p>Dardhë-Korçë</p>
            <a href="#" class="info-button">Info →</a>
            <button class="cart-buttonImg" onclick="addToCart('destination7')">
                <img src="empty-cart%20(1).png" alt="cart img" class="cart-img">
            </button>
        </div>
    </div>
</section>


<!--HIDEN SECTION-->
<div id="hide">
    <button class="button" onclick="hideShow()">
        More
        <div class="hoverEffect">
            <div></div>
        </div>
    </button>
</div>
<section id="hidden" style="display: none;">
    <h1 class="heading" id="more">Më shumë ...</h1>

    <section id="hiddenDestinations" class="destinations">

        <div class="card" id="hiddenDestination1">

            <div class="card-image" >
                <img src="Nalbania.jpg" alt="North Albania Image">
            </div>
            <div class="card-price" data-price="100">
                100€
            </div>
            <div class="card-content">
                <p class="category">Natyrë</p><p class="category">Summer</p>
                <h3>North explore</h3>
                <p>Full north riviera trip</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination1')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination2">
            <div class="card-image" >
                <img src="zvernec.jpg" alt="zvernec Image">
            </div>
            <div class="card-price" data-price="30">
                30€
            </div>
            <div class="card-content">
                <p class="category">Natyrë & histori</p><p class="category">Summer</p>
                <h3>Zvërnec</h3>
                <p>Zbulo brigjet dhe historinë </p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination2')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination3">
            <div class="card-image" >
                <img src="caption.jpg" alt="saranda Image">
            </div>
            <div class="card-price" data-price="190">
                190€
            </div>
            <div class="card-content">
                <p class="category">Natyrë</p><p class="category">Summer</p>
                <h3>Saranda</h3>
                <p>All inclusice pasket</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination3')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination4">
            <div class="card-image" >
                <img src="ksamili.jpg" alt="Ksamil Image">
            </div>
            <div class="card-price" data-price="50">
                50€
            </div>
            <div class="card-content">
                <p class="category">Natyrë</p><p class="category">Summer</p>
                <h3>Ksamil</h3>
                <p>Boat trip</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination4')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination5">
            <div class="card-image" >
                <img src="gjirokasterguide.jpg" alt="gjirokaster Image">
            </div>
            <div class="card-price" data-price="20">
                20€
            </div>
            <div class="card-content">
                <p class="category">Histori</p><p class="category">Kulture</p>
                <h3>Gjirokaster</h3>
                <p>Historical and cultural trip</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination5')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination6">
            <div class="card-image" >
                <img src="unesco1.jpg" alt="berat Image">
            </div>
            <div class="card-price"  data-price="20">
                20€
            </div>
            <div class="card-content">
                <p class="category">Histori</p><p class="category">Kulture</p>
                <h3>Berat</h3>
                <p>Cultural trip</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination6')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination7">
            <div class="card-image" >
                <img src="elbasan-albaniatouristplaces.jpg" alt="elbasan Image">
            </div>
            <div class="card-price" data-price="9">
                9€
            </div>
            <div class="card-content">
                <p class="category">Histori</p><p class="category">Kulture</p>
                <h3>Elbasan</h3>
                <p>Cultural & histroic trip</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination7')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination8">
            <div class="card-image" >
                <img src="lezhe.jpg" alt="lezhe Image">
            </div>
            <div class="card-price" data-price="20">
                20€
            </div>
            <div class="card-content">
                <p class="category">Histori</p><p class="category">Kulture</p>
                <h3>Lezhe</h3>
                <p>Cultural & Historical trip</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination8')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination9">
            <div class="card-image" >
                <img src="shkoder.jpg" alt="shkoder Image">
            </div>
            <div class="card-price" data-price="56">
                56€
            </div>
            <div class="card-content">
                <p class="category">Kulturë</p><p class="category">Natyë</p>
                <h3>Shkodër</h3>
                <p>"All inclusive trip"</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination9')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination10">
            <div class="card-image" >
                <img src="ranaEhedhun.jpg" alt="rana e hedhun Image">
            </div>
            <div class="card-price" data-price="20">
                20€
            </div>
            <div class="card-content">
                <p class="category">Natyrë</p><p class="category">Summer</p>
                <h3>Rana e Hedhun</h3>
                <p>Në Dunat e Shqipërisë!</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination10')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination11">
            <div class="card-image" >
                <img src="images.jpg" alt="Shengjin Image">
            </div>
            <div class="card-price" data-price="30">
                30€
            </div>
            <div class="card-content">
                <p class="category">Natyrë</p><p class="category">Summer</p>
                <h3>Shëngjini</h3>
                <p>"Coast and funn" trip</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination11')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

        <div class="card" id="hiddenDestination12">
            <div class="card-image" >
                <img src="durres-things-to-do1.jpg" alt="Durres Image">
            </div>
            <div class="card-price" data-price="15">
                15€
            </div>
            <div class="card-content">
                <p class="category">Natyrë</p><p class="category">Kulture</p>
                <h3>Durres</h3>
                <p>Cultural & Historical trip</p>
                <a href="#" class="info-button">Info →</a>
                <button class="cart-buttonImg" onclick="addToCart('hiddenDestination12')">
                    <img src="empty-cart%20(1).png" alt="cart img" class="cart-img"></img>
                </button>
            </div>
        </div>

    </section>

</section>

<!--FOOTER-->
<footer>
    <div class="footer-col">
        <h4>products</h4>
        <ul>
            <li><a href="#">Trending</a></li>
            <li><a href="#">All</a></li>
            <li><a href="#">Personalize</a></li>
        </ul>
    </div>
    <div class="footer-col">
        <h4>Kategorite</h4>
        <ul>
            <li><a href="#">Historical & Cultural</a></li>
            <li><a href="#">Natyrë</a></li>
            <li><a href="#">Male</a></li>
            <li><a href="#">Summer only trip</a></li>
            <li><a href="#">Winter</a></li>
        </ul>
    </div>
    <div class="footer-col">
        <h4>Ekipi jonë</h4>
        <ul>
            <li><a href="#">about</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="#">contact us</a></li>
        </ul>
    </div>
    <div class="footer-col">
        <h4>follow us</h4>
        <div class="links">
            <a href="https://al.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>
</body>


<script>
    //navigation bar
    const toggleButton = document.querySelector('.navbar-toggle');
    const navbarNav = document.querySelector('.navbar-nav');

    toggleButton.addEventListener('click', () => {
        navbarNav.classList.toggle('open');
    });

    //butoni scroll qe te con nga headeri i faqes te paketat treandy
    function scrollToElement(elementId) {
        document.getElementById(elementId).scrollIntoView({ behavior: 'smooth' });
    }


    //SHow paketat e fshehura
    let div = document.getElementById('hidden');
    let isVisible = false;

    function hideShow() {
        if (isVisible) {
            div.style.display = 'none'; // fsheh section-in
        } else {
            div.style.display = 'block'; // Shfaq section-in
        }
        isVisible = !isVisible; // ndryshoj gjendjen
    }

    const jsonData = {
        "destinations": [
            {"id": "destination1", "name": "Brezovica", "image": "brezovica.jpg", "price": 50},
            {"id": "destination2", "name": "Korçë", "image": "korce.jpg", "price": 40},
            {"id": "destination3", "name": "Bogë-Pejë", "image": "boge.jpg", "price": 30},
            {"id": "destination4", "name": "Valbonë", "image": "valbne.jpg", "price": 30},
            {"id": "destination5", "name": "Theth", "image": "Church-of-Theth.webp", "price": 22},
            {"id": "destination6", "name": "Pogradec", "image": "Drilon-5.jpg", "price": 25},
            {"id": "destination7", "name": "Dardhë", "image": "Dardhe.jpg", "price": 22},
            {"id": "hiddenDestination1", "name": "North explore", "image": "Nalbania.jpg", "price": 100},
            {"id": "hiddenDestination2", "name": "Zvërnec", "image": "zvernec.jpg", "price": 30},
            {"id": "hiddenDestination3", "name": "Saranda", "image": "caption.jpg", "price": 190},
            {"id": "hiddenDestination4", "name": "Ksamil", "image": "ksamili.jpg", "price": 50},
            {"id": "hiddenDestination5", "name": "Gjirokaster", "image": "gjirokasterguide.jpg", "price": 20},
            {"id": "hiddenDestination6", "name": "Berat", "image": "unesco1.jpg", "price": 20},
            {"id": "hiddenDestination7", "name": "Elbasan", "image": "elbasan-albaniatouristplaces.jpg", "price": 9},
            {"id": "hiddenDestination8", "name": "Lezhe", "image": "lezhe.jpg", "price": 20},
            {"id": "hiddenDestination9", "name": "Shkodër", "image": "shkoder.jpg", "price": 56},
            {"id": "hiddenDestination10", "name": "Rana e Hedhun", "image": "ranaEhedhun.jpg", "price": 20},
            {"id": "hiddenDestination11", "name": "Shëngjini", "image": "images.jpg", "price": 30},
            {"id": "hiddenDestination12", "name": "Durres", "image": "durres-things-to-do1.jpg", "price": 15}
        ]
    }
    const destinationsContainer = document.getElementById('destinations');
    let cart = JSON.parse(localStorage.getItem('cart')) || {};

    function addToCart(id) {
        const destination = jsonData.destinations.find(dest => dest.id === id);
        if (!cart[id]) {
            cart[id] = { ...destination, quantity: 1 };
        } else {
            cart[id].quantity++;
        }
        localStorage.setItem('cart', JSON.stringify(cart));
    }

</script>
</html>

