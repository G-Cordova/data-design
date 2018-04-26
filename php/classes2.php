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


