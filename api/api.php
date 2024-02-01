<?php 
// loan request review 
include('con.php');
include('verf.php');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // handle GET request
        break;
    case 'POST':
        // handle POST request
		if(isset($_POST["request_accept_btn"])){
			$loan_id = $_POST["loan_id"];
			$loan_name = $_POST["applicant"];
			$company = $_POST["company_name"];
			$loan_amount = $_POST["amount"];
			$finance_comment = $_POST["comment"];
			
			$update = "update loans set loan_finance_comment = '$finance_comment',loan_status = '3' where loan_id = '$loan_id'";
			if($query = mysqli_query($con,$update)){
				header("location: ../requests.php?success=1");
			}
			else{
				header("location: ../requests.php?success=0");
			}
		}
		elseif(isset($_POST["request_reject_btn"])){
			$loan_id = $_POST["loan_id"];
			$finance_comment = $_POST["comment"];
			$update = "update loans set loan_finance_comment = '$finance_comment',loan_status = '0'  where loan_id = '$loan_id'";
			if($query = mysqli_query($con,$update)){
				header("location: ../requests.php?decline=1");
			}
			else{
				header("location: ../requests.php?decline=0");
			}
			
		}
		elseif (isset($_POST["par_request_loan"])){
			$loan_amount = $_POST["load_request_amount"];
			$load_query = "insert into loans (user_id,loan_amount,loan_status,loan_request_date) values ('$user','$loan_amount','2','".date('Y-m-d')."');";
			if($cmd = mysqli_query($con,$load_query)){
				header("location: ../loan.php?return=1");		
					}
			else{
				header("location: ../loan.php?return=0");
					}
		}
		
		
		elseif(isset($_POST["add_user"])){
			$user_name = $_POST["user_name"];
			$user_id = $_POST["user_id"];
			$user_company = $_POST["user_company"];
			$user_share = $_POST["user_share"];
			$user_br = $_POST["user_br"];
			
			$check_username = "select * from users where user_id = '$user_id' ";
			$check_result = mysqli_query($con,$check_username);
			if(mysqli_num_rows($check_result) < 1){
				$insert_query = "insert into users (user_id , user_name , user_company , user_share , user_br ,user_type) values ('$user_id' , '$user_name' , '$user_company' , '$user_share' , '$user_br' , '1');";
			
			
			if(mysqli_query($con,$insert_query)){
				
				header("location: ../users.php?user_success=1");
			}
			
			}
			else{
				
				header("location: ../add_user.php?error=0");
				
			}
			
			
		}
		elseif(isset($_POST["login"])){
			$uname = $_POST["username"];
			$pass = $_POST["password"];
			$result = mysqli_query($con,"select * from users where user_id = '$uname' and user_password = '$pass' ");
			if(mysqli_num_rows($result)> 0 ){
				$user_data = mysqli_fetch_assoc($result);
				$type = $user_data["user_type"];
				setcookie("username","$uname",time() + 31536000000);
				setcookie("stat","logged" , time() + 31536000000);
				setcookie("type","$type" , time() + 31536000000);	
				header("location: ../index.php");	
			}

			else{
				
				header("location: ../login.php?error=1");
				}
		  
											}

		
		else{
			
			echo"2";
		}
		
		
        break;
    case 'PUT':
        // handle PUT request
        break;
    case 'DELETE':
        // handle DELETE request
        break;
}



?>