<?php
include 'config.php';

$leave_id=$_POST['leave_id'];
$action =  $_POST['action'];

if ($action == 'approve'){

$leave_info_query = "SELECT * FROM leave_requests WHERE leave_id='".$leave_id."'";
$data_info = mysqli_query($db, $leave_info_query);
$result_info = mysqli_fetch_assoc($data_info);
$staff_leave = $result_info['leave_type'];
$d_req = $result_info['days_requested'];
$user_id = $result_info['staff_id'];


$query = "SELECT * FROM leave_types WHERE leave_type='".$staff_leave."'";
$data = mysqli_query($db, $query);
$total = mysqli_num_rows($data);
if($total!=1){
  header('location: apply.php?reason=invalid_leave_type');
}
$result = mysqli_fetch_assoc($data);
$no_of_days = $result['no_of_days'];

$leave_request_query ="SELECT * FROM leave_requests WHERE leave_type='".$staff_leave."' AND staff_id='$user_id' AND leave_status='Accepted'";
$leave_request_data = mysqli_query($db, $leave_request_query);
$num_rows = mysqli_num_rows($leave_request_data);

  if($num_rows != 0){
    $days_taken = 0;
    while ($leave_request_result = mysqli_fetch_assoc($leave_request_data))
    {
      $days_taken += $leave_request_result['days_requested'];
    }
  }
  else{
    $days_taken = 0;
  }
$remaining = $no_of_days-$days_taken - $d_req;
if($remaining < 0){
  $decision = 'rejected_num_days';
  $query="UPDATE leave_requests SET leave_status='Rejected' WHERE leave_id='$leave_id'";
}
else{
    $decision = 'accepted';
    $query="UPDATE leave_requests SET leave_status='Accepted' WHERE leave_id='$leave_id'";
}
}
elseif($action == 'reject'){
    $decision = 'rejected';
    $query="UPDATE leave_requests SET leave_status='Rejected' WHERE leave_id='$leave_id'";
    }
else
{
    header('location: admin1.php?reason=invalid');
}
 
if(mysqli_query($db,$query))
{
    header('location: admin1.php?reason='.$decision.''); 
}
else {
    header('location: admin1.php?reason=notdone');    
}
?>