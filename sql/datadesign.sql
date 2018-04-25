ALTER DATABASE gcordova25 CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS hype;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS author;
DROP TABLE IF EXISTS endUser;

CREATE TABLE endUser (
endUserId BINARY(16) NOT NULL,
endUserActivationCode CHAR(32),
endUserEmail VARCHAR(128) NOT NULL,
endUserHash CHAR(97) NOT NULL,
endUserName VARCHAR(16) NOT NULL,
UNIQUE(endUserName),
UNIQUE(endUserEmail),
PRIMARY KEY(endUserId)
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
	FOREIGN KEY(hypeUserId) REFERENCES endUser(endUserId),
	PRIMARY KEY(hypeUserId, hypePostId)
);

