<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'assignment');

function getMonths() {
    return array(
        '' => 'Select month:',
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

function getDays() {
    return array(
        '' => 'Select day:',
        '1' => 1,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        '11' => 11,
        '12' => 12,
        '13' => 13,
        '14' => 14,
        '15' => 15,
        '16' => 16,
        '17' => 17,
        '18' => 18,
        '19' => 19,
        '20' => 20,
        '21' => 21,
        '22' => 22,
        '23' => 23,
        '24' => 24,
        '25' => 25,
        '26' => 26,
        '27' => 27,
        '28' => 28,
        '29' => 29,
        '30' => 30,
        '31' => 31,
    );
}

function htmlInputTitle($name, $value = '', $maxlength = '') {
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s" required/>' . "\n",
            $name, $name, $value, $maxlength);
}

function htmlSelectMonths($name, $items, $selectedValue = '') {
    printf('<select name="%s" id="%s">' . "\n",
            $name, $name);

    foreach ($items as $value => $text) {
        printf('<option value="%s" %s>%s</option>' . "\n",
                $value,
                $value == $selectedValue ? 'selected="selected"' : '',
                $text);
    }

    echo "</select>\n";
}

function htmlInputPrice($name, $value = '', $maxlength = '')
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s"/>' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputDes($name, $value = '', $maxlength = '')
{
    printf('<textarea rows="10" cols="25" type="text" name="%s" id="%s" value="%s" maxlength="%s"></textarea>' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputAva($name, $value = '', $maxlength = '')
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s"/>' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputHidden($name, $value = '')
{
    printf('<input type="hidden" name="%s" id="%s" value="%s" />' . "\n",
           $name, $name, $value);
}


?>



