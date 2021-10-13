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
                background-image:url(../image/background.jpg);
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

            .tables{
                margin-left: auto;
                margin-right: auto; 
            }
            table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 75%;
                border: 3px  solid black;
            }
            th{
                background-color: #04AA6D;
            }
            th, td {
                text-align: left;
                padding: 14px;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            .container{
                margin-left: auto;
                margin-right: auto; 


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

            <div class="table">
                <h3><span style=" text-align: center;">Registration Student List</span></h3>
                <table border="1" cellpadding="5" cellspacing="0" class="tables">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Student Id</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Beginner</th>
                        <th></th>

                    </tr>
                    <?php
                    require_once('../includes/helper.php');




                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    $sql = "SELECT * FROM register "; // query

                    if ($result = $con->query($sql)) {
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
                          <td>
                          <a href="../backEnd/editregistration.php?id=%s"><span style="color:#009688;font-weight:bold; text-decoration: none;">Edit</span></a> |
                          <a href="../backEnd/deleteregistration.php?id=%s"><span style="color:#009688;font-weight:bold; text-decoration: none;">Delete</span></a>
                        </td>
                        </tr>',
                                    $row->FirstName,
                                    $row->LastName,
                                    $row->StudId,
                                    $row->Email,
                                    $row->Phone,
                                    $row->Subject,
                                    $row->Choose,
                                    $row->StudId, // <-- Query string.
                                    $row->StudId
                            );
                        }
                    }
                    printf('
                <tr>
                <td colspan="7">
                    %d record(s) returned.
            ]
                </td>
                </tr>',
                            $result->num_rows); //count the row of number
                    $result->free();
                    $con->close();
                    ?>
                </table>
            </div>         
    </body>
</html>

