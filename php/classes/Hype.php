<?php

/**
 * Class user STRONG ENTITY
 */
class user {

	protected $userId;
	protected $userActivationCode;
	protected $userEmail;
	protected $userName;
	protected $userHash;

	/**
	 *accesser method for user id
	 * @return string of user id
	 */
	public function getUserId() : string {
		return $this->userId;
	}

	/**
	 * mutator method for user id
	 * @param  $userId
	 */
	public function setUserId(string $newUserId) : string {
		$this->userId = $userId;
	}

	/**
	 * accessor method for activation code
	 * @return mixed
	 */
	public function getUserActivationCode() {
		return $this->userActivationCode;
	}

	/**
	 * mutator method for activation code
	 * @param mixed $userActivationCode
	 */
	public function setUserActivationCode($userActivationCode) {
		$this->userActivationCode = $userActivationCode;
	}

	/**
	 * accessor method for user email
	 * @return mixed
	 */
	public function getUserEmail() {
		return $this->userEmail;
	}

	/**
	 * mutator method for user email
	 * @param mixed $userEmail
	 */
	public function setUserEmail($userEmail) {
		$this->userEmail = $userEmail;
	}

	/**
	 * accessor method for user name
	 * @return mixed
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * mutator method for user name
	 * @param mixed $userName
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
	}

	/**
	 * accessor method for user hash (pw)
	 * @return mixed
	 */
	public function getUserHash() {
		return $this->userHash;
	}

	/**
	 * mutator method for user hash
	 * @param mixed $userHash
	 */
	public function setUserHash($userHash) {
		$this->userHash = $userHash;
	}
}

?>