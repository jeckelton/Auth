<?php

include_once('Auth.php');
include('TestAuthContainer.php');
include('FileContainer.php');
include('DBContainer.php');
include('DBLiteContainer.php');
include('MDBContainer.php');
include('MDB2Container.php');
include('POP3Container.php');
include('POP3aContainer.php');
include('IMAPContainer.php');
include_once('PHPUnit.php');


function error($err){
    print "Error\n";
    print "Code:".trim($err->getCode())."\n";
    print "Message:".trim($err->getMessage())."\n";
    #print "UserInfo:".trim($err->getUserInfo())."\n";
    #print "DebugInfo:".trim($err->getDebugInfo())."\n";

}

#error_reporting(0);
PEAR::setErrorHandling(PEAR_ERROR_PRINT, "\nPear Error:%s \n");
#PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, "error");

set_time_limit(0);

$suite = new PHPUnit_TestSuite();

// File Container
#$suite->addTest(new PHPUnit_TestSuite('IMAPContainer'));
$suite->addTest(new PHPUnit_TestSuite('FileContaner'));
$suite->addTest(new PHPUnit_TestSuite('DBContainer'));
$suite->addTest(new PHPUnit_TestSuite('DBLiteContainer'));
// MDB Container
//$suite->addTest(new PHPUnit_TestSuite('MDBContainer'));
// MDB2 Container
//$suite->addTest(new PHPUnit_TestSuite('MDB2Container'));
// POP3 Container
//$suite->addTest(new PHPUnit_TestSuite('POP3Container'));

$result = PHPUnit::run($suite);
echo $result->toString();

?>