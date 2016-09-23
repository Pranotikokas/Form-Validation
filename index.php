<!DOCTYPE html>
<html lang="en">

  <head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Validation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	
	<?php
		      include("class/form_helper.php");
		      include("class/form_validation.php");
		      $helper=new form_helper;
		      $form_validation=new form_validation;
	?>
	
  </head>
  <body>
	<div class = "container">
		
		<h1><img src="img/signup-icon.png" class = "img-square"/><a href="index.php">     Sample Form Validation Test</a></h1>
		<blockquote>
			<p>* Mandatory Fields </p>
			<footer>Min length of Username = 4, max length = 15 and no spaces allowed </footer>
			<footer>Email should be a valid email ID</footer>
			<footer>Checkbox should be checked before submitting</footer>
		</blockquote>
		
		<fieldset>
		  <legend>User Details</legend>
		  	<div class='row'>
				<div class='col-sm-12'>
    			<?php
    		
    			
    			echo $helper->form_open($option=['method'=>'post','action'=>htmlspecialchars($_SERVER["PHP_SELF"])]);

				echo $helper->form_select($options=[
					"1"=>"Mr.",
					"2"=>"Ms.",
					"3"=>"Mrs.",
				]
					,$attributes =
						[
							"name"=>"Textarea",
							"id"=>"Title",
							"class"=>"hclass",
							"style"=>"custome_style",
							"label"=>"nolabel"
						],1);
				echo "<br>";

				echo $helper->form_text($option=['name'=>'firstname','id'=>"Firstname*",]);
				echo "<br>";

				echo $helper->form_text($option=['name'=>'lastname','id'=>"Lastname*",]);
				echo "<br>";

    			echo $helper->form_text($option=['name'=>'username','id'=>"Username*",]);
    			echo "<br>";
    	
    			echo $helper->form_text($options=['name'=>'email','id'=>"Email*"]);
    			echo "<br>";
    			
    			echo $helper->form_text($options=['name'=>'number','id'=>'Enter Number*', "placeholder"=>"Enter number between 2 to 20",]);
    			echo "<br>";

				echo "<strong>Gender*</strong>";
				echo $helper->form_radio($option=['form_name'=>'name', 'label_name'=>'Female', 'id'=>'newsletter', "class"=>'test_class', 'value'=>'accept', 'checked'=>'True',]);
				echo $helper->form_radio($option=['form_name'=>'name', 'label_name'=>'Male', 'id'=>'newsletter', "class"=>'test_class', 'value'=>'accept', 'checked'=>'False',]);

    			echo $helper->form_password($options=['name'=>'password','id'=>'Password*']);
    			echo "<br>";
    			
    			echo $helper->form_password($options=['name'=>'confirmpassword','id'=>'Confirm password*', "placeholder"=> "Confirm Password should match Password "]);
				echo "<br>";

				echo $helper->form_check_box([$option="form_name"=>'checkbox','label_name'=>'I confirm that the above information is correct.','id'=>"newsletter",'value'=>"accept","checked"=>"False"]);

    			echo $helper->form_submit($options=['name'=>'submit','value'=>"Sign up","class"=>'btn btn-info',"style"=>"margin-top:6px;"]);
				echo "<br>";
    			echo $helper->form_close();


    			?>
    			</div>
    		</div>
			
			   <?php
					 if(isset($_POST['submit']))
					{

						$form_validation->validate("firstname","req|min_length(0)|max_length(15)");
						$form_validation->validate("lastname","req|min_length(0)|max_length(15)");
						$form_validation->validate("username","req|min_length(4)|max_length(15)|nospace");
						$form_validation->validate("email","req|valid_email");
						$form_validation->validate("number","req|min_value(1)|max_value(21)");
						$form_validation->validate("password","req|match(confirmpassword)");
						$form_validation->validate("confirmpassword","req");
						$form_validation->validate("checkbox","req");


						if($form_validation->check_errors()==TRUE)
						{
							
							echo "<pre>".print_r($form_validation->error_hash,1)."</pre>";exit();
							
						}
						else
						{
					 ?>

						<div class="alert alert-success">
						   <strong>Success!</strong>
						</div>

					<?php

						}
							
				}
				
				?>
		 </fieldset>
		
	</div>
	<!--<script src="js/checkbox.js"></script> -->
  </body>
</html>