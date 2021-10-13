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
                height:100%;
                background-image:url(image/lengzai.jpg);
                background-attachment:fixed;
                background-size:100% 100%;
                background-repeat: no-repeat;

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
                font-size: 18px;
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

            .footer{
                background:#303036;
                color:white;
                height:300px;
            }
            .footer .footer-content{
                border: 5px solid white;
                height:300px;
                display: flex;
            }
            .footer .footer-content .footer-section{
                flex:1;
                padding:15px;
            }
            .footer .footer-content .About h1{
                color:white;
            }

            .footer .footer-content .About .contact span{
                display:block;
                font-size:1.1em;
                margin-top:10px;
                font-size:15px;
            }

            .social_menu ul{
                margin-top:55px;
                text-align: center;
                top:0;
            }
            .social_menu ul li{
                display: inline-flex;
                width: 40px;
                height:40px;
                margin:0px 10px;
                margin-left: 20px;
                border-radius: 20%;
                border:1px solid white;
            }
            .social_menu ul li a{
                color:white;
                font-size:30px ;
                line-height:40px;
                margin-left: 10px;
            }

            .social_menu ul li a:hover{
                color:#009688;
            }
            .footer .footer-content .Links ul{
                margin-left: 40px;
            }
            .footer .footer-content .Links ul a{
                display:block;
                margin-bottom:10px;
                font-size:15px;
                font-family:Georgia, 'Times New Roman', Times, serif ;
                color:white;
                text-decoration: none;
                transition:all .3s;
            }
            .footer .footer-content .Links ul a:hover{
                color:#009688;
                margin-left:15px;
                transition:all .3s;
            }

            .form-control{
                color:black;
                margin-left: 20px;
                line-height:15px;
                padding:10px 86px;
                border:5px solid #009688;
            }

            .submit {
                background-color:#009688;
                color: white;
                margin-top: 5px;
                padding: 5px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-left:20px;
                display: block;
            }

        </style>
    </head>
    <body>
        <div class="banner">
            <div class="navbar">
                    <img src="image/societyLogo.png" class="logo" with="400px"height="100px"/>
                    <ul>
                        <li><a href="homepage.php">Home</a></li>
                        <li><a href="eventList.php">Even List</a></li>
                        <li><a href="tutorial.php">Tutorial</a></li>
                        <li><a href="MemberProfile.php">Profile</a></li>
                        <li><a href="LogIn.php">Log In</a></li>
                        <li><a href="equipment.php">Equipment</a></li>
                    </ul>
                </div>  
            <div class="content">
                <h1>HELLO</h1>
                <p>WELCOME TO OUR TARUC PHOTOGRAPH SOCIETY</p>
                <p>“A true photograph need not be explained <br><p>nor can it be contained in words”<p><br> -Ansel Adams</p>
            </div>

        </div>

        <?php
        include('includes/footer.php');
        ?>