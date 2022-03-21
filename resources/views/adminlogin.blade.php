<!DOCTYPE html>
<html>
  <head>
  @includeIf('partials.head')
  </head>
<body>
<div class="w3-container w3-margin-top">
  <a class="w3-button w3-round-large w3-large" href="{{ route('employee.home') }}"><b>Back to home</b></a>
</div>
<div class="w3-card-4 w3-display-middle">
  <div class="w3-container w3-brown">
    <h2 style="text-align: center;">Login</h2>
  </div>
  <form style="min-width: 280px; max-width:350px;"class="w3-container" action="{{route('admin.login')}}" method="POST">
    {{ csrf_field() }}
    <p>      
    <label class="w3-text-brown"><b>Username</b></label>
    <input class="w3-input w3-border w3-sand" name="username" type="text" required></p>
    <p>      
    <label class="w3-text-brown"><b>Password</b></label>
    <input class="w3-input w3-border w3-sand" name="password" type="password" required></p>
    <hr/>
    @php
        if($errors->any())
          echo '<center><p style="color:red">'.$errors->first().'</p></center>';
    @endphp
    <p class="w3-center">
      
      <input class="w3-btn w3-brown" type="submit" value="Login">
    </p>
  </form>
</div>
</body>
</html> 
