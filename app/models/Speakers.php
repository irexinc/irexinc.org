<?php

class Speakers extends Illuminate\Filesystem\Filesystem {

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
    $files = $this->files($this->speakersPath);

    $results = array();

    foreach ($files as $file) {
      $filename = basename($file, ".blade.php");
      $parts = explode('_', $filename);

      $results[] = array(
        'file' => $file,
        'view' => 'speakers.details.' . $filename,
        'date' => strftime("%B %e, %Y", strtotime($parts[0])),
        'name' => str_replace('-', ' ', $parts[1]),
      );
    }

    return $results;
  }

  /**
  * Return the speaker 'view' name for the front page news.
  *
  * @return array of 2 speakers if they exist.
  */
  public function getSpeakerView($meetingDate)
  {
    $filename = $this->glob($this->speakersPath . "/" . $meetingDate . "_*.blade.php");

    if (!empty($filename))
    {
      return 'speakers.details.' . basename(array_shift($filename), ".blade.php");
    }

    return null;
  }
}

?>
