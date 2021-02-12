<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "dating");
if($mysqli->connect_error) {
  exit('Could not connect');
}


$sql = "SELECT * FROM conversations where code='".$_SESSION['codeid']."'";
											$run = mysqli_query($mysqli, $sql);
											//$no = 0; 
											while($row = mysqli_fetch_array($run)){
												$fc_id=$row['id'];
												$fc_sendr=$row['sender'];
                                                $fc_recei=$row['receiver'];
                                                $fc_messa=$row['message'];
                                                $fc_textdate=$row['text_date'];
                                                $fc_stat=$row['status'];
                                                $fc_code=$row['code'];

                                                if(isset($_SESSION['mem_id'])){
                                                    if($_SESSION['mem_id'] == $fc_sendr){
                                                        $flloat = "float: right; margin-right: 8px;";
                                                    }else{
                                                        $flloat = "float: left;";
                                                    }
                                                }

												echo "
                                                <li class='groups joined_group activity-item mini has-comments date-recorded-1429823266' id='activity-3916' style='width: 75%; $flloat '>                                                    
                                                    <div class='activity-content'>                                                
                                                        <div class='activity-header'>                                                
                                                            <p>
                                                            $fc_messa 
                                                            </p>        
                                                                                                    
                                                        </div>
                                                    </div> 
                                                   <span style='$flloat margin-left: 50px; margin-top: -15px; font-style: italic;'> ". date("jS M Y h:ia",strtotime("".$fc_textdate.""))."</span>
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