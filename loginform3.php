<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <style>
    body {
      font-family: Arial;
      background-color: rgb(179, 183, 180);
      margin: 0;
      display: flex;
      height: 100vh;
      padding: 0;
      align-items: center;
      justify-content: center;
    }
    .container {
    text-align: center;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    
}

h1 {
    color: #333;
    font-size: 2em;
}

    form {
      background-color: rgb(89, 95, 103);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #7c9f16;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>PetCare</h1>
</div>
  <form id="registrationForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="button" onclick="validateForm()">Register</button>
  </form>
  <form action="login.php" method="post">
    Email: <input type="email" name="email" required>
    Password: <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>

  <script>
    function validateForm() {
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;

     
      if (validate()) {
        alert('Registration successful!');
        window.location.href = 'index.html';
      }
    }

    const validate = () => {
      
      return true;
    };

   
    document.getElementById('registrationForm').addEventListener('submit', function (e) {
      e.preventDefault(); 
      validateForm();
    });
  </script>

</body>

</html>