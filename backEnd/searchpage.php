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

/* Search box */
         button[type=submit] {
                background-color: #04AA6D;
                color: white;
                padding: 14px 24px;             
                border: none;
                border-radius: 4px;
                cursor: pointer;           
            }
            
                input[type=text] {
                width: 50%;
                padding: 12px;
                border-radius: 4px;
                margin-left: 400px;             
                border:2px solid #009688;
            }

            .tables{
                margin-top: 20px;
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
                                                     
                                    <div class="card-header">
                                        <h4>Search box & filter data  </h4>
                                    </div>
                                                <form action="" method="GET">
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                               echo $_GET['search']; } ?>"
                                                              class="form-control" placeholder="Search data">
                                                        <button type="submit" class="btn btn-primary">Search</button>
                                                    </div>
                                                </form>

                                        
                           

                            <div class="col-md-12">                                
                                    <div class="card-body">
                                        <table class="tables">
                                            <thead>
                                                <tr>
                                                    <th>StudentID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $con = mysqli_connect("localhost", "root", "", "assignment");

                                                if (isset($_GET['search'])) {
                                                    $filtervalues = $_GET['search'];
                                                    $query = "SELECT * FROM register WHERE CONCAT(FirstName,LastName,Email) LIKE '%$filtervalues%' ";
                                                    $query_run = mysqli_query($con, $query);

                                                    if (mysqli_num_rows($query_run) > 0) {
                                                        foreach ($query_run as $items) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $items['StudId']; ?></td>
                                                                <td><?= $items['FirstName']; ?></td>
                                                                <td><?= $items['LastName']; ?></td>
                                                                <td><?= $items['Email']; ?></td>
                                                            </tr>
                                                                <?php
                                                              }
                                                             } else {
                                                           ?>
                                                        <tr>
                                                            <td colspan="4">No Record Found</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>                           
                        </div>
                    

                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</div>
    </body>
</html>

       

