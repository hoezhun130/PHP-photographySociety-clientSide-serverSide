<?php
// Database connection details 
// Constants. Please change accordingly.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'assignment');
?>

<style>
  .errorMsg, .info
    {
        padding:10px 0px 10px 0px ;
        margin:auto;
        font-size: 0.9em;
        list-style-position: inside;
        width:800px;
        text-align:center;
        border-radius: 10px;
    }

    .errorMsg
    {
        align-content: center;
        text-align: center;
        border: 2px solid #FBC2C4;
        background-color: #FBE3E4;
        color: #8A1F11;
    }

    .info
    {
        border: 2px solid #92CAE4;
        background-color: #D5EDF8;
        color: #205791;
    }
</style>