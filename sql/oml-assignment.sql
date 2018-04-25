INSERT into author (authorId, authorName)
VALUES (UNHEX(REPLACE('5c7ecd33-7df7-4215-aa44-7d2c2b7a3672','-','')), 'authorxyz');

insert into post (postId, postAuthorId, postContent, postDateTime)
values (UNHEX(REPLACE('9defe769-4b42-4a1c-a3bc-15a6b1e2cfc6','-','')), UNHEX(REPLACE('3489589f-d33f-41e6-b294-a1b20bd19a68','-','')), 'stringxyz', '2018-01-17 10:52:30.651024');

insert into hype (hypeUserId, hypePostId)
values (hypeUserId, hypePostId);

DELETE post from post

delete user from user

update post from UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", "")) where postContent

update post from UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", "")) where postDateTime

select (postContent, postDateTime)