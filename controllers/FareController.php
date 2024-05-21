<?php
require 'models/LocationModel.php';
require 'models/FareModel.php';

class FareController {
    public function showForm() {
        $locationModel = new LocationModel();
        $locations = $locationModel->getAllLocations();
        require 'views/fare_quote_view.php';
    }

    public function getFareQuote() {
        $origin = json_decode($_POST['origin'], true);
        $destination = json_decode($_POST['destination'], true);

        $fareModel = new FareModel();
        $response = $fareModel->fetchFareQuote($origin, $destination);

        if ($response === FALSE) {
            $error = 'There was an error fetching the fare quote.';
        } else {
            $data = json_decode($response, true);
            if (isset($data['data']['quotes'])) {
                $quotes = $data['data']['quotes'];
            } else {
                $error = 'No fare quotes found.';
            }
        }

        $locationModel = new LocationModel();
        $locations = $locationModel->getAllLocations();
        require 'views/fare_quote_view.php';
    }
}
?>
