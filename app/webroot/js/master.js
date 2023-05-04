let postOptionClass = "fa-solid fa-ellipsis";
let postLikeClass = "fa-solid fa-heart";
let postCommentClass = "fa-solid fa-comment";
let postShareClass = "fa-solid fa-share";

let user1 = {
	id: 123,
	userName: "John Doe",
	image: "./imgs/user-photo.jpg",
	role: "Student"
};
let text = ["How To Create Post ?", "Where is Lab 204 ?", "How to install visual studio 2010 ?", "How to activate windows 11 by our university email ?", `Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam omnis dicta saepe, et tempora quod molestias delectus
voluptates ipsum recusandae commodi repellat possimus facilis eveniet dolorem officiis ratione, debitis dolores.`, "السلام عليكم"];

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



// document.querySelectorAll('.post').forEach(el => {
// 	el.addEventListener('click', (e) => {
// 		if (e.target.classList.contains('like')) {

// 		}
// 	});
// });


document.querySelector(".header .open-menu").addEventListener('click', (e) => {
	e.currentTarget.parentElement.querySelector('.groups-list').classList.toggle('block');
	e.target.classList.toggle('active');
});

function printData(data) {
	console.log(`${data}`);
}
