<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safe Community</title>
	<link rel="stylesheet" href="/cakephp/css/normalize.css">
	<link rel="stylesheet" href="/cakephp/css/all.min.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<style>
	* {
		padding: 0;
		margin: 0;
		box-sizing: border-box;
	}

	body {
		font-family: 'Open Sans', sans-serif;
		background-color: transparent;
		color: unset;
	}

	:root {
		--mainColor: #018785;
		--postColor: #e6e6e642;
	}

	.container {
		width: 700px;
		margin: 0 auto;
		margin: 30px auto;
		padding: 0px 20px;
	}

	@media (max-width:576px) {
		.container {
			width: 100%;
		}
	}

	.header {
		position: fixed;
		position: relative;
		width: 100%;
		display: flex;
		justify-content: space-between;
		padding: 0px 40px 0px 20px;
		box-shadow: 0px -1px 5px black;
	}

	.header .logo {
		display: flex;
		align-items: center;
	}

	.header .logo img {
		width: 55px;
		height: 55px;
	}

	.header .logo h3 {
		color: var(--mainColor);
	}

	.header .links {}

	.header .links .nav-links {
		display: flex;
		list-style-type: none;
		align-items: center;
		height: 100%;
	}

	.header .links .nav-links li {
		display: flex;
		list-style-type: none;
		align-items: center;
		height: 100%;
		margin-left: 30px;
		cursor: pointer;
		color: black;
	}

	.header .links .nav-links li i {
		margin-right: 5px;
	}

	.header .links .nav-links li.active,
	.header .links .nav-links li:hover {
		color: var(--mainColor);
	}

	.header .menu {
		height: 100%;
		padding-top: 3px;
		font-size: 40px;
		display: none;
	}

	/* @media (max-width:576px) {
	.header .menu {
		display: block;
	}
} */

	.create-post {
		padding: 50px 20px;
		padding-top: 30px;
		margin: 40px 0px;
		border: 1px solid var(--mainColor);
		border-radius: 10px;
	}

	.create-post p {
		color: #777;
		padding: 20px;
		border: 1px solid #777;
		border-radius: 10px;
		cursor: text;
		margin-bottom: 10px;
	}

	.create-post .post-button {
		cursor: pointer;
		background-color: var(--mainColor);
		color: white;
		padding: 7px 15px;
		width: fit-content;
		border-radius: 4px;
		float: right;
	}

	.post {
		padding: 5px 20px;
		background-color: var(--postColor);
	}

	.post .option {
		float: right;
		margin-right: 20px;
		cursor: pointer;
		margin-top: 10px;
		font-size: 20px;
	}

	.post .option:hover {
		color: var(--mainColor);
	}

	.profile-data {
		padding: 10px;
	}

	.profile-data img {
		width: 45px;
		height: 45px;
		border-radius: 50%;
		float: left;
		margin-right: 5px;
	}

	.profile-data h4 {
		vertical-align: top;
		color: black;
		font-weight: 600;
	}

	.profile-data h6 {
		display: inline-block;
		color: #777;
		font-weight: normal;
	}

	.post-data {
		padding: 15px 30px;
		margin: 5px;
		font-size: 20px;
		color: black;
	}

	.post-data::selection {
		color: var(--mainColor);
	}

	.post-data .title {
		font-weight: 600;
	}

	.post-buttons {
		display: flex;
		justify-content: space-evenly;
		border-top-style: solid;
		border-top-color: #ddd;
		border-top-width: 1px;
		padding: 10px 0px;
	}

	.post-buttons div {
		margin-left: 10px;
		cursor: pointer;
		font-size: 15px;
		position: relative;
		padding: 5px;
	}

	.post-buttons div::before {
		content: "";
		position: absolute;
		width: 100%;
		height: 100%;
		left: 0;
		top: 0;
	}

	.post-buttons div:hover::before {
		background-color: var(--mainColor);
		opacity: 0.1;
		border-radius: 10px;
	}

	.post-buttons div i {
		margin-right: 2px;
	}

	.post-buttons div.like.active {
		color: var(--mainColor);
	}

	.groups {
		float: left;
		width: 300px;
		padding: 30px;
	}

	.groups {}

	.header .open-menu {
		display: flex;
		justify-content: space-between;
		cursor: pointer;
		font-size: 17px;
		align-items: center;
	}

	.header .open-menu i {
		margin-left: 10px;
	}

	.header .open-menu:hover i,
	.header .open-menu.active i {
		color: var(--mainColor);
	}


	.header .groups-list {
		display: flex;
		list-style-type: none;
		margin-top: 10px;
		transition: .3s;
		background-color: white;
		border: 2px solid #eee;
		position: absolute;
		right: 30px;
		top: 50px;
		width: 300px;
		display: none;
		padding: 0px 20px;
		padding-bottom: 10px;
	}

	.header .groups-list.block {
		display: block;
	}

	.header .groups-list li {
		padding: 5px;
		margin-top: 15px;
	}

	.header .groups-list li a {
		text-decoration: none;
		color: black;
	}

	.header .groups-list li a.add-group {
		justify-content: center;
		display: flex;
		color: var(--mainColor);
		font-weight: 800;
	}

	.popup-overlay {
		position: fixed;
		width: 100%;
		height: 100vh;
		background-color: rgb(0 0 0 / 38%);
		top: 0;
		left: 0;
		display: none;
	}

	.popup-overlay .popup-content {
		background-color: white;
		width: 650px;
		height: 450px;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
	}

	.popup-overlay .popup-content form {
		height: 100%;
		padding: 20px;
	}

	.popup-overlay .popup-content form input {
		outline: none;
	}

	.popup-overlay .popup-content form input:not([type="checkbox"]):not([type="submit"]) {
		margin: 20px 0;
		display: block;
	}

	.popup-overlay .popup-content form textarea {
		width: 100%;
		height: 245px;
		resize: none;
		position: relative;
		outline: none;
		padding: 5px;
		border: 1px solid #333;
		border-radius: 5px;
	}

	.popup-overlay .popup-content form input[type="text"] {
		width: 100%;
		height: 50px;
		outline: none;
		padding: 5px;
		border: 1px solid #333;
		border-radius: 5px;
	}

	.popup-overlay .popup-content form input[type="submit"] {
		cursor: pointer;
		background-color: var(--mainColor);
		color: white;
		padding: 7px 15px;
		width: fit-content;
		border-radius: 4px;
		float: right;
		border: none;
	}

	.popup-overlay .popup-content form p {
		margin-top: 20px;
	}

	.popup-overlay .popup-content form select {
		margin-top: 10px;
	}

	.popup-overlay .popup-content .close-popup {
		position: absolute;
		bottom: 20px;
		right: 95px;
		z-index: 3000;
		color: red;
		cursor: pointer;
	}

	.popup-overlay .popup-content .close-popup i {
		font-size: 35px;
	}
	.popup-overlay .popup-content .required{
position: absolute;
    bottom: 25px;
    right: 265px;
    color: red;
    font-weight: 600;
	}

