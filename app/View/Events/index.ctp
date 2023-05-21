<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safe Community</title>
	<link rel="stylesheet" href="/cakephp/css/normalize.css">
	<link rel="stylesheet" href="/cakephp/css/all.min.css">
	<link rel="stylesheet" href="/cakephp/css/event.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<style>

</style>

<body>
	<div class="header">
		<div class="logo">
			<img src="/cakephp/app/webroot/img/logo.png" alt="logo">
			<h3>Safe Community</h3>
		</div>
		<div class="links">
			<ul class="nav-links">
				<li class="home"><i class="fa-solid fa-house"></i></i>Home</li>
				<li class="books"><i class="fa-solid fa-book-open "></i>Books</li>
				<li class="active events"><i class="fa-solid fa-calendar "></i>Events</li>
				<li class="profile"><i class="fa-solid fa-user "></i>Profile</li>
			</ul>
		</div>
	</div>


	<!-- <div class="events">
		<div class="event">
			<div class="front">
				<h4 class="title">Orange Academy Session</h4>
				<h3 class="Location">IT 204</h3>
				<div class="start-time">20/5/2023</div>
				<div class="end-time">20/5/2023</div>
			</div>
			<div class="back">
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima quis id, iure
					alias
					ex, totam voluptas corporis assumenda impedit commodi sapiente, nulla veniam aspernatur unde
					delectus atque incidunt nihil vero!</p>
			</div>
		</div>
	</div> -->
	<script>
		//variables
		let eventsData = <?php echo $future_event; ?>;
		let currentRole = <?php echo $userRole; ?>;
		let currentUserRole = currentRole[0]['User']['role_id'];
		let optionIconClass = "fa-solid fa-trash";

		//generate events:
		generateEvents();
		function generateEvents() {
			if(currentUserRole==='2'){
				let addButton =document.createElement('div');
				addButton.classList.add('add-event-button');
				addButton.append('Add Event');
				document.body.append(addButton);
				}
				let eventTemplate = document.createElement('div');
			eventTemplate.classList.add('events');
			if(eventsData.length!==0){
			eventsData.forEach(element => {
				let eventCard = document.createElement('div');
				eventCard.classList.add('event');
				eventCard.dataset.id = element.Event.id;
				let frontFace = document.createElement('div');
				frontFace.classList.add('front');
				let backFace = document.createElement('div');
				backFace.classList.add('back');
				let title = document.createElement('h4');
				title.classList.add('title');
				title.append(element.Event.title);
				let location =document.createElement('h3');
				location.classList.add('location');
				location.append(element.Event.location);
				let description =document.createElement('p');
				description.append(element.Event.body);
				let startTime =document.createElement('div');
				startTime.classList.add('start-time');
				startTime.append(element.Event.start.split(' ')[1])
				let endTime =document.createElement('div');
				endTime.classList.add('end-time');
				endTime.append(element.Event.end.split(' ')[1])
				let startDate =document.createElement('div');
				startDate.classList.add('start-date');
				startDate.append(element.Event.start.split(' ')[0])
				let endDate =document.createElement('div');
				endDate.classList.add('end-date');
				endDate.append(element.Event.end.split(' ')[0]);
				if(currentUserRole==='2'){
				let option =document.createElement('span');
				option.classList.add('option');
				let optionIcon = document.createElement('i');
				optionIcon.classList.add(...optionIconClass.split(' '));
				option.append(optionIcon);
				eventCard.append(option);
				}
				let details =document.createElement('div');
				details.classList.add('event-details');
				details.append('Details >');
				frontFace.append(details);
				frontFace.append(title);
				frontFace.append(location);
				frontFace.append(startTime);
				frontFace.append(startDate);
				frontFace.append(endTime);
				frontFace.append(endDate);
				backFace.append(description);
				eventCard.append(frontFace);
				eventCard.append(backFace);
				eventTemplate.append(eventCard);
			});
		}
		else{
			let noEvents = document.createElement('div');
			noEvents.classList.add('no-event');
			let noEventClass = "fa-regular fa-calendar-xmark";
			let noEventIcon =document.createElement('i');
			noEventIcon.classList.add(...noEventClass.split(' '));
			let p3 =document.createElement('p');
			p3.append('No Upcoming Events');
			noEvents.append(noEventIcon);
			noEvents.append(p3);
			eventTemplate.append(noEvents);
		}
			document.body.append(eventTemplate);
		}



		//Elements Not Exist
		document.body.addEventListener('click',(e) => {
			if(e.target.classList.contains('add-event-button')){
				let overlay =document.createElement('div');
				overlay.classList.add('overlay');
				document.body.append(overlay);
				let eventContent =document.createElement('div');
				eventContent.classList.add('event-content');
				let form =document.createElement('form');
				let title =document.createElement('input');
				title.type='text';
				title.placeholder="Title";
				title.classList.add('event-title');
				let body =document.createElement('textarea');
				body.maxLength = 70;
				body.placeholder="Content";
				body.classList.add('event-body');
				let location =document.createElement('input');
				location.type = 'text';
				location.placeholder = 'Location';
				location.classList.add('event-location');
				let p1 =document.createElement('p');
				p1.append('From :')
				let p2 =document.createElement('p');
				p2.append('To :');
				let start =document.createElement('input');
				start.type='datetime-local';
				start.classList.add('event-start');
				start.step = '1';
				let end =document.createElement('input');
				end.type='datetime-local';
				end.classList.add('event-end');
				end.step = '1';
				form.append(title);
				form.append(body);
				form.append(location);
				form.append(p1);
				form.append(start);
				form.append(p2);
				form.append(end);
				eventContent.append(form);
				let confirmEvent =document.createElement('div');
				confirmEvent.classList.add('confirm-event');
				confirmEvent.append('Add');
				let cancelEvent =document.createElement('div');
				cancelEvent.classList.add('cancel-event');
				cancelEvent.append('Cancel');
				let buttonsContainer =document.createElement('div');
				buttonsContainer.classList.add('buttons');
				buttonsContainer.append(cancelEvent);
				buttonsContainer.append(confirmEvent);
				eventContent.append(buttonsContainer);
				document.body.append(eventContent);
			}
			else if(e.target.classList.contains('cancel-event')){
				document.querySelector('.overlay').remove();
				e.target.parentElement.parentElement.remove();
			}
			else if(e.target.classList.contains('confirm-event')){
				//Database
				let obj = new Object();
				e.target.parentElement.parentElement.querySelectorAll('form input').forEach(el=>{
					if(!obj.hasOwnProperty(el.type)){
					obj[`${el.type}`] = el.value;
					if(el.type === 'datetime-local')
					obj[`${el.type}`] = obj[`${el.type}`].split('T').join(' ');
					}
					else{
					obj[`${el.type}2`] = el.value;
					if(el.type === 'datetime-local')
					obj[`${el.type}2`] = obj[`${el.type}2`].split('T').join(' ');
					}
				})
				obj.body = e.target.parentElement.parentElement.querySelector('form textarea').value;
				let req = new XMLHttpRequest();
				req.open('POST','/cakephp/Events/add');
				req.onreadystatechange = function(){
					if(this.readyState===4 && this.status===200)
					window.location.href = '/cakephp/Events/index';
				}
				req.send(JSON.stringify(obj));
			}
		})
		if(document.querySelector('.event')){
			document.querySelectorAll('.event').forEach(el=>{
				el.addEventListener('click',(e)=>{
				if(e.target.classList.contains('fa-trash')){
					let obj = new Object();
					obj.id = e.target.parentElement.parentElement.dataset.id;
					let req = new XMLHttpRequest();
					req.open('POST','/cakephp/Events/delete');
					req.onreadystatechange = function(){
						if(this.readyState===4 && this.status===200){
					e.target.parentElement.parentElement.remove();
						}
					}
					req.send(JSON.stringify(obj));
				}
				else
				e.currentTarget.classList.toggle('active');
			})
			})
		}

		//To Navigte between pages:
		document.querySelectorAll('.header .links .nav-links li').forEach(el => {
			el.addEventListener('click', (e) => {
				console.log(e.target);
				if (e.currentTarget.classList.contains('events')) {
					window.location.href = '/cakephp/Events/index';
				}
				else if (e.currentTarget.classList.contains('books')) {
					window.location.href = '/cakephp/Books/index';
				}
				else if (e.currentTarget.classList.contains('profile')) {
					window.location.href = '/cakephp/Profile/index';
				}
				else if (e.currentTarget.classList.contains('home')) {
					window.location.href = '/cakephp/Posts/index';
				}
			});
		});


	</script>
</body>

</html>
