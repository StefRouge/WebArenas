<?php $this->assign('title','Login');?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <div class="container">
	<div class="card card-container">
            <div class="card-header text-center">
		<ul class="nav nav-tabs card-header-tabs">
                    <li class="active nav-item col-sm-6">
                        <a class="nav-link" href="login">Login</a>
		    </li>
		    <li class="nav-item col-sm-6">
			<a class="nav-link" href="#">Register</a>
         	    </li>
		</ul>		
            </div>
				
            <div class="card-block col-lg-6">			
		<form class="form-signin well" method="post" action="#">
                    <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required />
                    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required />
                    <div class="checkbox">
			<label>
                            <input type="checkbox" name="remenber" value="remember-me"> Remember me </input>
			</label>
                    </div>
                    <button type="submit" name="submit" id= "btn-signin" class="btn btn-lg btn-primary btn-block">Sign in</button>				
		</form>
		<a href="#" class="help"> Forgot you password ?</a>
            </div>
	</div>
    </div> <!-- /container -->
    
    <script type="text/javascript">
        var page = document.getElementById("login");
        page.className="active";
    </script>
    
</body>
