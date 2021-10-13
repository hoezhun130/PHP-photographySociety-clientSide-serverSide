<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style> 

            .banner{
                  background-image: url(image/fourtpage.jpeg);
                  background-repeat: no-repeat;
                  background-size: cover;
                  background-position: center;
                  width: 100%;
                  height:100%;
                  
                  text-align: center;

            }
            /*content*/
            .container {
                display:inline-block;
                background-color: white;
                float:left;
                position: relative;
                font-family: Arial;
                border:5px   solid #009688;
                 box-shadow: 10px 10px white;
                 border-radius: 5px;
                border-style: inset;
                padding:15px;
                width: 300px;
                 height:300px;
                margin: 10px;
            }

            .overlay {
                position: absolute; 
                top: 8px;
                left: 10px;
                background: rgb(0, 0, 0);
                background: rgba(0, 0, 0, 0.5); /* Black see-through */
                color: #f1f1f1; 
                width: 300px;
                transition: .5s ease;
                opacity:0;
                color: white;
                font-size: 20px;
                padding: 10px;
                float:left;
                text-align: center;
            }

            .container:hover .overlay {
                opacity: 1;
            }

        </style>
    </head>
    <Body>

        <div class="banner">
            <?php
            include('includes/header.php');
            ?> 
           <div class="lesson">
            <h2>Welcome</h2>
            <p>Our Tarc Photography Society E-learning course</p>
            <a href="registerForm.php"><h2><span style="color:black;font-weight:bold;text-decoration:none">Click me for registration</span> </h2></a>
            <br>
            <div class="container">
                <a href="includes/description.php" id="bottle" ><img src="image/secondpage.jpeg" alt="bottle" style="width: 300px;   height:300px; " class="thumbnails" /></a>
                <div class="overlay">
                    <p>Photography</p>
                </div>
            </div>
            
            <div class="container">
                <a href="includes/description2.php" id="bottle" ><img src="image/videoediting.jpg" alt="bottle" style="width: 300px;   height:300px; " class="thumbnails" /></a>
                <div class="overlay">
                    <p>Video Editing</p>
                </div>
            </div>
            
            <div class="container">
                <a href="includes/description.php" id="bottle" ><img src="image/photoshop.PNG" alt="bottle" style="width: 300px;   height:300px; " class="thumbnails" /></a>
                <div class="overlay">
                    <p>Photoshop</p>
                </div>
            </div>
            
            <div class="container">
                <a href="includes/description.php" id="bottle" ><img src="image/advertising.PNG" alt="bottle" style="width: 300px;   height:300px; " class="thumbnails" /></a>
                <div class="overlay">
                    <p>Advertising </p>
                </div>
            </div>
              
           </div>
            

        </div>


        <?php
        include('includes/footer.php');
        ?>
