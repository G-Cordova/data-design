<?php

/**
 * PSR-4 Compliant Autoloader
 *
 * This will dynamically load classes by resolving the prefix and class name. This is the method that frameworks
 * such as Laravel and Composer automatically resolve class names and load them. To use it, simply set the
 * configurable parameters inside the closure. This example is taken from PHP-FIG, referenced below.
 *
 * @param string $class fully qualified class name to load
 * @see http://www.php-fig.org/psr/psr-4/examples/ PSR-4 Example Autoloader
 **/
spl_autoload_register(function($post) {
	/**
	 * CONFIGURABLE PARAMETERS
	 * prefix: the prefix for all the classes (i.e., the namespace)
	 * baseDir: the base directory for all classes (default = current directory)
	 **/
	$prefix = "Edu\\Cnm\\DataDesign";
	$baseDir = __DIR__;

	// does the class use the namespace prefix?
	$len = strlen($prefix);
	if (strncmp($prefix, $post, $len) !== 0) {
		// no, move to the next registered autoloader
		return;
	}

	// get the relative class name
	$className = substr($post, $len);

	// replace the namespace prefix with the base directory, replace namespace
	// separators with directory separators in the relative class name, append
	// with .php
	$file = $baseDir . str_replace("\\", "/", $postName) . ".php";

	// if the file exists, require it
	if(file_exists($file)) {
		require_once($file);
	}
});

/**
namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;
 **/

namespace Edu\Cnm\DataDesign;
/**
 * Trait to Validate a mySQL Date
 *
 * This trait will inject a private method to validate a mySQL style date (e.g., 2016-01-15 15:32:48.643216). It will
 * convert a string representation to a DateTime object or throw an exception.
 *
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * @version 4.0.1
 **/
