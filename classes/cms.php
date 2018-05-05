<?php
class CMS extends DBController {

	function login($sql){
		$result = mysqli_query($this->conn,$sql);
		while($arrFoundUser=mysqli_fetch_assoc($result)) {
			//If found set session and return
			if($arrFoundUser){
				$_SESSION["nUserID"] = $arrFoundUser["id"];
				return $arrFoundUser;
			}

			//Doesn't match
			else{
				unset($_SESSION["nUserID"]);
				header("location: ../login.php?error=true");
			}
		}
	}

	function getResults($sql) {
		$result = mysqli_query($this->conn,$sql);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function delete($table, $id){
			$sql = "DELETE FROM $table WHERE id= $id";
			$result = mysqli_query($this->conn,$sql);
			return $result;
	}

	function add($sql){
			$result = mysqli_query($this->conn,$sql);
			return $result;
	}

	function addAndReturnID($sql) {
		$result = mysqli_query($this->conn,$sql);
		return mysqli_insert_id($this->conn);
	}

	function changeStatus($value, $id){
		$sql = "UPDATE order_table SET bOrderStatus = $value WHERE  id= $id";
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}

	function uploadFile($whichFile){
		$name = $_FILES[$whichFile]["name"];
		$tempFile = $_FILES[$whichFile]["tmp_name"];
		move_uploaded_file($tempFile,"../../assets/".$name);
		return $name;

	}


}
?>
