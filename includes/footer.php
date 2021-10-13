<div class="footer">
    <div class="footer-content">
        <div class="footer-section About">
            <h1 ><span style="color:rgba(0, 0, 255, 0.884)">TARUC</span> 
                <br>PHOTOGRAPHY SOCIETY</h1>
            <h4>WELCOME TO TARUC PHOTOGRAPHY SOCIETY</h4>
            <br>

            <div class="contact">
                <span><i class="fa fa-phone"></i> &nbsp; 012-3456789</span>
                <span><i class="fa fa-envelope"></i> &nbsp; photographytaruc@gmail.com</span>
            </div>
            <div class="social_menu">
                <ul>
                    <li><a href="https://www.facebook.com/PhotographicSocietyTARUC"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>   
        </div>



        <div class="footer-section Links">
            <h1>Navigation Links</h1>
            <br>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="eventList.php">Even List</a></li>
                <li><a href="tutorial.php">Tutorial</a></li>
                <li><a href="appointment.php">Appointment</a></li>
                <li><a href="rentalEquipment.php">Rental Equipment</a></li>
                <li><a href="MemberProfile.php">Profile</a></li>
                <li><a href="LogIn.php">Log In</a></li>
                <li><a href="equipment.php">Equipment</a></li>

            </ul>
        </div>

        <div class="footer-section Contact">
            <h1>Contact us</h1>
            <br>
            <?php
            if (isset($_POST['submit'])) {
                $to = $_POST['to'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                $headers = "From: Practical Class";

                $return = mail($to, $subject, $message, $headers);

                if ($return) {
                    echo "Email sent out";
                } else {
                    echo "Email unable to send out.";
                }
            } else {
                $to = '';
                $subject = '';
                $message = '';
            }
            ?>
            <form action="contactUs.php" method="post">   


                <input type="email" name="To" value="<?php echo $to ?>"placeholder="example@gamil.com" class="form-control">
                <input type="text" name="Subject" value="<?php echo $subject ?>" placeholder="subject" class="form-control">
                <textarea name="message"  class="form-control" placeholder="message"  style="width: 340px; height: 100px"><?php echo $message ?></textarea>
                <input type="submit" name="submit" value="Submit"  class="submit">
            </form>
        </div>
    </div>

</div>



</body>
</html>

