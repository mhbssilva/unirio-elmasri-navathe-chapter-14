<?php

/*************************************************************
 * O código deste arquivo é uma adaptação do seguinte código:
 *************************************************************
 *
 * 0) print 'Welcome to my Web site.';
 * 1) print 'I said to him, "Welcome Home"';
 * 2) print 'We\'ll now visit the next Web site';
 * 3) printf('The cost is $%.2f and the tax is $%.2f',
 *    $cost, $tax) ;
 * 4) print strtolower('AbCdE');
 * 5) print ucwords(strtolower('JOHN smith'));
 * 6) print 'abc' . 'efg'
 * 7) print "send your email reply to: $email_address"
 * 8) print <<<FORM_HTML
 * 9) <FORM method="post" action="$_SERVER['PHP_SELF']">
 * 10) Enter your name: <input type="text" name="user_name">
 * 11) FORM_HTML
 *
 *************************************************************/

$cost           = isset($_REQUEST['cost'])          ? ($_REQUEST['cost'])           : 0;
$tax            = isset($_REQUEST['tax'])           ? ($_REQUEST['tax'])            : 0;
$email_address  = isset($_REQUEST['email_address']) ? ($_REQUEST['email_address'])  : 0;

print 'Welcome to my Web site.';
print 'I said to him, "Welcome Home"';
print 'We\'ll now visit the next Web site';
printf('The cost is $%.2f and the tax is $%.2f', $cost, $tax) ;
print strtolower('AbCdE');
print ucwords(strtolower('JOHN smith'));
print 'abc' . 'efg';
print "send your email reply to: $email_address";
print <<<FORM_HTML
    <FORM method="post" action="$_SERVER[PHP_SELF]">
    Enter your name: <input type="text" name="user_name">
FORM_HTML

?>