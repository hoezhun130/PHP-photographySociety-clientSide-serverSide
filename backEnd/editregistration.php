<?php
require_once("../includes/helper.php");

function detectError() {
    // Use the global variables.
    global $firstname, $lastname,$id, $phone, $subject, $email, $choose;

    // For holding error messages.
    $error = array();



    // firstname ///////////////////////////////////////////////////////////////////
    if ($firstname == null) {
        $error["firstname"] = 'Please enter your<strong>First Name</strong>.';
    } else if (strlen($firstname) > 20) { // Prevent hacks.
        $error["firstname"] = '<strong>First Name</strong> must not more than 20 letters.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $firstname)) {
        $error["firstname"] = 'There are invalid letters in <strong>First Name</strong>.';
    }
    //lastname//////
    if ($lastname == null) {
        $error["lastname"] = 'Please enter your <strong>Last  Name</strong>.';
    } else if (strlen($lastname) > 20) { // Prevent hacks.
        $error["lastname"] = '<strong>Last Name</strong> must not more than 20 letters.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $lastname)) {
        $error["lastname"] = 'There are invalid letters in <strong>Last Name</strong>.';
    } else if ($firstname == $lastname) {
        $error["lastname"] = 'The <strong>First Name</strong> and <strong>Last Name</strong> cant be same';
    }
    //id ///////////////////////////
      if ($id == null) {
        $error["id"] = 'Please enter your <strong>id</strong>.';
    }else if (!preg_match('/^\d{2}[A-Z]{3}\d{5}$/', $id)){
        $error['id']='Invalid format';
    }else if (isStudentIDExist($id)){
        $error["id"] =  '<strong>Student ID</strong> given already exist. Try another.';
    }
    
    // email //////////////////////////////////////////////////////////////////
    if ($email == null) {
        $error["email"] = 'Please enter <strong>Email Address</strong>.';
    } else if (!preg_match('/^[a-zA-Z0-9.-]+@[a-z]{4}.[a-z]{3}.[a-z]{2}$/', $email)) { // Prevent hacks.
        $error["email"] = '<strong>Email Address</strong> is invalid format.Format:xxxxxx-wm20@student.tarc.edu.my';
    }

    //Phone////
    if ($phone == null) {
        $error["phone"] = 'Please enter a <strong>Phone Number</strong>.';
    } else if (!preg_match('/^[0-9]{3}-[0-9]{7}/', $phone)) {
        $error["phone"] = '<strong>Phone Number</strong> is of invalid format.';
    }

    // option /////////////////////////////////////////////////////////////////
    if ($choose == null) {
        $error["choose"] = 'Please select  the <strong>Button</strong>.';
    }



    // subject//////////////////////////////////////////////////////////////////
    if ($subject == null) {
        $error["subject"] = 'Please select a <strong>Subject </strong> you like.';
    }


    return $error;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    《<style>
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
            height:auto;
            font-family:sans-serif;
        }

        .regform{
            margin-top:15px;
                margin-left:15px;
                width:760px;
               background-color: #04AA6D;
                color:white;
                padding:10px 0px 10px 0px ;
                border-radius: 10px;
                text-align:center;
        }  
        .main{
            background-color: #f2f2f2;
            border-radius: 10px;
            width:800px;
            margin-bottom: 10px;
           margin-left: 350px;
        }

        form{
            padding:10px;
        } 

        #name{
            width:100%;
            height:100px;

        }  
        .name{
            margin-left:25px;
            margin-top:30px;
            width: 100px;
            color: black;
            font-size: 18px;
            
        }

        .firstname{
            position: relative;
            left:200px;
            top:-37px;
            line-height: 40px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;

        }
        .lastname{
            position: relative;
            left:417px;
            top:-80px;
            line-height: 40px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color:#555;       
        }  
        .firstlabel{
            position:relative;
            color:black;    
            text-transform: capitalize;
            font-size: 14px;
            left:203px;
            top:-45px;
        }   
        .lastlabel{
            position:relative;
            color:black;
            text-transform:capitalize;
            font-size:14px;
            left:492px;
            top:-76px;
        } 

        .email{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 40px;
            width:480px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;  
        }     

        .id{
            position:relative;
            margin-top:5px;
            left:200px;
            top:-37px;
            line-height: 40px;
            width:255px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 22px;
            color:black; 
        }
        .number{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 40px;
            width:255px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555; 
        }


        .option{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 20px;
            width:532px;
            height:40px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555; 
            outline:none;
            overflow:hidden;
        }    
        .option option{
            font-size:20px;
        }
        #Student{
            margin-left:25px;
            color:black;
            font-size:18px;
        } 
        .radio{
            display:inline-block;
            padding-right:70px;
            font-size:25px;
            margin-left:25px;
            color:black;
        }
        .radio input{
            width:20px;
            height:20px;
            border-radius:50%;
            cursor:pointer;
            outline:none;
        } 
        button{
            background-color: #04AA6D;
            color: white;
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left:20px;
            display: block;
        } 
        button:hover{
            background-color:#5390F5;
        }  
    </style>

    <body>

