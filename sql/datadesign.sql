ALTER DATABASE gcordova25 CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS hype;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS author;
DROP TABLE IF EXISTS user;

CREATE TABLE user (
userId BINARY(16) NOT NULL,
userActivationCode CHAR(32),
userEmail VARCHAR(128) NOT NULL,
userHash CHAR(97) NOT NULL,
userName VARCHAR(16) NOT NULL,
UNIQUE(userName),
UNIQUE(userEmail),
PRIMARY KEY(userId)
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
postDateTime VARCHAR (6) NOT NULL,
INDEX(postAuthorId),
FOREIGN KEY(postAuthorId) REFERENCES author(authorId),
PRIMARY KEY(postId)
);

CREATE TABLE hype (
	hypeUserId BINARY(16) NOT NULL,
	hypePostId BINARY(16) NOT NULL,
	FOREIGN KEY(hypePostId) REFERENCES post(postId),
	FOREIGN KEY(hypeUserId) REFERENCES user(userId),
	INDEX(hypeUserId),
	INDEX(hypePostId),
	PRIMARY KEY(hypeUserId, hypePostId)
);

