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
			<p>Art has read a post that he wants to "Hype".</p>
		</div>
		<div>
			<h2>Use Case/Interaction Flow</h2>
			<ul>
				<li>User sees a post that interests him and clicks on it.</li>
				<li>Website directs the user to a different page that displays the full post along with various additional options on the page.</li>
				<li>User clicks on a link labeled as  "Hype".</li>
				<li>Website adds 1 Hype to the total number of Hypes that were previously contributed by previous users.</li>
			</ul>
		</div>
	</body>
	<body>
			<h1>Backend</h1>
			<div>
				<h2>Entities</h2>
				<ol>
					<li>Author (strong)</li>
					<li>Hype (weak)</li>
					<li>Post (strong)</li>
					<li>User (strong)</li>
				</ol>
			</div>
		<div>
			<h2>User (strong)</h2>
			<ul>
				<li>userId (Primary key)</li>
				<li>userName</li>
				<li>userActivationToken (for account verification)</li>
				<li>userEmail</li>
				<li>userHash</li>
			</ul>
			<h2>Author (strong)</h2>
			<ul>
				<li>authorId (primary key)</li>
				<li>authorName</li>
			</ul>
			<h2>Post (strong)</h2>
			<ul>
				<li>postId (primary key)</li>
				<li>postAuthorId (foreign key)</li>
				<li>postContent</li>
				<li>postDateTime</li>
			</ul>
			<h2>Hype (weak)</h2>
			<ul>
				<li>hypeUserId (foreign key)</li>
				<li>hypePostId (foreign key)</li>
		</div>
		<div>
			<h2>Relations</h2>
			<ul>
				<li>An author can have many posts.(m-n)</li>
				<li>Many users can Hype many posts.(m-n)</li>
				<li>Posts can have many hypes.(m-n)</li>
			</ul>
		</div>
		<div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile userAgent=\&quot;Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\&quot; version=\&quot;8.5.9\&quot; editor=\&quot;www.draw.io\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;ba56e3b1-b9da-6339-4904-1a29a56de86a\&quot; name=\&quot;Page-1\&quot;&gt;1VdNb9swDP01BrZLYFu2k2ubdutlQIBg2HpUbcYWqliGrCTOfv3oSP6QlQBd0aVtDgH1JFLi45MIe2S5bb5LWhU/RAbcC/2s8cidF4bzRYL/LXDUQBTEGsglyzQUDMCa/QED+gbdsQxqa6ESgitW2WAqyhJSZWFUSnGwl20Et3etaA4OsE4pd9FfLFOFRhexP+APwPKi2znwzcwTTZ9zKXal2c8Lyeb009Nb2sUy6+uCZuIwgsi9R5ZSCKWtbbME3lLb0ab9vl2Y7c8toVQvcQi1w57ynUl9JWrlhQlH99sniVbeWl9qJUWZf3VnTB7q2HGHG2CZcHB7KJiCdUXTduaAQkGsUFuOowBNWle6dhvWQNaH2oNU0FzMJ+hZQvGB2IKSR1xiHEhHrBFe2BXmMCqjgYpRBTuMGuHkfeSBPDQMf+e5JA6XD8cKznB5APr84ZmMI5vJILkek5HD5M1OFUJ+Xl32F/4K7MUOez9r+MTcRdH1uEsc7hwu8MmuWnPDoblpew1mCWVmzLuU07pmqU3LhnG+FBwV3IboWgL6NUz9RsyfJWRhxo+tz8zvxyuQDPOA1tc/7YU5aadQL2qBxxPgL3pg6qbzgMxpfJMyYK5iJ1OwbqKiMgc1ahlusUbFic8Up8MkcKrY3j7EuYqZHVaC4fGGezSP7VdpPim6PrzxGje+SSASTgKFk0A6ZSfQSUB92i/S1PzKmhr0ESBbtj4GwJHVIMWE2FKMLyjxdZKKXUmR95RU5F9odP8qqSieBAr+m6QW7ySpwJZTPNbNSDP+bP62miEf7BmKYvv1CF+rmdifBHozzeBw+IzQy4dPNXL/Fw==&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
		<script type="text/javascript" src="https://www.draw.io/js/viewer.min.js"></script>
</html>
