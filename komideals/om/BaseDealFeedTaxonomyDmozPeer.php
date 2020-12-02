<?php


/**
 * Base static class for performing query and update operations on the 'deal_feed_taxonomy_dmoz' table.
 *
 * 
 *
 * @package    propel.generator.komideals.om
 */
abstract class BaseDealFeedTaxonomyDmozPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'komideals';

	/** the table name for this class */
	const TABLE_NAME = 'deal_feed_taxonomy_dmoz';

	/** the related Propel class for this table */
	const OM_CLASS = 'DealFeedTaxonomyDmoz';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'komideals.DealFeedTaxonomyDmoz';

	/** the related TableMap class for this table */
	const TM_CLASS = 'DealFeedTaxonomyDmozTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 7;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'deal_feed_taxonomy_dmoz.ID';

	/** the column name for the DATE_CREATED field */
	const DATE_CREATED = 'deal_feed_taxonomy_dmoz.DATE_CREATED';

	/** the column name for the DATE_MODIFIED field */
	const DATE_MODIFIED = 'deal_feed_taxonomy_dmoz.DATE_MODIFIED';

	/** the column name for the CONFIDENCE field */
	const CONFIDENCE = 'deal_feed_taxonomy_dmoz.CONFIDENCE';

	/** the column name for the IS_ACTIVE field */
	const IS_ACTIVE = 'deal_feed_taxonomy_dmoz.IS_ACTIVE';

	/** the column name for the DEAL_FEED_ID field */
	const DEAL_FEED_ID = 'deal_feed_taxonomy_dmoz.DEAL_FEED_ID';

	/** the column name for the TAXONOMY_DMOZ_ID field */
	const TAXONOMY_DMOZ_ID = 'deal_feed_taxonomy_dmoz.TAXONOMY_DMOZ_ID';

	/**
	 * An identiy map to hold any loaded instances of DealFeedTaxonomyDmoz objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array DealFeedTaxonomyDmoz[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'DateCreated', 'DateModified', 'Confidence', 'IsActive', 'DealFeedId', 'TaxonomyDmozId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'dateCreated', 'dateModified', 'confidence', 'isActive', 'dealFeedId', 'taxonomyDmozId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::DATE_CREATED, self::DATE_MODIFIED, self::CONFIDENCE, self::IS_ACTIVE, self::DEAL_FEED_ID, self::TAXONOMY_DMOZ_ID, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'DATE_CREATED', 'DATE_MODIFIED', 'CONFIDENCE', 'IS_ACTIVE', 'DEAL_FEED_ID', 'TAXONOMY_DMOZ_ID', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'date_created', 'date_modified', 'confidence', 'is_active', 'deal_feed_id', 'taxonomy_dmoz_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DateCreated' => 1, 'DateModified' => 2, 'Confidence' => 3, 'IsActive' => 4, 'DealFeedId' => 5, 'TaxonomyDmozId' => 6, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'dateCreated' => 1, 'dateModified' => 2, 'confidence' => 3, 'isActive' => 4, 'dealFeedId' => 5, 'taxonomyDmozId' => 6, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::DATE_CREATED => 1, self::DATE_MODIFIED => 2, self::CONFIDENCE => 3, self::IS_ACTIVE => 4, self::DEAL_FEED_ID => 5, self::TAXONOMY_DMOZ_ID => 6, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'DATE_CREATED' => 1, 'DATE_MODIFIED' => 2, 'CONFIDENCE' => 3, 'IS_ACTIVE' => 4, 'DEAL_FEED_ID' => 5, 'TAXONOMY_DMOZ_ID' => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'date_created' => 1, 'date_modified' => 2, 'confidence' => 3, 'is_active' => 4, 'deal_feed_id' => 5, 'taxonomy_dmoz_id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. DealFeedTaxonomyDmozPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(DealFeedTaxonomyDmozPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(DealFeedTaxonomyDmozPeer::ID);
			$criteria->addSelectColumn(DealFeedTaxonomyDmozPeer::DATE_CREATED);
			$criteria->addSelectColumn(DealFeedTaxonomyDmozPeer::DATE_MODIFIED);
			$criteria->addSelectColumn(DealFeedTaxonomyDmozPeer::CONFIDENCE);
			$criteria->addSelectColumn(DealFeedTaxonomyDmozPeer::IS_ACTIVE);
			$criteria->addSelectColumn(DealFeedTaxonomyDmozPeer::DEAL_FEED_ID);
			$criteria->addSelectColumn(DealFeedTaxonomyDmozPeer::TAXONOMY_DMOZ_ID);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.DATE_CREATED');
			$criteria->addSelectColumn($alias . '.DATE_MODIFIED');
			$criteria->addSelectColumn($alias . '.CONFIDENCE');
			$criteria->addSelectColumn($alias . '.IS_ACTIVE');
			$criteria->addSelectColumn($alias . '.DEAL_FEED_ID');
			$criteria->addSelectColumn($alias . '.TAXONOMY_DMOZ_ID');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DealFeedTaxonomyDmozPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     DealFeedTaxonomyDmoz
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = DealFeedTaxonomyDmozPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DealFeedTaxonomyDmozPeer::populateObjects(DealFeedTaxonomyDmozPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      DealFeedTaxonomyDmoz $value A DealFeedTaxonomyDmoz object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(DealFeedTaxonomyDmoz $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A DealFeedTaxonomyDmoz object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof DealFeedTaxonomyDmoz) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DealFeedTaxonomyDmoz object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     DealFeedTaxonomyDmoz Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to deal_feed_taxonomy_dmoz
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = DealFeedTaxonomyDmozPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DealFeedTaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DealFeedTaxonomyDmozPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DealFeedTaxonomyDmozPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (DealFeedTaxonomyDmoz object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = DealFeedTaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = DealFeedTaxonomyDmozPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + DealFeedTaxonomyDmozPeer::NUM_COLUMNS;
		} else {
			$cls = DealFeedTaxonomyDmozPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			DealFeedTaxonomyDmozPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related DealFeed table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinDealFeed(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DealFeedTaxonomyDmozPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::DEAL_FEED_ID, DealFeedPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related TaxonomyDmoz table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinTaxonomyDmoz(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DealFeedTaxonomyDmozPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::TAXONOMY_DMOZ_ID, TaxonomyDmozPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of DealFeedTaxonomyDmoz objects pre-filled with their DealFeed objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DealFeedTaxonomyDmoz objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDealFeed(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		$startcol = (DealFeedTaxonomyDmozPeer::NUM_COLUMNS - DealFeedTaxonomyDmozPeer::NUM_LAZY_LOAD_COLUMNS);
		DealFeedPeer::addSelectColumns($criteria);

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::DEAL_FEED_ID, DealFeedPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DealFeedTaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DealFeedTaxonomyDmozPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = DealFeedTaxonomyDmozPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DealFeedTaxonomyDmozPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = DealFeedPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DealFeedPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DealFeedPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DealFeedPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (DealFeedTaxonomyDmoz) to $obj2 (DealFeed)
				$obj2->addDealFeedTaxonomyDmoz($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of DealFeedTaxonomyDmoz objects pre-filled with their TaxonomyDmoz objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DealFeedTaxonomyDmoz objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinTaxonomyDmoz(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		$startcol = (DealFeedTaxonomyDmozPeer::NUM_COLUMNS - DealFeedTaxonomyDmozPeer::NUM_LAZY_LOAD_COLUMNS);
		TaxonomyDmozPeer::addSelectColumns($criteria);

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::TAXONOMY_DMOZ_ID, TaxonomyDmozPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DealFeedTaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DealFeedTaxonomyDmozPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = DealFeedTaxonomyDmozPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DealFeedTaxonomyDmozPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = TaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = TaxonomyDmozPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = TaxonomyDmozPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					TaxonomyDmozPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (DealFeedTaxonomyDmoz) to $obj2 (TaxonomyDmoz)
				$obj2->addDealFeedTaxonomyDmoz($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DealFeedTaxonomyDmozPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::DEAL_FEED_ID, DealFeedPeer::ID, $join_behavior);

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::TAXONOMY_DMOZ_ID, TaxonomyDmozPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of DealFeedTaxonomyDmoz objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DealFeedTaxonomyDmoz objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		$startcol2 = (DealFeedTaxonomyDmozPeer::NUM_COLUMNS - DealFeedTaxonomyDmozPeer::NUM_LAZY_LOAD_COLUMNS);

		DealFeedPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (DealFeedPeer::NUM_COLUMNS - DealFeedPeer::NUM_LAZY_LOAD_COLUMNS);

		TaxonomyDmozPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (TaxonomyDmozPeer::NUM_COLUMNS - TaxonomyDmozPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::DEAL_FEED_ID, DealFeedPeer::ID, $join_behavior);

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::TAXONOMY_DMOZ_ID, TaxonomyDmozPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DealFeedTaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DealFeedTaxonomyDmozPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = DealFeedTaxonomyDmozPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DealFeedTaxonomyDmozPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined DealFeed rows

			$key2 = DealFeedPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = DealFeedPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DealFeedPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DealFeedPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (DealFeedTaxonomyDmoz) to the collection in $obj2 (DealFeed)
				$obj2->addDealFeedTaxonomyDmoz($obj1);
			} // if joined row not null

			// Add objects for joined TaxonomyDmoz rows

			$key3 = TaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = TaxonomyDmozPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = TaxonomyDmozPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					TaxonomyDmozPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (DealFeedTaxonomyDmoz) to the collection in $obj3 (TaxonomyDmoz)
				$obj3->addDealFeedTaxonomyDmoz($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related DealFeed table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptDealFeed(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DealFeedTaxonomyDmozPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(DealFeedTaxonomyDmozPeer::TAXONOMY_DMOZ_ID, TaxonomyDmozPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related TaxonomyDmoz table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptTaxonomyDmoz(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DealFeedTaxonomyDmozPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(DealFeedTaxonomyDmozPeer::DEAL_FEED_ID, DealFeedPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of DealFeedTaxonomyDmoz objects pre-filled with all related objects except DealFeed.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DealFeedTaxonomyDmoz objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDealFeed(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		$startcol2 = (DealFeedTaxonomyDmozPeer::NUM_COLUMNS - DealFeedTaxonomyDmozPeer::NUM_LAZY_LOAD_COLUMNS);

		TaxonomyDmozPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (TaxonomyDmozPeer::NUM_COLUMNS - TaxonomyDmozPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::TAXONOMY_DMOZ_ID, TaxonomyDmozPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DealFeedTaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DealFeedTaxonomyDmozPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = DealFeedTaxonomyDmozPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DealFeedTaxonomyDmozPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined TaxonomyDmoz rows

				$key2 = TaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = TaxonomyDmozPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = TaxonomyDmozPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					TaxonomyDmozPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (DealFeedTaxonomyDmoz) to the collection in $obj2 (TaxonomyDmoz)
				$obj2->addDealFeedTaxonomyDmoz($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of DealFeedTaxonomyDmoz objects pre-filled with all related objects except TaxonomyDmoz.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DealFeedTaxonomyDmoz objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptTaxonomyDmoz(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DealFeedTaxonomyDmozPeer::addSelectColumns($criteria);
		$startcol2 = (DealFeedTaxonomyDmozPeer::NUM_COLUMNS - DealFeedTaxonomyDmozPeer::NUM_LAZY_LOAD_COLUMNS);

		DealFeedPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (DealFeedPeer::NUM_COLUMNS - DealFeedPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(DealFeedTaxonomyDmozPeer::DEAL_FEED_ID, DealFeedPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DealFeedTaxonomyDmozPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DealFeedTaxonomyDmozPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = DealFeedTaxonomyDmozPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DealFeedTaxonomyDmozPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined DealFeed rows

				$key2 = DealFeedPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = DealFeedPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = DealFeedPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					DealFeedPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (DealFeedTaxonomyDmoz) to the collection in $obj2 (DealFeed)
				$obj2->addDealFeedTaxonomyDmoz($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseDealFeedTaxonomyDmozPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseDealFeedTaxonomyDmozPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new DealFeedTaxonomyDmozTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? DealFeedTaxonomyDmozPeer::CLASS_DEFAULT : DealFeedTaxonomyDmozPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a DealFeedTaxonomyDmoz or Criteria object.
	 *
	 * @param      mixed $values Criteria or DealFeedTaxonomyDmoz object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from DealFeedTaxonomyDmoz object
		}

		if ($criteria->containsKey(DealFeedTaxonomyDmozPeer::ID) && $criteria->keyContainsValue(DealFeedTaxonomyDmozPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DealFeedTaxonomyDmozPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a DealFeedTaxonomyDmoz or Criteria object.
	 *
	 * @param      mixed $values Criteria or DealFeedTaxonomyDmoz object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(DealFeedTaxonomyDmozPeer::ID);
			$value = $criteria->remove(DealFeedTaxonomyDmozPeer::ID);
			if ($value) {
				$selectCriteria->add(DealFeedTaxonomyDmozPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(DealFeedTaxonomyDmozPeer::TABLE_NAME);
			}

		} else { // $values is DealFeedTaxonomyDmoz object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the deal_feed_taxonomy_dmoz table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DealFeedTaxonomyDmozPeer::TABLE_NAME, $con, DealFeedTaxonomyDmozPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			DealFeedTaxonomyDmozPeer::clearInstancePool();
			DealFeedTaxonomyDmozPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a DealFeedTaxonomyDmoz or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or DealFeedTaxonomyDmoz object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			DealFeedTaxonomyDmozPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof DealFeedTaxonomyDmoz) { // it's a model object
			// invalidate the cache for this single object
			DealFeedTaxonomyDmozPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DealFeedTaxonomyDmozPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				DealFeedTaxonomyDmozPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			DealFeedTaxonomyDmozPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given DealFeedTaxonomyDmoz object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      DealFeedTaxonomyDmoz $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(DealFeedTaxonomyDmoz $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DealFeedTaxonomyDmozPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DealFeedTaxonomyDmozPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(DealFeedTaxonomyDmozPeer::DATABASE_NAME, DealFeedTaxonomyDmozPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     DealFeedTaxonomyDmoz
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DealFeedTaxonomyDmozPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DealFeedTaxonomyDmozPeer::DATABASE_NAME);
		$criteria->add(DealFeedTaxonomyDmozPeer::ID, $pk);

		$v = DealFeedTaxonomyDmozPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DealFeedTaxonomyDmozPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DealFeedTaxonomyDmozPeer::DATABASE_NAME);
			$criteria->add(DealFeedTaxonomyDmozPeer::ID, $pks, Criteria::IN);
			$objs = DealFeedTaxonomyDmozPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseDealFeedTaxonomyDmozPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseDealFeedTaxonomyDmozPeer::buildTableMap();

