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
	<div class="login-landing">
		<div class="login-section">
			<form action="" method="post">
				<input type="email" name="email" id="email" placeholder="Email" required>
				<input type="password" name="password" id="password" placeholder="Password" required>
				<input type="submit" value="Login">
			</form>
		<button>Sign Up</button>

		</div>
	</div>

<?= $this->Html->script('login.js') ?>
<script>
	</script>
</body>
</html>
<?= $this->Html->css('all.min.css') ?>
<?= $this->Html->css('master.css') ?>
<?= $this->Html->css('normalize.css') ?>
