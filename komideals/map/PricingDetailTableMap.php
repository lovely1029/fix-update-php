<?php



/**
 * This class defines the structure of the 'pricing_detail' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.komideals.map
 */
class PricingDetailTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'komideals.map.PricingDetailTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('pricing_detail');
		$this->setPhpName('PricingDetail');
		$this->setClassname('PricingDetail');
		$this->setPackage('komideals');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('DEAL_ID', 'DealId', 'INTEGER', 'deal', 'ID', true, 10, 0);
		$this->addColumn('QUANTITY', 'Quantity', 'SMALLINT', true, 8, 0);
		$this->addColumn('AMOUNT', 'Amount', 'DOUBLE', true, null, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Deal', 'Deal', RelationMap::MANY_TO_ONE, array('deal_id' => 'id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // PricingDetailTableMap
