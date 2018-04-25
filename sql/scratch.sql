/**
insert statements
 */


public function insert (/PDO $pdo) : void {

$query = "INSERT INTO post(postId, postAuthorId, postContent, postDateTime) VALUES(:postId, :postAuthorId, :postContent, :postDateTime)";
}

$statement = $pdo->prepare($query);

$formattedDate = $this->postDateTime->format(Y-m-d H:i:s.u);
$parameters = ["postId" => $this->postId->getBytes(), "postAuthorId" => $this->postAuthorId, "postContent" => $this->postContent, "postDateTime" => $this->$formattedDate];
$statement->execute($parameters);

public function insert (/PDO $pdo) : void {

$query = "INSERT INTO hype(hypeUserId, hypePostId) VALUES(:hypeUserId, :hypePostId)";
}

$statement = $pdo->prepare($query);

	$formattedDate = $this->postDateTime->format(Y-m-d H:i:s.u);
	$parameters = ["hypeUserId" => $this->"hypeUserId"->, "hypePostId" => $this->hypePostId];
	$statement->execute($parameters);


/**
delete statements
 */

delete(\PDO $pdo) : void {
	$query = "DELETE FROM post WHERE postId = :postId";
		$statement = $pdo->prepare($query);
		$statement->execute($parameters);
}

delete(\PDO $pdo) : void {
	$query = "DELETE FROM hype WHERE postId = :hypeUserId";
		$statement = $pdo->prepare($query);
		$statement->execute($parameters);
}

/**
update statements
 */

update(\PDO $pdo) : void {
	$query = "UPDATE post SET postId = :postId, postContent = :postContent, postDateTime = :postDateTime postAuthorId = :postAuthorId";
		$statement = $pdo->prepare($query);
		}

update(\PDO $pdo) : void {
	$query = "UPDATE hype SET hypeId = :hypeId, hypeUserId = :hypeUserId";
		$statement = $pdo->prepare($query);
		}


