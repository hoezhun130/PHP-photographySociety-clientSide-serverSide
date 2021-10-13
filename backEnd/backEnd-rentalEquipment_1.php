
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Rental Equipment Management</title>
        <style>
             .insertform{
                width:750px;
                background-color: #04AA6D;
                margin:auto;
                margin-bottom: 10px;
                color:white;
                padding:10px ;
                border-radius: 10px;
                text-align:center;
            }
            
            form{
                width:85%;
                color: rgb(0, 0, 0);
                margin: auto;
                padding:10px 20px 10px 10px;
                background-color: #f2f2f2;
                border:2px solid black;
                border-radius: 10px;
            }
            
            .footer .footer-content .footer-section .input[type=email],textarea{
                color:black;
                margin-left: 20px;
                line-height:15px;
                padding:10px 86px;
                border:5px solid #009688;
            }

            .footer input[type=text]{
                color:black;
                margin-left: 20px;
                line-height:10px;
                padding:10px 80px;
                border:5px solid #009688;
            }

            .footer input[type=email]{
                color:black;
                margin-left: 20px;
                line-height:15px;
                padding:10px 80px;
                border:5px solid #009688;
            }
            .footer input[type=submit] {
                background-color:#009688;
                color: white;
                padding: 5px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-left:20px;
                display: block;
            }

            h1{
                text-align: center;
            }
            table{
                margin: auto;
            }
            th{
                padding: 10px;
                background-color: #04AA6D;
            }
            td{
                padding:10px;
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


            
           <form action=""  method="post">
               <div class="insertform"><h1>Rent Equipment List</h1></div>
            <table border="1" cellspacing="0">
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Equipment</th>
                    <th>Quantity</th>
                </tr>

                <?php
                require_once('../includes/backEnd-appointment-equipment-helper.php');
                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                if ($con->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM equipment"; // query
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_object()) {
                        printf('
                        <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        </tr>',
                                $row->Name,
                                $row->Gender,
                                $row->Email,
                                $row->Phone,
                                $row->Date,
                                $row->Equipment,
                                $row->Quantity,
                                $row->Name);
                    }
                }
                printf('
                <tr>
                <td colspan="7">
                    %d record(s) returned.
                </td>
                </tr>',
                        $result->num_rows);
                $result->free();
                $con->close();
                ?>

            </table>
           </form>
        </div>
    </body>
</html>



            

           

           </div>
    </body>
</html>