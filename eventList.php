<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Event List</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .next {
                text-decoration: none;
                display: inline-block;
                padding: 8px 16px;
                margin-left: 1283px;
            }

            .next:hover {
                background-color: #585863;
                color: black;
            }

            .next {
                background-color: #303036;
                color: white;
            }

            h1{
                font-family:sans-serif;
                text-align: center;
            }

            .event-list > li time > .month {
                display: block;
                font-size: 18pt;
                font-weight: 900;
                line-height: 1;
            }

            .event-list > li .image {
                display: inline-block;
                width: 100%;
                color: rgb(255, 255, 255);
                background-color: rgb(197, 44, 102);
                text-align: center;
                text-transform: uppercase;
            }

            body {
                padding: 30px 0px;
                background-color: rgb(220, 220, 220);
                height: 200%;
            }

            .event-list {
                list-style: none;
                font-family: 'Lato', sans-serif;
                margin: 0px;
                padding: 0px;
            }

            .event-list > li {
                background-color: rgb(255, 255, 255);
                box-shadow: 0px 0px 5px rgb(51, 51, 51);
                box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.7);
                padding: 0px;
                margin: 0px 0px 20px;
            }

            .event-list > li > time {
                display: inline-block;
                width: 100%;
                color: rgb(255, 255, 255);
                background-color: rgb(197, 44, 102);
                padding: 5px;
                text-align: center;
                text-transform: uppercase;
            }

            .event-list > li:nth-child(even) > time {
                background-color: rgb(165, 82, 167);
            }

            .event-list > li > time > span {
                display: none;
            }

            .event-list > li > time > .day {
                display: block;
                font-size: 56pt;
                font-weight: 100;
                line-height: 1;
            }



            .event-list > li > img {
                width: 100%;
            }

            .event-list > li > .info {
                padding-top: 5px;
                text-align: left;
            }

            .event-list > li > .info > .title {
                font-size: 12pt;
                font-weight: 700;
                margin: 0px;
            }

            .event-list > li > .info > .desc {
                font-size: 10pt;
                font-weight: 300;
                margin: 0px;
                text-align: center;
                padding: 0px;
            }

            .event-list > li > .info > ul {
                display: table;
                list-style: none;
                margin: 10px 0px 0px;
                padding: 0px;
                width: 100%;
                text-align: center;
                text-decoration: none;
            }

            .event-list > li > .info > ul > li {
                display: table-cell;
                cursor: pointer;
                color: rgb(30, 30, 30);
                font-size: 11pt;
                font-weight: 300;
                padding: 3px 0px;
            }

            .event-list > li > .info > ul > li > a {
                display: block;
                width: 100%;
                color: rgb(30, 30, 30);
                text-decoration: none;
            } 



            .event-list > li > .info > ul > li:hover{
                color: rgb(30, 30, 30);
                background-color: rgb(200, 200, 200);
            }


            @media (min-width: 768px) {
                .event-list > li {
                    position: relative;
                    display: block;
                    width: 100%;
                    height: 120px;
                    padding: 0px;
                }

                .event-list > li > time,
                .event-list > li > img  {
                    display: inline-block;
                }

                .event-list > li > time,
                .event-list > li > img {
                    width: 120px;
                    float: left;
                }

                .event-list > li > .info {
                    background-color: rgb(245, 245, 245);
                    overflow: hidden;
                }

                .event-list > li > time,
                .event-list > li > img {
                    width: 120px;
                    height: 120px;
                    padding: 0px;
                    margin: 0px;
                }

                .event-list > li > .info {
                    position: relative;
                    height: 120px;
                    text-align: center;
                    padding-right: 40px;
                }

                .event-list > li > .info > .title, 
                .event-list > li > .info > .desc {
                    padding: 0px 10px;
                }

                .event-list > li > .info > ul {
                    position: absolute;
                    left: 0px;
                    bottom: 0px;
                }


                .button .block {
                    padding: 0px;
                    display: block;
                    width: 50%;
                    border: none;
                    background-color: #04AA6D;
                    padding: 10px 24px;
                    font-size: 16px;
                    cursor: pointer;
                    text-align: center;
                    border: 1px solid black;
                    float: left;
                }


                .button .block:after {
                    content: "";
                    clear: both;
                    display: table;
                }

                .button .block:not(:last-child) {
                    border-right: none; /* Prevent double borders */
                }

                /* Add a background color on hover */
                .button .block:hover {
                    background-color: #078255;
                }





            </style>
        </head>
        <Body>          

            <div class="banner">
                <?php
                require_once('includes/header.php');
                ?> 
                <div class="content">
                    <h1 >Event List</h1>
                    <form>
                        <div class="container">
                            <div class="row">
                                <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                                    <ul class="event-list">
                                        <li>
                                            <?php
                                            require_once('includes/helper2.php');

                                            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                            $sql = "SELECT * FROM event"; // query
                                            if ($result = $con->query($sql)) {
                                                while ($row = $result->fetch_object()) {
                                                    printf('
                                                 <a href="image.php"><button class="image" type="button">Click Here For Event Image</button></a>
                                                 <time>
                                        <span class="day">%d</span>
                                        <span class="month">%s</span>
                                        </time>
                                       
                                        <div class="info">
                                        <h2 class="title">%s</h2>
                                        <p class="desc">%s</P>
                                        </div>
                                        
                                        <div class="button">
                                        <a href="checkout.php?title=%s"><button type="button" class="block">RM%.2f</button></a>
                                        <a href="bookEvent.php?title=%s"><button type="button" class="block">Book(%d seat(s) left)</button></a>
                                        </div>
                                                        ',
                                                            $row->Day,
                                                            $row->Month,
                                                            $row->Title,
                                                            $row->Description,
                                                            $row->Title,
                                                            $row->Price,
                                                            $row->Title,
                                                            $row->Seat,
                                                    );
                                                }
                                            }
                                            $result->free();
                                            $con->close();
                                            ?>
                                        </li>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            require_once('includes/footer.php');
            ?>
              