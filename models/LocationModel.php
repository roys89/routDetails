<?php
class LocationModel {
    private $locations = [
        ["display_address" => "New Delhi, Delhi", "lat" => "28.632425", "long" => "77.218791"],
        ["display_address" => "Mumbai, Maharashtra", "lat" => "19.0760", "long" => "72.8777"],
        ["display_address" => "Bengaluru, Karnataka", "lat" => "12.9716", "long" => "77.5946"],
        // Add more locations as needed
    ];

    public function getAllLocations() {
        return $this->locations;
    }
}
?>
