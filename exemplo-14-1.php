<?php

/*************************************************************
 * O código deste arquivo é uma adaptação do seguinte código:
 *************************************************************
 *
 * 1) // Printing a welcome message if the user submitted their name
 *    // through the HTML form
 * 2) if ($_POST['user_name']) {
 * 3) print("Welcome, ") ;
 * 4) print($_POST['user_name']);
 * 5) }
 * 6) else {
 * 7) // Printing the form to enter the user name since no name has
 *    // been entered yet
 * 8) print <<<_HTML_
 * 9) <FORM method="post" action="$_SERVER['PHP_SELF']">
 * 10) Enter your name: <input type="text" name="user_name">
 * 11) <BR/>
 * 12) <INPUT type="submit" value="SUBMIT NAME">
 * 13) </FORM>
 * 14) _HTML_;
 * 15) }
 * 16) ?>
 *
 *************************************************************/

if (isset($_POST['user_name'])) {

    /**
     * Printa uma mensagem de boas vindas caso o usuário tenha
     * submetido seu nome através do formulário HTML.
     */
    print("Welcome, ") ;
    print($_POST['user_name']);

} else {

    /**
     * Printa o formulário para entrada do nome do usuário
     * desde que o nome não tenha sido submetido ainda.
     */
    print <<<_HTML_
        <FORM method="post" action="$_SERVER[PHP_SELF]">
        Enter your name: <input type="text" name="user_name">
        <BR/>
        <INPUT type="submit" value="SUBMIT NAME">
        </FORM>
_HTML_;

}

?>