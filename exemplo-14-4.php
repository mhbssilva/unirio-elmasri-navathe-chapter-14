<?php

/*************************************************************
 * O código deste arquivo é uma adaptação do seguinte código:
 *************************************************************
 *
 * 0) function display_welcome() {
 * 1) print("Welcome, ") ;
 * 2) print($_POST['user_name']);
 * 3) }
 * 4)
 * 5) function display_empty_form(); {
 * 6) print <<<_HTML_
 * 7) <FORM method="post" action="$_SERVER['PHP_SELF']">
 * 8) Enter your name: <INPUT type="text" name="user_name">
 * 9) <BR/>
 * 10) <INPUT type="submit" value="Submit name">
 * 11) </FORM>
 * 12) _HTML_;
 * 13) }
 * 14) if ($_POST['user_name']) {
 * 15) display_welcome();
 * 16) }
 * 17) else {
 * 18) display_empty_form();
 * 19) }
 *
 *************************************************************/

//Program Segment P1':
function display_welcome() {
    print("Welcome, ") ;
    print($_POST['user_name']);
}

function display_empty_form() {
    print <<<_HTML_
    <FORM method="post" action="$_SERVER[PHP_SELF]">
    Enter your name: <INPUT type="text" name="user_name">
    <BR/>
    <INPUT type="submit" value="Submit name">
    </FORM>
_HTML_;
}

if (isset($_POST['user_name'])) {
    display_welcome();
} else {
    display_empty_form();
}

?>