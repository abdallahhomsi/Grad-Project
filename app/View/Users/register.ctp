
<!Dctype HTML>
<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe Community</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>

<style>
	:root{
		--error:'reqiured';
		--emailError:'HU domain!';
	}
.landing-register {}

.landing-register .register-section {
	position: relative;
}

.landing-register .register-section form div {
	position: relative;
}

.landing-register .register-section form span.error {
	background-color: red;
    color: white;
    height: 20px;
    width: 20px;
    border-radius: 50%;
    display: block;
    position: absolute;
    text-align: center;
    right: 40px;
    top: 50%;
	transform: translateY(-50%);
	cursor: pointer;
}
.landing-register .register-section form span.error span.text{
    position: absolute;
    padding: 4px;
    top: 25px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #1d1d1d;
    color: white;
    border-radius: 6px;
	transition: .3s;
	width: 100px;
	display: none;
}
.landing-register .register-section form span.error:hover span.text{
	display: block;
}
</style>
<body>
<div class="landing-register">
	<div class="register-section">
		<form action="" method="post" id="my-form">
			<div><input type="text" name="first_name" id="fname" placeholder="First Name" required></div>
			<div><input type="text" name="family_name" id="lname" placeholder="Last Name" required></div>
			<div><input type="text" name="username" id="username" placeholder="username" required></div>
			<div><input type="email" name="email" id="email" placeholder="Email" required></div>
			<div><input type="password" name="password" id="password" placeholder="Password" required></div>
			<input type="submit" value="Sign Up">
		</form>
</div>
</body>
<script>
	let groupsShown = false;
	let chooseGroupError=false;
	let role;
	let userData = new Object();
	let groupsChecked = [];
	let groupNames= <?php echo $group_options?>;
	let groups = [];
	let values=[];
	let firstTime = true;
for (let prop in groupNames) {
	if(firstTime)
	firstTime=false;
	else{
	values.push(prop)
	groups.push(groupNames[`${prop}`]);
	}
}
	document.querySelectorAll('.landing-register .register-section form input').forEach((el)=>{
	el.addEventListener('focus',(e)=>{
		let hasError = e.target.parentElement.querySelector('span');
		if(hasError)
		hasError.remove();
	})
	el.addEventListener('blur',(e)=>{
		if(e.target.type==='email'){
			let pattern1 = /\d{5}@std.hu.edu.jo/g;
			let pattern2 = /\d{5}@staff.hu.edu.jo/g;
			if(pattern1.test(e.target.value)){
			chooseGroup();
			role=1;
			}else if(pattern2.test(e.target.value)){
				removeGroups();
				role=2;
			}else{
				createError(e.target.parentElement,'HU domain!');
			}
		}
		else if(e.target.type==='password'){
			let pattern =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
			if(!pattern.test(e.target.value)){
			createError(e.target.parentElement,'not valid');
			}
		}
		else if(e.target.id==='username'){
			let pattern = /\s+/g;
			if(pattern.test(e.target.value))
			createError(e.target.parentElement,'no spaces');
		}
	})
	el.addEventListener('click',(e)=>{
		if(e.target.type==='submit'){
			e.preventDefault();
			let empty=false;
			let checkbox=false;
			let checked=false;
			e.target.parentElement.parentElement.querySelectorAll('div input').forEach(el=>{
				if(el.type==='checkbox'){
					checkbox=true;
					if(el.checked)
					checked=true;
				}
				if(el.value===''){
				createError(el.parentElement,'required');
				empty=true;
				}
			})
			if(checkbox===true && checked===false){
			checkboxError();
			console.log(chooseGroupError);
			}
			else if(!empty){
				removecheckboxError();
				//DATABASE
				document.querySelectorAll('.landing-register .register-section form input:not([type="submit"])').forEach((el)=>{
					if(el.type==='checkbox'){
						if(el.checked)
						groupsChecked.push(el.value);
					}
					else{
						let attributeName = el.name;
						userData[`${attributeName}`]=el.value;
					}
				})
				userData['role_id']=role;
				if(groupsChecked.length!==0)
				userData.groups = groupsChecked;
				else{
				userData.groups = values;
				}

				let data = JSON.stringify(userData);
				let req=new XMLHttpRequest();
				req.open("POST", "/cakephp/users/register");
				req.setRequestHeader("Content-Type", "application/json");
	req.onreadystatechange = function() {
	if (req.readyState === 4) {
		if (req.status === 200) {
		console.log(req.responseText);
		} else {
		console.error("Error:", req.status);
		}
	}
	};
req.send(data);
		window.location.href = '/cakephp/users/login';
			}
		}
	})
})
function createCheckBox(index){
	let myLabel =document.createElement('label');
	let myInput =document.createElement('input');
	myInput.type='checkbox';
	myInput.value=values[index];
	myLabel.append(myInput);
	myLabel.append(groups[index]);
	document.querySelector('.landing-register .register-section form input[type="submit"]').before(myLabel);
}
function chooseGroup(){
	if(!groupsShown){
		groupsShown=true;
	let myP =document.createElement('p');
	myP.append('Please Choose Group :');
	document.querySelector('.landing-register .register-section form input[type="submit"]').before(myP);
	let i=0;
			let create = setInterval(()=>{
				createCheckBox(i);
				i++;
				if(i===6)
				clearInterval(create);
			},800)
		}
}
function removeGroups(){
	let p = document.querySelector('.landing-register .register-section form p');
	if(p)
	p.remove();
	document.querySelectorAll('.landing-register .register-section form label').forEach((el)=>{
		el.remove();
		groupsShown=false;
	})
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
function checkboxError(){
	if(!chooseGroupError){
	chooseGroupError=true;
	let myP =document.createElement('p');
	myP.classList.add('checkbox-error');
	myP.append('Please choose at least one group');
	document.querySelector('.landing-register .register-section form input[type="submit"]').before(myP);
}
}
function removecheckboxError(){
	let p = document.querySelector(".landing-register .register-section form p.checkbox-error");
	if(p)
	p.remove();
	chooseGroupError=false;
}
</script>
</html>
<?= $this->Html->css('all.min.css') ?>
<?= $this->Html->css('master.css') ?>
<?= $this->Html->css('normalize.css') ?>
