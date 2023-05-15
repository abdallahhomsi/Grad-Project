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

	.header .links .nav-links li.request {
		position: relative;
	}

	.header .links .nav-links li span {
		position: absolute;
		background-color: red;
		height: 15px;
		width: 15px;
		font-size: 10px;
		text-align: center;
		color: white;
		border-radius: 50%;
		padding: 2px;
		top: 10px;
		left: -10px;
	}

	.post {
		padding: 5px 20px;
		background-color: var(--postColor);
		position: relative;
	}

	.post .option {
		float: right;
		margin-right: 20px;
		cursor: pointer;
		margin-top: 10px;
		font-size: 20px;
		display: flex;
		justify-content: space-evenly;
		width: 100%;
		position: absolute;
		bottom: 15px;
	}

	.post .option i {
		font-size: 30px;
    background-color: green;
    color: white;
    display: flex;
    align-items: center;
    border-radius: 5px;
    padding: 5px;
	}
	.post .option i span{
		font-size: 15px;
   		margin-left: 5px;
	}
	.post .option i:last-child {
		background-color: red;
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
		font-weight: 600;
		background-color: white;
		border-radius: 7px;
		padding: 2px;
		margin-left: 1px;
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

	.post-data .title::selection {
		color: var(--mainColor);
	}

	.post-data .post-image {
		height: 400px;
		width: 100%;
		margin-top: 20px;
	}
	.post .post-buttons {
		display: flex;
    justify-content: space-evenly;
    border-top-style: solid;
    border-top-color: #ddd;
    border-top-width: 1px;
    padding: 30px;
	}

</style>


<body>
	<div class="header">
		<div class="logo">
			<img src="/cakephp/app/webroot/img/logo.png" alt="logo">
			<h3>Safe Community</h3>
		</div>
		<div class="links">
			<ul class="nav-links">
				<li><i class="fa-solid fa-house"></i></i>Home</li>
				<li><i class="fa-solid fa-book-open"></i>Books</li>
				<li><i class="fa-solid fa-person-chalkboard"></i>Instructors</li>
				<li><i class="fa-solid fa-calendar"></i>Events</li>
				<li><i class="fa-solid fa-user"></i>Profile</li>
				<li class="request active"><i class="fa-solid fa-clipboard-check"></i>Requests</li>
			</ul>
		</div>
</body>
<script>

	let postData = <?php echo $posts ?>;
	let squareIconClass = "fa-solid fa-square-check";
	let rejectIconClass = "fa-solid fa-circle-xmark";
	function createPost(userData, role) {
		let container = document.createElement('div');
		let mainDiv = document.createElement('div');
		let option = document.createElement('div');
		let profileData = document.createElement('div');
		let profileImage = document.createElement('img');
		let profileName = document.createElement('h4');
		let profileRole = document.createElement('h6');
		let groupName = document.createElement('h6');
		let PostData = document.createElement('div');
		mainDiv.classList.add('post');
		mainDiv.dataset.postid = userData.Post["id"];
		mainDiv.dataset.userid = userData.User["id"];
		option.classList.add('option');
		let approveIcon = document.createElement('i');
		let declineIcon = document.createElement('i');
		approveIcon.classList.add(...squareIconClass.split(' '));
		declineIcon.classList.add(...rejectIconClass.split(' '));
		let approveText =document.createElement('span');
		let declineText =document.createElement('span');
		approveText.append('ACCEPT')
		declineText.append('REJECT')
		approveIcon.append(approveText);
		declineIcon.append(declineText);
		option.append(approveIcon);
		option.append(declineIcon);

		profileData.classList.add('profile-data');
		profileImage.src = ``;
		profileImage.alt = "User";
		profileName.append(userData.User["username"]);
		groupName.append(userData.Group.name);
		if (userData.User.role_id === '1')
			profileRole.append("Student");
		else
			profileRole.append("Staff");
		PostData.classList.add('post-data');



		profileData.appendChild(profileImage);
		profileData.append(profileName);
		profileData.append(profileRole);
		profileData.append(groupName);

		let title = document.createElement('p');
		title.className = 'title';
		title.append(userData.Post['title']);
		PostData.append(title);
		PostData.append(userData.Post["body"]);
		if (userData.Post.pic_path !== null) {
			let myImage = document.createElement('img');
			myImage.src = `/cakephp/app/webroot/img/${userData.Post.pic_path}`;
			myImage.classList.add('post-image');
			PostData.append(myImage);
		}

		let postButtons = document.createElement('div');
		postButtons.classList.add('post-buttons');
		postButtons.append(option);

		// mainDiv.append(option);
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
	for (let i = 0; i < postData.length; i++) {
		createPost(postData[i]);
	}
	document.querySelectorAll('.post .option i').forEach(el=>{
		el.addEventListener('click',(e)=>{
			let postId = e.currentTarget.parentElement.parentElement.parentElement.dataset.postid;
			let text =e.currentTarget.querySelector('span');
			console.log(text.textContent);
			let obj = new Object();
			obj.post_id =postId;
			if(text.textContent === 'ACCEPT'){
				obj.approved = 1;
			}
			else{
				obj.approved=0;
			}
			let xhr = new XMLHttpRequest();
			xhr.open('POST','/cakephp/Posts/request');
			xhr.onreadystatechange = function(){
				if(this.readyState===4 && this.status===200){
					window.location.href = '/cakephp/Posts/request';
				}
			}
			xhr.send(JSON.stringify(obj));
		})
	})
	document.querySelector('.header .links .nav-links li:first-child').addEventListener('click',(e)=>{
		window.location.href = '/cakephp/Posts/index';
	})
</script>
</html>
