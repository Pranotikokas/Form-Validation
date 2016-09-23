<?php

	class form_helper
	{

		public function form_open($options=[])
		{
			try{
			$this->check_option_array_not_empty($options,"option array[]","form_open");
			}
			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}

			(array_key_exists("id",$options))?$label=$id=$options["id"]:$label=$id=null;
			(array_key_exists("action",$options))?$action=$options['action']:$action=null;
			(array_key_exists("class",$options))?$class=str_replace(","," ",$options["class"]):$class=null;
			(array_key_exists("method",$options))?$method=$options['method']:$method=null;
			

			$text="<form ";
			if($method!=null)
			{
				$text.="method='".$method."'";
			}
			if($action!=null)
			{
				$text.="action='".$action."'";
			}

			if($class!=null)
			{
				$text.="class='".$class."'";
			}

			if($id!=null)
			{
				$text.="id='".$id."'";
			}

			$text.=">";
			return $text;
		}

		public function form_open_file_upload($options=[])
		{
			try{
			$this->check_option_array_not_empty($options,"option array[]"," form_open_file_upload");
			}
			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}

			(array_key_exists("id",$options))?$label=$id=$options["id"]:$label=$id=null;
			(array_key_exists("action",$options))?$action=$options['action']:$action=null;
			(array_key_exists("class",$options))?$class=str_replace(","," ",$options["class"]):$class=null;
			(array_key_exists("method",$options))?$method=$options['method']:$method=null;
			

			$text="<form ";
			if($method!=null)
			{
				$text.="method='".$method."'";
			}
			if($action!=null)
			{
				$text.="action='".$action."'";
			}

			if($class!=null)
			{
				$text.="class='".$class."'";
			}

			if($id!=null)
			{
				$text.="id='".$id."'";
			}

			$text.="enctype='multipart/form-data'>";
			return $text;
		}


		public function form_close()
		{
			return $text="</form>";
		}

		public function form_text($options)
		{

			/**check if the name column is exist or not
			/if does not exit show error
			**/
			try{
				$this->check_required_option($options,"name","form_text");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}


			(array_key_exists("id",$options))?$label=$id=$options["id"]:$label=$id=null;
			(array_key_exists("name",$options))?$name=$options['name']:$name=null;
			(array_key_exists("class",$options))?$class=str_replace(","," ",$options["class"]):$class=null;
			(array_key_exists("placeholder",$options))?$pholder=$options['placeholder']:$pholder=null;
			(array_key_exists("style",$options))?$style=$options['style']:$style=null;
			(array_key_exists("label",$options))?$label=null:True;
			(array_key_exists("value",$options))?$value=$options['value']:$value=null;
            /*(array_key_exists("value",$options))?$value= '<?php echo isset($_POST[$name]) ? $_POST[$name] : ""; ?>':$value=null;*/


			$text="<div class='form_group'>";
			$text.=($label!=null)?"<label for='".$label."'>$label</label>":"";
			$text.="<input type='text'";
			if($name!=null)
			{
				$text.="name='$name'";

				if($id!=null)
				{
					$text.="id='$id'";
				}

				if($class!=null)
				{
					$text.="class='form-control ".$class."'";
				}
				else
				{
					$text.="class='form-control'";
				}

				if($value!=null)
				{
					$text.="value='".$value."'";
				}

				if($pholder!=null)
				{
					$text.="placeholder='".$pholder."'";
				}

				if($style!=null)
				{
					$text.="style='".$style."'";
				}

				$text.=">";
			}
			else
			{
				$text.="class='form-control'>";
			}
			
			$text.="</div>";
			return $text;
		}

		public function form_hidden($hidden_option)
		{

/**check if the name column is exist or not
			/if does not exit show error
			**/
			try{
				$this->check_required_option($hidden_option,"name","form_hidden");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}



			if(array_key_exists("id",$hidden_option))
			{
				
				$id=$hidden_option["id"];
			}
			else
			{
				
				$id=null;
			}

			if(array_key_exists('name',$hidden_option))
			{
				$name=$hidden_option['name'];
			}
			else
			{
				$name=null;
			}

			if(array_key_exists("class",$hidden_option))
			{
				$class=str_replace(","," ",$hidden_option["class"]);
			}
			else
			{
				$class=null;
			}


			
			$text="<input type='hidden'";
			if($name!=null)
			{
				$text.="name='$name'";

				if($id!=null)
				{
					$text.="id='$id'";
				}

				if($class!=null)
				{
					$text.="class='".$class."'";
				}
				
				$text.=">";
			}
			else
			{
				$text.=">";
			}
			
			
			return $text;
		 }

		public function form_password($options)
		{
			/**check if the password name field is exist or not
			/if does not exit show error
			**/
			try{
				$this->check_required_option($options,"name","form_password");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}


			(array_key_exists("id",$options))?$label=$id=$options["id"]:$label=$id=null;
			(array_key_exists("name",$options))?$name=$options['name']:$name=null;
			(array_key_exists("class",$options))?$class=str_replace(","," ",$options["class"]):$class=null;
			(array_key_exists("placeholder",$options))?$pholder=$options['placeholder']:$pholder=null;
			(array_key_exists("style",$options))?$style=$options['style']:$style=null;
			(array_key_exists("label",$options))?$label=null:True;
			(array_key_exists("value",$options))?$value=$options['value']:$value=null;			

			$text="<div class='form_group'>";
			$text.=($label!=null)?"<label for='".$label."'>$label</label>":"";
			$text.="<input type='password'";
			if($name!=null)
			{
				$text.="name='$name'";

				if($id!=null)
				{
					$text.="id='$id'";
				}

				if($class!=null)
				{
					$text.="class='form-control ".$class."'";
				}
				else
				{
					$text.="class='form-control'";
				}
				if($pholder!=null)
				{
					$text.="placeholder='".$pholder."'";
				}

				if($value!=null)
				{
					$text.="value='".$value."'";
				}

				if($style!=null)
				{
					$text.="placeholder='".$style."'";
				}

				$text.=">";
			}
			
			
			$text.="</div>";
			return $text;
		}

		public function form_textarea($options)
		{/**check if the textarea  name field is exist or not
			/if does not exit show error
			**/
			try{
				$this->check_required_option($options,"name","form_textarea");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}
						
			(array_key_exists("id",$options))?$label=$id=$options["id"]:$label=$id=null;
			(array_key_exists("name",$options))?$name=$options['name']:$name=null;
			(array_key_exists("class",$options))?$class=str_replace(","," ",$options["class"]):$class=null;
			(array_key_exists("placeholder",$options))?$pholder=$options['placeholder']:$pholder=null;
			(array_key_exists("rows",$options))?$rows=$options['rows']:$rows=null;
			(array_key_exists("cols",$options))?$cols=$options['cols']:$cols=null;
			(array_key_exists("style",$options))?$style=$options['style']:$style=null;
			(array_key_exists("label",$options))?$label=null:True;
			(array_key_exists("text",$options))?$inside_text=$options['text']:$inside_text=null;

			$text="<div class='form_group'>";
			$text.=($label!=null)?"<label for='".$label."'>$label</label>":"";
			$text.="<textarea ";
			if($name!=null)
			{
				$text.="name='$name'";

				if($id!=null)
				{
					$text.="id='$id'";
				}

				if($class!=null)
				{
					$text.="class='form-control ".$class."'";
				}
				else
				{
					$text.="class='form-control'";
				}

				if($pholder!=null)
				{
					$text.="placeholder='".$pholder."'";
				}

				if($style!=null)
				{
					$text.="style='".$style."'";
				}


				if($rows!=null)
				{
					$text.="rows='".$rows."'";
				}

				if($cols!=null)
				{
					$text.=$text;
				}

				$text.=">";
				if($inside_text!=null)
				{
					$text.=$inside_text;
				}

				$text.="</textarea>";
			}
			
			$text.="</div>";
			return $text;
		}

		public function form_select($options,$attributes,$select=null)
		{
			try{
				$this->check_required_option($attributes,"name","form_select");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}
			//this try check form select field have option list or not 
			//if does not have option list echo the error
			try{
				$this->check_option_array_not_empty($options,"option array[]","form_select");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}

			(array_key_exists("id",$attributes))?$label=$id=$attributes["id"]:$label=$id=null;
			(array_key_exists("name",$attributes))?$name=$attributes['name']:$name=null;
			(array_key_exists("class",$attributes))?$class=str_replace(","," ",$attributes["class"]):$class=null;
			(array_key_exists("style",$options))?$style=$options['style']:$style=null;
			(array_key_exists("label",$options))?$label=null:True;



			$text="<div class='form-group'>";
			$text.=($label!=null)?"<label for='".$label."'>$label</label>":"";
			$text.="<select name='".$name."'";
			if($class!=null)
			{
				$text.="class='form-control ".$class."'";
			}
			else
			{
				$text.="class='form-control'";
			}
			if($id!=null)
			{
				$text.="id='$id'";
			}
			if($style!=null)
			{
				$text.="style='".$style."'";
			}
			$text.=">";

			foreach($options as $key=>$value)
			{
				if($key==$select)
				{
					$text.="<option selected value=$key>$value</option>";
					
				}
				else
				{
					$text.="<option value=$key>$value</option>";
				}
				
			}

			$text.="</select>";

			return $text;
		}

		public function form_radio($options)
		{

			/** 
			*This try check the name field exit or not in option array
			**/

			try{
				$this->check_required_option($options,"form_name"," form_radio()");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}

			try{
				$this->check_option_array_not_empty($options,"option array[]","form_select");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}

			(array_key_exists("id",$options))?$label=$id=$options["id"]:$label=$id=null;
			(array_key_exists("form_name",$options))?$name=$options['form_name']:$name=null;
			(array_key_exists("class",$options))?$class=str_replace(","," ",$options["class"]):$class=null;
			(array_key_exists("label_name",$options))?$label_name=$options['label_name']:$label_name=null;
			(array_key_exists("value",$options))?$value=$options['value']:$value=null;
			(array_key_exists("checked",$options) && $options['checked']==="True")?$checked="True":$checked="False";
			(array_key_exists("style",$options))?$style=$options['style']:$style=null;
			

			$text="<div class='radio'>";
			$text.="<label><input type='radio'";
			if($name!=null)
			{
				$text.="name='$name'";

				if($id!=null)
				{
					$text.="id='$id'";
				}
				if($value!=null)
				{
					$text.="value='".$value."'";
				}
				if($class!=null)
				{
					$text.="class='".$class."'";
				}

				if($style!=null)
				{
					$text.="style='".$style."'";
				}

				if($checked=="True")
				{
					$text.="checked";
				}
				
				$text.=">";
				if($label_name!=null)
				{
					$text.=$label_name;
				}
				$text.="</label>";
	
			}
			$text.="</div>";//end main div
			
			return $text;
		}

		public function form_check_box($options)
		{
			
			try{
				$this->check_option_array_not_empty($options,"option array[]","form_select");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}

			/** 
			*This try check the name field exist or not in option array
			**/

			try{
				$this->check_required_option($options,"form_name"," form_checkbox()");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}

			

			(array_key_exists("id",$options))?$label=$id=$options["id"]:$label=$id=null;
			(array_key_exists("form_name",$options))?$name=$options['form_name']:$name=null;
			(array_key_exists("class",$options))?$class=str_replace(","," ",$options["class"]):$class=null;
			(array_key_exists("label_name",$options))?$label_name=$options['label_name']:$label_name=null;
			(array_key_exists("value",$options))?$value=$options['value']:$value=null;
			(array_key_exists("checked",$options) && $options['checked']==="True")?$checked="True":$checked="False";
			(array_key_exists("style",$options))?$style=$options['style']:$style=null;
			

			$text="<div class='checkbox'>";
			$text.="<label><input type='checkbox'";
			if($name!=null)
			{
				$text.="name='$name'";

				if($id!=null)
				{
					$text.="id='$id'";
				}
				if($value!=null)
				{
					$text.="value='".$value."'";
				}
				if($style!=null)
				{
					$text.="style='".$style."'";
				}
				if($class!=null)
				{
					$text.="class='".$class."'";
				}

				if($checked=="True")
				{
					$text.="checked";
				}
				
				$text.=">";
				if($label_name!=null)
				{
					$text.=$label_name;
				}
				$text.="</label>";
	
			}
			$text.="</div>";//end main div
			
			return $text;


		}

		public function form_submit($options)
		{
		    try{
				$this->check_option_array_not_empty($options,"option array[]","form_select");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}

			//check the  value field in the button option list exit or not.
			try{
				$this->check_required_option($options,"value"," form_submit");
			}

			catch(Exception $e)
			{
				echo 'Error message'.$e->getMessage();
				exit();
			}

			(array_key_exists("id",$options))?$label=$id=$options["id"]:$label=$id=null;
			(array_key_exists("name",$options))?$name=$options['name']:$name=null;
			(array_key_exists("class",$options))?$class=str_replace(","," ",$options["class"]):$class=null;
			(array_key_exists("value",$options))?$value=$options['value']:$value=null;
			(array_key_exists("style",$options))?$style=$options['style']:$style=null;
			



			$text="<input type='submit'";
			if($value!=null)
			{
				$text.="value='".$value."'";

				if($id!=null)
				{
					$text.="id='".$id."'";
				}

				if($name!=null)
				{
					$text.="name='".$name."'";
				}

				if($style!=null)
				{
					$text.="style='".$style."'";
				}

				if($class!=null)
				{
					$text.="class='".$class."'";
				}

			}
			$text.=">";

			return $text;

		}



		function check_required_option($options,$name,$method_name)
		{
			
			if(!array_key_exists($name,$options))
				{
					throw new Exception("$method_name() helper required $name field.");
				}
		}

		function check_option_array_not_empty($options,$name,$method_name)
		{
			if(empty(array_filter($options)))
			{
				throw new Exception("$method_name() helper required $name field");
			}
		}
		



	}


?>