 <?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'assignment');

function getMonths()
{
    return array(
        ''   => 'Select month:',
        'Jan' => 'January',
        'Feb' => 'February',
        'Mar' => 'March',
        'Apr' => 'April',
        'May' => 'May',
        'Jun' => 'June',
        'Jul' => 'July',
        'Aug' => 'August',
        'Sep' => 'September',
        'Oct' => 'October',
        'Nov' => 'November',
        'Dec' => 'December',
    );
}

function getyears()
{
    return array(
        ''   => 'Select year:',
        'one' =>2021,
        'two' => 2022,
        'three' => 2023,
        'four' => 2024,
        'five' => 2025,
        'six' => 2026,
        'seven' => 2027,
        'eight' => 2028,
        'night' => 2029,
        'ten' => 2030,
        'eleven' =>2031,
    );
}


function htmlSelectMonths($name, $items, $selectedValue = '')
{
    printf('<select name="%s" id="%s">' . "\n",
           $name, $name);

    foreach ($items as $value => $text)
    {
        printf('<option value="%s" %s>%s</option>' . "\n",
               $value,
               $value == $selectedValue ? 'selected="selected"' : '',
               $text);
    }
    
    echo "</select>\n";
}

function htmlSelectYears($name, $items, $selectedValue = '')
{
    printf('<select name="%s" id="%s">' . "\n",
           $name, $name);

    foreach ($items as $value => $text)
    {
        printf('<option value="%s" %s>%s</option>' . "\n",
               $value,
               $value == $selectedValue ? 'selected="selected"' : '',
               $text);
    }
    
    echo "</select>\n";
}

// Print a <input type="text"> element.
function htmlInputName($name, $value = '', $maxlength = '')
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s" placeholder="Name"/>' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputCardHolderName($name, $value = '', $maxlength = '')
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s" placeholder="Card Holder Name"/>' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputId($name, $value = '', $maxlength = '')
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s" placeholder="99XXX99999"/>' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputCardNum($name, $value = '', $maxlength = '')
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s" placeholder="1111-2222-3333-4444"/>' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputEmail($name, $value = '', $maxlength = '')
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s" placeholder="tanhz-wm20@student.tarc.edu.my"/>' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputCvv($name, $value = '', $maxlength = '')
{
    printf('<input type="password" name="%s" id="%s" value="%s" maxlength="%s" placeholder="999"/>' . "\n",
           $name, $name, $value, $maxlength);
}

// Print a group of <input type="radio"> elements.
function htmlRadioList($name, $items, $selectedValue = '', $break = false)
{
    foreach ($items as $value => $text)
    {
        printf('
            <input type="radio" name="%s" id="%s" value="%s" %s />
            <label for="%s">%s</label>' . "\n",
            $name, $value, $value,
            $value == $selectedValue ? 'checked="checked"' : '',
            $value, $text);

        if ($break)
            echo "<br />\n";
    }
}
?>

