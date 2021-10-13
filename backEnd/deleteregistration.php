<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    
    <style>
        *{
            margin:0;
            padding:0;
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
                font-size: 20px;
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
        body{
            background-image: url(../image/background.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 100%;
            height:100%;
            font-family:sans-serif;
        }

         .regform{
                margin-top:5px;
                margin-left:15px;
                width:800px;
               background-color: #04AA6D;
                color:white;
                padding:10px 0px 10px 0px ;
                border-radius: 10px;
                text-align:center;
            }  
        .form_box{
                background-color: #f2f2f2;
                border:2px solid black;
                border-radius: 10px;
                width:820px;
                margin:auto;
               
            }
           table {
               margin:10px;
                 border-collapse: collapse;
                border: 1px solid #f2f2f2;
                 border-spacing: 0;
                 width: 90%;
            }
            
           tr, td{
                border-collapse: collapse;
                font-size: 20px;
                 padding: 15px;                        
            }
             input[type=submit] {
                background-color: #04AA6D;
                position: absolute;
                top: 650px;
                left: 366px;
                color: white;
                padding: 14px 24px;             
                border: none;
                border-radius: 4px;
                cursor: pointer;           
            }
             input[type=button] {
                background-color: #04AA6D;
                position: absolute;
                top: 650px;
                left: 466px;
                color: white;
                padding: 14px 24px;             
                border: none;
                border-radius: 4px;
                cursor: pointer;           
            }

    </style>
    <body>
        
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
        
<?php
    require_once('../includes/helper.php');
    
    // --> Retrieve Student record based on the passed StudentID.
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $id = strtoupper(trim($_GET['id']));

        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $id  = $con->real_escape_string($id);
        $sql = "SELECT * FROM register WHERE StudId = '$id'";

        $result = $con->query($sql);
        if ($row = $result->fetch_object())
        {
             $firstname   =$row->FirstName;
            $lastname    =$row->LastName;
            $id          =$row->StudId ;
            $email       =$row->Email;
            $phone       =$row->Phone;
            $subject     =$row->Subject;
            $choose      =$row->Choose;
            
            printf('
                <div class="form_box">
                 <div class="regform">   <h1>Delete Student</h1></div>
                
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr>
                        <td>First Name :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Last Name :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>StudId :</td>
                        <td>%s</td>
                    </tr>
                     <tr>
                        <td>Email :</td>
                        <td>%s</td>
                    </tr>
                     <tr>
                        <td>Phone :</td>
                        <td>%s</td>
                    </tr>
                     <tr>
                        <td>Subject :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Beginner :</td>
                        <td>%s</td>
                    </tr>
                
                <form action="" method="post">
                    <input type="hidden" name="id" value="%s" />
                    <input type="hidden" name="firstname" value="%s" />
                    <input type="submit" name="yes" value="Yes" />
                    <input type="button" value="Cancel"
                           onclick="location=\'registrationStudent-list.php\'" />
                </form>
                
                     </table>
                </div>',
                $firstname, $lastname, $id, $email,$phone,$subject,$choose,
                $id, $firstname);
        }
        else
        {
            echo '
                <div class="error">
                Opps. Record not found.
                [ <a href="registrationStudent-list.php">Back to list</a> ]
                </div>
                ';
        }
        
        $result->free();
        $con->close();
        ///////////////////////////////////////////////////////////////////////
    }
    // POST METHOD ////////////////////////////////////////////////////////////
    // --> Update the record.   
    else
    {
        $id   = strtoupper(trim($_POST['id']));
         $lastname = trim($_POST['lastname']);

        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
     
        
        $sql = '
            DELETE FROM register
            WHERE StudId = ?
        ';
        $stm = $con->prepare($sql);
        $stm->bind_param('s', $id);
        $stm->execute();

        if ($stm->affected_rows > 0)
        {
            printf('
                <div class="info">
                Student <strong>  %s</strong> has been deleted.
                [ <a href="registrationStudent-list.php">Back to list</a> ]
                </div>'
               ,$lastname);
        }
        else
        {
            echo '
                <div class="error">
                Opps. Database issue. Record not deleted.
                </div>
                ';
        }

        $stm->close();
        $con->close();
    }
    ?>
  
</div>
</body>
<!-- End of content -->



