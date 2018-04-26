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
	 * @return mixed
	 */
	public function getPostDateTime() {
		return $this->postDateTime;
	}

	/**
	 * @param mixed $postDateTime
	 */
	public function setPostDateTime($postDateTime) {
		$this->postDateTime = $postDateTime;
	}
}
