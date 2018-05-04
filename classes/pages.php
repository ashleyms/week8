<?php
class Pages extends DBController {

	function getResults($sql) {
		$result = mysqli_query($this->conn,$sql);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function getRecord($sql){
			$result = mysqli_query($this->conn,$sql);
			while($row=mysqli_fetch_assoc($result)) {
				return $row;
			}
	}

}
?>
