<?php

return [

    /*storage_path()
     * Path to the json file containing the credentials.
     */
    'service_account_credentials_json' =>
     storage_path('app/google-calendar/namename-156f87c45698.json'),

    /*
     *  The id of the Google Calendar that will be used by default.
     */
    'calendar_id' => env('GOOGLE_CALENDAR_ID'),
];
