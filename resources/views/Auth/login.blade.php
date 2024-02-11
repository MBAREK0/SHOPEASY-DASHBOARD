<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | CodingLab</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

</head>
<body>
   <br>
    @if ($message = Session::get('error'))
   <div class="alert alert-danger" role="alert">
    {{$message}}
   </div>
   @endif
 
  <div class="container">
   <div class="loginForm">
     <img src="img\10282-Block-Standard-3.jpeg" alt="" style="width: 439px;">
    <div class="wrapper">
   
     
         <form action="/loginpost" method="POST" style="width: 31vw;">
        @csrf
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="pass"><a href="/forgetpassword">Forgot password?</a></div>
        <div class="row button">
          <input type="submit" value="Login">
        </div>
        <span style="color:red;"></span>
        <div class="signup-link">Not a member? <a href="/register">Signup now</a></div>
      </form>
     </div>
      
   
    </div>
  </div>
</body>
</html>