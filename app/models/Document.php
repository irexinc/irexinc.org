<?php

use Illuminate\Filesystem\Filesystem;

class Document {

  private static function getFiles ($path, $type, $extension = null)
  {
    $result = array();

    foreach ( glob($path . '/' . $type . "/*.pdf") as $file )
    {
      $filename = pathinfo($file, PATHINFO_FILENAME);

      array_push($result, array(
        'title' => $filename,
        'doc'   => '/assets/documents/' . $type . '/' . $filename . '.doc',
        'pdf'   => '/assets/documents/' . $type . '/' . $filename . '.pdf'
      ));
    }

    return $result;
  }

  /**
   * Get all the forms that are in pdf|doc format.
   *
   * @return array
   */
  public static function getForms ()
  {
    return Document::getFiles(dirname(__FILE__) . "/../../irexinc.org/assets/documents", "forms");
  }

  public static function getMinutes ()
  {
    return Document::getFiles(dirname(__FILE__) . "/../../irexinc.org/assets/documents", "minutes");
  }
}