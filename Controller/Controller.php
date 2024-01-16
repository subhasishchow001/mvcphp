<?php

date_default_timezone_set('Asia/Kolkata');
require_once('Model/Model.php');
session_start();

class Controller extends Model {
	
	function __construct() {
		parent::__construct();

		if(isset($_SERVER['PATH_INFO'])) {
			switch ($_SERVER['PATH_INFO']) {
				case '/':
					if(isset($_POST['login'])){
						$logid= mysqli_real_escape_string($this->connection,$_POST['loginid']);
						$passcode= mysqli_real_escape_string($this->connection,$_POST['pass']);
						$loginex= $this->mainlogin($logid,$passcode);

						if ($loginex['code']) {
							$_SESSION['user_data']= $loginex['Data'];
							?>
							<script type="text/javascript">
								window.location.href='/home';
							</script>
							<?php
						}else{
							echo $loginex['msg'];
							?>
							<script type="text/javascript">
								window.location.href='/';
							</script>

							<?php
						}
						exit;
					}
						include 'Views/auth/login.php';
					break;
				// case '/register':
				// 	include 'Views/auth/register.php';
				// 		if (isset($_POST['register'])) {
				// 			$Insert_data= [
				// 				'loginid'=>$_POST['loginid'],
				// 				'password'=> sha1($_POST['Password']),
				// 			];

				// 			$insertex=$this->Insertdata('adminuser',$Insert_data);
				// 				if ($insertex['code']) {
				// 					?>
				// 					<script type="text/javascript">
				// 						window.location.href='/';
				// 					</script>
				// 					<?php
				// 				}
				// 			exit;
				// 		}
				// 	break;
				case '/home':
						if ($_SESSION['user_data']->role_id == 0 || $_SESSION['user_data']->role_id == 1 ) {
							//Total Students
							$studentda= $this->getStudentData('student');
							$date=date("y-m-d");
							//Total Payment Today
							$paymentdata= $this->Viewpayment('payment');
							$pay=$paymentdata['Data'];
							//Today's Payment
							$pp= $this->Todaypayment('payment',$date);
							$tpay=$this->Totalpayment('payment');
							//Todays Payment Count
							$countp=$this->PaymentCount('payment',$date);
							


							include 'Views/index.php';
						}
						else{
							header('Location: /');
						}	
					break;
				case '/logout':
						unset($_SESSION['user_data']);
						session_destroy();
						header('Location: /');
					break;
				case '/addadmin':
					if ($_SESSION['user_data']->role_id == 1){
						include 'Views/adminpages/addadmin.php';
							if (isset($_POST['addadmin'])) {
								$passkey=$_POST['pass'];
								$verifypasskey=$_POST['varpass'];
								if ($passkey==$verifypasskey) {
									$Insert_data=[
										'fname'=>$_POST['fname'],
										'lname'=>$_POST['lname'],
										'loginid'=>$_POST['loginid'],
										'password'=> sha1($passkey)
									];
								}
								else{
									?>
									<script type="text/javascript">
										alert('password do not match');
									</script>
									<?php
								}
								$insertex= $this->Insertdata('adminuser',$Insert_data);
						}
					}
					else{
						include 'Views/404.php';
					}
					break;
				case '/viewadmin':
					if ($_SESSION['user_data']->role_id == 1){
						$where = ['role_id'=>0];
						$adminData= $this->AdminList('adminuser',$where);
						$admindatas= $adminData['Data'];
						include 'Views/adminpages/viewadmin.php';
					}
					else{
						include 'Views/404.php';
					}
					break;

				case '/payment':
						if ($_SESSION['user_data']->role_id == 0 || $_SESSION['user_data']->role_id == 1 ) {
						$studentda= $this->getStudentData('student');
						$studentdatas= $studentda['Data'];
							include 'Views/payment.php';


							//Payment Date
							$paydate= date("Y-m-d",strtotime($_POST['paymentdate']));
							echo $paydate;
							if (isset($_POST['generate'])) {
								if (empty($_POST['userid']) || empty($paydate) || empty($_POST['selectsem']) || empty($_POST['rupees']) || empty($_POST['paymenttype']) || empty($_POST['paymentcount']) || empty($_POST['recivedby']) ) {
									echo "<script>alert('field empty') </script>";
								}else{
									$insertpayment=[
										'userid'=> $_POST['userid'],
										'paymentdate'=> $paydate,
										'semester'=> $_POST['selectsem'],
										'rupees'=> $_POST['rupees'],
										'paymenttype' => $_POST['paymenttype'],
										'paymentcount' => $_POST['paymentcount'],
										'recivedby' => $_POST['recivedby']
									];
								}
						
							}
							if (!empty($insertpayment)) {
								$insertpaymentdata= $this->insertPayment('payment',$insertpayment);
							}else{
								echo "field empty";
							}
						}
						else{
							header('Location: /');
						}	
					break;
				
				case '/profile':
					if ($_SESSION['user_data']->role_id == 0 ) {
						include 'Views/profile.php';
					}
					else if ($_SESSION['user_data']->role_id == 1 ){
						include 'Views/404.php';
					}	
					else{
						header('Location: /');
					}
					break;
				case '/addstudent':
					if ($_SESSION['user_data']->role_id == 0 || $_SESSION['user_data']->role_id == 1 ) {
						include 'Views/addstudent.php';
						//For file upload
							$filename= $_FILES['fileupload']['name'];
							$filesize= $_FILES['fileupload']['size'];
							$tmpname= $_FILES['fileupload']['tmp_name'];
							$filetype= $_FILES['fileupload']['type'];
							$ups=move_uploaded_file($tmpname, 'uploads/'.str_replace(' ', '', $_POST['fname']).$filename);

							// For date
							$inpdate=$_POST['date'];
							$date=date("Y-m-d",strtotime($inpdate));

							$admidate= date("Y-m-d",strtotime($_POST['admissiondate']));
						

							if (isset($_POST['addstudent'])) {
								if (empty($_POST['fname'])|| empty($_POST['fathername']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['subject']) || empty($date) ||empty($filename) || empty($_POST['yid']) || empty($_POST['yearselect']) || empty($admidate) ) {
									echo "You Must specify value";
								}else{
									 $insertstudent=[
									'name'=>$_POST['fname'],
									'fathername' => $_POST['fathername'],
									'emailid' => $_POST['email'],
									'phone' => $_POST['phone'],
									'address' => $_POST['address'],
									'subject' => $_POST['subject'],
									'dob' => $date,
									'pic'=> $filename,
									'class' => $_POST['yid'],
									'year' => $_POST['yearselect'],
									'admissiondate'=> $admidate,
									'addedby' => $_POST['addedby']
								];

								}
							}
							if (!empty($insertstudent)) {
								$insertstudentdata= $this->InsertStudentData('student',$insertstudent);
							}else{
								echo "field empty"; die();
							}
							exit();
					}
					else{
						header('Location: /');
					}	
					break;
				case '/students':
					if ($_SESSION['user_data']->role_id == 1 || $_SESSION['user_data']->role_id == 0 ) {

						$studentda= $this->getStudentData('student');
						$studentdatas= $studentda['Data'];
							include 'Views/showstudents.php';
						}
						else{
							header('Location: /');
						}
					break;
				case '/studentdata':
						if ($_SESSION['user_data']->role_id == 1 || $_SESSION['user_data']->role_id == 0 ) {
						
							$where1=['id'=>$_GET['user']];
							$paymentsem= $this->StudentPayment('payment',$where1['id']);
							$semds=$paymentsem['Data'];
							include 'Views/viewstudents.php';

						}else{
							header('Location: /');
						}
					break;
					case '/bill':
					if ($_SESSION['user_data']->role_id == 1 || $_SESSION['user_data']->role_id == 0 ) {
							$where=['id'=>$_GET['bill']];
							$paymentsem= $this->Billpayment('payment',$where['id']);
							$billd=$paymentsem['Data'];
							foreach ($billd as $bill) {
								$new=$bill->userid;
								$stuname= $this->studentnameaddr('payment',$new);
								$stu=$stuname['Data'];

							}
							
							include 'Views/bills.php';
						}else{
							header('Location: /');
						}
						
						break;
					/*********Apis********/
					case '/sdataap':
						$studentda= $this->getStudentData('student');
						print_r(array_values($studentda));
					break;
				
				default:
					
					break;
			}
		}
	}
}

$obj = new Controller;


?>