<?php

class Drive
{
	protected $driver_id, $start_place, $end_place, $date, $start_time, $end_time, $price, $place_number, $username, $rating, $drive_id;

	function __construct( $driver_id, $start_place, $end_place, $date, $start_time, $end_time, $price, $place_number, $username, $rating, $drive_id)
	{
		$this->driver_id = $driver_id;
		$this->start_place = $start_place;
		$this->end_place = $end_place;
		$this->date = $date;
		$this->start_time = $start_time;
		$this->end_time = $end_time;
		$this->price = $price;
		$this->place_number = $place_number;
		$this->username = $username;
		$this->rating = $rating;
		$this->drive_id=$drive_id;
	}

	function __get( $prop ) { return $this->$prop; }
	function __set( $prop, $val ) { $this->$prop = $val; return $this; }
}

?>
