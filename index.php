<?php
/*
PHP appointment manager
This app is a work in progress
*/
/* Pseudo code
Command Line Arguments
  Read appointments based on date
    Read File to find appointments
    Display them
  Make appointment, based on date
    Write File
  View calendar month CLI output
*/

//Create class object
$obj = new Calendar($argv);

class Calendar {
  protected $args;
// Calendar constructor
  function __construct($args) {
    //Get command line arguments
    switch ($args[1]) {
      case "read":
        $this->read_calendar();
        break;
      case "write":
        $this->write_appointment("test");
        break;
        case 0:
        $this->read_calendar();
        break;
    }
  }

  //This app is a work in progress
  private function read_calendar()
  {
    //TODO: set varaibles to public/private/protected etc
    #Get day of week for first day of month for the printout value
    $query_date = date("Y/m/01");
    $day_of_week = date('N', strtotime(date('Y-m-01', strtotime($query_date))));
    //Get days of the month
    $month = date('m');
    $year = date('y');
    $monthdays = cal_days_in_month(CAL_GREGORIAN, $month,$year); // 31
    $month = date('F');
    #print "\n Monthdays " . $monthdays . "\n";
    $totalweeks = 4;
    $counter = 0;

    //TODO read dates for appointments and mark them
    print("This month: " . $month . "\n");
    print "SUN   MON   TUS   WED   THU   FRI   SAT\n";
      for ($x = 0; $x <= 4; $x++)
      {
        for ($a = 0; $a < 7; $a++)
        {
          if ($day_of_week <= 0)
          $counter++;
          $day_of_week--;
          //Print in columns?
          if ($counter <= $monthdays)
            if ($counter != 0)
            echo "$counter";
            if ($counter == 0)
            echo " ";

          echo "    ";
          //Keep space equal for extra digit in printout
          if ($counter < 10)
            echo " ";
          }
          echo "\n";
    }
        print "Appointments are marked with ! on the number.\n";
  }

  private function write_appointment($value)
  {
    //TODO: error checking on $value
    print "WRITE CALENDAR";
    $myfile = fopen("dates.json", "w") or die("Unable to open file to write!");
    $txt = "";
    fwrite($myfile, $txt);
  }
}


?>
