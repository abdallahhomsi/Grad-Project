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
            <li><a href="">Computer Science</a></li>
            <li><a href="">Software Engineering</a></li>
            <li><a href="">CIS</a></li>
            <li><a href="">BIT</a></li>
            <li><a href="">Artificial Intelligence</a></li>
            <li><a href="">Cyber Security</a></li>
            <li><a href="" class="add-group">+ Add a group</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="create-post">
            <p>Create Post...</p>
            <div class="post-button">Post</div>
        </div>
    </div>
	<p></p>

<?= $this->Html->script('master.js') ?>
<script>
	let data = JSON.stringify(<?php echo $posts?>);
	data =JSON.parse(data);
	for(let i=0; i<data.length;i++){
		createPost(data[i]);
	}
	</script>
</body>
</html>
<?= $this->Html->css('all.min.css') ?>
<?= $this->Html->css('master.css') ?>
<?= $this->Html->css('normalize.css') ?>
