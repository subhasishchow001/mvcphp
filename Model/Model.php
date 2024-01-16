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
		$students="SELECT * FROM $tblname ";
		$exstudent= $this->connection->query($students);
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
        $students="SELECT `id` ,`name` FROM $tblname ";
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
    

}

?>