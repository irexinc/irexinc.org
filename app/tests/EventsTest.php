<?php

class EventsTest extends TestCase {

  /**
   * A basic functional test example.
   *
   * @return void
   */
  public function testIndex()
  {
    $response = $this->action('GET', '/');

    $meeting = Events::where("end_date", ">", strftime("%F %T", time()))
                     ->where('title', '=', 'IREX Meeting')
                     ->take(1)
                     ->get(array("start_date"))
                     ->toArray();

    // Make sure the date matches the view.
    $this->assertEquals(strftime("%A, %B %d at %l %p", strtotime($meeting[0]['start_date'])), $response->original['next_meeting']);

    // $this->assertTrue($this->client->getResponse()->isOk());

    // $this->assertCount(1, $crawler->filter('title:contains("Indiana Real Estate Exchangors, Inc.")'));
  }

}