<?php

$firstname = '';
$lastname = '';
$id='';
$email = '';
$phone = '';
$subject = '';
$choose = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        // http://localhost/Practical5/edit-student.php?id=10abc00003
        // Read query string --> StudentID.
        $id = strtoupper(trim($_GET['id']));

        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $id  = $con->real_escape_string($id); // escape those character that sensitive in sql query statement
        $sql = "SELECT * FROM register WHERE StudId = '$id'";
//
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
        }
        else
        {
            echo '
                <div class="error">
                Opps. Record not found.
                [ <a href="list-student.php">Back to list</a> ]
                </div>
                ';

            $hideForm = true; // Flag, "true" to hide the form.
        }

        $result->free();
        $con->close();
    }


else{
    $firstname = (trim($_POST['firstname']));
    $lastname = trim($_POST['lastname']);
    $id = trim($_POST['id']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    /* $subject   = trim($_POST['subject']); */

    if (isset($_POST['subject'])) {
        $subject = trim($_POST['subject']);
    } else {
        $choose = '';
    }

    if (isset($_POST['choose'])) {
        $choose = trim($_POST['choose']);
    } else {
        $choose = '';
    }


    //validation 
    $error = detectError();

    if (empty($error)) {
       
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sql = '
                        UPDATE register SET FirstName=?, LastName=?,  Email=?, Phone=?, Subject=? ,Choose=?
                        WHERE StudId= ?
                        
                    ';
        $stm = $con->prepare($sql);
        $stm->bind_param('sssssss', $firstname, $lastname,$email, $phone,$subject,$choose, $id);
        $stm->execute();
        if ($stm->affected_rows > 0) {
          printf('
                        <div class="info">
                        Hi, <strong>%s %s</strong>, your registration have been <strong>Update </strong> successful.                  
                        </div>',
                        $firstname,$lastname);          
        }
        else
            {
                echo '
                    <div class="error">
                    Opps. Database issue. Record not updated.
                    </div>
                    ';
            }

            $stm->close();
            $con->close();
    } else {
        echo '<ul class="error">';
        foreach ($error as $value) {
            echo "<li>$value</li>";
        }
        echo '</ul>';
    }
}
?>
           
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
           
        <div class="main">
          <div class="regform">
            <h1>Edit Student Information Form</h1>
        </div>
            <form method="POST" >
                <div id="name">
                    <h2 class="name">Name </h2>
                    <input class="firstname" type="text" name="firstname" ><br>
                    <label class="firstlabel">first name</label>
                    <input class="lastname" type="text" name="lastname" ><br>
                    <label class="lastlabel">last name</label>
                </div>

                <h2 class="name"> <label for="id">Student ID </label></h2>
                <div class="id">
                  <?php echo $id ?>
                    <?php htmlInputHidden('id', $id) // Hidden field. ?>
                </div>



                <h2 class="name">
                    Email</h2>
               <input class="email" type="email" name="email">
                
                <h2 class="name">
                    Phone</h2>
                <input class="number" type="text" name="phone">

    
               

                <h2 class="name">
                    Subject</h2>
                <select class="option" name="subject" >
                    <option disabled="disabled" selected="selected">--Choose option--</option>
                    <option  value="Photography">Photography</option>
                    <option  value="Video Editing">Video Editing</option>
                    <option value="Photoshop">Photoshop</option>
                    <option  value="Advertising">Advertising</option>
                </select>

                <h2 id="Student">
                    Are you beginner?</h2>
                <div class="radio">
                    <input class="radio-one" type="radio"  name="choose"  value="Yes" id="Yes">
                    Yes
                    <input class="radio-two" type="radio" name="choose"  value="No"  id="No" >
                    No
                </div>

                <button type="submit" name="insert" >Register</button>


            </form>
        </div>
    </body>
</html>




