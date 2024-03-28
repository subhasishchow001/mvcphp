<?php

class Model {

	protected $connection = '';
	protected $servername = 'localhost';
	protected $username = 'root';
	protected $password = '';
	protected $db = 'laravel';

	function __construct(){
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		try{
			$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->db);
		} catch (Exception $ex) {
			echo "Connection Failed: " . $ex->getMessage();
			exit;
		}
	}
	/**********To Add admin which will add normal admin not superadmin*********/
	function Insertdata($tbl,$data)
	{
		$clms= implode(',', array_keys($data));
		$vals= implode("','",$data);
		$sql= "INSERT INTO $tbl($clms) values ('$vals')";

		$insertExe= $this->connection->query($sql);
		if ($insertExe) {
			$response['Data']= null;
			$response['code']= true;
			$response['msg']= 'data inserted';
		}else{
			$response['Data']= null;
			$response['code']= false;
			$response['msg']= 'data insert faild';
		}
		return $response;
	}
	/****************************For Login*******************************/
	function mainlogin($logid,$passcode)
	{
		$loginsql= "SELECT *  FROM `adminuser` WHERE `loginid`= '$logid' and `password`= sha1('$passcode')";
		$loginex= $this->connection->query($loginsql);
		$logdata= $loginex->fetch_object();
		if($loginex->num_rows > 0){
			$response['Data']= $logdata;
			$response['code']= true;
			$response['msg']= 'Login Success';

		}else{
			$response['Data']= null;
			$response['code']= false;
			$response['msg']= 'email or password incorrect';
		}
		return $response;
	}
	/******************To fetch the admin List from the database******************************/
	function AdminList(string $tblname,array $where=[]){
		$selectAdmin = "SELECT *  FROM $tblname";
		if (!empty($where)) {
			$selectAdmin .= " WHERE ";
		 	foreach ($where as $key => $value) {
		 		// $selectAdmin .= " $key = '$value' AND ";
		 		$selectAdmin .= " $key = '$value'";
		 	}
		 } 
		 $exadmin= $this->connection->query($selectAdmin);
		 if ($exadmin->num_rows >0) {
		 	while ($data = $exadmin->fetch_object()) {
		 		$adminusers[]= $data; 
		 	}
		 		$response['Data']= $adminusers;
				$response['code']= true;
				$response['msg']= 'Data fetched';
		 }else{
			$response['Data']= null;
			$response['code']= false;
			$response['msg']= 'there is not any admin users';
		}
		return $response;
	}

	/***********************For Student data********************************/
	function InsertStudentData($tbl,$data){
		$clms= implode(',',array_keys($data));
		$vals= implode("','",$data);
		$stuins= "INSERT INTO $tbl($clms) values ('$vals')";
		$insertExe = $this->connection->query($stuins);
		if ($insertExe) {
			$response['Data']= $insertExe;
			$response['code']= true;
			$response['msg']= 'data inserted';
		}else{
			$response['Data']= null;
			$response['code']= false;
			$response['msg']= 'data insert faild';
		}
		return $response;
	}

	/*********************************Fetch student List From Database****************/
	function getStudentData( $tblname){
		$students1="SELECT * FROM $tblname";

		$exstudent= $this->connection->query($students1);



		if ($exstudent->num_rows >0) {
		 	while ($data = $exstudent->fetch_object()) {
		 		$student[]= $data; 
		 	}
		 		$response['Data']= $student;
				$response['code']= true;
				$response['msg']= 'Data fetched';
		 }else{
			$response['Data']= null;
			$response['code']= false;
			$response['msg']= 'there is not any admin users';
		}
		return $response;
	}

