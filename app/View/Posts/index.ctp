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
		position: relative;
	}

	/* .post .option:hover {
		color: var(--mainColor);
	} */
	.post .option .delete{
	background-color: white;
    position: absolute;
    top: 20px;
    left: -50px;
    padding: 5px;
	display: none;
	}
	.post .option .delete.active{
		display: block;
	}
	.post .option .edit-post{
	background-color: white;
    position: absolute;
    top: 52px;
    left: -50px;
    padding: 5px;
    display: none;
    width: 70px;
    border-top-color: #eee;
    border-top-width: 1px;
    border-top-style: solid;
	}
	.post .option .edit-post.active{
		display: block;
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
	.post-data .title::selection{
		color: var(--mainColor);
	}

	.post-data .post-image{
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
		padding: 10px 0px;
	}

	.post .post-buttons div.like,
	.post .post-buttons div.comment{
		margin-left: 10px;
		cursor: pointer;
		font-size: 15px;
		position: relative;
		padding: 5px;
	}

	.post .post-buttons div::before{
	content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    background-color: var(--mainColor);
    opacity: 0.2;
    border-radius: 7px;
    top: 0;
	display: none;
	}

	.post .post-buttons div:hover::before {
		display: block;
	}

	.post-buttons div i {
		margin-right: 2px;
	}

	.post-buttons div.like.active {
		color: var(--mainColor);
	}
	.post .post-buttons div.like .likes-number{
		margin-left: 5px;
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

		.header .links .nav-links li.request{
		position: relative;
	}
	.header .links .nav-links li span{
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

	.popup-overlay {
		position: fixed;
		width: 100%;
		height: 100vh;
		background-color: rgb(0 0 0 / 38%);
		top: 0;
		left: 0;
		display: none;
		z-index: 100;
	}


	.popup-overlay .popup-content {
		background-color: white;
		width: 650px;
		height: 492px;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		border-radius: 10px;
	}

	.popup-overlay .popup-content form {
		height: 100%;
		padding: 20px;
	}

	.popup-overlay .popup-content form input {
		outline: none;
	}

	.popup-overlay .popup-content form input:not([type="checkbox"]):not([type="submit"]) {
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
		margin: 15px 0px;
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
	.popup-overlay .popup-content form input[type="file"]{
		margin:10px 0px;
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

	.comment-overlay{
		position: fixed;
		width: 100%;
		height: 100vh;
		background-color: rgb(0 0 0 / 38%);
		top: 0;
		left: 0;
		/* display: none; */
		z-index: 100;
	}
	.comment-overlay .comments{
		background-color: white;
		width: 650px;
		min-height: 200px;
    max-height: 500px;
    height: fit-content;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		border-radius: 10px;
		padding: 30px 10px;
		overflow: auto;
	}
	.comment-overlay .comments .comment{
		position: relative;
	background-color: #eee;
    padding: 10px;
    width: 75%;
    margin: 10px auto;
    border-radius: 0px 20px 20px 20px;
	}
	.comment-overlay .comments .comment .user-data{

	}
	.comment-overlay .comments .comment .user-data div{
		height: 100%;
	}
	.comment-overlay .comments .comment .user-data img{
		float: left;
		width: 40px;
		height: 40px;
		border-radius: 50%;
	}
	.comment-overlay .comments .comment .user-data h5{

	}
	.comment-overlay .comments .comment .comment-content{

	}
	.comment-overlay .comments .comment .option {
	cursor: pointer;
    position: absolute;
    top: 5px;
    right: 45px;
    width: 80px;
	}
	.comment-overlay .comments .comment .option:hover i{
		color: var(--mainColor);
	}

	.comment-overlay .comments .comment .option .deleteComment{
		background-color: white;
		padding:5px 15px;
		display: none;
	}
	.comment-overlay .comments .comment .option .deleteComment.active{
		display: block;
	}
	.comment-overlay .comments .comment .option .editComment{
	background-color: white;
    padding: 5px 15px;
    display: none;
    border-top-color: #eee;
    border-top-width: 1px;
    border-top-style: solid;
	}
	.comment-overlay .comments .comment .option .editComment.active{
		    display: block;
    position: relative;
    z-index: 100;
	}

	.comment-overlay .comments .no-comments{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		text-align: center;
	}
	.comment-overlay .comments .no-comments i{
    font-size: 65px;
    color: #777;
    margin-bottom: 30px;
	}
	.comment-overlay .comments .no-comments p{
	font-weight: 600;
    color: #333;
	}
	.comment-overlay .comments .make-comment{
    width: 75%;
    margin: 0px auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
	}
	.comment-overlay .comments .make-comment textarea{
	resize: none;
    width: 94%;
    border: 1px solid #777;
    border-radius: 5px;
    padding: 4px;
    outline: none;
	color: black;
	font-weight: normal;
	}
	.comment-overlay .comments .make-comment i{
		cursor: pointer;
		font-size: 20px;
	}
	.comment-overlay .comments .make-comment i:hover{
		color: var(--mainColor);
	}
	.comment-overlay .close-comments{
		cursor: pointer;
		cursor: pointer;
    position: absolute;
    right: 16%;
    color: white;
    font-size: 35px;
    top: 11%;
	}
	.comment-overlay .close-comments:hover i{
		color: var(--mainColor);
	}

	.edit-overlay{
		position: fixed;
		width: 100%;
		height: 100vh;
		background-color: rgb(0 0 0 / 38%);
		top: 0;
		left: 0;
		z-index: 100;
	}
	.edit-overlay .edit-content{
		background-color: white;
		width: 650px;
		height: 492px;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		border-radius: 10px;
	}
	.edit-overlay .close-edit {
		position: absolute;
		bottom: 20px;
		right: 95px;
		z-index: 3000;
		color: red;
		cursor: pointer;
		font-size: 35px;
	}
	.edit-overlay .edit-content .edit-post-button {
	cursor: pointer;
    background-color: var(--mainColor);
    color: white;
    padding: 7px 15px;
    width: fit-content;
    border-radius: 4px;
    position: absolute;
    bottom: 23px;
    right: 23px;
    z-index: 3000;
	}
	.edit-overlay .edit-content form{
    display: flex;
    flex-direction: column;
    width: 480px;
    justify-content: center;
    margin: 0 auto;
    padding: 20px;
	}
	.edit-overlay .edit-content form input[type="text"]{
outline: none;
    border: 1px solid #333;
    border-radius: 5px;
    padding: 5px;
    margin: 10px 0px 20px;
	}
	.edit-overlay .edit-content form textarea{
height: 300px;
    overflow: hidden;
    resize: none;
    padding: 5px;
    outline: none;
    border: 1px solid #333;
    border-radius: 5px;
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
				<li class="active"><i class="fa-solid fa-house"></i></i>Home</li>
				<li><i class="fa-solid fa-book-open"></i>Books</li>
				<li><i class="fa-solid fa-person-chalkboard"></i>Instructors</li>
				<li><i class="fa-solid fa-calendar"></i>Events</li>
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
			<form enctype="multipart/form-data">
				<input type="text" name="title" id="title" placeholder="Title" required>
				<textarea class="content" name="content" placeholder="Content"></textarea>
				<label for="pic_path">Upload Photo:</label>
				<input type="file" accept="image/jpg,image/png,image/jpeg" name="pic_path" id="pic_path" value='Upload Photo'>
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
		let postLikeClass = "fa-brands fa-gratipay";
		let postCommentClass = "fa-solid fa-comment";
		let noCommentClass= "fa-solid fa-comment";
		let sendCommentClass = "fa-solid fa-paper-plane";
		let squareCloseIcon = "fa-solid fa-circle-xmark";
		let postData = <?php echo $posts; ?>;
		let userGroups = <?php echo $groups; ?>;
		let userRole = <?php echo $userRole; ?>;
		let sessionID = <?php echo $this->session->read('User.id')?>;
		let postErrorCount = 0;
		let requestIconClass = "fa-solid fa-clipboard-check";
		let currentUserRole = userRole[0].User.role_id;
		let approvedCount1 = <?php echo $approved_count; ?>;
		let approvedCount = '';
		if(approvedCount1[0])
		approvedCount=approvedCount1[0]['count(id)'];

		function createPost(userData,role) {
			let optionAppend = false;
			let container = document.createElement('div');
			let mainDiv = document.createElement('div');
			let profileData = document.createElement('div');
			let profileImage = document.createElement('img');
			let profileName = document.createElement('h4');
			let profileRole = document.createElement('h6');
			let groupName = document.createElement('h6');
			let PostData = document.createElement('div');
			let postButtons = document.createElement('div');
			let like = document.createElement('div');
			let comment = document.createElement('div');
			let likesNumber = document.createElement('span');
			mainDiv.classList.add('post');
			mainDiv.dataset.postid = userData.Post["id"];
			mainDiv.dataset.userid = userData.User["id"];

			let option = document.createElement('div');
			let optionIcon = document.createElement('i');
			let deleteOption =document.createElement('div');
			let editOption =document.createElement('div');
			if(currentUserRole==='2' || userData.User.id == sessionID){
			option.classList.add('option');
			optionIcon.classList.add(...postOptionClass.split(' '));
			option.append(optionIcon);
			deleteOption.classList.add('delete');
			deleteOption.append('Delete');
			option.append(deleteOption);
			optionAppend=true;
			}
			if(userData.User.id == sessionID)
			{
				editOption.classList.add('edit-post');
				editOption.append('Edit');
				option.append(editOption);
			}

			profileData.classList.add('profile-data');
			profileImage.src = `/cakephp/app/webroot/img/714.jpg`;
			profileImage.alt = "User";
			profileName.append(userData.User["username"]);
			groupName.append(userData.Group.name);
			if(userData.User.role_id==='1')
			profileRole.append("Student");
			else
			profileRole.append("Staff");
			PostData.classList.add('post-data');

			postButtons.classList.add('post-buttons');
			like.classList.add('like');
			let likeIcon = document.createElement('i');
			likeIcon.classList.add(...postLikeClass.split(' '));



			if(userData.PostCounter.id!==null)
			like.classList.add('active');

			like.append(likeIcon);
			like.append("Like");
			likesNumber.classList.add("likes-number");
			likesNumber.append(`(${userData.Post.likes})`);
			like.append(likesNumber);
			comment.classList.add('comment');
			let commentIcon = document.createElement('i');
			commentIcon.classList.add(...postCommentClass.split(' '));
			comment.append(commentIcon);
			comment.append("Comment");


			postButtons.append(like);
			postButtons.append(comment);

			profileData.appendChild(profileImage);
			profileData.append(profileName);
			profileData.append(profileRole);
			profileData.append(groupName);

			let title = document.createElement('p');
			title.className = 'title';
			title.append(userData.Post['title']);
			PostData.append(title);
			PostData.append(userData.Post["body"]);
			if(userData.Post.pic_path!==null){
				let myImage =document.createElement('img');
				myImage.src = `/cakephp/app/webroot/img/${userData.Post.pic_path}`;
				myImage.classList.add('post-image');
				PostData.append(myImage);
			}
			if(optionAppend)
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


	//###############################################################
		//elements not exist at this time:
		document.addEventListener('input',function(e){
			let commentTextArea = document.querySelector('.comment-overlay .comments .make-comment textarea');
			if(e.target === commentTextArea){
				commentTextArea.style.height = 'auto'; // Reset the height to auto to calculate the new height
				commentTextArea.style.height = commentTextArea.scrollHeight + 'px'; // Set the height to the scroll height
			}
		})
		document.addEventListener('click',(e)=>{
			let sendCommentBtn = document.querySelector('.comment-overlay .comments .make-comment i');
			if(e.target.parentElement.classList.contains('close-comments'))
			document.querySelector('.comment-overlay').remove();
			if(e.target===sendCommentBtn){
			if(e.target.previousElementSibling.value==="")
			alert('error');
			else{
				let obj  = new Object();
				obj.content = e.target.previousElementSibling.value;
				obj.post_id = e.target.parentElement.parentElement.dataset.postid;
				let postId= e.target.parentElement.parentElement.dataset.postid;
				console.log(postId);
				let req = new XMLHttpRequest();
				req.open("POST","/cakephp/Posts/addcom");
				req.onreadystatechange = ()=>{
					if (req.readyState === XMLHttpRequest.DONE && req.status === 200) {
						document.querySelector('.comment-overlay').remove();
						document.querySelectorAll('.post .post-buttons .comment').forEach(el=>{
							if(el.parentElement.parentElement.dataset.postid === postId){
								el.click();
							}
						})
				}
				}
				req.send(JSON.stringify(obj));
			}
		}
		else if(e.target.parentElement.classList.contains('option') && e.target.parentElement.parentElement.classList.contains('post')){
			e.target.parentElement.querySelector('.delete').classList.toggle('active');
			if(e.target.parentElement.querySelector('.edit-post'))
			e.target.parentElement.querySelector('.edit-post').classList.toggle('active');
		}
			if(e.target.classList.contains('delete')){
				let req = new XMLHttpRequest();
				let obj = new Object();
				req.open('POS','/cakephp/Posts/deletepos');
				req.onreadystatechange = function(){
					if(this.readyState===4 && this.status===200){
						window.location.href = '/cakephp/Posts/index';
					}

				}
				obj.post_id = e.target.parentElement.parentElement.dataset.postid;
				req.send(JSON.stringify(obj));
			}
		if(e.target.parentElement.classList.contains('option') && e.target.parentElement.parentElement.classList.contains('comment')){
			e.target.parentElement.querySelector('.deleteComment').classList.toggle('active');
			if(e.target.parentElement.querySelector('.editComment'))
			e.target.parentElement.querySelector('.editComment').classList.toggle('active');
		}
		if(e.target.classList.contains('edit-post')){
			let postID = e.target.parentElement.parentElement.dataset.postid;
			let popup =document.createElement('div');
			popup.classList.add('edit-overlay');
			let popupContent =document.createElement('div');
			popupContent.classList.add('edit-content');
			popupContent.dataset.id =postID;
			let closeSpan =document.createElement('span');
			closeSpan.classList.add('close-edit');
			let closeIcon =document.createElement('i');
			closeIcon.classList.add(..."fa-solid fa-square-xmark".split(' '));
			closeSpan.append(closeIcon)
			popupContent.append(closeSpan);
			let editButton =document.createElement('div');
			editButton.classList.add('edit-post-button');
			editButton.append('Edit');
			popupContent.append(editButton);
			let form = document.createElement('form');
			let myForm = document.createElement('form');
			//if post
			let title =document.createElement('input');
			let postContent =document.createElement('textarea');
			title.type='text';
			title.placeholder="Title";
			title.value = e.target.parentElement.parentElement.querySelector('.post-data .title').textContent;
			postContent.append(e.target.parentElement.parentElement.querySelector('.post-data .title').nextSibling.textContent);
			postContent.placeholder="Content";
			form.append(title);
			form.append(postContent)
			popupContent.append(form);
			popup.append(popupContent);
			document.body.append(popup);
		}
		if(e.target.classList.contains('close-edit') || e.target.parentElement.classList.contains('close-edit')){
			document.querySelector('.edit-overlay').remove();
		}
		if(e.target.classList.contains('edit-post-button')){
			let postID = e.target.parentElement.dataset.id;
			//Database
			console.log(e.target.parentElement);
			let obj = new Object();
			obj.id  = postID;
			obj.title = e.target.parentElement.querySelector('form input[type="text"]').value;
			obj.body = e.target.parentElement.querySelector('form textarea').value;

			let req = new XMLHttpRequest();
			req.open('POST','/cakephp/Posts/editPost');
			req.onreadystatechange=function(){
				if(this.readyState===4 && this.status===200){
					window.location.href = '/cakephp/Posts/index';
				}
			}
			req.send(JSON.stringify(obj));
		}
		if(e.target.classList.contains('deleteComment')){
			let obj = new Object();
			obj.id = e.target.parentElement.parentElement.dataset.commentid;
			let req = new XMLHttpRequest();
			req.open('POST','/cakephp/Posts/deletecom');
			req.onreadystatechange =function(){
				if(this.readyState===4 && this.status===200){
					window.location.href = '/cakephp/Posts/index';
				}
			}
			req.send(JSON.stringify(obj));
		}


		})


		// ### Deal with user ###

		//Generate Posts:
		for (let i = 0; i < postData.length; i++) {
			createPost(postData[i],userRole[0].User.role_id);
		}
		//Generte Groups:
		generateGroups(userGroups);

		//Generate some elements depend on privilege:
		if(currentUserRole==='2'){
			generateRequest();
		}
		function generateRequest(){
			let listItem =document.createElement('li');
			listItem.classList.add('request');
			let requestIcon = document.createElement('i');
			let requestNumber =document.createElement('span');

			requestIcon.classList.add(...requestIconClass.split(' '));
			listItem.append(requestIcon);
			listItem.append('Requests');
			if(approvedCount!==''){
			requestNumber.append(approvedCount);
			listItem.append(requestNumber);
			}
			document.querySelector('.header .links .nav-links').append(listItem);
		}
		if(document.querySelector('.header .links .nav-links li.request'))
		document.querySelector('.header .links .nav-links li.request').onclick = function(){
			window.location.href = '/cakephp/Posts/request';
		}
		//Handle post buttons:
		document.querySelectorAll('.post').forEach(el => {
			el.addEventListener('click', (e) => {
				let isLiked;
				if (e.target.classList.contains('like')) {
					if(e.target.classList.contains('active')){
					isLiked=0;
					}
					else{
					isLiked=1;
					}
					let obj = new Object();
					e.target.classList.toggle('active');
					obj.liked = isLiked;
					obj.id=e.currentTarget.dataset.postid;
					console.log(JSON.stringify(obj));
					let xhr = new XMLHttpRequest();
					xhr.open("POST","/cakephp/Posts/like");
					xhr.onreadystatechange =function(){
						if(this.readyState===4 && this.status===200){
							let newNumber = this.responseText;
							e.target.querySelector('.likes-number').textContent =`(${newNumber})`;
							console.log(this.responseText);
						}
						else{
							console.error(this.status);
						}
					}
					xhr.send(JSON.stringify(obj));
				}
			});
		});

		//$$$$$$$$$$$$$$$$$          Create post by user:       $$$$$$$$$$$$$$$$$$$$$$$$$$
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
		};

		document.querySelector('.popup-overlay .popup-content form input[type="submit"]').addEventListener('click',(e)=>{
			e.preventDefault();
				const form = document.querySelector('.popup-overlay .popup-content form ');
				const title = form.querySelector('input[type="text"]').value;
				const content = form.querySelector('textarea').value;
				const fileInput = form.querySelector('input[type="file"]');
				const group_id =form.querySelector('select').value;
			if(title === '' || content === '' || group_id==='' && postErrorCount===0){
				let errorDiv =document.createElement('div');
				errorDiv.classList.add('required');
				errorDiv.append('Must Fill All Fields !')
				document.querySelector('.popup-overlay .popup-content').append(errorDiv);
				postErrorCount=1;
			}
			else{
				postErrorCount=0;
				//DATABASE
				// Create a FormData object and append the input values
				const formData = new FormData();
				formData.append('title', title);
				formData.append('content', content);
				formData.append('group_id', group_id);
				formData.append('file', fileInput.files[0]);
				// Send the form data using XMLHttpRequest
				const xhr = new XMLHttpRequest();
				xhr.open('POST', '/cakephp/Posts/add');
				xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
					console.log('Response received:', xhr.responseText);
					window.location.href = '/cakephp/Posts/index';
				}
			}
			xhr.send(formData);
		}
		});

////////////////////////////////////////Creating Comment ///////////////////////////////////////////////

		document.querySelectorAll('.post .post-buttons .comment').forEach(el=>{el.addEventListener('click',(e)=>{
			let postId = e.target.parentElement.parentElement.dataset.postid;
			let overlayDiv = document.createElement('div');
			overlayDiv.classList.add('comment-overlay');
			let comments = document.createElement('div');
			comments.dataset.postid =postId;
			comments.classList.add('comments');
			let closeComments =document.createElement('span');
			closeComments.classList.add('close-comments');
			let closeIcon =document.createElement('i');
			closeIcon.classList.add(...squareCloseIcon.split(' '));
			closeComments.append(closeIcon);
			let makeComment = document.createElement('div');
			makeComment.classList.add("make-comment");
			let textarea =document.createElement('textarea');
			textarea.removeAttribute('cols');
			textarea.setAttribute('rows','1');
			textarea.placeholder="Type a Comment";
			let sendIcon =document.createElement('i');
			sendIcon.classList.add(...sendCommentClass.split(' '));
			makeComment.append(textarea);
			makeComment.append(sendIcon);
			let xhr = new XMLHttpRequest();
			xhr.open('POST','/cakephp/Posts/comment');
			xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
					if(xhr.responseText==="[]"){
						let noCommentsDiv =document.createElement('div');
						noCommentsDiv.classList.add('no-comments');
						let icon =document.createElement('i');
						icon.classList.add(...noCommentClass.split(' '));
						let myP=document.createElement('p');
						myP.append('No comments for this post');
						noCommentsDiv.append(icon);
						noCommentsDiv.append(myP);
						comments.append(noCommentsDiv);
						makeComment.style.cssText="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%);";
					}
					else{
						let allComments =JSON.parse(xhr.responseText);
						console.log(allComments);
						allComments.forEach(el=>{
							let newComment =document.createElement('div');
							newComment.classList.add('comment');
							let userData =document.createElement('div');
							userData.classList.add('user-data');
							let userImage =document.createElement('img');
							userImage.src = '/cakephp/app/webroot/img/714.jpg';
							let userName =document.createElement('h5');
							userName.append(el.User.username);
							userData.append(userImage);
							userData.append(userName);
							newComment.append(userData);
							let commentContent =document.createElement('div');
							commentContent.classList.add('comment-content');
							commentContent.append(el.Comment.body);
							newComment.append(commentContent);
							newComment.dataset.userid = el.Comment.user_id;
							newComment.dataset.postid =postId;
							newComment.dataset.commentid =el.Comment.id;
							///
							// console.log(el.Comment.user_id);
							// console.log(sessionID);
							let option =document.createElement('div');
							let optionIcon =document.createElement('i');
							let deleteComment =document.createElement('div');

							if(currentUserRole==='2'|| el.Comment.user_id==sessionID){
							option.classList.add('option');
							optionIcon.classList.add(...postOptionClass.split(' '));
							option.append(optionIcon);
							deleteComment.append('Delete');
							deleteComment.classList.add('deleteComment');
							option.append(deleteComment);
							}
							let editOption =document.createElement('div');
							if(el.Comment.user_id==sessionID){
								editOption.classList.add('editComment');
								editOption.append('Edit');
								option.append(editOption);
							}
							if(currentUserRole==='2'||el.Comment.user_id==sessionID){
							newComment.append(option);
							}
							///
							comments.append(newComment);
							makeComment.style.cssText = "position:unset;"
						})
					}
				}
				comments.append(makeComment);
				overlayDiv.append(comments);
				overlayDiv.append(closeComments);
				document.body.append(overlayDiv);
			}
			xhr.send(JSON.stringify(postId));
		});
		})//Show groups when clicking on it
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
