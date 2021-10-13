<!DOCTYPE>
<html>
    <head>
        <title>Welcome to our society page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            *{
                margin:0;
                padding:0;
                font-family:sans-serif;

            }
            .banner{
                width: 100%;
                height:auto;
                background-image:url(../image/background.jpg);
                background-attachment:fixed;
                background-size:100% 100%;
                background-repeat:repeat;

            }
            .navbar{
                width:95%;
                margin:auto;
                padding:35px;
                display:flex;
                align-items:center;
                justify-content: space-between;

            }
            .logo{
                width:100px;
                cursor:pointer;
            }

            .navbar ul li{
                list-style:none;
                display:inline-block;
                margin:0 20px;
                position: relative;
            }

            .navbar ul li a{

                text-decoration: none;
                font-weight: bold;
                font-size: 20px;
                color:white;
                text-transform: uppercase;
            }

            .navbar ul li a:hover{
                color:#009688;
            }

            .navbar ul li::after{
                content:"";
                height: 5px;
                width:0;
                background:#009688;
                position: absolute;
                left:0;
                bottom:-10px;
                transition: 0.5s;
            }

            .navbar ul li:hover::after{
                width:100%;
            }
            .content{
                width:100%;
                top:45%;
                margin-left: 30px;
                float:left;
                position: absolute;
                text-align: left;
                transform: translateY(-50%);
                color:black;
            }
            .content h1{
                font-size:70px;
                margin-top: 80px;
                text-shadow: 5px 5px 5px rgb(87, 87, 87);
                font-family:Georgia, 'Times New Roman', Times, serif ;
            }
            .content p{
                font-family: "Courier New", Courier, monospace;
                font-weight: bold;
                text-shadow: 1px 1px 1px;
                text-indent: 50px;
                margin-top:10px;
                font-size: 20px;

            }


            .sidebar {
                margin: 0;
                padding: 0;
                margin-left:40px;
                width: 200px;
                background-color: #f1f1f1;
                border-radius:8px;
                position: fixed;
                height: 50%;
                overflow: auto;
            }

            .sidebar a {
                display: block;
                color: black;
                padding: 16px;
                text-decoration: none;
            }

            .sidebar a.active {
                background-color: #04AA6D;
                color: white;
            }

            .sidebar a:hover:not(.active) {
                background-color: #555;
                color: white;
            }



            .mySlides {display: none}
            img {vertical-align: middle;}

            /* Slideshow container */
            .slideshow-container {
                max-width: 1000px;
                position: relative;
                margin-left:450px;

            }

            /* Next & previous buttons */
            .prev, .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                padding: 16px;
                margin-top: -22px;
                color: white;
                font-weight: bold;
                font-size: 18px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
                user-select: none;
            }

            /* Position the "next button" to the right */
            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover, .next:hover {
                background-color: rgba(0,0,0,0.8);
            }

            /* Caption text */
            .text {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }

            /* Number text (1/3 etc) */
            .numbertext {
                color: #f2f2f2;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
            }

            /* The dots/bullets/indicators */
            .dot {
                cursor: pointer;
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;

                display: inline-block;
                transition: background-color 0.6s ease;
            }

            .active, .dot:hover {
                background-color: #717171;
            }

            /* Fading animation */
            .fade {
                -webkit-animation-name: fade;
                -webkit-animation-duration: 1.5s;
                animation-name: fade;
                animation-duration: 1.5s;
            }

            @-webkit-keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
            }

            @keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
            }

            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
                .prev, .next,.text {font-size: 11px}
            }

        </style>
    </head>
    <body>
        <div class="banner">
            <div class="navbar">
                <img src="../image/societyLogo.png" class="logo" with="400px"height="100px"/>
                <ul>
                    <li><a href="backEnd-homepage.php">Home</a></li>
                    <li><a href="backEnd-member.php">Member List</a></li>
                    <li><a href="photographer-insert.php">Edit Photographer</a></li>
                    <li><a href="backEnd-tutorial.php">Tutorial</a></li>
                    <li><a href="createEvent.php">Create Event</a></li>
                </ul>
            </div>

            <div class="sidebar">
                <a class="active" >Table List</a>
                <a href="searchpage.php">Search Engine</a>
                <a href="registrationStudent-list.php">Registration  List</a>
                <a href="adminEventList.php">Event List</a>
                <a href="backEnd-member.php">Member List</a>
                <a href="backEnd-appointment-list.php">Appointment List</a>
                <a href="backEnd-rentalEquipment_1.php">Rental Equipment</a>               
            </div>
            
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 5</div>
                    <img src="../image/flower.jpg" style="width:100% ;height: 550px">
                    <div class="text">Flower</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 5</div>
                    <img src="../image/camera2.PNG" style="width:100% ;height: 550px">
                    <div class="text">Camera</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2/ 5</div>
                    <img src="../image/cloud.PNG" style="width:100% ;height: 550px">
                    <div class="text">Cloud</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">5/ 5</div>
                    <img src="../image/secondpage.jpeg" style="width:100% ;height: 550px">
                    <div class="text">Chair</div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3/ 5</div>
                    <img src="../image/photographer.PNG" style="width:100% ;height: 550px">
                    <div class="text">Photographer</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
            </div>

            <script>
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    if (n > slides.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = slides.length
                    }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                }

                var slideIndex = 0;
                showSlides();

                function showSlides() {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    setTimeout(showSlides, 5000); // Change image every 2 seconds
                }
            </script>


            <div class="content">

            </div>


        </div>
    </body>
</html>