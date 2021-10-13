<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Event Image</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                width: 100%;
                height:auto;
                background-image:url(image/background.jpg);
                background-attachment:fixed;
                background-size:100% 100%;
                background-repeat:repeat;
            }
            .image {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            .image thead tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
            }

            .image th,
            .image td {
                padding: 12px 15px;
            }

            .image tbody tr {
                border-bottom: 1px solid #dddddd;
            }


            .image tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
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
        require_once 'includes/header.php';
        echo'<table class="image">';
        echo'<thead>';
        echo'<tr>';
        echo'<th>Image Link</th>';
        echo'<th>🔼🔼Event Image🔼🔼</th>';
        echo'</tr>';
        echo'<thead>';

        echo'<tbody>';
        foreach (glob('uploads/*.{jpg,jpeg,gif,png}', GLOB_BRACE) as $file) {
            // Create clickable hyperlink.
            $basename = pathinfo($file, PATHINFO_BASENAME); // 4d5ab7475b8dc.jpg
            echo'<tr>';
            echo'<td>';
            printf('<a href="?image=%s" alt="">%s</a>', $basename, $basename);
            echo'</tr>';
            echo'</td>';
        }

        // Check if image is passed as query string.
        if (isset($_GET['image'])) {
            // Display the image.
            $image = $_GET['image'];
            printf('<img style="border: 1px solid gray;" src="uploads/%s" alt="" />', $image);

            // Form for deletion.
            printf('
                <div class="size">
                    <form action="%s" method="post">
                        <input type="hidden" name="image" value="%s" />
                    </form>
                    </div>', $_SERVER['PHP_SELF'], $image);
        }
        echo'<tbody>';
        echo'</table >';
        ?>
    </body>
    <a href="eventList.php"><button class="button">Back to Event List</button></a>
</html>

