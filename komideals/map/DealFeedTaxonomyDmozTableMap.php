<?php



/**
 * This class defines the structure of the 'deal_feed_taxonomy_dmoz' table.
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
class DealFeedTaxonomyDmozTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'komideals.map.DealFeedTaxonomyDmozTableMap';

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
		$this->setName('deal_feed_taxonomy_dmoz');
		$this->setPhpName('DealFeedTaxonomyDmoz');
		$this->setClassname('DealFeedTaxonomyDmoz');
		$this->setPackage('komideals');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('DATE_CREATED', 'DateCreated', 'TIMESTAMP', true, null, null);
		$this->addColumn('DATE_MODIFIED', 'DateModified', 'TIMESTAMP', true, null, null);
		$this->addColumn('CONFIDENCE', 'Confidence', 'FLOAT', true, null, null);
		$this->addColumn('IS_ACTIVE', 'IsActive', 'TINYINT', true, 3, null);
		$this->addForeignKey('DEAL_FEED_ID', 'DealFeedId', 'INTEGER', 'deal_feed', 'ID', true, 10, null);
		$this->addForeignKey('TAXONOMY_DMOZ_ID', 'TaxonomyDmozId', 'INTEGER', 'taxonomy_dmoz', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('DealFeed', 'DealFeed', RelationMap::MANY_TO_ONE, array('deal_feed_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TaxonomyDmoz', 'TaxonomyDmoz', RelationMap::MANY_TO_ONE, array('taxonomy_dmoz_id' => 'id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // DealFeedTaxonomyDmozTableMap
