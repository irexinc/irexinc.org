<?php

$start = array(
  "year" => date("Y"),
  "month" => 01,
  "day" => 01,
);

$end = array(
  "year" => date("Y"),
  "month" => 12,
  "day" => 31,
);

$verbose = false;

$table = "events";

$location = "MIBOR";
$address = "1912 N. Meridian, Indianapolis, IN";

#
# Reference used to fancy our output a little.
#
$output = array(
  "underline"   => `tput smul`,
  "nounderline" => `tput rmul`,
  "bold"        => `tput bold`,
  "normal"      => `tput sgr0`,
);

#
# Handle the script options.
#
$short = "";
$short .= "v::"; // Verbose output

$long = array(
  "start-year:",  // Set the starting year
  "start-month:", // Set the starting month
  "start-day:",   // Set the starting day
  "end-year:",    // Set the ending year
  "end-month:",   // Set the ending month
  "end-day:",     // Set the ending day
  "location:",    // Set the meeting location
  "address:",     // Set the meeting address

  "table:",       // Set the table to insert into the DB.

  "verbose::",    // Verbose output
);

$options = getopt($short, $long);

foreach ($options as $option => $value) {
  switch ($option)
  {
    case "start-year":
      $start["year"] = $value;
      $end["year"] = $value;
    break;

    case "start-month":
      $start["month"] = $value;
    break;

    case "start-day":
      $start["day"] = $value;
    break;

    case "end-year":
      $end["year"] = $value;
    break;

    case "end-month":
      $end["month"] = $value;
    break;

    case "end-day":
      $end["day"] = $value;
    break;

    case "location":
      $location = $value;
    break;

    case "address":
      $address = $value;
    break;

    case "table":
      $table = $value;
    break;

    case "v":
    case "verbose":
      $verbose = true;
    break;

    default:
      echo "Unsupported option -> " . $option;
    break;
  }
}

if ($verbose)
{
  echo $output["underline"] . $output["bold"] . "Var dump for getopt:" . $output["normal"] . "\n";
  var_dump($options);
  echo "\n\n";
}

$current = strtotime(implode("-", $start));
$endDate = strtotime(implode("-", $end));

$dateArr = array();

# find second thursday of the start/current month
# add 14 days for second thursday of the month
# go to next month
# repeat until we reach or pass endDate

while ($current <= $endDate)
{
  // Find the first Thursday
  while (date("w", $current) != 4)
  {
    // Add one day
    $current += (24 * 3600);
  }

  // Go to the second Thursday of the month.
  $current += (7 * 24 * 3600);

  // Add the day to the list of dates.
  $dateArr[] = date('Y-m-d', $current);

  // If 14 days in advanced is still in the same month, move the date and add it.
  if (date("m", $current + (14 * 24 * 3600)) == date("m", $current))
  {
    $current += (14 * 24 * 3600);
    $dateArr[] = date("Y-m-d", $current);
  }


  // Go to the next month
  $nextMonth = strtotime("next month", $current);

  if (date("m", $current) > date("m", $nextMonth))
  {
    $current = strtotime(
      date("Y", strtotime("next year", $current)) . "-01-01"
    );
  }
  else
  {
    $current = strtotime(
      date("Y", $current) . "-" .
      date("m", strtotime("next month", $current)) . "-" .
      "01"
    );
  }

}

if ($verbose)
{
  echo $output["underline"] . $output["bold"] . "Date list:" . $output["normal"];
  var_dump($dateArr);
}

foreach ($dateArr as $date) {
  echo "INSERT INTO " . $table . " SET calendar_id=1,active=1,title='IREX Meeting',start_date='" . $date . " 09:00:00',end_date='" . $date . " 12:00:00',location='" . $location . "',address='" . $address . "',created_at=NOW(),updated_at=NOW();\n";
}

?>
