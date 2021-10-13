<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body, html {
                height: 100%;
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }

            * {
                box-sizing: border-box;
            }

            .bg-image {
                background-image: url("../image/photographer.PNG");
                filter: blur(8px);
                -webkit-filter: blur(8px);
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }


            .bg-text {
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
                color: white;
                font-weight: bold;
                border: 3px solid #f1f1f1;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
                width: 80%;
                padding: 20px;
                text-align: center;
            }

            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }



            .col-25 {
                float: left;
                width: 30%;
                margin-top: 6px;
            }

            .col-75 {
                float: left;
                width: 70%;
                margin-top: 6px;

            }
        </style>
    </head>
    <body>

        <div class="bg-image"></div>

        <div class="bg-text">
            <h2>Welcome to my Class !!! </h2>
            

            <div class="table">
                <table border="1" cellpadding="5" cellspacing="0" class="tables">
                <?php
                
                  require_once('helper.php');                 
                      
                     
                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    $sql = "SELECT * FROM tutorial where Subject='Photography' "; // query
                    
                 if ($result = $con->query($sql)) {
                      while ($row = $result->fetch_object()) {
                          printf('
                              <h1 style="font-size:50px">Hi ,I am %s</h1>
                    <div class="col-25">
                       <label for="ename">Tutor Name</label>
                    </div>
                    <div class="col-75">
                        <P>%s</p>
                    </div>





                    <div class="col-25">
                        <label for="quantity">Quantity of Student:</label>
                    </div>
                    <div class="col-75">
                        <p>%d</p>
                    </div>



                    <div class="col-25">
                        <label for="quantity">Tutorial fees:</label>
                    </div>
                    <div class="col-75">
                        <p>%d</p>
                    </div>



                    <div class="col-25">
                        <label for="quantity">Subject:</label>
                    </div>
                    <div class="col-75">
                        <p>%d</p>
                    </div>





                    <div class="col-25">
                        <label for="subject">Description</label>
                    </div>
                    <div class="col-75">
                        <p> %s</p>
                    </div>
            </div>
                    ', $row->TutorName, $row->TutorName, $row->Quantity,$row->Fees,$row->Subject,$row->Description);
                      }
                 }
                            ?>
        </table>  
    </div>

</body>
</html>

