<?php

$randomArray = array('123s','123 mai123nst queen\'s drive','main st. 123');
//allowed char for password a-z  A-Z 0-9 !@#$%^&*()-+_?.
//allowed char for name a-z A-Z 0-9 . ' - : , \s

/*allowed char for DOB first character can only be one or 2 followed by 
possibility 9 or 0 followed by 0-9 digits for tenth
year and year - sign separator 
followed by month first digit can only be 1 or 2 
if 0 is the first digit the second digit
would be 0-9 else if the first digit for month is 1 it could only be either 0 1 or 2
*/
//allowed char for address 
//allowed char for ZIP 4DIGITs
//allowed char for suburb a-z A-Z \s / . ' " : & , : 
 //   ^(?=[# \.a-zA-Z0-9]*?[A-Z])(?=[ \.\'"\-#a-zA-Z0-9]*?[a-z])(?=[ \.\'"\-#a-zA-Z0-9]*?[0-9])
 //(#?(\d{0,5})[ -.]?(?=[a-zA-Z ]+[\.\'" ]?[a-zA-Z]{0,6}[\.\'" ]?))|([a-zA-Z ]+[\.\-\'" ]?#?\d{0,5})
$matchName = preg_grep('%^([a-zA-Z\.\,\'"&:/\- ]+[ ]?[#]?[0-9][a-zA-Z0-9 ]*|[#]?[ ]?[0-9]+[ ]?[a-zA-Z][ a-zA-Z0-9\.\,\'"&:/\-]*)$%',$randomArray);

foreach($matchName as $res){
    echo $res  . '<br />' . '<br />';
}
?>