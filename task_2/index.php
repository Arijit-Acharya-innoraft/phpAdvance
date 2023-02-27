<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task2</title>

  <!-- Linking the css file. -->
  <link rel="stylesheet" href="form.css">
</head>

<body>
  <div class="form-section">
    <div class="container">
      <form action="action.php" method="post">
        <input type="email" name="email" id="email" placeholder="abcd@gmail.com" onkeyup="validateEmail()" required>
        <button type="submit" name="submit" id="submit" disabled>Submit</button>
      </form>

      <!-- Place created to display the error. -->
      <span id="email_error"></span>
    </div>
  </div>
  
  <!-- Linking the javascript file. -->
  <script src="index.js"></script>
</body>

</html>
