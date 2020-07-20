<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
  <form id="msform" action="sign_up_inc.php" method="POST">
  
    <!-- fieldsets -->
    <fieldset>
      <h2 class="fs-title">Create your account</h2>
      <input type="text" name="uid" placeholder="Username" />
      <input type="text" name="mail" placeholder="Email" />
      <input type="text" name="fname" placeholder="Full-Name" />
      <input type="password" name="pass" placeholder="Password" />
      <input type="password" name="cpass" placeholder="Confirm Password" />
      <input type="submit" name="signup-submit" class="submit action-button" value="Submit" />
    </fieldset>
  
  </form>
</body>
</html>