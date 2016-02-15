<?php
// **********************************************************************************
// **                                                                              **
// ** password.class.php                            (c) Wolfram Plettscher 02/2016 **
// **                                                                              **
// **********************************************************************************

Class Password {

	public static $salt = 'salt';

//-----------------------------------------------------------------------------------
// check the password                                                             ---
//-----------------------------------------------------------------------------------
	public static function check ($value) {

		// must be between 4 and 32 characters
		if (mb_strlen ($value) < 4 || mb_strlen ($value) > 32)
			return (FALSE);

		// must be alphanumeric chars only
		if (!ctype_alnum ($value))
			return (FALSE);
		
		// instead we might check with a preg - to be verified
		// how about unicode chars (umlaute)?
//		if (! preg_match('/^[a-zA-Z0-9]*$/', $value))
//			return (FALSE);

		// all password checks passed
		return (TRUE);
	}

//-----------------------------------------------------------------------------------
// hash the password with salt                                                    ---
//-----------------------------------------------------------------------------------
	public static function hash ($value) {

		$value = Password::$salt . "x" . $value;
//		echo $value . " ";
		$hashed_value = hash ("sha256", $value);
//		$hashed_value = md5($value);
		return ($hashed_value);
	}

}
?>

