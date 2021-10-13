<!DOCTYPE html>
<html>  
    <head>
        <meta charset="utf-8">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                font-family: 'Nunito', sans-serif;
                color: #384047;
                background-image: url(image/login.jpg);
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }

            .form{
                max-width: 300px;
                margin: 10px auto;
                padding: 10px 20px;
                background: #f4f7f8;
                border-radius: 8px;
            }

            h1{
                margin: 0 0 30px 0;
                text-align: center;
            }

            .title,select{
                border: none;
                font-size: 16px;
                height: auto;
                margin: 0;
                outline: 0;
                padding: 15px;
                width: 90%;
                background-color: #e8eeef;
                resize:none;
                margin-bottom:0px;
                border-radius: 4px;
            }

            input[type="radio"]{
                margin: 0 4px 8px 0;
            }

            select{
                padding: 6px;
                height: 32px;
                border-radius: 2px;
            }

            .done {
                color: #0099CC; 
                background: transparent; 
                width: 100%;
                border-radius: 5px; 
                border: none;
                padding: 19px 39px 18px 39px;
                text-align: center;
                display: inline-block;
                font-size: 18px;
                margin-bottom: 10px;
                -webkit-transition-duration: 0.4s;
                transition-duration: 0.4s;
                cursor: pointer;
                text-decoration: none;
                text-transform: uppercase;
            }

            .done {
                color: black; 
                border: 2px solid #00b1b1;
            }

            .done:hover {
                background-color: #00b1b1;
                color: white;
            }

            fieldset{
                margin-bottom: 30px;
                border: none;
            }

            legend{
                font-size: 1.4em;
                margin-bottom: 10px;
            }

            label{
                display: block;
                margin-bottom: 8px;
            }

            label.Gline{
                font-weight: 300;
                display: inline;
            }

            .number{
                background-color: #00b1b1;
                color: #fff;
                height: 30px;
                width: 30px;
                display: inline-block;
                font-size: 0.8em;
                margin-right: 4px;
                line-height: 30px;
                text-align: center;
                border-radius: 100%;
            }
            
            .form-control{
                color:black;
                margin-left: 20px;
                line-height:15px;
                padding:10px 86px;
                border:5px solid #009688;
            }

            @media screen and (min-width: 480px){
                .form{
                    max-width: 480px;
                }

                .wrong{
                    background-color:#ffcccc;
                    color:#ad1400 ;
                    border:1px solid #ffa8a8;
                    padding:5px;
                    padding-left: 14px;
                }
                
                
            }

        </style>
    </head>
    <body>

        <?php
        require_once("includes/header.php");
        require_once('includes/helper_Han.php');

        if (isset($_POST['submit'])) {
            $status = "Member of Photography Society";
        }
        ?>

        <form action="" method="post" class="form">

            <h1>Sign Up</h1>
            <?php successful(); ?>

            <fieldset> 
                <legend><span class="number">1</span>Your basic Info</legend>
                <label for="name"><b>Name:</b></label>
                <input class="title" style="margin-bottom:0px;" type="text" name="user_name" id="Uname" placeholder="Enter Name" maxlength="30" required>
                <?php name(); ?>
                <br><br>

                <label for="gender"><b>Gender:</b></label>
                <input type="radio" name="user_gender" id="Male" value="M"/>
                <label for="ML" class="Gline">MALE</label><br>
                <input type="radio" name="user_gender" id="Female" value="F"/>
                <label for="FM" class="Gline">FEMALE</label><br>
                <?php gender(); ?>
                <br>

                <label for="phone"><b>Phone:</b></label>
                <input class="title" type="tel" name="user_phone" id="phone" placeholder="Enter Phone Number" required>
                <?php phone(); ?>
                <br><br>
                
                <label for="address"><b>Address:</b></label>
                <textarea class="title" id="adds" name="user_adds" placeholder="Enter Address" maxlength="60" required></textarea>
                <?php aDDRESS(); ?>
            </fieldset>

            <fieldset>
                <legend><span class="number">2</span>Your School Info</legend>
                <label for="studentID"><b>Student ID:</b></label>
                <input class="title" type="text" name="user_studentId" id="studentId" placeholder= "Enter Student ID" maxlength="10" style="text-transform:uppercase;" required />
                <?php studentid(); ?>
                <br><br>

                <label for="email"><b>School Email:</b></label>
                <input class="title" type="email" name="user_email" id="email" placeholder="Enter Email" required>
                <?php email(); ?>
                <br><br>
            </fieldset>

            <fieldset>
                <legend><span class="number">3</span>Your Password</legend>
                <label for="psw"><b>Password:</b></label>
                <input class="title" type="password" name="user_psw" id="psw" placeholder="Enter Password" minlength="6" maxlength="15" required>
                <?php password(); ?>
                <br><br>

                <label for="passw"><b>Confirm Password:</b></label>
                <input class="title" type="password" name="conf_psw" id="passw" placeholder="Enter Again Password" minlength="6" maxlength="15" required>
                <?php confirm(); ?>
                <br><br>
            </fieldset>
            <input type="submit" name="submit" class="done" value="Sign Up"><br>
        </form>

        <?php require_once("includes/footer.php"); ?>