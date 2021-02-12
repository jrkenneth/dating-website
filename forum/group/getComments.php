<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "dating");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT * FROM forum_thread where groupid='".$_SESSION['ggggreoupid']."'";
											$run = mysqli_query($mysqli, $sql);
											//$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$fc_id=$row['id'];
												$fc_userid=$row['userid'];
                                                $fc_text=$row['text'];
                                                
                                                $sqlfcm = "SELECT * FROM members where id='$fc_userid'";
                                                $runfcm = mysqli_query($mysqli, $sqlfcm);
                                                while($row = mysqli_fetch_array($runfcm)){
                                                    $fc_mem_id=$row['id'];
                                                    $f_name=$row['f_name'];
                                                    $m_name=$row['m_name'];
                                                    $l_name=$row['l_name'];
                                                    $eml=$row['email'];
                                                    $usn=$row['username'];
                                                    $psw=$row['password'];
                                                    $dj=$row['date_joined'];
                                                    $bio=$row['bio'];
                                                    $gender=$row['gender'];
                                                    $l_for=$row['looking_for'];
                                                    $bday=$row['b_day'];
                                                    $m_stat=$row['m_status'];
                                                    $city=$row['city'];
                                                    $country=$row['country'];
                                                    $nat=$row['nationality'];
                                                    $religion=$row['religion'];
                                                    $l_seen=$row['last-seen'];
                                                    $pic=$row['picture'];
                                                    $user_stat=$row['status'];
                                                }

                                                if(isset($_SESSION['mem_id'])){
                                                    if($_SESSION['mem_id'] == $fc_userid){
                                                        $flloat = "float: right;";
                                                    }else{
                                                        $flloat = "float: left; margin-left: 30px;";
                                                    }
                                                }else{
                                                    $flloat = "float: left; margin-left: 30px;";
                                                }
												echo "
                                                <li class='groups joined_group activity-item mini has-comments date-recorded-1429823266' id='activity-3916' style='width: 75%; $flloat '>
                                                    <div class='activity-avatar' style='float: left;'>
                                                        <a href=''>                                                
                                                            <img src='../../members/photos/$pic' class='avatar user-23434-avatar avatar-120 photo' style='height: 100%; width: 100%;' alt='$f_name $m_name $l_name' />
                                                        </a>
                                                    </div>
                                                    
                                                    <div class='activity-content'>                                                
                                                        <div class='activity-header'>                                                
                                                            <p><b><a href='../../members/profile/index.php?uid=$fc_mem_id'>$f_name</a></b> <br>
                                                            
                                                            $fc_text </p>                                                
                                                        </div>
                                                    </div> 
                                                </li>
												";
											}

?>

 <!--                                              
<div class='activity-comments'>                                                
                                                        <ul>
                                                            <li id='acomment-4076'>
                                                                <div class='acomment-avatar'>
                                                                    <a href=''>
                                                                        <img src='../../wp-content/uploads/avatars/16782/187b30d1b4df9c8dfa0b1df143b6bd8e-bpthumb.jpg' class='avatar user-28128-avatar avatar-120 photo' width='120' height='120' alt='Profile' />
                                                                    </a>
                                                                </div>
                                                                <div class='acomment-meta'>
                                                                    <a href=''>Victor</a> replied <a href='#' class='activity-time-since'><span class='time-since'>[time_stamp]</span></a>
                                                                </div>
                                                                <div class='acomment-content'>
                                                                    <p>hi</p>
                                                                </div>
                                                            
                                                            </li>
                                                            
                                                            <li id='acomment-4076'>
                                                                <div class='acomment-content'>
                                                                    <input type='text' placeholder='Reply...'>
                                                                    <input type='submit' style='visibility: hidden;'>
                                                                </div>
                                                            
                                                            </li>
                                                        </ul>                                                        
                                                    </div>	

                                                    -->