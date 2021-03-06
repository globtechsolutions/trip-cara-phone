<?php
	require_once('database.php');
	require_once('functions.php');
	require_once('session.php');
	class Events {
		
		public function add_event($acc_type, $cause, $car_type, $car_name, $location, $location_description, $season, $day_time, $acc_date, $Total_Death, $Below_12, $Twelve_To_19, $Above_19, $driver_name, $gender, $age) {
			global $database;
			
			$sql = "INSERT INTO events ";
			$sql .= "( ";
			$sql .= "acc_type, cause, car_type, car_name, location, location_description, season, day_time, acc_date, Total_Death, Below_12, Twelve_To_19, Above_19, driver_name, gender, age";
			$sql .= ") ";
			$sql .= "VALUES( ";
			$sql .= "'{$acc_type}', '{$cause}', '{$car_type}','{$car_name}', '{$location}', '{$location_description}','{$season}', '{$day_time}', '{$acc_date}','{$Total_Death}', '{$Below_12}', '{$Twelve_To_19}','{$Above_19}', '{$driver_name}','{$gender}', '{$age}' ";
			$sql .= ")";
			
			$result_set = $database->query($sql);
			
			if($result_set && mysqli_affected_rows($database->connection) == 1) {
				redirect_to('school_event.php');
			} else {
				$message = "Failed to add Event";
			}
		}
		
		public static function find_all_events() {
			global $database;
			
			$sql ="SELECT * FROM events";
			$result_set = $database->query($sql);
			
			return $result_set;
			
		}
		
		public function delete_event($id) {
			global $database;
			
			$sql = "DELETE FROM events WHERE id = {$id}";
			
			$result = $database->query($sql);
			if($result && mysqli_affected_rows($database->connection) == 1) {
					$_SESSION['message'] = "Event has been deleted";
					redirect_to("school_event.php");
				} else {
					$message = "Event has not been deleted";
				}
		}
	}
?>