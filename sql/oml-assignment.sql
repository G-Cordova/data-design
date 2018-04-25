INSERT into author (authorId, authorName)
VALUES (UNHEX(REPLACE('5c7ecd33-7df7-4215-aa44-7d2c2b7a3672','-','')), 'authorxyz');


insert into post (postId, postAuthorId, postContent, postDateTime)
values (UNHEX(REPLACE('9defe769-4b42-4a1c-a3bc-15a6b1e2cfc6','-','')), UNHEX(REPLACE('5c7ecd33-7df7-4215-aa44-7d2c2b7a3672','-','')), 'stringxyz', '2018-01-17 10:52:30.651024');

insert into user (userId, userActivationCode, userEmail, userHash, userName)
values ((UNHEX(REPLACE('1ce42967-ce21-4e84-ac86-4e4610f8a551','-',''))), '12345', 'exampleemail123@gmail.com', 'yadayada123', 'g471');

insert into hype (hypeUserId, hypePostId)
values(UNHEX(REPLACE('2852f269-cb31-4bfe-887d-ababb6f6bb5c','-','')), UNHEX(REPLACE('42bbd359-8508-4183-968f-8d9b9c252d66','-','')));

DELETE post from post

delete user from user

update post from UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", "")) where postContent

update post from UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", "")) where postDateTime

select (postContent, postDateTime)