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



}
?>
