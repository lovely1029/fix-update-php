<?php
require_once 'komideals/om/BaseUserNote.php';

/** 
 * The skeleton for this class was autogenerated by Propel  on:
 *
 * [Thu Feb 23 17:30:51 2006]
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package komideals 
 */
class UserNote extends BaseUserNote {
	
	public function save(PropelPDO $conn = null) {
		
		if($this->isNew()) {
			$this->setDateCreated(time());
		}
		
		parent::save($conn);
	}

}