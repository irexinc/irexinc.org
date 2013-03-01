<?php

class DocumentsController extends BaseController {

  /**
  * GET -> /documents
  *
  * @return View
  */
  public function index ()
  {
    return View::make( 'documents.index' )
               ->with( 'forms', Document::getForms() )
               ->with( 'minutes', Document::getMinutes() );
  }

}