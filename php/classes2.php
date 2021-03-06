<?php

/**
namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;
**/


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

class author {
	private $authorId;

	private $authorName;

	/**
	 * constructor for this authoi
	 * @param string|Uuid $newAuthorId id of this Author
	 * @param string $newAuthorName of this author
	 * @param \DateTime|string|null $newTweetDate date and time Tweet was sent or null if set to current date and time
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */
	public function __construct($newAuthorId, $newAuthorName = null) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorName($newAuthorName);
		} catch(/InvalidArgumentException | /RangeException | /Exception | /TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for author id
	 * @return Uuid value of $newAuthorId
	 */
	public function getAuthorId() : Uuid {
		return $this->authorId;
	}

	/**
	 * 
	 * @param Uuid|string $newPostId new value of post id $postId
	 */
	public function setAuthorId($NewauthorId) : void {
		try {
			$Uuid = self::validateUuid($newAuthorId);
		} catch (/InvalidArgumentException | /RangeException | /Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->authorId = $Uuid;
	}

	/**
	 * accessor method for author name
	 * @return string value of $authorName
	 */
	public function getAuthorName() : void {
		return $this->authorName;
	}

	/**
	 * mutator method for author name
	 * 
	 * @param string $newPostContent new value of post content
	 * @throws \InvalidArgumentException if $newPostContent is not a string or insecure
	 * @throws \RangeException if $newPostContent is > 2000 characters
	 * @throws \TypeError if $newPostContent is not a string
	 */
	public function setAuthorName($authorName) : void {
		$newAuthorName = trim($newAuthorName);
		$newAuthorName =  filter_var($newAuthorName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if empty($newAuthorName) === true {
			throw (new InvalidArgumentException("author name is empty of insecure"));
		}
		$this->authorName = $authorName;
	}
}

class user {
	private $userId;

	private $userActivationCode;

	private $userEmail;

	private $userHash;

	private $userName;

	public function __construct($userId, $userActivationCode, $userEmail, $userHash, $username = null) {
		try {
			$this->setUserId($newUserId);
			$this->setUserActivationCode($newActivationCode);
			$this->setUserEmail($newUserEmail);
			$this->setUserHash($newUserHash);
			$this->setUserName($newUserName);
		} catch(InvalidArgumentException | /RangeException | /Exception | /TypeError $exception = null) {
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}


	/**
	 * accessor method for user id
	 * @return Uuid value of user id
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 *
	 * mutator method of user id
	 *
	 * @param Uuid|string $userId
	 */
	public function setUserId($newUserId) {
		$this->userId = $newUserId;
	}

	/**
	 * accessor method for user activation code
	 * @return string value of $userActivationCode
	 */
	public function getUserActivationCode() {
		return $this->userActivationCode;
	}

	/**
	 * @param mixed $userActivationCode
	 */
	public function setUserActivationCode($userActivationCode) {
		$this->userActivationCode = $userActivationCode;
	}

	/**
	 * accessor method for user email
	 * @return string value of $userName
	 */
	public function getUserEmail() {
		return $this->userEmail;
	}

	/**
	 * mutator method for user email
	 *
	 * @param string value of $userEmail
	 */
	public function setUserEmail($userEmail) {
		$this->userEmail = $userEmail;
	}

	/**
	 * accessor method for user hash
	 * @return string value of $userHash
	 */
	public function getUserHash() {
		return $this->userHash;
	}

	/**
	 * mutator method for user hash
	 *
	 * @param string value of $userHash
	 */
	public function setUserHash($newUserHash) {
		$this->userHash = $newUserHash;
	}

	/**
	 * get method for user name
	 * @return string value of $userName
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * mutator method for user name
	 *
	 * @param string value of $userName
	 */
	public function setUserName($newUserName) {
		$this->userName = $newUserName;
	}


}


class hype {

	private $hypeUserId;

	private $hypePostId;

	public function __construct($hypeUserId, $hypePostId = null) {
	}

	/**
	 * accessor method for hype user id
	 * @return Uuid|string value of $hypeUserId
	 */
	public function getHypeUserId() {
		return $this->hypeUserId;
	}

	/**
	 * mutator metod for hype user id
	 *
	 * @param Uuid|string value of $hypeUserId
	 */
	public function setHypeUserId($hypeUserId) {
		$this->hypeUserId = $hypeUserId;
	}

	/**
	 * accessor method for hype post id
	 * @return Uuid|string value of hype post id
	 */
	public function getHypePostId() {
		return $this->hypePostId;
	}

	/**
	 * mutator method
	 *
	 * @param Uuid|string value of $hypePostId
	 */
	public function setHypePostId($hypePostId) {
		$this->hypePostId = $hypePostId;
	}
}