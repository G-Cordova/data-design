<!DOCTYPE html>
<html lang="eu">
	<head>
		<title>datadesign</title>
	</head>
	<body>
		<h1>Frontend</h1>
		<div>
			<img src="datadesignpic.jpg" alt="" height="600" width="500">
		</div>
		<div>
			<h2>Persona: User</h2>
			<ul>
				<li>Name: Art Vandalay</li>
				<li>Gender: Male</li>
				<li>Age: 22</li>
				<li>Device: IPhone 7/iOS 11.2.6</li>
				<li>Art is very confident is his use ability on his device. This is due to him being "glued" to his phone a high majority of his average day.</li>
				<li>Art is also very motivated to participate in forums or blogs, due to the fact that he is very vocal about his opinions.</li>
				<li>After participating in the blog, he feels satisfied to have the ability to have a platform to voice his opinion(s).</li>
				<li>Art chooses to participate in this specific blog because he knows the integrity and reputation the website holds, due to it's "taste level".</li>
				<li>Art also participates in other blogs as well. However, he returns to Hypebest frequently because of it's consistancy in the quality of posts.</li>
			</ul>
		</div>
		<div>
			<h2>User Story</h2>
			<ul>
				<li>Art has been browing posts on the the home page of the blog and sees an article that interests him. It is an article about a new pair of shoes that is being released. He has a positive opinion that he would like to comment on the post because he is impressed by the quality and design.</li>
			</ul>
		</div>
		<div>
			<h2>Use Case/Interaction Flow</h2>
			<ul>
				<li>User sees a post that interests him and clicks on it.</li>
				<li>Website directs the user to a different page that displays the full post along with various additional options on the page.</li>
				<li>User clicks on a link labeled as  "Comment".</li>
				<li>Website automatically scrolls down to a lower portion of the same current page, where other comments that other users have contributed to the same post.</li>
				<li>User clicks on the provided field that is labeled "Join the discussion…" and proceeds to type in their comment that reads "fire", and finally clicks on "Post as disqus_7PaD4EZ1JM".</li>
				<li>Website displays the submitted comment along with the previous comments. (Ordered from latest to oldest)</li>
				<li>User proceeds to view other users' comments on the post.</li>
			</ul>
		</div>
	</body>
	<body>
			<h1>Backend</h1>
		<div>
			<img src="erd.png" alt="">
		</div>
			<div>
				<h2>Entities</h2>
				<ol>
					<li>User (strong)</li>
					<li>Author (strong)</li>
					<li>Post (weak)</li>
					<li>Comment (weak)</li>
					<li>Hype (wea)</li>
					<li>Comment Reply (weak)</li>
				</ol>
			</div>
		<div>
			<h2>User (strong)</h2>
			<ul>
				<li>userId</li>
				<li>userEmail</li>
				<li>userActivationToken (for account verification)</li>
			</ul>
			<h2>Author (strong)</h2>
			<ul>
				<li>authorID (primary key)</li>
				<li>authorProfile</li>
			</ul>
			<h2>Post (weak)</h2>
			<ul>
				<li>authorID (foreign key)</li>
				<li>postTime</li>
				<li>postCategory</li>
				<li>postContent</li>
				<li>postID (primary key)</li>
				<li>commentId (foreign key)</li>
			</ul>
			<h2>Comment (weak)</h2>
			<ul>
				<li>commentId (primary key)</li>
				<li>commentTimeDate</li>
				<li>userId (foreign key)</li>
				<li>commentContent</li>
			</ul>
			<h2>Hype (weak)</h2>
			<ul>
				<li>userId (foreign key)</li>
				<li>postId (foreign key)</li>
				<li>hypeId</li>
				<li>hypeTime</li>
			</ul>
			<h2>Comment Reply (weak)</h2>
			<ul>
				<li>userId (foreign key)</li>
				<li>commentReplyContext</li>
				<li>commentReplyTime</li>
			</ul>
		</div>
		<div>
			<h2>Relations</h2>
			<ul>
				<li>Authors can have many posts.</li>
				<li>Users can have many comments.</li>
				<li>Users can have many hypes.</li>
				<li>Posts can have many hypes.</li>
				<li>Users can have many comment replies.</li>
				<li>Comments can have many comment replies.</li>
			</ul>
		</div>
</html>