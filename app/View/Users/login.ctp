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

	.login-landing .login-section form input:not([type='submit']) {}

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