/*****************get single value as ajax************************************/
	 function getStudentajax( $tblname){
        $students="SELECT `id` ,`name` FROM $tblname " ;
        $exstudent= $this->connection->query($students);
    // $row= mysqli_fetch_array($exstudent,MYSQLI_ASSOC);
    // print_r($row);
    // exit;

        if ($exstudent->num_rows >0) {
            while ($data = mysqli_fetch_array($exstudent,MYSQLI_ASSOC)) {
                $student[]= $data; 
                // echo "<pre>";
                // print_r($student);
            }
                $response['Data']= $student;
                $response['code']= true;
                $response['msg']= 'Data fetched';
         }else{
            $response['Data']= null;
            $response['code']= false;
            $response['msg']= 'there is not any admin users';
        }
        return $response;
    }

    function insertPayment($tblname,$data)
    {
    	$clms= implode(',',array_keys($data));
		$vals= implode("','",$data);
		$payinsert= "INSERT INTO $tblname($clms) values ('$vals')";
		// echo $payinsert;
		// exit;
		$insertExe = $this->connection->query($payinsert);
		if ($insertExe) {
			$response['Data']= $insertExe;
			$response['code']= true;
			$response['msg']= 'data inserted';
		}else{
			$response['Data']= null;
			$response['code']= false;
			$response['msg']= 'data insert faild';
		}
		return $response;
	}
	function Viewpayment($tbl){
		$payment="SELECT * FROM $tbl ";
		 $payments= $this->connection->query($payment);
			 if ($payments->num_rows >0) {
	            while ($data = mysqli_fetch_array($payments,MYSQLI_ASSOC)) {
	                $paymenter[]= $data; 
	            }
	                $response['Data']= $paymenter;
	                $response['code']= true;
	                $response['msg']= 'Data fetched';
	         }else{
	            $response['Data']= null;
	            $response['code']= false;
	            $response['msg']= 'there is not any admin users';
	        }
        return $response;
	}
	function Todaypayment($tbl,$date){
		$payt="SELECT SUM(`rupees`) FROM $tbl WHERE `paymentdate` = '$date'";
		$payments= $this->connection->query($payt);
		while ($data=mysqli_fetch_array($payments)) {
			$payrupees=$data[0];
		}
		return $payrupees ;
	}
	public function Totalpayment($tbl)
	{
		$totalpay="SELECT SUM(`rupees`) FROM $tbl";
		$totalpay=$this->connection->query($totalpay);
		while ($tpay=mysqli_fetch_array($totalpay)) {
			$ttpay=$tpay[0];
		}
		return $ttpay;
	}
	public function PaymentCount($tbl,$date)
	{
		$payt="SELECT COUNT(`rupees`) FROM $tbl WHERE `paymentdate` = '$date'";
		$payments= $this->connection->query($payt);
		while ($data=mysqli_fetch_array($payments)) {
			$paycount=$data[0];
		}
		return $paycount;
	}
    
    public function StudentPayment($tbl,$where)
    {
    	$sqlquery= "SELECT * FROM $tbl WHERE `userid`= $where";
    	$result= $this->connection->query($sqlquery);
		 if ($result->num_rows >0) {
				while ($data = $result->fetch_object()) {
				 		$semdata[]= $data; 
				 	}
				 		$response['Data']= $semdata;
						$response['code']= true;
						$response['msg']= 'Data fetched';
				 }else{
					$response['Data']= null;
					$response['code']= false;
					$response['msg']= 'there is not any admin users';
				}
				return $response;
    }
 public function Billpayment($tbl,$where)
    {
    	$sqlquery= "SELECT * FROM $tbl WHERE `id`= $where";
    	$result= $this->connection->query($sqlquery);
		 if ($result->num_rows >0) {
				while ($data = $result->fetch_object()) {
				 		$billdata[]= $data; 
				 	}
				 		$response['Data']= $billdata;
						$response['code']= true;
						$response['msg']= 'Data fetched';
				 }else{
					$response['Data']= null;
					$response['code']= false;
					$response['msg']= 'there is not any admin users';
				}
				return $response;
    }
     public function studentnameaddr($tbl,$toc)
    {
    	$sqlquery1= "SELECT name, address,phone FROM `student` WHERE id=$toc";
    	$result1= $this->connection->query($sqlquery1);
		 if ($result1->num_rows >0) {
				while ($data1 = $result1->fetch_object()) {
				 		$billdata1[]= $data1; 
				 	}
				 		$newresponse['Data']= $billdata1;
						$newresponse['code']= true;
						$newresponse['msg']= 'Data fetched';
				 }else{
					$newresponse['Data']= null;
					$newresponse['code']= false;
					$newresponse['msg']= 'there is not any admin users';
				}
				return $newresponse;
    }


/******************New Added*********************/
    function getSem($tbl){
    	$query="SELECT userid as user,max(substring(semester,1,1)) as semname from $tbl group by userid";
    	$res= $this->connection->query($query);
    	if ($res->num_rows >0) {
				while ($data = $res->fetch_object()) {
				 		$semester[]= $data; 
				 	}
				 		$response['Data']= $semester;
						$response['code']= true;
						$response['msg']= 'Data fetched';
				}else{
					$response['Data']= null;
					$response['code']= false;
					$response['msg']= 'there is not any admin users';
		}
				return $response;
    
    }
    /**********New End********/
    function billdetails($tbl,$bid){
    	$query= "SELECT * from $tbl WHERE id= $bid";
    	$res= $this->connection->query($query);
    	if ($res->num_rows >0) {
				while ($data = $res->fetch_object()) {
				 		$billsin[]= $data; 
				 	}
				 		$response['Data']= $billsin;
						$response['code']= true;
						$response['msg']= 'Data fetched';
				}else{
					$response['Data']= null;
					$response['code']= false;
					$response['msg']= 'there is not any admin users';
		}
				return $response;

    }

/*new added*/
   function editpayment($tbl,$id,$values){

    	$query= "UPDATE $tbl SET semester='$values[0]',rupees=$values[1],paymenttype='$values[2]',paymentcount='$values[3]' WHERE id= $id";
    	$updateexe = $this->connection->query($query);
    	if ($updateexe) {
			$response['Data']= $updateexe;
			$response['code']= true;
			$response['msg']= 'data inserted';
		}else{
			$response['Data']= null;
			$response['code']= false;
			$response['msg']= 'data insert faild';
		}
		return $response;

   }
   function editstudentdataget($tbl,$id){
   	$query= " SELECT * FROM $tbl WHERE id=$id";
   	$editget = $this->connection->query($query);
    	if ($editget->num_rows >0) {
		 	while ($data = $editget->fetch_object()) {
		 		$newedit[]=$data; 	
		 	}
		 	$response['Data']= $newedit;
			$response['code']= true;
			$response['msg']= 'Data fetched';
		 }else{
			$response['Data']= null;
			$response['code']= false;
			$response['msg']= 'there is error in fetching';
		}
		return $response;

   }
   function editstudentdataup($tbl,$id,$values){
   	$updatequery= "UPDATE $tbl SET name= '$values[0]' , fathername= '$values[1]', emailid='$values[2]',phone=$values[3],address='$values[4]',subject='$values[5]',dob='$values[8]',class='$values[6]',year=$values[7] WHERE id= $id";

    	$updatestudents = $this->connection->query($updatequery);
    	if ($updatestudents) {
			$response['Data']= $updatestudents;
			$response['code']= true;
			$response['msg']= 'data updated';
		}else{
			$response['Data']= null;
			$response['code']= false;
			$response['msg']= 'data update faild';
		}
		return $response;

   }
/*new added ends*/
}

?>