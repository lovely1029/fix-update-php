<?php



/**
 * This class defines the structure of the 'user_thread' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.sigfly.map
 */
class UserThreadTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'sigfly.map.UserThreadTableMap';

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
		$this->setName('user_thread');
		$this->setPhpName('UserThread');
		$this->setClassname('UserThread');
		$this->setPackage('sigfly');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('TOPIC_ID', 'TopicId', 'INTEGER', 'user_topic', 'ID', true, 10, 0);
		$this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'user', 'ID', true, 10, 0);
		$this->addColumn('CONTENT', 'Content', 'LONGVARCHAR', true, null, null);
		$this->addColumn('DATE_CREATED', 'DateCreated', 'TIMESTAMP', true, null, null);
		$this->addColumn('IS_ACTIVE', 'IsActive', 'TINYINT', true, 3, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserTopic', 'UserTopic', RelationMap::MANY_TO_ONE, array('topic_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // UserThreadTableMap
