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
		<div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom layers lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile userAgent=\&quot;Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36\&quot; version=\&quot;8.5.9\&quot; editor=\&quot;www.draw.io\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;ba56e3b1-b9da-6339-4904-1a29a56de86a\&quot; name=\&quot;Page-1\&quot;&gt;1VdNb9swDP01BrZLYFu2k2ubdutlQIBg2HpUbcYWqliGrCTOfv3oSP6QlQBt0aVdDgH1JFLi45MIe2S5bb5LWhU/RAbcC/2s8cidF4bzRYL/LXDUQBTEGsglyzQUDMCa/QED+gbdsQxqa6ESgitW2WAqyhJSZWFUSnGwl20Et3etaA4OsE4pd9FfLFOFRhexP+APwPKi2znwzcwTTZ9zKXal2c8Lyeb009Nb2sUy6+uCZuIwgsi9R5ZSCKWtbbME3lLb0ab9vl2Y7c8toVQvcQi1w57ynUl9JWrlhQlH99sniVbeWl8OQJ9d2CShjh1xGB1rhIPbQ8EUrCuatjMHVAlihdpyHAVo0rrShduwBrI+1B6kguZiMkFPESoPxBaUPOIS40A6Vo3qwq4qh1ENDVSMytdh1Kgm7yMPzKFhyDtPJHGIfDhWcIHIr5+dyTiymQyS6zEZOUze7FQh5BkuayVFmX96NvvbfgX2Yoe9nzX8x9xF0fW4SxzuHC7wva5ac8OhuWkbDWYJZWbMu5TTumapTcuGcb4UHBXchuj6Afo1TP1GzJ8lZGHGj63PzO/HK5AM84DW1z/thTlpp1AvaoHHE+AvemDqpvOAzOl6kzJgrmInU7BuoqIyBzXqF26xRsWJzxSnwyRwqtjePsS5ipkdVoLh8YZ7NI/tV2k+Kbo+vPEad71JIBJOAoWTQDplJ9BJQH3aL9LU/MqaGvQRIFu2PgbAkdUgxYTYUowvKPFtkopdSZGPlFTkX2h0r5VUFE8CBf9MUosPklRgyyke62akGX82f1/NkE/2DEWx/XqEb9VM7E8CvZtmcDh8Q+jlw3cauf8L&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
		<script type="text/javascript" src="https://www.draw.io/js/viewer.min.js"></script>
</html>