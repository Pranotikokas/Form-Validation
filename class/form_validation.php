<?php

	class form_validation
	{

		var $error_hash;
		var $validator;
		
		public function form_validation()
		{
			$this->error_hash=array();
			$this->validator=array();
		}

		public function validate($name,$validator=null)
		{

			if(strcmp($_SERVER['REQUEST_METHOD'],'POST')==0)
			{
				$form_method=$_POST;
			}
			else
			{
				$form_method=$_GET;
			}

			//get input value
			$input_value=null;
			if(isset($form_method[$name])&&$form_method[$name]!="")
			{
				 $input_value=$form_method[$name];
			}
			
			if($validator!=null)
			{
					$splite_validate=array();
				    $splite_validate[$name]=explode("|",$validator);
			        //echo "<pre>".print_r($splite_validate,1)."</pre>";
			}
		

			//pass name,value,validator to do validator function
			$aditional_validator="";
			$get_inner="";
			foreach($splite_validate as $key=>$value)
			{
				if(is_array($value))
				{

					foreach($value as $row=>$pattern)
					{
						if($s=strchr($pattern,"("))
						{    
							$main_validator=explode("(",$pattern);
							$pattern=$main_validator[0];
							
							$aditional_validator=preg_replace('/[^A-Za-z0-9\-]/', '', $s); // Removes special chars.
							
						}
						if($this->do_validate($key,$pattern,$input_value,$aditional_validator,$form_method))
						{

						}
					}
				}
			}

		}//End validate function

		public function do_validate($key,$pattern,$input_value,$aditional_validator,$form_method)
		{
			switch($pattern)
			{
				case("req"):
					{
						$this->required_field($key,$pattern,$input_value);
						break;
					}

                case("nospace"):
                {
                    $this->no_space($key,$pattern,$input_value);
                    break;
                }

				case("valid_email"):
					{
					   $this->valid_email($key,$pattern,$input_value);
					   break;
					}

				case("match"):
					{
						//echo print_r($aditional_validator)."before";exit();
					 	$this->compare($key,$pattern,$input_value,$aditional_validator,$form_method);
					 	break;
					}

				case("min_length"):
					{
						$this->check_minlength($key,$pattern,$input_value,$aditional_validator);
					 	break;
					}

				case("max_length"):
					{
						$this->check_maxlength($key,$pattern,$input_value,$aditional_validator);
					 	break;
					}

				case("min_value"):
					{
						$this->check_min_value($key,$pattern,$input_value,$aditional_validator);
					 	break;

					}

				case("max_value"):
					{
						$this->check_max_value($key,$pattern,$input_value,$aditional_validator);
					 	break;

					}

			}
		}


		public function required_field($key,$pattern,$value)
    {

        if(!isset($value) || strlen($value)<=0)
        {
            if(!array_key_exists($key,$this->error_hash))
            {
                $this->error_hash[$key]=json_encode(array("$key"=>$key." is required"));
            }

        }

    }


        public function no_space($key,$pattern,$value)
        {

            if( isset($value) && count(explode(' ', $value)) > 1)
            {
                if(!array_key_exists($key,$this->error_hash))
                {
                    $this->error_hash[$key]=json_encode(array("$key"=>$key." should not have space"));
                }

            }

        }

		public function check_errors()
		{
		  if(count($this->error_hash)>0)
		  {
		  	 return TRUE;
		  }
		  else
		  {
		  	return FALSE;
		  }
		}

		public function get_error($name)
		{
			if(array_key_exists($name,$this->error_hash))
			{
				return $this->error_hash[$name];
			}
		}

		public function valid_email($key,$pattern,$value)
		{
			if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) 
			{
  				if(!array_key_exists($key,$this->error_hash))
  				{
  					$this->error_hash[$key]=json_encode(array("$key"=>$key." is not valid email."));
  				}
  				//echo("$email is a valid email address");
			} 
		}

		public function compare($key,$pattern,$input_value,$aditional_validator,$form_method)
		{
			//"<pre>".print_r($additional_validator,1)."</pre>";exit();

			if($input_value!= $form_method[$aditional_validator])
			{
				if(!array_key_exists($key,$this->error_hash))
  				{
  					$this->error_hash[$key]=json_encode(array("$key"=>$key." must match to the $aditional_validator field"));
  				}
			}
		}

		public function check_minlength($key,$pattern,$input_value,$aditional_validator)
		{
			if(strlen($input_value)<$aditional_validator)
			{
				if(!array_key_exists($key,$this->error_hash))
  				{
  					$this->error_hash[$key]=json_encode(array("$key"=>$key." minlength should be greater than $aditional_validator characters."));
  				}
			}
		}

		public function check_maxlength($key,$pattern,$input_value,$aditional_validator)
		{
			if(strlen($input_value)>$aditional_validator)
			{
				if(!array_key_exists($key,$this->error_hash))
  				{
  					$this->error_hash[$key]=json_encode(array("$key"=>$key." maxlength should be less than the $aditional_validator characters"));
  				}
			}
		}

		public function check_min_value($key,$pattern,$input_value,$aditional_validator)
		{
			if (filter_var($input_value, FILTER_VALIDATE_INT) === false) 
				{
   					if(!array_key_exists($key,$this->error_hash))
  					{
  						$this->error_hash[$key]=json_encode(array("$key"=>$key." require number input."));
  					}
				} 
				else 
				{
   					 if($input_value<=$aditional_validator)
   					 {
   					 	if(!array_key_exists($key,$this->error_hash))
  						{
  							$this->error_hash[$key]=json_encode(array("$key"=>$key." min value should be greater than $aditional_validator."));
  						}
   					 }
				}
		}

		public function check_max_value($key,$pattern,$input_value,$aditional_validator)
		{
			if (filter_var($input_value, FILTER_VALIDATE_INT) === false) 
				{
   					if(!array_key_exists($key,$this->error_hash))
  					{
  						$this->error_hash[$key]=json_encode(array("$key"=>$key." require number input."));
  					}
				} 
				else 
				{
   					 if($input_value>=$aditional_validator)
   					 {
   					 	if(!array_key_exists($key,$this->error_hash))
  						{
  							$this->error_hash[$key]=json_encode(array("$key"=>$key." max value should be less than $aditional_validator."));
  						}
   					 }
				}
		}


        /*public function check_checkbox($key,$pattern,$input_value){
            if($input_value>='check1')
            {
                if(!array_key_exists($key,$this->error_hash))
                {
                    $this->error_hash[$key]=json_encode(array("$key"=>$key." is required"));
                }
            }

        }*/
	}


?>