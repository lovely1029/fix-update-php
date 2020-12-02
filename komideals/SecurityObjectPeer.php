<?php
// The parent class
require_once 'komideals/om/BaseSecurityObjectPeer.php';

// The object class
include_once 'komideals/SecurityObject.php';

/** 
 * The skeleton for this class was autogenerated by Propel on:
 *
 * [Wed Apr  5 11:35:47 2006]
 *
 *  You should add additional methods to this class to meet the
 *  application requirements.  This class will only be generated as
 *  long as it does not already exist in the output directory.
 *
 * @package komideals 
 */
class SecurityObjectPeer extends BaseSecurityObjectPeer {
	
	public static function getAll($con = null) {
		$crit = new Criteria();
		$crit->addAscendingOrderByColumn(SecurityObjectPeer::NAME );
		
		return self::doSelect($crit, $con);
	}

}