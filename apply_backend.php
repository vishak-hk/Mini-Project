<?php
include 'config.php';
$user_id = $_SESSION['user_id'];
$staff_leave = $_REQUEST['staff_leave'];
$s_date = $_REQUEST['s_date'];
$e_date = $_REQUEST['e_date'];
//$d_req = $_REQUEST['d_req'];
//$d_app = $_REQUEST['d_app'];
$d_app = date("Y-m-d");
$date1 = new DateTime($s_date);
$date2 = new DateTime($e_date);
$interval = $date1->diff($date2);
$d_req = $interval->days+1;

$query = "SELECT * FROM leave_types WHERE leave_type='".$staff_leave."'";
$data = mysqli_query($db, $query);
$total = mysqli_num_rows($data);

if($total!=1){
  header('location: apply.php?reason=invalid_leave_type');
}
$result = mysqli_fetch_assoc($data);

$leave_request_query ="SELECT * FROM leave_requests WHERE leave_type='".$staff_leave."' AND staff_id='$user_id' AND leave_status='Accepted'";
$leave_request_data = mysqli_query($db, $leave_request_query);
$num_rows = mysqli_num_rows($leave_request_data);
$no_of_days = $result['no_of_days'];
  if($num_rows != 0){
    $days_taken  = 0;
    while ($leave_request_result = mysqli_fetch_assoc($leave_request_data))
    {
      $days_taken  += $leave_request_result['days_requested'];
    }
  }
  else{
    $days_taken  = 0;
  }
$remaining = $no_of_days - $days_taken - $d_req;

if($remaining >= 0 and $d_app <= $s_date and $s_date <= $e_date and $staff_leave != 'Invalid' ){
  
  $sql = "INSERT INTO leave_requests(staff_id, leave_type, start_date, end_date, days_requested, date_applied, leave_status) 
       values('$user_id','$staff_leave','$s_date','$e_date','$d_req','$d_app','Pending')";
  if(mysqli_query($db, $sql)){  
    header('location: apply.php?reason=added'); 
  }
  else{
    header('location: apply.php?reason=not');
    mysqli_error($db);
  }  
}
else{
  if ($staff_leave == 'Invalid'){
    header('location: apply.php?reason=invalid'); 
  }
  else if ($d_app > $s_date ) {
    header('location: apply.php?reason=invalid_start_date');
  }
  else if ($s_date > $e_date ) {
    header('location: apply.php?reason=invalid_start_and_end_date');
  }
  else if ($remaining < 0){
    header('location: apply.php?reason=invalid_number_of_days');
  }
}

/*
Things to verify:
    1. select * from leave_req where user_id=($user_id) and start_date=($s_date) and end_date=($end_date);
        he/she should not apply leave on the same date or in b/w the days that he/she already applied 
    2. Check for max leaves (done)
    3. s_date should be lesser than e_end (done)
*/

?>