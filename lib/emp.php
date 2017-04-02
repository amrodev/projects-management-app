<?php
  
  require_once('database.php');
   
  class Emp{
  	public $con_state;
  	public $data = array();
    public $table_name   = "employees";
    public $table_name_titles   = "titles";

  	public function Check_Connection(){
  		$db = new Database();
  		$this->con_state = $db->connect();
       // return 1 if ture 0 of false
      //mysql_query("SET NAMES 'utf8'", $this->con);
  		return $this->con_state;
  	}


      

  	public function get_all()
  	{
  		$this->con_state = $this->Check_Connection();
  		if ($this->con_state) {
  			$db = new Database();
  		    $r= $db->get_all($this->table_name);  		    
  		}
      return $r;
  	}

   

    public function getAllTitles()
    {
      $this->con_state = $this->Check_Connection();
      if ($this->con_state) {
        $db = new Database();
          $r= $db->get_all($this->table_name_titles);          
      }
      return $r;
    }

    


    public function get_random_user($num_users)
    {
      $this->con_state = $this->Check_Connection();
      if ($this->con_state) {
        $db = new Database();
          $n_records = $num_users;
          $r= $db->get_random_record($this->table_name,$n_records);          
      }
      return $r;
    }

    public function get_numbers_of_users($number,$order_by)
    {
        //$order_by = ' food_id DESC '; // ASC
        $this->con_state = $this->Check_Connection();
        if ($this->con_state) {
            $db = new Database();
            $r= $db->get_number_records($this->table_name,$number,$order_by);            
        }
      return $r;
    }

    public function get_empdata($search_by,$value)
    {

        $this->con_state = $this->Check_Connection();
        $userdata = array();
        if ($this->con_state) 
        {
          $db = new Database();
          $userdata= $db->get_one_record($this->table_name,$search_by,$value);
        }
        else {
          echo 'Sorry Connection was lost';
        }
        return $userdata;
        //var_dump($userdata);
    }

    public function get_titleData($search_by,$value)
    {

        $this->con_state = $this->Check_Connection();
        $userdata = array();
        if ($this->con_state) 
        {
          $db = new Database();
          $userdata= $db->get_one_record($this->table_name_titles,$search_by,$value);
        }
        else {
          echo 'Sorry Connection was lost';
        }
        return $userdata;
        //var_dump($userdata);
    }

   

    public function getUserData($search_by,$value)
    {

        $this->con_state = $this->Check_Connection();
        $userdata = array();
        if ($this->con_state) 
        {
          $db = new Database();
          $userdata= $db->get_one_record($this->table_name,$search_by,$value);
        }
        else {
          echo 'Sorry Connection was lost';
        }
        return $userdata;
        //var_dump($userdata);
    }

    

    public function search($searchword)
    {

        $this->con_state = $this->Check_Connection();
        $userdata = array();
        if ($this->con_state) 
        {
          $db = new Database();
          $userdata= $db->search($this->table_name,$searchword);
        }
        else {
          echo 'Sorry Connection was lost';
        }
        return $userdata;
        //var_dump($userdata);
    }
    
    
  	public function get_by($username,$select)
  	{
  		$ar1 = array();
  		$this->con_state = $this->Check_Connection();
  		if ($this->con_state) {
  			$db = new Database();
  		    $value = $db->get_by($this->table_name,$username,$select);  
  		}

  		return $value;

  	}

    public function get_by_where($select,$where)
    {

        $this->con_state = $this->Check_Connection();
        $userdata = array();
        if ($this->con_state) 
        {
          $db = new Database();
          $userdata= $db->get_by_where($this->table_name,$select,$where);
        }
        else {
          echo 'Sorry Connection was lost';
        }
        return $userdata;
        //var_dump($userdata);
    }

    public function get_by_whereTE($search_by,$value)
    {

        $this->con_state = $this->Check_Connection();
        $userdata = array();
        if ($this->con_state) 
        {
          $db = new Database();
          $userdata= $db->Get_all_ByWhere($this->table_nameTE,$search_by,$value);
        }
        else {
          echo 'Sorry Connection was lost';
        }
        return $userdata;
        //var_dump($userdata);
    }
    
    public function check_login($username,$password)
    {
      $this->con_state = $this->Check_Connection();
        if ($this->con_state) {
             $db = new Database();
             echo $_exist = $db->check_user($this->tablename,$username,$password);
             return $_exist;                       
        }
    }

    public function check_loginST($username,$password)
    {
      $this->con_state = $this->Check_Connection();
        if ($this->con_state) {
             $db = new Database();
             echo $_exist = $db->check_user($this->tablenameST,$username,$password);
             return $_exist;                       
        }
    }

    public function check_loginPA($username,$password)
    {
      $this->con_state = $this->Check_Connection();
        if ($this->con_state) {
             $db = new Database();
             echo $_exist = $db->check_user($this->tablenamePA,$username,$password);
             return $_exist;                       
        }
    }

    public function check_loginTE($username,$password)
    {
      $this->con_state = $this->Check_Connection();
        if ($this->con_state) {
             $db = new Database();
             echo $_exist = $db->check_user($this->tablenameTE,$username,$password);
             return $_exist;                       
        }
    }

    public function save($id,$name,$address,$tel,$mobile,$title_id,$salary,$notes)
  	{
        $message ='';
  	    $this->con_state = $this->Check_Connection();
  		  if ($this->con_state) {
  			$db = new Database();
  		    if($id == NULL){ // Insert
              $fields = "(EmpName,Address,Telephone,mobile,Titleid,Daliy_price,Notes)";
  		      $values = "( '".$name."' , '".$address."' , '".$tel."' , '".$mobile."' , '".$title_id."' , '".$salary."' , '".$notes."' )";
              $db->insert($this->table_name , $fields , $values );
              $message = 'Item added Successful';
  		    } 
  		   	    
  		}
      return $message;  		
  	}

    public function save_title($id,$title_name,$notes)
  	{
        $message ='';
  	    $this->con_state = $this->Check_Connection();
  		  if ($this->con_state) {
  			$db = new Database();
  		    if($id == NULL){ // Insert
              $fields = "(TitleName,Notes)";
  		    	  $values = "( '".$title_name."' , '".$notes."' )";
              $db->insert($this->table_name_titles , $fields , $values );
              $message = 'Title added Successful';
  		    } 
  		   	    
  		}
      return $message;  		
  	}  

    


    public function update_emp($fileds,$values,$counter,$select,$id)
    {
        $message ='';
        $this->con_state = $this->Check_Connection();
        if ($this->con_state) 
        {
          $_db = new Database();
          $_db->update($this->table_name,$fileds,$values,$counter,$select,$id);
        } 
         
        return $message;      
    }

    public function updateTitle($fileds,$values,$counter,$select,$id)
    {
        $message ='';
        $this->con_state = $this->Check_Connection();
        if ($this->con_state) 
        {
          $_db = new Database();
          $_db->update($this->table_name_titles,$fileds,$values,$counter,$select,$id);
        } 
         
        return $message;      
    }

    public function update_userPA($fileds,$values,$counter,$select,$id)
    {
        $message ='';
        $this->con_state = $this->Check_Connection();
        if ($this->con_state) 
        {
          $_db = new Database();
          $_db->update($this->table_namePA,$fileds,$values,$counter,$select,$id);
        } 
         
        return $message;      
    }

    

  	public function delete($id){
  	      $this->con_state = $this->Check_Connection();
  		 if ($this->con_state) {
  		 	$db = new Database();
        $where_select = 'Empid';
        $where_value = $id;
  		 	$db-> delete($this->table_name ,$where_select ,$where_value);
  		 }
  		 else{echo 'Connectio Lost';}  		
  	}

    public function deleteTitle($id){
  	      $this->con_state = $this->Check_Connection();
  		 if ($this->con_state) {
  		 	$db = new Database();
        //$where = ' WHERE admin_id ="'.$id.'"';
        $where_select = 'Titleid';
        $where_value = $id;
  		 	$db-> delete($this->table_name_titles ,$where_select ,$where_value);
  		 }
  		 else{echo 'Connectio Lost';}  		
  	}

  	public function is_user($username)
  	{
      $username;
  		$this->con_state = $this->Check_Connection();
  		if ($this->con_state) {
  			$db = new Database();
  		  $_is = $db->is_admin($this->table_name,$username);
  		  if($_is == 1){
  		    	return true;

  		  }
  		  else{
  		    	return false;
  		  }  		    
  		}
  		else{
  			echo 'Connection Lost';
  		}
  		return $_is;
  	}

    public function is_username($username)
    {
      $this->con_state = $this->Check_Connection();
      if ($this->con_state) {
        $db = new Database();
        $_is = $db->is_admin($this->table_name,$username);
        echo  $_is;     
      }
      else{
        echo 'Connection Lost';
      }
      return $_is;
    }

    public function isUser($username)
    {
      $this->con_state = $this->Check_Connection();
      if ($this->con_state) {
        $db = new Database();
        $_is = $db->is_user($this->table_name,$username);
        echo  $_is;     
      }
      else{
        echo 'Connection Lost';
      }
      return $_is;
    }

    public function is_parent($username)
    {
      $this->con_state = $this->Check_Connection();
      if ($this->con_state) {
        $db = new Database();
        $_is = $db->is_admin($this->table_namePA,$username);
        echo  $_is;     
      }
      else{
        echo 'Connection Lost';
      }
      return $_is;
    }

    public function is_teacher($username)
    {
      $this->con_state = $this->Check_Connection();
      if ($this->con_state) {
        $db = new Database();
        $_is = $db->is_user($this->table_nameTE,$username);
        echo  $_is;     
      }
      else{
        echo 'Connection Lost';
      }
      return $_is;
    }


    public function is_exist($search_by , $value)
    {
      $this->con_state = $this->Check_Connection();
      if ($this->con_state) {
        $db = new Database();
        $_is = $db->is_exist($this->table_name, $search_by , $value);
        if($_is == 1){
            //echo 'welccome ';
        }
        else{
            //echo 'tru again ';
        }         
      }
      else{
        echo 'Connection Lost';
      }
      return $_is;
    }


  } 
?>