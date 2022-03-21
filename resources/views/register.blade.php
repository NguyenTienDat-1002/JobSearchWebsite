<!DOCTYPE html>
<html>
  <head>
    @includeIf('partials.head')
  </head>

<body>

  <div class="w3-container w3-display-container w3-pale-blue" style="width:100%; height:100%">
    <div class="w3-display-middle">
      <div class="w3-container">
        <div class="w3-container w3-safety-blue">
          <h2 class="w3-center">Register</h2>
        </div>
      @if($entity==="employee") 
        <form class="w3-container w3-light-gray" method="post" action="{{route("employee.register")}}">
          {{ csrf_field() }}
        <div class="grid-container">
          <p>
            <label>First Name:</label>
            <input class="w3-input w3-border w3-round" name="fname" type="text" required>
          </p>
          <p>
            <label>Last Name:</label>    
            <input class="w3-input w3-border w3-round" name="lname" type="text" required>
          </p>   
        </div>
          <p>
            <label>Email:</label>    
            <input class="w3-input w3-border w3-round" name="email" type="email" required>   
          </p>
    
          <p>
            <label>Phone Number:</label>    
            <input class="w3-input w3-border w3-round" maxlength="10" name="phone" type="tel" required>   
          </p>

          <p>
            <label>Password:</label>    
            <input class="w3-input w3-border w3-round" name="password" type="password" required>   
          </p>

          <p>
            <label>RePassword:</label>    
            <input class="w3-input w3-border w3-round" name="rpassword" type="password" required>   
          </p>
          @php
              if($errors->any())
                echo '<center><p style="color:red">'.$errors->first().'</p></center>';
          @endphp
          @if(session('notification'))
            <center><p style="color:green">{{ session('notification')}}</p></center>
          @endif
          <p class="w3-center w3-padding">
            <input type="submit" name="register" value="register" class="w3-button  w3-safety-blue">    
          </p>

          <div style="height: 1px; background-color: black"></div>
          <p class="w3-center">If you had your account 
            <a href="{{ route('employee.login.show') }}"><b style="color: #0067a7">Login</b></a>
          </p>
          
        </form>
      @else
      <form action="{{route("employer.register")}}"class="w3-container w3-light-gray" method="post">
        {{ csrf_field() }}
        <div class="grid-container">
          <p>
            <label>First Name:</label>
            <input class="w3-input w3-border w3-round" name="fname" type="text" required>
          </p>
          <p>
            <label>Last Name:</label>    
            <input class="w3-input w3-border w3-round" name="lname" type="text" required>
          </p>   
        </div>
          <p>
            <label>Email:</label>    
            <input class="w3-input w3-border w3-round" name="email" type="email" required>   
          </p>
    
          <p>
            <label>Phone Number:</label>    
            <input class="w3-input w3-border w3-round" maxlength="10" name="phone" type="tel" required>   
          </p>

          <p>
            <label>Password:</label>    
            <input class="w3-input w3-border w3-round" name="password" type="password" required>   
          </p>

          <p>
            <label>RePassword:</label>    
            <input class="w3-input w3-border w3-round" name="rpassword" type="password" required>   
          </p>
        <div style="height: 1px; background-color: black"></div>
        @php
          if($errors->any())
            echo '<center><p style="color:red">'.$errors->first().'</p></center>';
        @endphp
        @if(session('notification'))
          <center><p style="color:green">{{ session('notification')}}</p></center>
        @endif
        
        <p class="w3-center w3-padding">
          <input type="submit" name="Register" value="Register" class="w3-button  w3-safety-blue">    
        </p>
        <p class="w3-center">If you had your account 
          <a href="{{ route('employer.login.show') }}"><b style="color: #0067a7">Login</b></a>
        </p>
      </form>
      @endif
    </div>
  </div>
</div>
</body>
</html>