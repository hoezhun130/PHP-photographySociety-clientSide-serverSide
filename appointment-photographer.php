<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <title>Online Booking Appointment or Renting Equipment</title>
        <style>
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
            <div class="heading">
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

        <?php
        include('includes/footer.php');
        ?>
    </body>
</html>



