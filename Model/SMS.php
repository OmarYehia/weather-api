<?php
use Twilio\Rest\Client;

class SMS {
    private $account_sid = __TWILIO_ACCOUNT_SID;
    private $auth_token = __TWILIO_AUTH_TOKEN;
    private $twilio_number = __TWILIO_MY_PHONE_NUMBER;
    private $client;

    public function send($number) {
        $this->client = new Client($this->account_sid, $this->auth_token);
        $this->client->messages->create(
            $number,
            array(
                'from' => $this->twilio_number,
                'body' => 'Hello from Omar Yehia!'
            )
        );
    }

    public function send_bulk($numbers=array()) {
        $this->client = new Client($this->account_sid, $this->auth_token);
        $client->messages->create(
            $numbers,
            array(
                'from' => $this->twilio_number,
                'body' => 'Hello from Omar Yehia!'
            )
        );
    }
    
}
