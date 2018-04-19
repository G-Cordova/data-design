<?php

/**
 * Small Cross Section of a hypebeast.com User
 *
 * This User can be considered a small example of a registered user on hypebeast.com
 *This can easily be extended to emulate more features of hypebeast.com.
 *
 * @author G. Cordova <gcordova25@cnm.edu>
 * @version 1.0.
**/


/*
 * STRONG ENTITY
 */
class user {
	/**
	 *UNIQUE
	 * id for user, primary key
	 * @var UUID $userId
	 */
	protected $userId;
	/**
	 * one-time code for authenticating and activating account upon creation
	 * @var string $userActivationCode
	 */
	protected $userActivationCode;
	/**
	 * UNIQUE email that is related to user
	 * @var string
	 */
	protected $userEmail;
	/**
	 * UNIQUE userName that identifies user.
	 * @var string
	 */
	protected $userName;
/*
 * User's password
 */
	protected $userHash;


	/**
	 *accessor method for User Id
	 * @return $userId (uuid)
	 */public function getUserId(): UUID {
		return $this->userId;
	}
	/**mutator method for User Id
	 * @param UUID $userId
	 */
	public function setUserId(UUID $userId) : void {
		$this->userId = $userId;
	}

	public function getUserActivationCode(): string {
		/**
	 * accessor method for User Activation Code
	 * @return string
	 */
		return $this->userActivationCode;
	}
	/**
	 * mutator method for setting User Activation Code
	 * @param string $userActivationCode
	 */
	public function setUserActivationCode(string $userActivationCode) {
		$this->userActivationCode = $userActivationCode;
	}

	/**
	 * UNIQUE
	 * accessor method for User Email
	 * @return string
	 */
	public function getUserEmail(): string {
		return $this->userEmail;
	}
	/**
	 * mutator method for User Email
	 * @param string $userEmail
	 */
	public function setUserEmail(string $userEmail) {
		$this->userEmail = $userEmail;
	}

	/**
	 * accessor method for User Hash (pw)
	 * @return mixed
	 */
	public function getUserHash() {
		return $this->userHash;
	}
	/**
	 * mutator method for User Hash (pw)
	 * @param mixed $userHash
	 */
	public function setUserHash($userHash) {
		$this->userHash = $userHash;
	}

	/**
	 * UNIQUE
	 * accessor method for User Name
	 * @return string
	 */
	public function getUserName() {
		return $this->userName;
	}
	/**
	 *
	 * mutator method for User Name
	 * @param string $userName
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
	}
}


?>
