<?php


/**
 * Base class that represents a row from the 'deal' table.
 *
 * 
 *
 * @package    propel.generator.komideals.om
 */
abstract class BaseDeal extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'DealPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        DealPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the business_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $business_id;

	/**
	 * The value for the date_start field.
	 * @var        string
	 */
	protected $date_start;

	/**
	 * The value for the date_end field.
	 * @var        string
	 */
	protected $date_end;

	/**
	 * The value for the is_active field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $is_active;

	/**
	 * The value for the price field.
	 * Note: this column has a database default value of: 0
	 * @var        double
	 */
	protected $price;

	/**
	 * The value for the value field.
	 * Note: this column has a database default value of: 0
	 * @var        double
	 */
	protected $value;

	/**
	 * The value for the details field.
	 * @var        string
	 */
	protected $details;

	/**
	 * The value for the date_tipped field.
	 * @var        string
	 */
	protected $date_tipped;

	/**
	 * The value for the is_tipped field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $is_tipped;

	/**
	 * The value for the pricing_model_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $pricing_model_id;

	/**
	 * The value for the tipping_point field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $tipping_point;

	/**
	 * The value for the category_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $category_id;

	/**
	 * @var        Category
	 */
	protected $aCategory;

	/**
	 * @var        PricingModel
	 */
	protected $aPricingModel;

	/**
	 * @var        Business
	 */
	protected $aBusiness;

	/**
	 * @var        array PricingDetail[] Collection to store aggregation of PricingDetail objects.
	 */
	protected $collPricingDetails;

	/**
	 * @var        array PurchaseDetail[] Collection to store aggregation of PurchaseDetail objects.
	 */
	protected $collPurchaseDetails;

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
		$this->business_id = 0;
		$this->is_active = 0;
		$this->price = 0;
		$this->value = 0;
		$this->is_tipped = 0;
		$this->pricing_model_id = 0;
		$this->tipping_point = 0;
		$this->category_id = 0;
	}

	/**
	 * Initializes internal state of BaseDeal object.
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
	 * Get the [business_id] column value.
	 * 
	 * @return     int
	 */
	public function getBusinessId()
	{
		return $this->business_id;
	}

	/**
	 * Get the [optionally formatted] temporal [date_start] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDateStart($format = 'Y-m-d H:i:s')
	{
		if ($this->date_start === null) {
			return null;
		}


		if ($this->date_start === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date_start);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_start, true), $x);
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
	 * Get the [optionally formatted] temporal [date_end] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDateEnd($format = 'Y-m-d H:i:s')
	{
		if ($this->date_end === null) {
			return null;
		}


		if ($this->date_end === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date_end);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_end, true), $x);
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
	 * Get the [is_active] column value.
	 * 
	 * @return     int
	 */
	public function getIsActive()
	{
		return $this->is_active;
	}

	/**
	 * Get the [price] column value.
	 * 
	 * @return     double
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Get the [value] column value.
	 * 
	 * @return     double
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Get the [details] column value.
	 * 
	 * @return     string
	 */
	public function getDetails()
	{
		return $this->details;
	}

	/**
	 * Get the [optionally formatted] temporal [date_tipped] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDateTipped($format = 'Y-m-d H:i:s')
	{
		if ($this->date_tipped === null) {
			return null;
		}


		if ($this->date_tipped === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date_tipped);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_tipped, true), $x);
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
	 * Get the [is_tipped] column value.
	 * 
	 * @return     int
	 */
	public function getIsTipped()
	{
		return $this->is_tipped;
	}

	/**
	 * Get the [pricing_model_id] column value.
	 * 
	 * @return     int
	 */
	public function getPricingModelId()
	{
		return $this->pricing_model_id;
	}

	/**
	 * Get the [tipping_point] column value.
	 * 
	 * @return     int
	 */
	public function getTippingPoint()
	{
		return $this->tipping_point;
	}

	/**
	 * Get the [category_id] column value.
	 * 
	 * @return     int
	 */
	public function getCategoryId()
	{
		return $this->category_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DealPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [business_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setBusinessId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->business_id !== $v || $this->isNew()) {
			$this->business_id = $v;
			$this->modifiedColumns[] = DealPeer::BUSINESS_ID;
		}

		if ($this->aBusiness !== null && $this->aBusiness->getId() !== $v) {
			$this->aBusiness = null;
		}

		return $this;
	} // setBusinessId()

	/**
	 * Sets the value of [date_start] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setDateStart($v)
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

		if ( $this->date_start !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->date_start !== null && $tmpDt = new DateTime($this->date_start)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->date_start = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = DealPeer::DATE_START;
			}
		} // if either are not null

		return $this;
	} // setDateStart()

	/**
	 * Sets the value of [date_end] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setDateEnd($v)
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

		if ( $this->date_end !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->date_end !== null && $tmpDt = new DateTime($this->date_end)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->date_end = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = DealPeer::DATE_END;
			}
		} // if either are not null

		return $this;
	} // setDateEnd()

	/**
	 * Set the value of [is_active] column.
	 * 
	 * @param      int $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setIsActive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->is_active !== $v || $this->isNew()) {
			$this->is_active = $v;
			$this->modifiedColumns[] = DealPeer::IS_ACTIVE;
		}

		return $this;
	} // setIsActive()

	/**
	 * Set the value of [price] column.
	 * 
	 * @param      double $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->price !== $v || $this->isNew()) {
			$this->price = $v;
			$this->modifiedColumns[] = DealPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [value] column.
	 * 
	 * @param      double $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setValue($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->value !== $v || $this->isNew()) {
			$this->value = $v;
			$this->modifiedColumns[] = DealPeer::VALUE;
		}

		return $this;
	} // setValue()

	/**
	 * Set the value of [details] column.
	 * 
	 * @param      string $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setDetails($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->details !== $v) {
			$this->details = $v;
			$this->modifiedColumns[] = DealPeer::DETAILS;
		}

		return $this;
	} // setDetails()

	/**
	 * Sets the value of [date_tipped] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setDateTipped($v)
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

		if ( $this->date_tipped !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->date_tipped !== null && $tmpDt = new DateTime($this->date_tipped)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->date_tipped = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = DealPeer::DATE_TIPPED;
			}
		} // if either are not null

		return $this;
	} // setDateTipped()

	/**
	 * Set the value of [is_tipped] column.
	 * 
	 * @param      int $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setIsTipped($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->is_tipped !== $v || $this->isNew()) {
			$this->is_tipped = $v;
			$this->modifiedColumns[] = DealPeer::IS_TIPPED;
		}

		return $this;
	} // setIsTipped()

	/**
	 * Set the value of [pricing_model_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setPricingModelId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pricing_model_id !== $v || $this->isNew()) {
			$this->pricing_model_id = $v;
			$this->modifiedColumns[] = DealPeer::PRICING_MODEL_ID;
		}

		if ($this->aPricingModel !== null && $this->aPricingModel->getId() !== $v) {
			$this->aPricingModel = null;
		}

		return $this;
	} // setPricingModelId()

	/**
	 * Set the value of [tipping_point] column.
	 * 
	 * @param      int $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setTippingPoint($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tipping_point !== $v || $this->isNew()) {
			$this->tipping_point = $v;
			$this->modifiedColumns[] = DealPeer::TIPPING_POINT;
		}

		return $this;
	} // setTippingPoint()

	/**
	 * Set the value of [category_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Deal The current object (for fluent API support)
	 */
	public function setCategoryId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->category_id !== $v || $this->isNew()) {
			$this->category_id = $v;
			$this->modifiedColumns[] = DealPeer::CATEGORY_ID;
		}

		if ($this->aCategory !== null && $this->aCategory->getId() !== $v) {
			$this->aCategory = null;
		}

		return $this;
	} // setCategoryId()

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
			if ($this->business_id !== 0) {
				return false;
			}

			if ($this->is_active !== 0) {
				return false;
			}

			if ($this->price !== 0) {
				return false;
			}

			if ($this->value !== 0) {
				return false;
			}

			if ($this->is_tipped !== 0) {
				return false;
			}

			if ($this->pricing_model_id !== 0) {
				return false;
			}

			if ($this->tipping_point !== 0) {
				return false;
			}

			if ($this->category_id !== 0) {
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
			$this->business_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->date_start = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->date_end = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->is_active = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->price = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
			$this->value = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
			$this->details = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->date_tipped = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->is_tipped = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->pricing_model_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->tipping_point = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->category_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 13; // 13 = DealPeer::NUM_COLUMNS - DealPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Deal object", $e);
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

		if ($this->aBusiness !== null && $this->business_id !== $this->aBusiness->getId()) {
			$this->aBusiness = null;
		}
		if ($this->aPricingModel !== null && $this->pricing_model_id !== $this->aPricingModel->getId()) {
			$this->aPricingModel = null;
		}
		if ($this->aCategory !== null && $this->category_id !== $this->aCategory->getId()) {
			$this->aCategory = null;
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
			$con = Propel::getConnection(DealPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = DealPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?
			$this->aCategory = null;
			$this->aPricingModel = null;
			$this->aBusiness = null;
			$this->collPricingDetails = null;
			$this->collPurchaseDetails = null;
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
			$con = Propel::getConnection(DealPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				DealQuery::create()
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
			$con = Propel::getConnection(DealPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				DealPeer::addInstanceToPool($this);
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

			if ($this->aCategory !== null) {
				if ($this->aCategory->isModified() || $this->aCategory->isNew()) {
					$affectedRows += $this->aCategory->save($con);
				}
				$this->setCategory($this->aCategory);
			}

			if ($this->aPricingModel !== null) {
				if ($this->aPricingModel->isModified() || $this->aPricingModel->isNew()) {
					$affectedRows += $this->aPricingModel->save($con);
				}
				$this->setPricingModel($this->aPricingModel);
			}

			if ($this->aBusiness !== null) {
				if ($this->aBusiness->isModified() || $this->aBusiness->isNew()) {
					$affectedRows += $this->aBusiness->save($con);
				}
				$this->setBusiness($this->aBusiness);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DealPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(DealPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.DealPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += DealPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collPricingDetails !== null) {
				foreach ($this->collPricingDetails as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPurchaseDetails !== null) {
				foreach ($this->collPurchaseDetails as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

			if ($this->aCategory !== null) {
				if (!$this->aCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategory->getValidationFailures());
				}
			}

			if ($this->aPricingModel !== null) {
				if (!$this->aPricingModel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPricingModel->getValidationFailures());
				}
			}

			if ($this->aBusiness !== null) {
				if (!$this->aBusiness->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBusiness->getValidationFailures());
				}
			}


			if (($retval = DealPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPricingDetails !== null) {
					foreach ($this->collPricingDetails as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPurchaseDetails !== null) {
					foreach ($this->collPurchaseDetails as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = DealPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getBusinessId();
				break;
			case 2:
				return $this->getDateStart();
				break;
			case 3:
				return $this->getDateEnd();
				break;
			case 4:
				return $this->getIsActive();
				break;
			case 5:
				return $this->getPrice();
				break;
			case 6:
				return $this->getValue();
				break;
			case 7:
				return $this->getDetails();
				break;
			case 8:
				return $this->getDateTipped();
				break;
			case 9:
				return $this->getIsTipped();
				break;
			case 10:
				return $this->getPricingModelId();
				break;
			case 11:
				return $this->getTippingPoint();
				break;
			case 12:
				return $this->getCategoryId();
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
		$keys = DealPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getBusinessId(),
			$keys[2] => $this->getDateStart(),
			$keys[3] => $this->getDateEnd(),
			$keys[4] => $this->getIsActive(),
			$keys[5] => $this->getPrice(),
			$keys[6] => $this->getValue(),
			$keys[7] => $this->getDetails(),
			$keys[8] => $this->getDateTipped(),
			$keys[9] => $this->getIsTipped(),
			$keys[10] => $this->getPricingModelId(),
			$keys[11] => $this->getTippingPoint(),
			$keys[12] => $this->getCategoryId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCategory) {
				$result['Category'] = $this->aCategory->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aPricingModel) {
				$result['PricingModel'] = $this->aPricingModel->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aBusiness) {
				$result['Business'] = $this->aBusiness->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = DealPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setBusinessId($value);
				break;
			case 2:
				$this->setDateStart($value);
				break;
			case 3:
				$this->setDateEnd($value);
				break;
			case 4:
				$this->setIsActive($value);
				break;
			case 5:
				$this->setPrice($value);
				break;
			case 6:
				$this->setValue($value);
				break;
			case 7:
				$this->setDetails($value);
				break;
			case 8:
				$this->setDateTipped($value);
				break;
			case 9:
				$this->setIsTipped($value);
				break;
			case 10:
				$this->setPricingModelId($value);
				break;
			case 11:
				$this->setTippingPoint($value);
				break;
			case 12:
				$this->setCategoryId($value);
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
		$keys = DealPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setBusinessId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDateStart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDateEnd($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIsActive($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrice($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setValue($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDetails($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDateTipped($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIsTipped($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPricingModelId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTippingPoint($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCategoryId($arr[$keys[12]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(DealPeer::DATABASE_NAME);

		if ($this->isColumnModified(DealPeer::ID)) $criteria->add(DealPeer::ID, $this->id);
		if ($this->isColumnModified(DealPeer::BUSINESS_ID)) $criteria->add(DealPeer::BUSINESS_ID, $this->business_id);
		if ($this->isColumnModified(DealPeer::DATE_START)) $criteria->add(DealPeer::DATE_START, $this->date_start);
		if ($this->isColumnModified(DealPeer::DATE_END)) $criteria->add(DealPeer::DATE_END, $this->date_end);
		if ($this->isColumnModified(DealPeer::IS_ACTIVE)) $criteria->add(DealPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(DealPeer::PRICE)) $criteria->add(DealPeer::PRICE, $this->price);
		if ($this->isColumnModified(DealPeer::VALUE)) $criteria->add(DealPeer::VALUE, $this->value);
		if ($this->isColumnModified(DealPeer::DETAILS)) $criteria->add(DealPeer::DETAILS, $this->details);
		if ($this->isColumnModified(DealPeer::DATE_TIPPED)) $criteria->add(DealPeer::DATE_TIPPED, $this->date_tipped);
		if ($this->isColumnModified(DealPeer::IS_TIPPED)) $criteria->add(DealPeer::IS_TIPPED, $this->is_tipped);
		if ($this->isColumnModified(DealPeer::PRICING_MODEL_ID)) $criteria->add(DealPeer::PRICING_MODEL_ID, $this->pricing_model_id);
		if ($this->isColumnModified(DealPeer::TIPPING_POINT)) $criteria->add(DealPeer::TIPPING_POINT, $this->tipping_point);
		if ($this->isColumnModified(DealPeer::CATEGORY_ID)) $criteria->add(DealPeer::CATEGORY_ID, $this->category_id);

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
		$criteria = new Criteria(DealPeer::DATABASE_NAME);
		$criteria->add(DealPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Deal (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setBusinessId($this->business_id);
		$copyObj->setDateStart($this->date_start);
		$copyObj->setDateEnd($this->date_end);
		$copyObj->setIsActive($this->is_active);
		$copyObj->setPrice($this->price);
		$copyObj->setValue($this->value);
		$copyObj->setDetails($this->details);
		$copyObj->setDateTipped($this->date_tipped);
		$copyObj->setIsTipped($this->is_tipped);
		$copyObj->setPricingModelId($this->pricing_model_id);
		$copyObj->setTippingPoint($this->tipping_point);
		$copyObj->setCategoryId($this->category_id);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getPricingDetails() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPricingDetail($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPurchaseDetails() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPurchaseDetail($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


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
	 * @return     Deal Clone of current object.
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
	 * @return     DealPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DealPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Category object.
	 *
	 * @param      Category $v
	 * @return     Deal The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCategory(Category $v = null)
	{
		if ($v === null) {
			$this->setCategoryId(0);
		} else {
			$this->setCategoryId($v->getId());
		}

		$this->aCategory = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Category object, it will not be re-added.
		if ($v !== null) {
			$v->addDeal($this);
		}

		return $this;
	}


	/**
	 * Get the associated Category object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Category The associated Category object.
	 * @throws     PropelException
	 */
	public function getCategory(PropelPDO $con = null)
	{
		if ($this->aCategory === null && ($this->category_id !== null)) {
			$this->aCategory = CategoryQuery::create()->findPk($this->category_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aCategory->addDeals($this);
			 */
		}
		return $this->aCategory;
	}

	/**
	 * Declares an association between this object and a PricingModel object.
	 *
	 * @param      PricingModel $v
	 * @return     Deal The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPricingModel(PricingModel $v = null)
	{
		if ($v === null) {
			$this->setPricingModelId(0);
		} else {
			$this->setPricingModelId($v->getId());
		}

		$this->aPricingModel = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the PricingModel object, it will not be re-added.
		if ($v !== null) {
			$v->addDeal($this);
		}

		return $this;
	}


	/**
	 * Get the associated PricingModel object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     PricingModel The associated PricingModel object.
	 * @throws     PropelException
	 */
	public function getPricingModel(PropelPDO $con = null)
	{
		if ($this->aPricingModel === null && ($this->pricing_model_id !== null)) {
			$this->aPricingModel = PricingModelQuery::create()->findPk($this->pricing_model_id, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aPricingModel->addDeals($this);
			 */
		}
		return $this->aPricingModel;
	}

	/**
	 * Declares an association between this object and a Business object.
	 *
	 * @param      Business $v
	 * @return     Deal The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setBusiness(Business $v = null)
	{
		if ($v === null) {
			$this->setBusinessId(0);
		} else {
			$this->setBusinessId($v->getId());
		}

		$this->aBusiness = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Business object, it will not be re-added.
		if ($v !== null) {
			$v->addDeal($this);
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
				 $this->aBusiness->addDeals($this);
			 */
		}
		return $this->aBusiness;
	}

	/**
	 * Clears out the collPricingDetails collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPricingDetails()
	 */
	public function clearPricingDetails()
	{
		$this->collPricingDetails = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPricingDetails collection.
	 *
	 * By default this just sets the collPricingDetails collection to an empty array (like clearcollPricingDetails());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPricingDetails()
	{
		$this->collPricingDetails = new PropelObjectCollection();
		$this->collPricingDetails->setModel('PricingDetail');
	}

	/**
	 * Gets an array of PricingDetail objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Deal is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PricingDetail[] List of PricingDetail objects
	 * @throws     PropelException
	 */
	public function getPricingDetails($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPricingDetails || null !== $criteria) {
			if ($this->isNew() && null === $this->collPricingDetails) {
				// return empty collection
				$this->initPricingDetails();
			} else {
				$collPricingDetails = PricingDetailQuery::create(null, $criteria)
					->filterByDeal($this)
					->find($con);
				if (null !== $criteria) {
					return $collPricingDetails;
				}
				$this->collPricingDetails = $collPricingDetails;
			}
		}
		return $this->collPricingDetails;
	}

	/**
	 * Returns the number of related PricingDetail objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PricingDetail objects.
	 * @throws     PropelException
	 */
	public function countPricingDetails(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPricingDetails || null !== $criteria) {
			if ($this->isNew() && null === $this->collPricingDetails) {
				return 0;
			} else {
				$query = PricingDetailQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByDeal($this)
					->count($con);
			}
		} else {
			return count($this->collPricingDetails);
		}
	}

	/**
	 * Method called to associate a PricingDetail object to this object
	 * through the PricingDetail foreign key attribute.
	 *
	 * @param      PricingDetail $l PricingDetail
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPricingDetail(PricingDetail $l)
	{
		if ($this->collPricingDetails === null) {
			$this->initPricingDetails();
		}
		if (!$this->collPricingDetails->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPricingDetails[]= $l;
			$l->setDeal($this);
		}
	}

	/**
	 * Clears out the collPurchaseDetails collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPurchaseDetails()
	 */
	public function clearPurchaseDetails()
	{
		$this->collPurchaseDetails = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPurchaseDetails collection.
	 *
	 * By default this just sets the collPurchaseDetails collection to an empty array (like clearcollPurchaseDetails());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPurchaseDetails()
	{
		$this->collPurchaseDetails = new PropelObjectCollection();
		$this->collPurchaseDetails->setModel('PurchaseDetail');
	}

	/**
	 * Gets an array of PurchaseDetail objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Deal is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PurchaseDetail[] List of PurchaseDetail objects
	 * @throws     PropelException
	 */
	public function getPurchaseDetails($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPurchaseDetails || null !== $criteria) {
			if ($this->isNew() && null === $this->collPurchaseDetails) {
				// return empty collection
				$this->initPurchaseDetails();
			} else {
				$collPurchaseDetails = PurchaseDetailQuery::create(null, $criteria)
					->filterByDeal($this)
					->find($con);
				if (null !== $criteria) {
					return $collPurchaseDetails;
				}
				$this->collPurchaseDetails = $collPurchaseDetails;
			}
		}
		return $this->collPurchaseDetails;
	}

	/**
	 * Returns the number of related PurchaseDetail objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PurchaseDetail objects.
	 * @throws     PropelException
	 */
	public function countPurchaseDetails(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPurchaseDetails || null !== $criteria) {
			if ($this->isNew() && null === $this->collPurchaseDetails) {
				return 0;
			} else {
				$query = PurchaseDetailQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByDeal($this)
					->count($con);
			}
		} else {
			return count($this->collPurchaseDetails);
		}
	}

	/**
	 * Method called to associate a PurchaseDetail object to this object
	 * through the PurchaseDetail foreign key attribute.
	 *
	 * @param      PurchaseDetail $l PurchaseDetail
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPurchaseDetail(PurchaseDetail $l)
	{
		if ($this->collPurchaseDetails === null) {
			$this->initPurchaseDetails();
		}
		if (!$this->collPurchaseDetails->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPurchaseDetails[]= $l;
			$l->setDeal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Deal is new, it will return
	 * an empty collection; or if this Deal has previously
	 * been saved, it will retrieve related PurchaseDetails from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Deal.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PurchaseDetail[] List of PurchaseDetail objects
	 */
	public function getPurchaseDetailsJoinPurchaseOrder($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PurchaseDetailQuery::create(null, $criteria);
		$query->joinWith('PurchaseOrder', $join_behavior);

		return $this->getPurchaseDetails($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->business_id = null;
		$this->date_start = null;
		$this->date_end = null;
		$this->is_active = null;
		$this->price = null;
		$this->value = null;
		$this->details = null;
		$this->date_tipped = null;
		$this->is_tipped = null;
		$this->pricing_model_id = null;
		$this->tipping_point = null;
		$this->category_id = null;
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
			if ($this->collPricingDetails) {
				foreach ((array) $this->collPricingDetails as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPurchaseDetails) {
				foreach ((array) $this->collPurchaseDetails as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collPricingDetails = null;
		$this->collPurchaseDetails = null;
		$this->aCategory = null;
		$this->aPricingModel = null;
		$this->aBusiness = null;
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

} // BaseDeal
