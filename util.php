$leave_request_query ="SELECT * FROM leave_requests WHERE leave_type='".$result['leave_type']."' AND staff_id='$user_id' AND leave_status='Accepted'"; 
      $leave_request_data = mysqli_query($db, $leave_request_query);
      $num_rows = mysqli_num_rows($leave_request_data);
      $leave_type = $result['leave_type'];
      $no_of_days = $result['no_of_days'];
      if($num_rows != 0){
        $days_requested = 0;
        while ($leave_request_result = mysqli_fetch_assoc($leave_request_data))
        {
          $days_requested += $leave_request_result['days_requested'];
        }
      }
      else{
        $days_requested = 0;
      }
      
      $remaining = $no_of_days-$days_requested;