</style>

<body>
	<div class="header">
		<div class="logo">
			<img src="/img/logo.png" alt="logo">
			<h3>Safe Community</h3>
		</div>
		<div class="links">
			<ul class="nav-links">
				<li class="active"><i class="fa-solid fa-house"></i></i>Home</li>
				<li><i class="fa-solid fa-book-open"></i>Books</li>
				<li><i class="fa-solid fa-person-chalkboard"></i>Instructors</li>
				<li><i class="fa-solid fa-calendar"></i>Events</li>
				<li><i class="fa-solid fa-user"></i>Profile</li>
				<li><i class="fa-solid fa-user"></i>Profile</li>
			</ul>
		</div>
		<div class="menu">
			<i class="fa-solid fa-bars"></i>
		</div>
		<div class="open-menu">
			Groups
			<i class="fa-solid fa-caret-down"></i>
		</div>
		<ul class="groups-list">
			<li><a href="" class="add-group">+ Add a group</a></li>
		</ul>
	</div>
	<div class="container">
		<div class="create-post">
			<p>Create Post...</p>
			<div class="post-button">Post</div>
		</div>
	</div>
	<div class="popup-overlay">
		<div class="popup-content">
			<form action="">
				<input type="text" name="title" id="title" placeholder="Title" required>
				<textarea class="content" name="content" placeholder="Content"></textarea>
				<p>Choose a Group:</p>
				<select name="groups-selected" id="groups-selected">

				</select>
				<input type="submit" value="Post">
			</form>
			<span class="close-popup">
				<i class="fa-solid fa-square-xmark"></i>
			</span>
		</div>
	</div>


	<script>
		let postOptionClass = "fa-solid fa-ellipsis";
		let postLikeClass = "fa-solid fa-heart";
		let postCommentClass = "fa-solid fa-comment";
		let postShareClass = "fa-solid fa-share";
		let postData = <?php echo $posts ?>;
		let userGroups = <?php echo $groups; ?>;
		let postErrorCount = 0;

		function createPost(userData) {
			let container = document.createElement('div');
			let mainDiv = document.createElement('div');
			let option = document.createElement('div');
			let profileData = document.createElement('div');
			let profileImage = document.createElement('img');
			let profileName = document.createElement('h4');
			let profileRole = document.createElement('h6');
			let PostData = document.createElement('div');
			let postButtons = document.createElement('div');
			let like = document.createElement('div');
			let comment = document.createElement('div');
			let share = document.createElement('div');
			mainDiv.classList.add('post');
			mainDiv.dataset.postid = userData.Post["id"];
			option.classList.add('option');
			let optionIcon = document.createElement('i');
			optionIcon.classList.add(...postOptionClass.split(' '));
			option.append(optionIcon);

			profileData.classList.add('profile-data');
			profileImage.src = ' ';
			profileImage.alt = "User";
			profileName.append(userData.Post["id"]);
			profileRole.append(userData.Post["id"]);
			PostData.classList.add('post-data');

			postButtons.classList.add('post-buttons');
			like.classList.add('like');
			let likeIcon = document.createElement('i');
			likeIcon.classList.add(...postLikeClass.split(' '));
			like.append(likeIcon);
			like.append("Like");
			comment.classList.add('comment');
			let commentIcon = document.createElement('i');
			commentIcon.classList.add(...postCommentClass.split(' '));
			comment.append(commentIcon);
			comment.append("Comment");
			share.classList.add('share');
			let shareIcon = document.createElement('i');
			shareIcon.classList.add(...postShareClass.split(' '));
			share.append(shareIcon);
			share.append("Share");
			postButtons.append(like);
			postButtons.append(comment);
			postButtons.append(share);

			profileData.appendChild(profileImage);
			profileData.append(profileName);
			profileData.append(profileRole);

			let title = document.createElement('p');
			title.className = 'title';
			title.append(userData.Post['title']);
			PostData.append(title);
			PostData.append(userData.Post["body"]);

			mainDiv.append(option);
			mainDiv.append(profileData);
			mainDiv.append(PostData);
			mainDiv.append(postButtons);
			container.classList.add('container');
			container.append(mainDiv);
			document.body.append(container);
		}
		//Generate groups :
		let groupList = document.querySelector('.header .groups-list');
		function generateGroups(myGroups) {
			for (prop in myGroups) {
				let groupName = myGroups[prop];
				let li = document.createElement('li');
				let a = document.createElement('a');
				a.append(groupName);
				a.href = '#';
				li.dataset.id = prop;
				li.append(a);
				groupList.append(li);
			}
		}

		function publishPost() {

			let popup = document.querySelector('.popup-overlay');
			popup.style.display = 'block';
			document.querySelectorAll('.header .groups-list li').forEach((el) => {
				if (el.textContent !== '+ Add a group') {
					let myOption = document.createElement('option');
					myOption.value = el.dataset.id;
					myOption.append(el.textContent);
					document.querySelector('.popup-overlay .popup-content form select').append(myOption);
				}
			});
		}

			function createError(element,message){
	if(!element.querySelector('span')){
	let mySpan=document.createElement('span');
	let messageSpan =document.createElement('span');
	mySpan.append('!');
	mySpan.classList.add('error');
	messageSpan.classList.add('text');
	messageSpan.append(message);
	mySpan.append(messageSpan);
	element.append(mySpan);
	}
}
		// ### Deal with user ###

		//Generate Posts:
		console.log(postData);
		for (let i = 0; i < postData.length; i++) {
			createPost(postData[i]);
		}
		//Generte Groups:
		generateGroups(userGroups);

		//Handle post buttons:
		document.querySelectorAll('.post').forEach(el => {
			el.addEventListener('click', (e) => {
				if (e.target.classList.contains('like')) {

				}
			});
		});

		//Create post by user:
		document.querySelector('.create-post .post-button').addEventListener('click', (e) => {
			publishPost();

		});
		document.querySelector('.create-post p').addEventListener('click', (e) => {
			publishPost();
		});

		document.querySelector('.popup-overlay .popup-content .close-popup').onclick = function(){
			document.querySelector('.popup-overlay').style.display = 'none';
			document.querySelectorAll('.popup-overlay .popup-content form select option').forEach(el=>{
				el.remove();
			})
		}

		document.querySelector('.popup-overlay .popup-content form input[type="submit"]').addEventListener('click',(e)=>{
			e.preventDefault();
			let lastPostData = new Object();
			lastPostData.title= e.currentTarget.parentElement.querySelector('input[type="text"]').value;
			lastPostData.body= e.currentTarget.parentElement.querySelector('.content').value;
			lastPostData.group_id =   e.currentTarget.parentElement.querySelector('select').value;
			if(lastPostData.title === '' || lastPostData.body === '' || lastPostData.group_id==='' && postErrorCount===0){
				let errorDiv =document.createElement('div');
				errorDiv.classList.add('required');
				errorDiv.append('Must Fill All Fields !')
				document.querySelector('.popup-overlay .popup-content').append(errorDiv);
				postErrorCount=1;
			}
			else{
				postErrorCount=0;
				//DATABASE
				let data = JSON.stringify(lastPostData);
				console.log(data);
			}
		})

		//Show groups when clicking on it
		document.querySelector(".header .open-menu").addEventListener('click', (e) => {
			e.currentTarget.parentElement.querySelector('.groups-list').classList.toggle('block');
			e.target.classList.toggle('active');
		});


		function printData(data) {
			console.log(`${data}`);
		}
	</script>
</body>

</html>
