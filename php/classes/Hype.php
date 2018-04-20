<?php

/**
 * Class user STRONG ENTITY
 */
class user {

	/**
	 * Uuid|string of user id
	 *primary key
	 *STRONG ENTITY
	 * UNIQUE
	 *
	 * @var Uuid $userId
	 */
	protected $userId;

	/**
	 * string of user activation code
	 *
	 * @var $userActivationCode
	 */
	protected $userActivationCode;


	/**
	 * string of user email
	 * UNIQUE
	 *
	 * @var $userEmail
	 */
	protected $userEmail;

	/**
	 *string of user name
	 *
	 * @var $userName
	 */
	protected $userName;

	/**
	 * mixed of user hash (pw)
	 *
	 * @var $userHash
	 */
	private $userHash;


	/**
	 *accesser method for user id
	 * @return string of user id
	 */
	public function getUserId() : string {
		return $this->userId;
	}
	/**
	 * mutator method for user id
	 * @param  Uuid|string $newUserId new vallue of user id
	 * @throws /range exception if $newUserId is not positive
	 * @throws /typeerror if $newUserId is not an integer
	 */
	private function setUserId($newUserName) : string {
		$this->userId = $userId=$newUserName;
	}

	/**
* mutator method for activation code
* @param mixed $userActivationCode
*/
	public function setUserActivationCode($newuserActivationCode) : string {
		$this->userActivationCode = $newuserActivationCode;
	}
	/**
	 * accessor method for activation code
	 * @return string of activation code
	 */
	public function getUserActivationCode() : string {
		return $this->userActivationCode;
	}



	/**
	 * mutator method for user email
	 * @param mixed $userEmail
	 */
	public function setUserEmail($newUserEmail) : string {
		$this->userEmail = $newUserEmail;
	}
	/**
	 * accessor method for user email
	 * @return string for user email
	 */
	public function getUserEmail() : string {
		return $this->userEmail;
	}


	/**
	 * mutator method for user name
	 * @param mixed $userName
	 */
	public function setUserName($newUserName) : string {
		$this->userName = $newUserName;
	}
	/**
	 * accessor method for user name
	 * @return string of user name
	 */
	public function getUserName() : string {
		return $this->userName;
	}


	/**
	 * mutator method for user hash
	 * @param mixed $userHash
	 */
	public function setUserHash($newUserHash) : string {
		$this->userHash = $newUserHash;
	}
}
/**
	 * accessor method for user hash (pw)
	 * @return mixed of user hash (pw)
	 */
	public function getUserHash() {
		return $this->userHash;
	}

?>