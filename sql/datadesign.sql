ALTER DATABASE gcordova25 CHARACTER SET utf8 COLLATE utf8_unicode_ci;


DROP TABLE IF EXISTS endUser;

DROP TABLE IF EXISTS hype;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS author;
DROP TABLE IF EXISTS user;

CREATE TABLE endUser (
UserId BINARY(16) NOT NULL,
UserActivationCode CHAR(32),
UserEmail VARCHAR(128) NOT NULL,
UserHash CHAR(97) NOT NULL,
UserName VARCHAR(16) NOT NULL,
UNIQUE(UserName),
UNIQUE(UserEmail),
PRIMARY KEY(UserId)
);

CREATE TABLE author (
authorId BINARY(16) NOT NULL,
authorName VARCHAR(16),
UNIQUE(authorName),
PRIMARY KEY(authorId)
);

CREATE TABLE post (
postId BINARY(16) NOT NULL,
postAuthorId BINARY(16) NOT NULL,
postContent VARCHAR(2000),
postDateTime DATETIME (6) NOT NULL,
INDEX(postAuthorId),
FOREIGN KEY(postAuthorId) REFERENCES author(authorId),
PRIMARY KEY(postId)
);

CREATE TABLE hype (
	hypeUserId BINARY(16) NOT NULL,
	hypePostId BINARY(16) NOT NULL,
	INDEX(hypeUserId),
	INDEX(hypePostId),
	FOREIGN KEY(hypePostId) REFERENCES post(postId),
	FOREIGN KEY(hypeUserId) REFERENCES user(UserId),
	PRIMARY KEY(hypeUserId, hypePostId)
);


