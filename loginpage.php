<?php 

	session_start();

?>





<html>
<form method="POST" 
action="loginpage.php">
  <head>
     <h1> Log in form</h1>
  </head>  
<body>
<form>	
    <fieldset>
        <legend>Log in:</legend>
    
      
     <table>		
           <tr>		
               	
               <td>				
                  Enter your userId:			
               </td>			
                <td>				
                <input type="text" name="userId">	 
                </td>		
           </tr>



           <tr>		
               	
                   <td>				
                      Enter your password:			
                   </td>			
                    <td>				
                    <input type="password" name="password" value="">	  		
                    </td>		
               </tr>

            <tr>



            <table>

<tr>		
     <button type="Login">Log In</button>	
                  


</tr>

<tr>		
     <button type="Logout">Log Out</button>	
                  


</tr>


            <?php 

$formdata = array(
    'userId'=> $_POST["userId"],
    'password'=> $_POST["password"],
    
 );

$existingdata = file_get_contents('data.json');
$tempJSONdata = json_decode($existingdata);
$tempJSONdata[] =$formdata;

$jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);


if(file_put_contents("data.json", $jsondata)) {
     echo "Data successfully saved <br>";
 }
else 
     echo "no data saved";

$data = file_get_contents("data.json");
$mydata = json_decode($data);





		$_SESSION['userId'] = '';
		$_SESSION['password'] = "";

		echo "User Id is: " . $_SESSION['userId'];
		echo "<br>";
		echo "Password is: " . $_SESSION['password'];

		session_unset();
		session_destroy();


	?>
</form>
</body>
</html>