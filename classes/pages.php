<?php
class Pages extends DBController {
	public $arrSelectOptions;

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

	function buildSelectList($formFieldName, $tableName) {
		$arrSelectOptions = $this->getResults("SELECT * FROM ".$tableName);
		$output = "";
		$output .= "<select id='inputState' name=\"".$formFieldName."\" class='form-control' required=' autocomplete='off' data-validation-required-message='Please choose your state.'>";
			$output .= "<option value='selected'>Choose...</option>";
		foreach($arrSelectOptions as $key=>$optionsArray){
			$output .= "<option value=\"".$optionsArray["id"]."\">".$optionsArray["strName"]."</option>";
		}
		$output .= '</select>';
		return $output;
	}
}
?>
