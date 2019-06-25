<div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
					</div>
                   <form action="" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" name="username"  class="form-control" id="username"  placeholder="Enter username">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control"  placeholder="Enter Password">
                           </div>
                           <?php
                           if(isset($_POST['sub'])){
                               include "models/users/functions.php";
                               $username = $_POST['username'];
                               $password = $_POST['password'];
                               $user = getUserByUsernameAndPassword($username , md5($password));
                               if(!is_null($user)){
                                 $_SESSION['idUser'] = $user->idUser;
                                 $_SESSION['user'] = $user->username;
                                 header("Location:index.php?page=users");
                                 
                               }
                               else{
                                   echo "<div class='alert alert-danger' role='alert'>
                                   Wrong login params!
                                 </div>";
                               }
                           }
                           
                           ?>
                           




                           <div class="col-md-12 text-center ">
                              <input type="submit" value="Login" name="sub" class=" btn btn-block mybtn btn-primary tx-tfm"></button>
                           </div>
                           
                        </form>
                 
				</div>
			</div>
			  </div>
      </div>   