<?php
class FareModel {
    private $apiUrl = 'https://staging.leamigo.com/booking/get-quotes';
    private $apiKey = 'a5O~radKoYxSp6xwlMMe3V';

    public function fetchFareQuote($origin, $destination) {
        $data = [
            "destination" => [
                "display_address" => $destination['display_address'],
                "lat" => $destination['lat'],
                "long" => $destination['long']
            ],
            "origin" => [
                "display_address" => $origin['display_address'],
                "lat" => $origin['lat'],
                "long" => $origin['long']
            ],
            "journey_type" => "oneway"  // Hard-coded to "oneway"
        ];

        $options = [
            'http' => [
                'header'  => [
                    "Content-Type: application/json",
                    "X-API-KEY: $this->apiKey",
                    "accept: application/json"
                ],
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context  = stream_context_create($options);
        return file_get_contents($this->apiUrl, false, $context);
    }
}
?>
