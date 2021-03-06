<?php


/**
 * Base class that represents a row from the 'deal_feed_click' table.
 *
 * 
 *
 * @package    propel.generator.komideals.om
 */
abstract class BaseDealFeedClick extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'DealFeedClickPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        DealFeedClickPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the deal_feed_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $deal_feed_id;

	/**
	 * The value for the business_id field.
	 * @var        int
	 */
	protected $business_id;

	/**
	 * The value for the date_created field.
	 * @var        string
	 */
	protected $date_created;

	/**
	 * The value for the user_agent_id field.
	 * @var        int
	 */
	protected $user_agent_id;

	/**
	 * The value for the http_referer field.
	 * @var        string
	 */
	protected $http_referer;

	/**
	 * The value for the remote_addr field.
	 * @var        string
	 */
	protected $remote_addr;

	/**
	 * The value for the sid field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $sid;

	/**
	 * The value for the http_referer2 field.
	 * @var        string
	 */
	protected $http_referer2;

	/**
	 * @var        DealFeed
	 */
	protected $aDealFeed;

	/**
	 * @var        Business
	 */
	protected $aBusiness;

	/**
	 * @var        UserAgent
	 */
	protected $aUserAgent;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->deal_feed_id = 0;
		$this->sid = '';
	}

	/**
	 * Initializes internal state of BaseDealFeedClick object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [deal_feed_id] column value.
	 * 
	 * @return     int
	 */
	public function getDealFeedId()
	{
		return $this->deal_feed_id;
	}

	/**
	 * Get the [business_id] column value.
	 * 
	 * @return     int
	 */
	public function getBusinessId()
	{
		return $this->business_id;
	}

	/**
	 * Get the [optionally formatted] temporal [date_created] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDateCreated($format = 'Y-m-d H:i:s')
	{
		if ($this->date_created === null) {
			return null;
		}


		if ($this->date_created === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date_created);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_created, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [user_agent_id] column value.
	 * 
	 * @return     int
	 */
	public function getUserAgentId()
	{
		return $this->user_agent_id;
	}

	/**
	 * Get the [http_referer] column value.
	 * 
	 * @return     string
	 */
	public function getHttpReferer()
	{
		return $this->http_referer;
	}

	/**
	 * Get the [remote_addr] column value.
	 * 
	 * @return     string
	 */
	public function getRemoteAddr()
	{
		return $this->remote_addr;
	}

	/**
	 * Get the [sid] column value.
	 * 
	 * @return     string
	 */
	public function getSid()
	{
		return $this->sid;
	}

	/**
	 * Get the [http_referer2] column value.
	 * 
	 * @return     string
	 */
	public function getHttpReferer2()
	{
		return $this->http_referer2;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     DealFeedClick The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DealFeedClickPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [deal_feed_id] column.
	 * 
	 * @param      int $v new value
	 * @return     DealFeedClick The current object (for fluent API support)
	 */
	public function setDealFeedId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->deal_feed_id !== $v || $this->isNew()) {
			$this->deal_feed_id = $v;
			$this->modifiedColumns[] = DealFeedClickPeer::DEAL_FEED_ID;
		}

		if ($this->aDealFeed !== null && $this->aDealFeed->getId() !== $v) {
			$this->aDealFeed = null;
		}

		return $this;
	} // setDealFeedId()

	/**
	 * Set the value of [business_id] column.
	 * 
	 * @param      int $v new value
	 * @return     DealFeedClick The current object (for fluent API support)
	 */
	public function setBusinessId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->business_id !== $v) {
			$this->business_id = $v;
			$this->modifiedColumns[] = DealFeedClickPeer::BUSINESS_ID;
		}

		if ($this->aBusiness !== null && $this->aBusiness->getId() !== $v) {
			$this->aBusiness = null;
		}

		return $this;
	} // setBusinessId()

	/**
	 * Sets the value of [date_created] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     DealFeedClick The current object (for fluent API support)
	 */
	public function setDateCreated($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->date_created !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->date_created !== null && $tmpDt = new DateTime($this->date_created)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->date_created = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = DealFeedClickPeer::DATE_CREATED;
			}
		} // if either are not null

		return $this;
	} // setDateCreated()

	/**
	 * Set the value of [user_agent_id] column.
	 * 
	 * @param      int $v new value
	 * @return     DealFeedClick The current object (for fluent API support)
	 */
	public function setUserAgentId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->user_agent_id !== $v) {
			$this->user_agent_id = $v;
			$this->modifiedColumns[] = DealFeedClickPeer::USER_AGENT_ID;
		}

		if ($this->aUserAgent !== null && $this->aUserAgent->getId() !== $v) {
			$this->aUserAgent = null;
		}

		return $this;
	} // setUserAgentId()

	/**
	 * Set the value of [http_referer] column.
	 * 
	 * @param      string $v new value
	 * @return     DealFeedClick The current object (for fluent API support)
	 */
	public function setHttpReferer($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->http_referer !== $v) {
			$this->http_referer = $v;
			$this->modifiedColumns[] = DealFeedClickPeer::HTTP_REFERER;
		}

		return $this;
	} // setHttpReferer()

	/**
	 * Set the value of [remote_addr] column.
	 * 
	 * @param      string $v new value
	 * @return     DealFeedClick The current object (for fluent API support)
	 */
	public function setRemoteAddr($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->remote_addr !== $v) {
			$this->remote_addr = $v;
			$this->modifiedColumns[] = DealFeedClickPeer::REMOTE_ADDR;
		}

		return $this;
	} // setRemoteAddr()

	/**
	 * Set the value of [sid] column.
	 * 
	 * @param      string $v new value
	 * @return     DealFeedClick The current object (for fluent API support)
	 */
	public function setSid($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sid !== $v || $this->isNew()) {
			$this->sid = $v;
			$this->modifiedColumns[] = DealFeedClickPeer::SID;
		}

		return $this;
	} // setSid()

	/**
	 * Set the value of [http_referer2] column.
	 * 
	 * @param      string $v new value
	 * @return     DealFeedClick The current object (for fluent API support)
	 */
	public function setHttpReferer2($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->http_referer2 !== $v) {
			$this->http_referer2 = $v;
			$this->modifiedColumns[] = DealFeedClickPeer::HTTP_REFERER2;
		}

		return $this;
	} // setHttpReferer2()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->deal_feed_id !== 0) {
				return false;
			}

			if ($this->sid !== '') {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->deal_feed_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->business_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->date_created = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->user_agent_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->http_referer = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->remote_addr = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->sid = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->http_referer2 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = DealFeedClickPeer::NUM_COLUMNS - DealFeedClickPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating DealFeedClick object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aDealFeed !== null && $this->deal_feed_id !== $this->aDealFeed->getId()) {
			$this->aDealFeed = null;
		}
		if ($this->aBusiness !== null && $this->business_id !== $this->aBusiness->getId()) {
			$this->aBusiness = null;
		}
		if ($this->aUserAgent !== null && $this->user_agent_id !== $this->aUserAgent->getId()) {
			$this->aUserAgent = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DealFeedClickPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = DealFeedClickPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?
			$this->aDealFeed = null;
			$this->aBusiness = null;
			$this->aUserAgent = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DealFeedClickPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				DealFeedClickQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DealFeedClickPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				DealFeedClickPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aDealFeed !== null) {
				if ($this->aDealFeed->isModified() || $this->aDealFeed->isNew()) {
					$affectedRows += $this->aDealFeed->save($con);
				}
				$this->setDealFeed($this->aDealFeed);
			}

			if ($this->aBusiness !== null) {
				if ($this->aBusiness->isModified() || $this->aBusiness->isNew()) {
					$affectedRows += $this->aBusiness->save($con);
				}
				$this->setBusiness($this->aBusiness);
			}

			if ($this->aUserAgent !== null) {
				if ($this->aUserAgent->isModified() || $this->aUserAgent->isNew()) {
					$affectedRows += $this->aUserAgent->save($con);
				}
				$this->setUserAgent($this->aUserAgent);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DealFeedClickPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(DealFeedClickPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.DealFeedClickPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += DealFeedClickPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aDealFeed !== null) {
				if (!$this->aDealFeed->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDealFeed->getValidationFailures());
				}
			}

			if ($this->aBusiness !== null) {
				if (!$this->aBusiness->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBusiness->getValidationFailures());
				}
			}

			if ($this->aUserAgent !== null) {
				if (!$this->aUserAgent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserAgent->getValidationFailures());
				}
			}


			if (($retval = DealFeedClickPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DealFeedClickPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDealFeedId();
				break;
			case 2:
				return $this->getBusinessId();
				break;
			case 3:
				return $this->getDateCreated();
				break;
			case 4:
				return $this->getUserAgentId();
				break;
			case 5:
				return $this->getHttpReferer();
				break;
			case 6:
				return $this->getRemoteAddr();
				break;
			case 7:
				return $this->getSid();
				break;
			case 8:
				return $this->getHttpReferer2();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = DealFeedClickPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDealFeedId(),
			$keys[2] => $this->getBusinessId(),
			$keys[3] => $this->getDateCreated(),
			$keys[4] => $this->getUserAgentId(),
			$keys[5] => $this->getHttpReferer(),
			$keys[6] => $this->getRemoteAddr(),
			$keys[7] => $this->getSid(),
			$keys[8] => $this->getHttpReferer2(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aDealFeed) {
				$result['DealFeed'] = $this->aDealFeed->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aBusiness) {
				$result['Business'] = $this->aBusiness->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aUserAgent) {
				$result['UserAgent'] = $this->aUserAgent->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DealFeedClickPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDealFeedId($value);
				break;
			case 2:
				$this->setBusinessId($value);
				break;
			case 3:
				$this->setDateCreated($value);
				break;
			case 4:
				$this->setUserAgentId($value);
				break;
			case 5:
				$this->setHttpReferer($value);
				break;
			case 6:
				$this->setRemoteAddr($value);
				break;
			case 7:
				$this->setSid($value);
				break;
			case 8:
				$this->setHttpReferer2($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DealFeedClickPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDealFeedId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBusinessId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDateCreated($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUserAgentId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHttpReferer($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRemoteAddr($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSid($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setHttpReferer2($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(DealFeedClickPeer::DATABASE_NAME);

		if ($this->isColumnModified(DealFeedClickPeer::ID)) $criteria->add(DealFeedClickPeer::ID, $this->id);
		if ($this->isColumnModified(DealFeedClickPeer::DEAL_FEED_ID)) $criteria->add(DealFeedClickPeer::DEAL_FEED_ID, $this->deal_feed_id);
		if ($this->isColumnModified(DealFeedClickPeer::BUSINESS_ID)) $criteria->add(DealFeedClickPeer::BUSINESS_ID, $this->business_id);
		if ($this->isColumnModified(DealFeedClickPeer::DATE_CREATED)) $criteria->add(DealFeedClickPeer::DATE_CREATED, $this->date_created);
		if ($this->isColumnModified(DealFeedClickPeer::USER_AGENT_ID)) $criteria->add(DealFeedClickPeer::USER_AGENT_ID, $this->user_agent_id);
		if ($this->isColumnModified(DealFeedClickPeer::HTTP_REFERER)) $criteria->add(DealFeedClickPeer::HTTP_REFERER, $this->http_referer);
		if ($this->isColumnModified(DealFeedClickPeer::REMOTE_ADDR)) $criteria->add(DealFeedClickPeer::REMOTE_ADDR, $this->remote_addr);
		if ($this->isColumnModified(DealFeedClickPeer::SID)) $criteria->add(DealFeedClickPeer::SID, $this->sid);
		if ($this->isColumnModified(DealFeedClickPeer::HTTP_REFERER2)) $criteria->add(DealFeedClickPeer::HTTP_REFERER2, $this->http_referer2);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DealFeedClickPeer::DATABASE_NAME);
		$criteria->add(DealFeedClickPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of DealFeedClick (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setDealFeedId($this->deal_feed_id);
		$copyObj->setBusinessId($this->business_id);
		$copyObj->setDateCreated($this->date_created);
		$copyObj->setUserAgentId($this->user_agent_id);
		$copyObj->setHttpReferer($this->http_referer);
		$copyObj->setRemoteAddr($this->remote_addr);
		$copyObj->setSid($this->sid);
		$copyObj->setHttpReferer2($this->http_referer2);

		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     DealFeedClick Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     DealFeedClickPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DealFeedClickPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a DealFeed object.
	 *
	 * @param      DealFeed $v
	 * @return     DealFeedClick The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setDealFeed(DealFeed $v = null)
	{
		if ($v === null) {
			$this->setDealFeedId(0);
		} else {
			$this->setDealFeedId($v->getId());
		}

		$this->aDealFeed = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the DealFeed object, it will not be re-added.
		if ($v !== null) {
			$v->addDealFeedClick($this);
		}

		return $this;
	}


	/**
	 * Get the associated DealFeed object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     DealFeed The associated DealFeed object.
	 * @throws     PropelException
	 */
	public function getDealFeed(PropelPDO $con = null)
	{
		if ($this->aDealFeed === null && ($this->deal_feed_id !== null)) {
			$this->aDealFeed = DealFeedQuery::create()->findPk($this->deal_feed_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aDealFeed->addDealFeedClicks($this);
			 */
		}
		return $this->aDealFeed;
	}

	/**
	 * Declares an association between this object and a Business object.
	 *
	 * @param      Business $v
	 * @return     DealFeedClick The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setBusiness(Business $v = null)
	{
		if ($v === null) {
			$this->setBusinessId(NULL);
		} else {
			$this->setBusinessId($v->getId());
		}

		$this->aBusiness = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Business object, it will not be re-added.
		if ($v !== null) {
			$v->addDealFeedClick($this);
		}

		return $this;
	}


	/**
	 * Get the associated Business object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Business The associated Business object.
	 * @throws     PropelException
	 */
	public function getBusiness(PropelPDO $con = null)
	{
		if ($this->aBusiness === null && ($this->business_id !== null)) {
			$this->aBusiness = BusinessQuery::create()->findPk($this->business_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aBusiness->addDealFeedClicks($this);
			 */
		}
		return $this->aBusiness;
	}

	/**
	 * Declares an association between this object and a UserAgent object.
	 *
	 * @param      UserAgent $v
	 * @return     DealFeedClick The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserAgent(UserAgent $v = null)
	{
		if ($v === null) {
			$this->setUserAgentId(NULL);
		} else {
			$this->setUserAgentId($v->getId());
		}

		$this->aUserAgent = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the UserAgent object, it will not be re-added.
		if ($v !== null) {
			$v->addDealFeedClick($this);
		}

		return $this;
	}


	/**
	 * Get the associated UserAgent object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     UserAgent The associated UserAgent object.
	 * @throws     PropelException
	 */
	public function getUserAgent(PropelPDO $con = null)
	{
		if ($this->aUserAgent === null && ($this->user_agent_id !== null)) {
			$this->aUserAgent = UserAgentQuery::create()->findPk($this->user_agent_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aUserAgent->addDealFeedClicks($this);
			 */
		}
		return $this->aUserAgent;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->deal_feed_id = null;
		$this->business_id = null;
		$this->date_created = null;
		$this->user_agent_id = null;
		$this->http_referer = null;
		$this->remote_addr = null;
		$this->sid = null;
		$this->http_referer2 = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

		$this->aDealFeed = null;
		$this->aBusiness = null;
		$this->aUserAgent = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseDealFeedClick
