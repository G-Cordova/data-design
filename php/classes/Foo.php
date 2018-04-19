<?php

/**
 * Small Cross Section of a Twitter like Message
 *
 * This User can be considered a small example of a registered user on hypebeast.com
 * received using Twitter. This can easily be extended to emulate more features of Twitter.
 *
 * @author G. Cordova <gcordova25@cnm.edu>
 * @version 3.0.0
**/

class user {
	/**
	 * id for user, primary key
	 * @var uuid $userId
	 */
	protected $userId;
	/**
	 * one-time code for authenticating and activating account upon creation
	 * @var string $userActivationCode
	 */
	protected $userActivationCode;
	/**
	 *accessor method for User Id
	 * @return $userId (uuid)
	 */
	public function getUserId(): uuid {
		return $this->userId;
	}
	/**mutator method for User Id
	 * @param uuid $userId
	 */
	public function setUserId(uuid $userId) : void {
		$this->userId = $userId;
	}

	/**
	 * accessor method for User Activation Code
	 * @return string
	 */
	public function getUserActivationCode(): string {
		return $this->userActivationCode;
	}

	/**
	 * @param string $userActivationCode
	 */
	public function setUserActivationCode(string $userActivationCode) {
		$this->userActivationCode = $userActivationCode;
	}

	/**
	 * @return string
	 */
	public function getUserEmail(): string {
		return $this->userEmail;
	}

	/**
	 * @param string $userEmail
	 */
	public function setUserEmail(string $userEmail) {
		$this->userEmail = $userEmail;
	}

	/**
	 * @return mixed
	 */
	public function getUserHash() {
		return $this->userHash;
	}

	/**
	 * @param mixed $userHash
	 */
	public function setUserHash($userHash) {
		$this->userHash = $userHash;
	}

	/**
	 * @return mixed
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * @param mixed $userName
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
	}
	/**
	 * UNIQUE email that is related to user
	 * @var string
	 */
	protected $userEmail;
	protected $userHash;
	public $userName;
}

protected class user (
	protected String $getuserId() {
		return userId;
}
)
?>
