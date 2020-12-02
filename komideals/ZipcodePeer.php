<?php
// The parent class
require_once 'komideals/om/BaseZipcodePeer.php';

// The object class
include_once 'komideals/Zipcode.php';

/** 
 * The skeleton for this class was autogenerated by Propel on:
 *
 * [Tue Jan 31 11:01:27 2006]
 *
 *  You should add additional methods to this class to meet the
 *  application requirements.  This class will only be generated as
 *  long as it does not already exist in the output directory.
 *
 * @package komideals 
 */
class ZipcodePeer extends BaseZipcodePeer {
	
	static public function validateAddress($street, $city, $state, $zipcode) {
		
		$crit = new Criteria();
		$crit->add(ZipcodePeer::CITY , $city, Criteria::EQUAL );
		$crit->add(ZipcodePeer::STATECODE , $state, Criteria::EQUAL );
		$crit->add(ZipcodePeer::ZIPCODE , $zipcode, Criteria::EQUAL );
		
		$zipObj = ZipcodePeer::doSelectOne($crit);
		if($zipObj === null) {
			return false;
		}
		
		return true;
	}

	public static function getDistinctStates() {
		$states = array();
		
		$crit = new Criteria();
		$crit->addGroupByColumn(ZipcodePeer::STATECODE );
		$crit->setDistinct();
		$crit->addAscendingOrderByColumn(ZipcodePeer::STATE );
//		$crit->add(ZipcodePeer::MSA , '0000', Criteria::NOT_EQUAL );
		
		$objs = ZipcodePeer::doSelect($crit);
		
		foreach ($objs as $oState) {
			/* @var $oState Zipcode */
			$states[$oState->getStatecode()] = $oState->getState();
		}
		
		return $states;
	}
	
}
