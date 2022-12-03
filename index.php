<?php
/*
PHP appointment manager
This app isn't fully functional
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
        #TODO get more arguments for each parameter and verify them
        $this->write_appointment(1,10,2022);
        break;
        case 0:
        $this->read_calendar();
        break;
    }
  }

  private function read_calendar()
  {
    #Get day of week for first day of month for the printout value
    $this->read_file();
    $query_date = date("Y/m/01");
    $day_of_week = date('N', strtotime(date('Y-m-01', strtotime($query_date))));
    //Get days of the month
    $month = date('m');
    $year = date('y');
    $monthdays = cal_days_in_month(CAL_GREGORIAN, $month,$year); // 31
    $month = date('F');
    #index variable
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
          //Print in columns, make space even account for 2 digits
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

  private function read_file()
  {
    echo "READ FILE\n";
    $handle = fopen("dates.json", "r");
    if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        echo $line;
        $str_arr = preg_split ("/\,/", $line);

        #TODO: verify it is a valid date entered
        echo $str_arr[0] . $str_arr[1] . $str_arr[2];
    }
    fclose($handle);
    }
    echo "\n";
    #TODO return array of dates
  }

  private function write_appointment($month, $day, $year)
  {
    print "WRITE CALENDAR\n";
    $myfile = fopen("dates.json", "a") or die("Unable to open file to write!");
    $txt = $day . "," . $month . "," . $year . "\n";
        //TODO: error checking on $month $day and $year
    fwrite($myfile, $txt);
  }

  private function readfile()
  {
    #TODO read file and return value
  }
}
?>
