<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Event List</title>
        <style>
            .event {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            .event thead tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
            }

            .event th,
            .event td {
                padding: 12px 15px;
            }

            .event tbody tr {
                border-bottom: 1px solid #dddddd;
            }


            .event tbody tr:last-of-type {
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

            .event .action{
                text-align: center;
            }
            
             body{
                width: 100%;
                height:auto;
                background-image:url(../image/background.jpg);
                background-attachment:fixed;
                background-size:100% 100%;
                background-repeat:repeat;

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
         </div>
        <?php
        $headers = array(
            'Title' => 'Event Title',
            'Day' => 'Day',
            'Month' => 'Month',
            'Price' => 'Price',
            'Des' => 'Description',
            'Seat' => 'Seat'
        );

        if (!isset($_GET['sort'])) {
            $sort = 'Title';
            $sort = 'Day';
        } else {
            $sort = (array_key_exists($_GET['sort'], $headers) ? $_GET['sort'] : 'Title');
        }
        if (!isset($_GET['order'])) {
            $order = 'ASC';
        } else {
            $order = ($_GET['order'] == 'DESC' ? 'DESC' : 'ASC');
        }
        ?>

        <div>
            <h1>Event List</h1>

            <?php
            require_once('../includes/helper2.php');

            // Database select
            echo '<table class="event">';
            echo '<thead>';
            echo '<tr>';
            foreach ($headers as $key => $value) {
                if ($key == $sort) {
                    printf('
                <th>
                <a href="?sort=%s&order=%s">%s</a>
                <img src="../images/%s" alt="%s" />
                </th>',
                            $key,
                            $order == 'ASC' ? 'DESC' : 'ASC', // To retain filter.
                            $value,
                            $order == 'ASC' ? 'asc.png' : 'desc.png', // Image.
                            $order == 'ASC' ? 'Ascending' : 'Descending'); // Alt text.
                } else {
                    printf('
                <th>
                <a href="?sort=%s&order=ASC">%s</a>
                </th>',
                            $key,
                            $value);
                }
            }
            echo'<th colspan="2" class="action">Action</th>';
            echo'</tr>';
            echo'</thead>';

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // SQL with WHERE and ORDER BY clause.
           $sql = "SELECT * FROM event ORDER BY $sort $order";
            echo'<tbody>';
            if ($result = $con->query($sql)) {
                while ($row = $result->fetch_object()) {
                    printf('
                <tr>
                <td>%s</td>
                <td>%d</td>
                <td>%s</td>
                <td>%.2f</td>
                <td>%s</td>
                <td>%d</td>
                <td>
                <a href="editEvent.php?title=%s"><button class="button">Edit</button></a>
                </td>
                <td>
                <a href="deleteEvent.php?title=%s"><button class="button">Delete</button></a>
                </td>
                </tr>',
                            $row->Title,
                            $row->Day,
                            $row->Month,
                            $row->Price,
                            $row->Description,
                            $row->Seat,
                            $row->Title,
                            $row->Title
                    );
                }
            }
            echo'<tr>';
            echo'<td colspan="7">';
            printf('
            %d record(s) returned. <a href="createEvent.php"><button class="button">Create New Event</button></a> ', $result->num_rows);
            echo'</td>';
            echo'</tr>';
            echo'</tbody>';
            echo '</table>'; // Table ends.

            $result->free();
            $con->close();
            ?>
        </div>
    </body>
</html>