trait ValidateDate {
	/**
	 * custom filter for mySQL date
	 *
	 * Converts a string to a DateTime object; this is designed to be used within a mutator method.
	 *
	 * @param \DateTime|string $newDate date to validate
	 * @return \DateTime DateTime object containing the validated date
	 * @see http://php.net/manual/en/class.datetime.php PHP's DateTime class
	 * @throws \InvalidArgumentException if the date is in an invalid format
	 * @throws \RangeException if the date is not a Gregorian date
	 * @throws \TypeError when type hints fail
	 **/
	private static function validateDate($newDate) : \DateTime {
		// base case: if the date is a DateTime object, there's no work to be done
		if(is_object($newDate) === true && get_class($newDate) === "DateTime") {
			return ($newDate);
		}
		// treat the date as a mySQL date string: Y-m-d
		$newDate = trim($newDate);
		if((preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $newDate, $matches)) !== 1) {
			throw(new \InvalidArgumentException("date is not a valid date"));
		}
		// verify the date is really a valid calendar date
		$year = intval($matches[1]);
		$month = intval($matches[2]);
		$day = intval($matches[3]);
		if(checkdate($month, $day, $year) === false) {
			throw(new \RangeException("date is not a Gregorian date"));
		}
		// if we got here, the date is clean
		$newDate = \DateTime::createFromFormat("Y-m-d H:i:s", $newDate . " 00:00:00");
		return($newDate);
	}
	/**
	 * custom filter for mySQL style dates
	 *
	 * Converts a string to a DateTime object; this is designed to be used within a mutator method.
	 *
	 * @param mixed $newDateTime date to validate
	 * @return \DateTime DateTime object containing the validated date
	 * @see http://php.net/manual/en/class.datetime.php PHP's DateTime class
	 * @throws \InvalidArgumentException if the date is in an invalid format
	 * @throws \RangeException if the date is not a Gregorian date
	 * @throws \TypeError when type hints fail
	 * @throws \Exception if some other error occurs
	 **/
	private static function validateDateTime($newDateTime) : \DateTime {
		// base case: if the date is a DateTime object, there's no work to be done
		if(is_object($newDateTime) === true && get_class($newDateTime) === "DateTime") {
			return($newDateTime);
		}
		try {
			list($date, $time) = explode(" ", $newDateTime);
			$date = self::validateDate($date);
			$time = self::validateTime($time);
			list($hour, $minute, $second) = explode(":", $time);
			list($second, $microseconds) = explode(".", $second);
			$date->setTime($hour, $minute, $second, $microseconds);
			return($date);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * custom filter for mySQL style times
	 *
	 * validates a time string; this is designed to be used within a mutator method.
	 *
	 * @param string $newTime time to validate
	 * @return string validated time as a string H:i:s[.u]
	 * @see http://php.net/manual/en/class.datetime.php PHP's DateTime class
	 * @throws \InvalidArgumentException if the date is in an invalid format
	 * @throws \RangeException if the date is not a Gregorian date
	 **/
	private static function validateTime(string $newTime) : string {
		// treat the date as a mySQL date string: H:i:s[.u]
		$newTime = trim($newTime);
		if((preg_match("/^(\d{2}):(\d{2}):(\d{2})(?(?=\.)\.(\d{1,6}))$/", $newTime, $matches)) !== 1) {
			throw(new \InvalidArgumentException("time is not a valid time"));
		}
		// verify the date is really a valid calendar date
		$hour = intval($matches[1]);
		$minute = intval($matches[2]);
		$second = intval($matches[3]);
		// verify the time is really a valid wall clock time
		if($hour < 0 || $hour >= 24 || $minute < 0 || $minute >= 60 || $second < 0  || $second >= 60) {
			throw(new \RangeException("date is not a valid wall clock time"));
		}
		// put a placeholder for microseconds if they do not exist
		$microseconds = $matches[4] ?? "0";
		$newTime = "$hour:$minute:$second.$microseconds";
		// if we got here, the date is clean
		return($newTime);
	}
}

namespace Edu\Cnm\DataDesign;
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
use Ramsey\Uuid\Uuid;
/**
 * Trait to validate a uuid
 *
 * This trait will validate a uuid in any of the following three formats:
 *
 * 1. human readable string (36 bytes)
 * 2. binary string (16 bytes)
 * 3. Ramsey\Uuid\Uuid object
 *
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * @package Edu\Cnm\Misquote
 **/
trait ValidateUuid {
	/**
	 * validates a uuid irrespective of format
	 *
	 * @param string|Uuid $newUuid uuid to validate
	 * @return Uuid object with validated uuid
	 * @throws \InvalidArgumentException if $newUuid is not a valid uuid
	 * @throws \RangeException if $newUuid is not a valid uuid v4
	 **/
	private static function validateUuid($newUuid) : Uuid {
		// verify a string uuid
		if(gettype($newUuid) === "string") {
			// 16 characters is binary data from mySQL - convert to string and fall to next if block
			if(strlen($newUuid) === 16) {
				$newUuid = bin2hex($newUuid);
				$newUuid = substr($newUuid, 0, 8) . "-" . substr($newUuid, 8, 4) . "-" . substr($newUuid,12, 4) . "-" . substr($newUuid, 16, 4) . "-" . substr($newUuid, 20, 12);
			}
			// 36 characters is a human readable uuid
			if(strlen($newUuid) === 36) {
				if(Uuid::isValid($newUuid) === false) {
					throw(new \InvalidArgumentException("invalid uuid"));
				}
				$uuid = Uuid::fromString($newUuid);
			} else {
				throw(new \InvalidArgumentException("invalid uuid"));
			}
		} else if(gettype($newUuid) === "object" && get_class($newUuid) === "Ramsey\\Uuid\\Uuid") {
			// if the misquote id is already a valid UUID, press on
			$uuid = $newUuid;
		} else {
			// throw out any other trash
			throw(new \InvalidArgumentException("invalid uuid"));
		}
		// verify the uuid is uuid v4
		if($uuid->getVersion() !== 4) {
			throw(new \RangeException("uuid is incorrect version"));
		}
		return($uuid);
	}
}
Object Oriented PHP
The example class is a cross section of what a message on Twitter probably looks like. The mutator methods use full advantage of PHP's filter_var() function to sanitize all inputs before they are stored in the object.

<?php
namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * Small Cross Section of a Twitter like Message
 *
 * This Tweet can be considered a small example of what services like Twitter store when messages are sent and
 * received using Twitter. This can easily be extended to emulate more features of Twitter.
 *
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * @version 3.0.0
 **/
class Tweet implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;
	/**
	 * id for this Tweet; this is the primary key
	 * @var Uuid $tweetId
	 **/
	private $tweetId;
	/**
	 * id of the Profile that sent this Tweet; this is a foreign key
	 * @var Uuid $tweetProfileId
	 **/
	private $tweetProfileId;
	/**
	 * actual textual content of this Tweet
	 * @var string $tweetContent
	 **/
	private $tweetContent;
	/**
	 * date and time this Tweet was sent, in a PHP DateTime object
	 * @var \DateTime $tweetDate
	 **/
	private $tweetDate;

	/**
	 * constructor for this Tweet
	 *
	 * @param string|Uuid $newTweetId id of this Tweet or null if a new Tweet
	 * @param string|Uuid $newTweetProfileId id of the Profile that sent this Tweet
	 * @param string $newTweetContent string containing actual tweet data
	 * @param \DateTime|string|null $newTweetDate date and time Tweet was sent or null if set to current date and time
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newTweetId, $newTweetProfileId, string $newTweetContent, $newTweetDate = null) {
		try {
			$this->setTweetId($newTweetId);
			$this->setTweetProfileId($newTweetProfileId);
			$this->setTweetContent($newTweetContent);
			$this->setTweetDate($newTweetDate);
		}
			//determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for tweet id
	 *
	 * @return Uuid value of tweet id
	 **/
	public function getTweetId() : Uuid {
		return($this->tweetId);
	}

	/**
	 * mutator method for tweet id
	 *
	 * @param Uuid|string $newTweetId new value of tweet id
	 * @throws \RangeException if $newTweetId is not positive
	 * @throws \TypeError if $newTweetId is not a uuid or string
	 **/
	public function setTweetId( $newTweetId) : void {
		try {
			$uuid = self::validateUuid($newTweetId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		// convert and store the tweet id
		$this->tweetId = $uuid;
	}

	/**
	 * accessor method for tweet profile id
	 *
	 * @return Uuid value of tweet profile id
	 **/
	public function getTweetProfileId() : Uuid{
		return($this->tweetProfileId);
	}

	/**
	 * mutator method for tweet profile id
	 *
	 * @param string | Uuid $newTweetProfileId new value of tweet profile id
	 * @throws \RangeException if $newProfileId is not positive
	 * @throws \TypeError if $newTweetProfileId is not an integer
	 **/
	public function setTweetProfileId( $newTweetProfileId) : void {
		try {
			$uuid = self::validateUuid($newTweetProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		// convert and store the profile id
		$this->tweetProfileId = $uuid;
	}

	/**
	 * accessor method for tweet content
	 *
	 * @return string value of tweet content
	 **/
	public function getTweetContent() : string {
		return($this->tweetContent);
	}

	/**
	 * mutator method for tweet content
	 *
	 * @param string $newTweetContent new value of tweet content
	 * @throws \InvalidArgumentException if $newTweetContent is not a string or insecure
	 * @throws \RangeException if $newTweetContent is > 140 characters
	 * @throws \TypeError if $newTweetContent is not a string
	 **/
	public function setTweetContent(string $newTweetContent) : void {
		// verify the tweet content is secure
		$newTweetContent = trim($newTweetContent);
		$newTweetContent = filter_var($newTweetContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newTweetContent) === true) {
			throw(new \InvalidArgumentException("tweet content is empty or insecure"));
		}

		// verify the tweet content will fit in the database
		if(strlen($newTweetContent) > 140) {
			throw(new \RangeException("tweet content too large"));
		}

		// store the tweet content
		$this->tweetContent = $newTweetContent;
	}

	/**
	 * accessor method for tweet date
	 *
	 * @return \DateTime value of tweet date
	 **/
	public function getTweetDate() : \DateTime {
		return($this->tweetDate);
	}

	/**
	 * mutator method for tweet date
	 *
	 * @param \DateTime|string|null $newTweetDate tweet date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newTweetDate is not a valid object or string
	 * @throws \RangeException if $newTweetDate is a date that does not exist
	 **/
	public function setTweetDate($newTweetDate = null) : void {
		// base case: if the date is null, use the current date and time
		if($newTweetDate === null) {
			$this->tweetDate = new \DateTime();
			return;
		}

		// store the like date using the ValidateDate trait
		try {
			$newTweetDate = self::validateDateTime($newTweetDate);
		} catch(\InvalidArgumentException | \RangeException $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->tweetDate = $newTweetDate;
	}

	/**
	 * inserts this Tweet into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) : void {

		// create query template
		$query = "INSERT INTO tweet(tweetId,tweetProfileId, tweetContent, tweetDate) VALUES(:tweetId, :tweetProfileId, :tweetContent, :tweetDate)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDate = $this->tweetDate->format("Y-m-d H:i:s.u");
		$parameters = ["tweetId" => $this->tweetId->getBytes(), "tweetProfileId" => $this->tweetProfileId->getBytes(), "tweetContent" => $this->tweetContent, "tweetDate" => $formattedDate];
		$statement->execute($parameters);
	}


	/**
	 * deletes this Tweet from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) : void {

		// create query template
		$query = "DELETE FROM tweet WHERE tweetId = :tweetId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["tweetId" => $this->tweetId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * updates this Tweet in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) : void {

		// create query template
		$query = "UPDATE tweet SET tweetProfileId = :tweetProfileId, tweetContent = :tweetContent, tweetDate = :tweetDate WHERE tweetId = :tweetId";
		$statement = $pdo->prepare($query);


		$formattedDate = $this->tweetDate->format("Y-m-d H:i:s.u");
		$parameters = ["tweetId" => $this->tweetId->getBytes(),"tweetProfileId" => $this->tweetProfileId->getBytes(), "tweetContent" => $this->tweetContent, "tweetDate" => $formattedDate];
		$statement->execute($parameters);
	}

	/**
	 * gets the Tweet by tweetId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $tweetId tweet id to search for
	 * @return Tweet|null Tweet found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
	public static function getTweetByTweetId(\PDO $pdo, $tweetId) : ?Tweet {
		// sanitize the tweetId before searching
		try {
			$tweetId = self::validateUuid($tweetId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT tweetId, tweetProfileId, tweetContent, tweetDate FROM tweet WHERE tweetId = :tweetId";
		$statement = $pdo->prepare($query);

		// bind the tweet id to the place holder in the template
		$parameters = ["tweetId" => $tweetId->getBytes()];
		$statement->execute($parameters);

		// grab the tweet from mySQL
		try {
			$tweet = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$tweet = new Tweet($row["tweetId"], $row["tweetProfileId"], $row["tweetContent"], $row["tweetDate"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($tweet);
	}

	/**
	 * gets the Tweet by profile id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $tweetProfileId profile id to search by
	 * @return \SplFixedArray SplFixedArray of Tweets found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getTweetByTweetProfileId(\PDO $pdo, $tweetProfileId) : \SplFixedArray {

	try {
		$tweetProfileId = self::validateUuid($tweetProfileId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		throw(new \PDOException($exception->getMessage(), 0, $exception));
	}

	// create query template
	$query = "SELECT tweetId, tweetProfileId, tweetContent, tweetDate FROM tweet WHERE tweetProfileId = :tweetProfileId";
	$statement = $pdo->prepare($query);
	// bind the tweet profile id to the place holder in the template
	$parameters = ["tweetProfileId" => $tweetProfileId->getBytes()];
	$statement->execute($parameters);
	// build an array of tweets
	$tweets = new \SplFixedArray($statement->rowCount());
	$statement->setFetchMode(\PDO::FETCH_ASSOC);
	while(($row = $statement->fetch()) !== false) {
		try {
			$tweet = new Tweet($row["tweetId"], $row["tweetProfileId"], $row["tweetContent"], $row["tweetDate"]);
			$tweets[$tweets->key()] = $tweet;
			$tweets->next();
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}
	return($tweets);
}

	/**
	 * gets the Tweet by content
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $tweetContent tweet content to search for
	 * @return \SplFixedArray SplFixedArray of Tweets found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getTweetByTweetContent(\PDO $pdo, string $tweetContent) : \SplFixedArray {
	// sanitize the description before searching
	$tweetContent = trim($tweetContent);
	$tweetContent = filter_var($tweetContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($tweetContent) === true) {
		throw(new \PDOException("tweet content is invalid"));
	}

	// escape any mySQL wild cards
	$tweetContent = str_replace("_", "\\_", str_replace("%", "\\%", $tweetContent));

	// create query template
	$query = "SELECT tweetId, tweetProfileId, tweetContent, tweetDate FROM tweet WHERE tweetContent LIKE :tweetContent";
	$statement = $pdo->prepare($query);

	// bind the tweet content to the place holder in the template
	$tweetContent = "%$tweetContent%";
	$parameters = ["tweetContent" => $tweetContent];
	$statement->execute($parameters);

	// build an array of tweets
	$tweets = new \SplFixedArray($statement->rowCount());
	$statement->setFetchMode(\PDO::FETCH_ASSOC);
	while(($row = $statement->fetch()) !== false) {
		try {
			$tweet = new Tweet($row["tweetId"], $row["tweetProfileId"], $row["tweetContent"], $row["tweetDate"]);
			$tweets[$tweets->key()] = $tweet;
			$tweets->next();
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}
	return($tweets);
}

	/**
	 * gets all Tweets
	 *
	 * @param \PDO $pdo PDO connection object
	 * @return \SplFixedArray SplFixedArray of Tweets found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getAllTweets(\PDO $pdo) : \SPLFixedArray {
	// create query template
	$query = "SELECT tweetId, tweetProfileId, tweetContent, tweetDate FROM tweet";
	$statement = $pdo->prepare($query);
	$statement->execute();

	// build an array of tweets
	$tweets = new \SplFixedArray($statement->rowCount());
	$statement->setFetchMode(\PDO::FETCH_ASSOC);
	while(($row = $statement->fetch()) !== false) {
		try {
			$tweet = new Tweet($row["tweetId"], $row["tweetProfileId"], $row["tweetContent"], $row["tweetDate"]);
			$tweets[$tweets->key()] = $tweet;
			$tweets->next();
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}
	return ($tweets);
}

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() : array {
	$fields = get_object_vars($this);

	$fields["tweetId"] = $this->tweetId->toString();
	$fields["tweetProfileId"] = $this->tweetProfileId->toString();

	//format the date so that the front end can consume it
	$fields["tweetDate"] = round(floatval($this->tweetDate->format("U.u")) * 1000);
	return($fields);
}

namespace Edu\Cnm\DataDesign;
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
use Ramsey\Uuid\Uuid;
/**
 * Trait to validate a uuid
 *
 * This trait will validate a uuid in any of the following three formats:
 *
 * 1. human readable string (36 bytes)
 * 2. binary string (16 bytes)
 * 3. Ramsey\Uuid\Uuid object
 *
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * @package Edu\Cnm\Misquote
 **/
trait ValidateUuid {
	/**
	 * validates a uuid irrespective of format
	 *
	 * @param string|Uuid $newUuid uuid to validate
	 * @return Uuid object with validated uuid
	 * @throws \InvalidArgumentException if $newUuid is not a valid uuid
	 * @throws \RangeException if $newUuid is not a valid uuid v4
	 **/
	private static function validateUuid($newUuid) : Uuid {
		// verify a string uuid
		if(gettype($newUuid) === "string") {
			// 16 characters is binary data from mySQL - convert to string and fall to next if block
			if(strlen($newUuid) === 16) {
				$newUuid = bin2hex($newUuid);
				$newUuid = substr($newUuid, 0, 8) . "-" . substr($newUuid, 8, 4) . "-" . substr($newUuid,12, 4) . "-" . substr($newUuid, 16, 4) . "-" . substr($newUuid, 20, 12);
			}
			// 36 characters is a human readable uuid
			if(strlen($newUuid) === 36) {
				if(Uuid::isValid($newUuid) === false) {
					throw(new \InvalidArgumentException("invalid uuid"));
				}
				$uuid = Uuid::fromString($newUuid);
			} else {
				throw(new \InvalidArgumentException("invalid uuid"));
			}
		} else if(gettype($newUuid) === "object" && get_class($newUuid) === "Ramsey\\Uuid\\Uuid") {
			// if the misquote id is already a valid UUID, press on
			$uuid = $newUuid;
		} else {
			// throw out any other trash
			throw(new \InvalidArgumentException("invalid uuid"));
		}
		// verify the uuid is uuid v4
		if($uuid->getVersion() !== 4) {
			throw(new \RangeException("uuid is incorrect version"));
		}
		return($uuid);
	}
}


class post {
	private $postId;

	private $postAuthorId;

	private $postContent;

	private $postDateTime;

	/**
	 * constructor for this post
	 * @param string|Uuid $newPostId id of this post or null if a new post
	 * @param string|Uuid $newPostProfileId id of the Author that wrote  this post
	 * @param string $newPostContent string containing actual post data
	 * @param \DateTime|string|null $newTweetDate date and time Tweet was sent or null if set to current date and time
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */
	public function __construct($postId, $postAuthorId, $postContent, $postDateTime) : void {
		try {
			$uuid = self::validateUuid($newPostId);
		} catch(/InvalidArgumentException | /RangeException | /Exception | /TypeError | $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getmessage(), 0, $exception));
		}
	}


	/**
	 * accessot method for post id
	 *
	 * @return Uuid value of post id
	 */
	public function getPostId() {

		return $this->postId;
	}

	/**
	 * mutator method for post id
	 *
	 * @param Uuid|string for $newPostId new value of post id
	 * @throws \RangeException if $newPostId is not positive
	 * @throws \TypeError if $newPostId is not a uuid or string
	 */
	public function setPostId($newPostId) : void {
		try {
			$Uuid = self::validateUuid($newPostId);
		} catch(/InvalidArgumentException | /RangeException | /Exception | /TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getmessage(), 0, $exception));
		}
		$this->postId = $Uuid;
	}

	/**
	 * accessor method for post author id
	 *
	 * @return Uuid value of $newAuthorId
	 */
	public function getPostAuthorId() : Uuid {
		return $this->postAuthorId;
	}

	/**
	 *mutator method for post author id
	 *
	 * @param string|Uuid $newPostAuthorId new value of post author id
	 * @throws /RangeException if $newPostAuthorId is not positive
	 * @throws /TypeError if $newPostAuthorId is not a Uuid or string
	 *
	 */
	public function setPostAuthorId($newPostAuthorId) : void {
		try {
			$Uuid = self::validateUuid($newPostAuthorId);
		} catch(/InvalidArgumentException | /RangeException | /Exception | /TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getmessage(), 0, $exception));
		}
		$this->postAuthorId = $Uuid;
	}

	/**
	 * accessor method for post content
	 * @return string of post content
	 */
	public function getPostContent() : string {
		return $this->postContent;
	}

	/**
	 * @param string $newPostContent new value of post content
	 * @throws /InvalidArgumentException if $newPostContent is not a string or insecure
	 * @throws /RangeException if $newPostContent is > 2000 characters
	 * @throws /TypeError if $newPostContent is not a string
	 */
	public function setPostContent($newPostContent) {
		$this->postContent = $newPostContent;
	}


	/**
	 * accessor method for post date time
	 * @return /DateTime value of post date time
	 */
	public function getPostDateTime() {
		return $this->postDateTime;
	}

	/**
	 * mutator method for post date time
	 *
	 * @param /DateTime|string|null $newPostDateTime post date as a DateTime object or string (or null to load the current time)
	 * @throws /InvalidArgumentException if $newPostDate is not a valid object or string
	 * @throws /RangeException if $newPostDate is a date that does not exist
	 */
	public function setPostDateTime($newPostDateTime = null) : void {
		if($newPostDateTime === null) {
			$this->postDateTime = new /DateTime();
			return;
		}
	}
try {
$newPostDate = self::validateDateTime($newPostDateTime);
} catch(InvalidArgumentException | /RangeException | $exception) {
	$exceptionType = get_class($exception);
	throw(new $exceptionType($exception->getmessage(), 0, $exception));
} 			$this->postDateTime = $postDateTime;
}

public static function getPostByPostId(\PDO $pdo, $postId) : ?Post {
	try {
		$postId = self::validateUuid ($postId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		throw(new \PDOException($exception->getMessage(), 0, $exception));
	}
	$query = "SELECT postId, postAuthorId, postContent, postDateTime FROM post WHERE postId = :postId";
	$statement = $pdo->prepare($query);
	$parameters = ["postId" => $postId->getBytes()];
	$statement->execute($parameters);
	try {
		$post = null;
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		$row = $statement->fetch();
		if($row !== false) {
			$post = new post($row["postId"], $row["$postAuthorId"], $row["[postContent"], $row["postDateTime"]);
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		} return($post);
	}