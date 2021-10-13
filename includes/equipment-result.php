<?php
// Database connection details 
// Constants. Please change accordingly.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'assignment');

// Return an array of all services.
    function getServices()
    {
        return array(
            'AP' => 'Advertisement Photography',
            'WPP' => 'Wedding Profile Photography',
            'FBP' => 'Food and Beverage Photography',
            'IP' => 'Individual Photography'
        );
    }
?>

<?php
    function getGender()
    {
        return array(
            'M' => 'Male',
            'F' => 'Female'
        );
    }
?>

<?php
  function getEquipment(){
      return array(
          'LT' => 'lighting',
          'GS' => 'greenscreen',
          'WS' => 'whitescreen'
      );
  }
?>




