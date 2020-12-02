<?php
// The parent class
require_once 'komideals/om/BasePaymentMethodPeer.php';

// The object class
include_once 'komideals/PaymentMethod.php';

/** 
 * The skeleton for this class was autogenerated by Propel on:
 *
 * [Tue Jan 31 10:11:39 2006]
 *
 *  You should add additional methods to this class to meet the
 *  application requirements.  This class will only be generated as
 *  long as it does not already exist in the output directory.
 *
 * @package komideals 
 */
class PaymentMethodPeer extends BasePaymentMethodPeer {
	
	public static function getTypes() {
		$arr = array();
		
		$arr['m'] = 'MasterCard';
		$arr['v'] = 'Visa';
		$arr['a'] = 'American Express';
		$arr['d'] = 'Discover';
//		$arr['i'] = 'Diners Club';
//		$arr['c'] = 'Carte Blanche';
//		$arr['j'] = 'JCB';
//		$arr['r'] = 'enRoute';
		
		return $arr;
	}
	
	public static function CCValidate( &$arrError, $strNum, $strType='' ) {
		
		// ------------------------------------------------------------
		// init vals
		// ------------------------------------------------------------
		$bGoodCard   = 1;
		$bGoodNumber = 1;
		$nTotal      = 0;
		
		// ------------------------------------------------------------
		// Get rid of any non-digits
		// ------------------------------------------------------------
		$strNum = ereg_replace( "[^[:digit:]]", "", $strNum );
		
		// ------------------------------------------------------------
		// Perform card-specific checks, if applicable
		// ------------------------------------------------------------
		switch( $strType ) {
			case "m":
				$bGoodCard = ereg( "^5[1-5].{14}$", $strNum );
				if( ! $bGoodCard )
					$arrError[] = "Card doesn't meet Master Card requirements.";
				break;
			
			case "v":
				$bGoodCard = ereg( "^4.{15}$|^4.{12}$", $strNum );
				if( ! $bGoodCard )
					$arrError[] = "Card doesn't meet Visa requirements.";
				break;
			
			case "a":
				$bGoodCard = ereg( "^3[47].{13}$", $strNum );
				if( ! $bGoodCard )
					$arrError[] = "Card doesn't meet American Express requirements.";
				break;
			
			case "d":
				$bGoodCard = ereg( "^6011.{12}$", $strNum );
				if( ! $bGoodCard )
					$arrError[] = "Card doesn't meet Discover requirements.";
				break;
			
			case "i":
				$bGoodCard = ereg( "^30[0-5].{11}$|^3[68].{12}$", $strNum );
				if( ! $bGoodCard )
					$arrError[] = "Card doesn't meet Diners Club requirements.";
				break;
			
			case "c":
				$bGoodCard = ereg( "^30[0-5].{11}$|^3[68].{12}$", $strNum );
				if( ! $bGoodCard )
					$arrError[] = "Card doesn't meet Carte Blanche requirements.";
				break;
			
			case "j":
				$bGoodCard = ereg( "^3.{15}$|^2131|1800.{11}$", $strNum );
				if( ! $bGoodCard )
					$arrError[] = "Card doesn't meet JCB requirements.";
				break;
			
			case "r":
				$bGoodCard = ereg( "^2014|2149.{11}$", $strNum );
				if( ! $bGoodCard )
					$arrError[] = "Card doesn't meet enRoute requirements.";
				break;
		}
		
		// ------------------------------------------------------------
		// check against Luhn formula
		// ------------------------------------------------------------
		
		// works right to left, so reverse the number
		$strNum = strrev( $strNum );
		
		for( $x=0; $x<strlen( $strNum ); $x++ ) {
			$nDigit = substr($strNum,$x,1);
			
			// If it's an odd digit, double it
			if( $x/2 != floor($x/2) ) {
				$nDigit *= 2;
				
				// If the result is two digits, add them
				if( strlen( $nDigit ) == 2 ) {
					$nDigit = substr( $nDigit, 0, 1 ) + substr( $nDigit, 1, 1 );
				}
			}
			
			// Add the current digit, doubled and added if applicable, to the nTotal
			$nTotal += $nDigit;
		}
		
		// mod 10
		if( $nTotal % 10 != 0 ) {
			$bGoodNumber = 0;
			$arrError[] = "Card doesn't meet Luhn formula.";
		}
		
		// ------------------------------------------------------------
		// If it passed (or bypassed) the card-specific check
		// and the Total is evenly divisible by 10, it's cool!
		// ------------------------------------------------------------
		if( $bGoodCard && $bGoodNumber ) {
			return true;
		} else {
			$arrError['NUMBER'] = 'Invalid card number specified.';
			return false;
		}
	}

}