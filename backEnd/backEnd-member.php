<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Page Member Edit</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="MemberEdit.css">
    </head>

    <style>
        body {
            background-image:url(../image/background.jpg);
            width: 100%;   
            height: auto;
            background-repeat:no-repeat;
            -moz-background-size:100% 100%;  
            background-size:cover; 
        }

        table {
            margin-left: 30px;
            border-collapse: collapse;
            border:3px solid black;
            font-family: Futura, Arial, sans-serif;  
        }

        caption {
            font-size: 25px;
            margin: 1em auto;
            margin-top:0px;
            margin-bottom:0px;
        }

        .box{
            width:20px;
            height:20px;

        }

        thead{
            color:#333333;
        }
        th{
            background-color: #04AA6D;
        }
        th,td {
            padding: .65em;
        }

        th,td {
            border-bottom: 1px solid #ddd;
            border-top: 1px solid #ddd;
            text-align: center;
        }

        tbody tr:nth-child(odd) {
            background: #ccc;
        }

        button {
            padding: 10px 18px;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete{
            background: #ff7373;
            padding: 10px 18px;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit{
            background: #6666ff;
            padding: 10px 18px;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;

        }

        .delete:active  {
            background: #ff3333;
        }

        .edit:active  {
            background: #3333d6;
        }

        .last{
            margin-right: 10px;
        }

        .error{
            border:1px solid red;
            background-color:#ffbfbf;
            color:#7a1400;
        }

        .info{
            border:1px solid green;
            background-color:#e6ffe6;
            color:#084a08;
        }

        .word{
            display: inline;
        }

        .link{
            color:black;
            width:20px;
            height:20px;
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
        <form action="" method="post">

            <?php
            require_once('../includes/helper_Han2.php');

            if (isset($_POST['delete'])) {
                $checked = $_POST['checked'];

                if (!empty($checked)) {

                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                    foreach ($checked as $value) {
                        $escaped[] = $con->real_escape_string($value);
                    }

                    $sql = "DELETE FROM memberlist WHERE StudentID IN ('" .
                            implode("','", $escaped) . "')";

                    if ($con->query($sql)) {
                        printf('
                                <div class="info">
                                <strong>%d</strong> record(s) has been deleted.
                                </div>', $con->affected_rows);
                    }

                    $con->close();
                } else {
                    echo '
                          <div class="error">
                          Opps. Record not select. Please select record first.
                          </div>';
                }
            }
            ?>
            <table>
                <caption>Member List</caption>
                <?php
                $headers = array(
                    'StudentID ' => 'Student ID',
                    'Name' => 'Name',
                    'Gender' => 'Gender',
                    'Phone' => 'Phone',
                    'Address' => 'Address',
                    'Email' => 'Email',
                    'Position' => 'Position'
                );

                if (!isset($_GET['sort'])) {
                    $sort = 'StudentID';
                } else {
                    $sort = (array_key_exists($_GET['sort'], $headers) ? $_GET['sort'] : 'StudentID');
                }

                if (!isset($_GET['order'])) {
                    $order = 'ASC';
                } else {
                    $order = ($_GET['order'] == 'DESC' ? 'DESC' : 'ASC');
                }


                echo "<tr>";
                echo "<th>&nbsp;</th>";
                foreach ($headers as $key => $value) {
                    if ($key == $sort) {
                        printf('
                                <th>
                                <a class="link" href="?sort=%s&order=%s">%s</a>
                                <p class="word" >*</p>
                                </th>',
                                $key,
                                $order == 'ASC' ? 'DESC' : 'ASC',
                                $value);
                    } else {
                        printf('
                                <th>
                                <a class="link" href="?sort=%s&order=ASC">%s</a>
                                </th>',
                                $key,
                                $value);
                    }
                }
                echo "<th>&nbsp;</th>";
                echo "<th>&nbsp;</th>";

                echo "</tr>";

                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                $sql = "SELECT * FROM memberlist ORDER BY $sort $order";

                if ($result = $con->query($sql)) {
                    while ($row = $result->fetch_object()) {
                        printf('
                        <tr>
                        <td><input class="box" type="checkbox" name="checked[]" value="%s" /></td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <input class="edit" type="button" value="Edit"
                            onclick="location=\'backEnd-memberEdit.php?STid=%s\'" />
                        </td>
                        <td>
                            <input class="delete" type="button" value="Delete"
                            onclick="location=\'backEnd-memberDelete.php?STid=%s\'" />
                        </td>
                        </tr>',
                                $row->StudentID,
                                $row->StudentID,
                                $row->Name,
                                $GENDERS[$row->Gender],
                                $row->Phone,
                                $row->Address,
                                $row->Email,
                                $row->Position,
                                $row->StudentID,
                                $row->StudentID);
                    }
                }
                printf('
                <tr>
                <td colspan="4">
                        %d record(s) returned.
                        [ <a href="../SignUp.php">Insert Student</a> ]
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2">
                        <input class="delete" type="submit" name="delete" value="Delete Checked"
                        onclick="return confirm(\'This will delete all checked records.\nAre you sure?\')" />
                </td>
                </tr>',
                        $result->num_rows);

                $result->free();
                $con->close();
                ?>
            </table>
        </form>
    </body>
</html>