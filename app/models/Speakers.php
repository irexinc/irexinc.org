<?php

class Speakers {

  public $speakersPath;

  public function __construct()
  {
    $this->speakersPath = app_path() . "/views/speakers/details";
  }

  /**
  * Gets all the speakers for view in the past speakers list.
  *
  * @return array of speakers
  */
  public function getAllSpeakers()
  {
    // Reverse this listing so we show the newest speakers first.
    $files = array_reverse(File::files($this->speakersPath));

    $results = array();

    foreach ($files as $file) {
      $filename = basename($file, ".blade.php");

      // $parts[0] = date of speaker
      // $parts[1] = title
      $parts = explode('_', $filename);

      // Only include speakers from the past.
      if (strtotime($parts[0]) <= time())
      {
        $results[] = array(
          'file' => $file,
          'view' => 'speakers.details.' . $filename,
          'date' => strftime("%B %e, %Y", strtotime($parts[0])),
          'name' => str_replace('-', ' ', $parts[1]),
        );
      }
    }

    return $results;
  }

  /**
  * Return the speaker view.
  *
  * @return array of 2 speakers if they exist.
  */
  public function getSpeakerView($meetingDate)
  {
    $filename = File::glob($this->speakersPath . "/" . $meetingDate . "_*.blade.php");

    if (!empty($filename))
    {
      return 'speakers.details.' . basename(array_shift($filename), ".blade.php");
    }

    return null;
  }
}

?>
