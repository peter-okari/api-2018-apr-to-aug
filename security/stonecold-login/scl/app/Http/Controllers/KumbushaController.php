<?php
namespace App\Http\Controllers;

//include the gateway
require_once base_path().
'/vendor/africastalking/AfricasTalkingGateway.php';

use Illuminate\Http\Request;
//include gcalendar package
use Spatie\GoogleCalendar\Event;
class KumbushaController extends Controller
{
  //ideally this should be from a database
  //for demo -- use this
  private $phone_numbers_friends = [
    'wambo@example.com' => '',
    'omosh@example.com' => '',
  ];
  //method
    public function kmb(){

        //get all [future] events
        $events = Event::get();
        //loop through the events to get the details
        foreach($events as $event){

          $event_name = $event->name;
          $attendees = $event->attendees;
          $event_s_date = $event->startDateTime;
          $event_e_date = $event->endDateTime;
          echo 'Event name : '.$event_name.'</br>';
          echo 'Event attendees : ';var_dump($attendees);echo '</br>';
          echo 'Event start : '.$event_s_date.'</br>';
          echo 'Event end : '.$event_e_date.'</br>';
          dd();
          //@TODO : if attendee is YOUR_FRIEND(compare with $phone_numbers_friends)

          //@TODO : if 1 day before event

          //@TODO : Send SMS reminder
          $recipients = '';
          $message = '';
          KumbushaaController::tuma($recipients,$message);

        }
    }

    //send sms via africastalking...
    public static function tuma($recipients,$message){
        // Specify your authentication credentials
        $username   = env('AFRICASTLKNG_USERNAME');
        $apikey     = env('AFRICASTLKNG_KEY');
        $app_name = env('AFRICASTLKNG_APP_NAME');

        // Create a new instance of our awesome gateway class
        $gateway    = new \AfricasTalkingGateway($username, $apikey,$app_name);

        try
        {
          // Thats it, hit send and we'll take care of the rest.
          $results = $gateway->sendMessage($recipients, $message);

          //simple result message
          $status = 'Sent';
          foreach($results as $result) {
            echo "<p>**=================================**</p>";
            echo "<ul><li>Message : {$message} to <b>{$result->number}</b></li>";
            echo "<li>Status: " .$result->status.'</li></ul>';
            echo "<p>|*==================================*|</p>";
          }
        }
        catch ( \AfricasTalkingGatewayException $e )
        {
          echo "Encountered an error while sending: ".$e->getMessage();
        }
    }

}
