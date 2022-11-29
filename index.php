<?php
/*
PHP appointment manager
*/

class Calendar {
  function __construct() {
    print "New Calendar Object\n";
    $this->print_calendar();
    //print_calendar();
  }

  //This app is a work in progress
  function print_calendar()
  {
    print "SUN  MON  TUS  WED  THU  FRI  SAT\n";
  }

}

/*Pseudocode
Command Line Arguments
  Read appointments based on date
    Read File
  Make appointment, based on date
    Write File
  View calendar month CLI output
*/

// Calendar constructor
$obj = new Calendar();

?>
