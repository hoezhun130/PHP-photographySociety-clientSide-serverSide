<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .banner{   
                margin: 0;   
                background-image:url(image/login.jpg);
                background-size: 100% 100%;
            }
            #login{
                position: absolute;   
                top: 60%;   
                left:50%;   
                margin: -150px 0 0 -150px;   
                width: 300px;   
                height: 300px;
            }

            #login h1{   
                color: black;   
                text-shadow:0 0 10px;   
                letter-spacing: 1px;   
                text-align: center;   
            }

            #register,#forget_pwd{
                text-decoration:none;
                color:#0008ad;
            }


            #register:hover,#forget_pwd:hover{
                color:#04AA6D;
            }

            h1{   
                font-size: 2em;   
                margin: 0.67em 0;   
            }

            .put{   
                width: 300px;   
                height: 40px;   
                margin-bottom: 10px;   
                outline: none;   
                padding: 10px;   
                font-size: 13px;   
                color: white;   
                border-top: 1px solid #312E3D;   
                border-left: 1px solid #312E3D;   
                border-right: 1px solid #312E3D;   
                border-bottom: 1px solid #56536A;   
                border-radius: 4px;   
                background-color: #2D2D3F;   
            }

            .put:focus{
                background-color: #dddddd;
                color:black;
                outline: none;
            }

            #submit{   
                width: 300px;
                min-height: 40px;
                display:block;
                background-color: gray;
                border: none;
                color: black;
                padding: 9px 14px;
                font-size: 15px;
                border-radius: 5px;
                transition-duration: 0.4s;
                cursor: pointer;
            }

            #submit:hover{
                background-color: #3762bc;
                color: white;
            }

            #submit:active {
                background-color: #3762bc;
                transform: translateY(10px);
            }

        </style>
    </head>
    <body>

        <div class="banner">
            <?php
            include('includes/header.php');
            ?> 
            <div class="content">
                <div id="login">  
                    <h1>Login</h1>  
                    <form action="LogInDone.php" method="post">  
                        <div class="loginInput">
                            <input class="put" type="email" placeholder="Email" name="logInEmail" required>  
                            <input class="put" type="password" placeholder="Password" name="p" required> 
                        </div>
                        <input type="submit" id="submit" name="submit" value="Log In"><br>

                        <p><span style="color:white;">If haven't sign up yet? Click here.</span><a id="register" href="SignUp.php">Sign Up</a></p>
                        <p><span style="color:white;">If forget password? Click here.<span style="color:blue;font-weight:bold"> <a id="forget_pwd" href="ForgotPassword.php">Password</a></p>
                    </form>
                </div> 
            </div>
        </div>


        <?php
        include('includes/footer.php');
        ?>