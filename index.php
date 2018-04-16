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
			<p>Art has been browing posts on the the home page of the blog and sees an article that interests him. It is an article about a new pair of shoes that is being released. He has a positive interpretation that he would like to showcase on the post by contributing a "Hype" because he is impressed by the quality and design.</p>
		</div>
		<div>
			<h2>Use Case/Interaction Flow</h2>
			<ul>
				<li>User sees a post that interests him and clicks on it.</li>
				<li>Website directs the user to a different page that displays the full post along with various additional options on the page.</li>
				<li>User clicks on a link labeled as  "Hype".</li>
				<li>Website adds 1 Hype to the total number of Hypes that were previously contributed by previous users.</li>
				<li>User proceeds to read the post.</li>
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
					<li>Hype (weak)</li>
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
			</ul>
			<h2>Hype (weak)</h2>
			<ul>
				<li>userId (foreign key)</li>
				<li>postId (foreign key)</li>
				<li>hypeId</li>
				<li>hypeTime</li>
		</div>
		<div>
			<h2>Relations</h2>
			<ul>
				<li>Authors can have many posts.(m-n)</li>
				<li>Users can have many hypes.(m-n)</li>
				<li>Posts can have many hypes.(m-n)</li>
			</ul>
		</div>
</html>