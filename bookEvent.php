<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <title>Book Event</title>
        <style>
             body {
            background-image: url(image/background.jpg);
                    background-size: cover;
            background-position: center;
            background-attachment: fixed; 
        }
            .content {
                max-width: 500px;
                margin: auto;
            }
            .admin {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            .admin thead tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
            }

            .admin th,
            .admin td {
                padding: 12px 15px;
                text-align: center;
            }

            .admin tbody tr {
                border-bottom: 1px solid #dddddd;
            }


            .admin tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
            }

            .error, .info
            {
                padding: 5px;
                margin: 5px;
                font-size: 0.9em;
                list-style-position: inside;
            }

            .error
            {
                border: 2px solid #FBC2C4;
                background-color: #FBE3E4;
                color: #8A1F11;
            }

            .info
            {
                border: 2px solid #92CAE4;
                background-color: #D5EDF8;
                color: #205791;
            }

            .submit{
                background-color: #009879;
                color: #ffffff;
                text-align: center;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
    
                        .button{
                background-color: #009879;
                color: #ffffff;
                text-align: center;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <?php
          require_once('includes/header.php');
        if (isset($_POST['submit'])) {
            $to = $_POST['to'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $headers = "From: Book Event";

            $return = mail($to, $subject, $message, $headers);

            if ($return) {
                echo '<div class="info">
                Email sent out.
                </div>';
            } else {
                echo '<div class="error">
                    Email unable to send out.
                    </div>';
            }
        } else {
            $to = '';
            $subject = '';
            $message = '';
        }
        ?>
        <div class="content">
        <table class="admin">
            <thead>
                <tr>
                    <th colspan="2">Admin List</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chia Yang Han</td>
                    <td>chiayh-wm20@student.tarc.edu.my</td>
                </tr>
                <tr>
                    <td>Tan Chin Yung</td>
                    <td>tanchinyung-wm20@student.tarc.edu.my</td>
                </tr>
                <tr>
                    <td>Lee Pui Yin</td>
                    <td>leepy-wm20@student.tarc.edu.my</td>
                </tr>
                <tr>
                    <td>Tan Hoe Zhun</td>
                    <td>tanhz-wm20@student.tarc.edu.my</td>
                </tr>
            </tbody>
        </table>
        <h1>Send email to book event</h1>
        <form action="" method="post">
            <table cellspacing="10">
                <tr>
                    <td>To:</td>
                    <td><input type="text" name="to" value="<?php echo $to ?>" style="width: 300px" /></td>
                </tr>
                <tr>
                    <td>Subject:</td>
                    <td><input type="text" name="subject" value="<?php echo $subject ?>" style="width: 300px" /></td>
                </tr>
                <tr>
                    <td valign="top">Message:</td>
                    <td><textarea name="message" style="width: 300px; height: 200px"><?php echo $message ?></textarea></td>
                </tr>
            </table>
            <input class="submit" type="submit" name="submit" value="Send Email" />
        </form>
        <a href="eventList.php"><button class="button">Cancel</button></a>
        </div>
                      <?php
require_once('includes/footer.php');
              ?>

