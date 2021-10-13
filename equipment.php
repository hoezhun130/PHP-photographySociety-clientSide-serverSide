<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <title>Photography Equipment</title>
        <style>
            *{
                margin:0;
                padding:0;
                height: auto;
                font-family:sans-serif;

            }

            body{
                width: 100%;
                height:auto;
                background-image:url(image/background.jpg);
                background-size:cover;

            }

            .banner{
                width: 100%;
                height:100vh;
                background-image:url(image/background.jpg);
                background-attachment:fixed;
                background-size:cover;
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
                font-size: 17px;
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


            .footer{
                background:#303036;
                color:white;
                height:350px;
                margin-top: 550px;
            }
            .footer .footer-content{
                border: 5px solid white;
                height:350px;
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


            *{
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                font-family: sans-serif;
            }

            .book{
                margin-top: 420px;
                padding:35px;
                align-items:center;
                justify-content: space-between;
                position: absolute;
                margin-left: 550px;
            }

            .book #equipment{
                text-decoration: none;
                font-weight: bold;
                font-size: 17px;
                color:rgb(255, 112, 77);
                margin-right: 30px;
            }

            .book #appointment{
                text-decoration: none;
                font-weight: bold;
                font-size: 17px;
                color:rgb(255, 112, 77);
                left: 100px;
            }

            .container{
                width: 100%;
                text-align: center;
            }

            .container h1{
                font-weight: bold;
                font-size: 30px;
                position: relative;
                margin: 40px 0px;
                text-align: center;
            }

            .container h1::before{
                content: ' ';
                position: absolute;
                width: 100px;
                height: 5px;
                bottom: -10px;
                background-color: rgb(255, 133, 51);
                left: 50%;
                transform: translateX(-50%);
                animation: animate 4s linear infinite;
            }

            @keyframes animate{
                0%{
                    width: 100px;
                }
                20%{
                    width: 250px;
                }
                40%{
                    width: 400px;
                }
                80%{
                    width: 250px;
                }
                100%{
                    width: 100px;
                }
            }

            .equipment{
                width: 90%;
                margin: auto;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                grid-gap: 0px;
            }

            .pic{
                height: 400px;
                position:  relative;
                margin-bottom: 10px;
                margin-top: 10px;
                transition: .5s;
            }

            .pic img{
                width: 80%;
                height: 80%;
            }

            .pic.camera::before{
                content: "Camera";
                position:absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                color:rgb(0, 204, 204);
                font-size: 20px;
                font-weight: bold;
                width:100%;
                margin-top: -170px;
                opacity: 0;
                transition: 0.5s;
                transition-delay: 0.2s;
            }

            .pic.lighting::before{
                content: "Lighting";
                position:absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                color: rgb(0, 204, 204);
                font-size: 20px;
                font-weight: bold;
                width:100%;
                margin-top: -170px;
                opacity: 0;
                transition: 0.5s;
                transition-delay: 0.2s;
            }

            .pic.whitescreen::before{
                content: "White Screen";
                position:absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                color:rgb(0, 204, 204);
                font-size: 20px;
                font-weight: bold;
                width:100%;
                margin-top: -170px;
                opacity: 0;
                transition: 0.5s;
                transition-delay: 0.2s;
            }

            .pic::after{
                content:" ";
                position: absolute;
                bottom: 0;
                left:0;
                width:100%;
                height:100%;
                transition: 0.4s;
            }

            .pic:hover::after{
                height:100%;
            }

            .pic:hover::before{
                margin-top: 0px;
                opacity: 1;
            }

            .heading h1{
                text-align: center;
                width:560px;
                background-color: #04AA6D;
                margin:auto;
                color:white;
                padding:10px 0px 10px 0px ;
                border-radius: 10px;
            }
            .photographer{

                background-color: #f2f2f2;
                border:2px solid black;
                border-radius: 10px;
                width:800px;
                margin:auto;
                width:560px;
            }

            .photographer .input{
                text-align: left;
            }

        </style>
    </head>
    <body>

        <div class="banner">
            <?php
            include('includes/header.php');
            ?> 


            <div class="content">

            </div>

            <div class="container">
                <h1>Equipment</h1>

                <div class="equipment">
                    <div class="pic camera">
                        <img src="image/camera.jpg">
                    </div>

                    <div class=" pic lighting">
                        <img src="image/lightingPhotography.jpg">
                    </div>

                    <div class=" pic whitescreen">
                        <img src="image/whitescreen.jpg">
                    </div>   
                </div>
            </div>

            <div class="heading">
                <br>
                <br>
                <br>
                <br>
                <h1>Photographer</h1>
            </div>
            <?php
            $con = new mysqli('localhost', 'root', '', 'assignment');

            if ($con->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM photographer"; // query
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    printf('

                       <div class="photographer">
                        <table>
                       <tr>
                       
                        <div class="input">
                            <label for="name">Name:</label>
                            <p>%s</p>
                        </div><br>

                        <div class="input">
                            <label for="email">Email:</label>
                           <p>%s</p>
                        </div><br>

                        <div class="input">
                            <label for="Phone">Phone:</label>
                            <p>%s</p>
                        </div><br>
                        
                        </tr>
                       </table>
                       </div>',
                            $row->Name,
                            $row->Email,
                            $row->Phone,
                    );
                }
            }
            printf('
               ',
                    $result->num_rows);
            $result->free();
            $con->close();
            ?>
        </div>
    </div>
    <div class="book">
        <a href="rentalEquipment.php" id="equipment">Rent equipment now</a>
        <a href="appointment.php" id="appointment">Book appointment now</a>
    </div>

    <?php
    include('includes/footer.php');
    ?>
</body>
</html>
