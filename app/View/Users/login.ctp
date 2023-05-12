<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safe Community</title>
	<link rel="stylesheet" href="/cakephp/css/master.css">
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

	/* .header .links {} */

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

	@media (max-width:576px) {
		.header .menu {
			display: block;
		}
	}

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

	/* .groups {

} */

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

	.login-landing {
		width: 100%;
		height: 100vh;
	}

	.login-landing .login-section {
		width: 300px;
		background-color: #eee;
		height: 400px;
		margin: auto;
		text-align: center;
		padding: 50px 20px;
		position: relative;
	}

	.login-landing .login-section form {
		width: 100%;
	}

	/* .login-landing .login-section form input:not([type='submit']) {} */

	.login-landing .login-section form input {
		outline: none;
		margin-bottom: 30px;
	}

	.login-landing .login-section .error-message {
		border: none;
		margin-top: 50px;
	}
</style>


<body>
	<div class="login-landing">
		<div class="login-section">
			<form action="" method="post">
				<input type="text" name="username" id="username" placeholder="User Name" required>
				<input type="password" name="password" id="password" placeholder="Password" required>
				<input type="submit" value="Login">
			</form>
			<button class="register">Sign Up</button>

		</div>
	</div>


	<script>
		document.querySelector('.login-landing .login-section .register').onclick = function () {
			window.location.href = 'register';
		}

let ok = false;
let count = 0;
document.querySelectorAll('.login-landing .login-section form input').forEach((el) => {
	el.addEventListener('blur', (e) => {
		if (e.target.name === 'username') {
			if (/[\s+<+>+&+\*+]/gi.test(e.target.value) && count === 0) {
				count++;
				createError(e, `Do not use * , & , | , or space`);
				ok = false;
			}
			else
				ok = true;
		}

	});
	el.addEventListener('click', (e) => {
		if (e.target.type === 'submit') {
			e.preventDefault();
			let fields = e.target.parentElement.querySelectorAll(`input:not([type="submit"])`);
			if ((fields[0].value === '' || fields[1].value === '') && count === 0) {
				count++;
				createError(e, `Fill All Fields`);
				ok = false;
			}
			else if (ok) {
				let data = new Object();
				document.querySelectorAll('.login-landing .login-section form input:not([type="submit"])').forEach((el)=>{
					data[`${el.name}`]= el.value;
				})
				let req = new XMLHttpRequest();
				req.open('POST','/cakephp/users/login');
				req.setRequestHeader("Content-Type", "application/json");
				req.onreadystatechange = function(){
					if(req.status===200 && req.readyState===4){
						if(req.responseText==='1')
						window.location.href = '/cakephp/Posts/index';
						else
						alert('error');
				}
				else{
					console.log(Error(req.status));
				}
				}
				req.send(JSON.stringify(data));
			}
		}
	});
});

function createError(e, message) {
	let error = document.createElement('div');
	error.classList.add('error-message');
	error.append(`${message}`);
	e.currentTarget.parentElement.parentElement.append(error);
	setTimeout(() => {
		error.remove();
		count = 0;
	}, 3000);
}



	</script>
</body>

</html>
