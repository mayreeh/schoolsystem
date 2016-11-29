<div id="pageslide-right" class="pageslide slide-fixed inner">
				<div class="right-wrapper">
					<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
						<li class="active">
							<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a>
						</li>
						<li>
							<a href="#notifications" role="tab" data-toggle="tab"><i class="fa fa-bookmark "></i></a>
						</li>
						<li>
							<a href="#settings" role="tab" data-toggle="tab"><i class="fa fa-gear"></i></a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="users">
							<div class="users-list">
								<h5 class="sidebar-title">On-line</h5>
								<ul class="media-list">
								<?php 
								 $staffsUnreads = $this->load->main_model->getUnreadMessages();
								 if (empty($staffsUnreads)) 
								 {  
									    //get all staffs
								foreach ($this->load->main_model->getActiveStaffsMinusLoggedOne() as $staffs) {
							 ?>
									<li class="media">
										<a href="#" onclick="openMe(<?php echo $staffs['staff_id']?>)" >
											<i class="fa fa-circle status-online"></i>
											  <img class="media-object" src="<?php echo base_url();?>/assets/images/anonymous.jpg" style="height: 32px; width: 32px;">
													   
											<div class="media-body" >
											<input type = "hidden" name = "userstaff" id = "userstaff" value = "<?php echo $staffs['staff_id']?>">
												<h4 class="media-heading"><?php echo $staffs['othername'] ?></h4>
												<span > <?php echo $staffs['role']; ?></span>
											</div>
										</a>
									</li>
									<?php } } ?>
									<?php if (!empty($staffsUnreads)) {
									    foreach ($staffsUnreads as $staffUnread){
									    			    //get all staffs
								foreach ($this->load->main_model->getActiveStaffsMinusLoggedOne() as $staffs) {
							 ?>
									<li class="media">
										<a href="#" onclick="openMe(<?php echo $staffs['staff_id']?>)" >
											<i class="fa fa-circle status-online"></i>
											  <img class="media-object" src="<?php echo base_url();?>/assets/images/anonymous.jpg" style="height: 32px; width: 32px;">
													   
											<div class="media-body" <?php  if (!empty($staffUnread)) {  if ($staffUnread['messagefrom'] == $staffs['staff_id']) {?>  style=" background-color: #5f8295 ; " <?php }} ?>>
											<input type = "hidden" name = "userstaff" id = "userstaff" value = "<?php echo $staffs['staff_id']?>">
												<h4 class="media-heading"><?php echo $staffs['othername'] ?></h4>
												<span > <?php echo $staffs['role']; ?></span>
											</div>
										</a>
									</li>
									<?php } } } ?>
								</ul>
								
							</div>
							<div class="user-chat">
								<div class="sidebar-content">
									<a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
									
									<p id="myDiv"></p>
								</div>
								<div class="user-chat-form sidebar-content">
							<form method="post" name="form" action="">
									<div class="input-group">
                                      
                                        <input type="text" placeholder="Type a message here..." class="form-control"  name="message" id="message" >
                                      <input type="hidden" name = "messageto" id = "messageto" value = "">
                                       <div class="input-group-btn">
                                             <button class="btn btn-blue no-radius" type="submit" value="Save" name="submit" id="messagebtn" >
                                                      <i class="fa fa-chevron-right"></i>
                                             </button>
                                        </div>
                                     </div>
                                </form>
                            </div>
							<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery.min.js">
</script>
<script type="text/javascript" >
$(function() {
$("#messagebtn").click(function() {

var staff_id = $("#staff_id").val(); 
var test = $("#message").val();
var messageto = $("#messageto").val();
var dataString = "message="+ test +"&messageto="+ staff_id;


if(test=='')
{
alert("Please Enter Some Message");
}
else
{
$("#flash").show();
$("#flash").fadeIn(400).html('<span class="loading">Loading Comment...</span>');

$.ajax({
type: "POST",
url: "messageAdd",
data: dataString,
cache: false,
success: function(html){
$("#display").after(html);
showComment(staff_id);
document.getElementById('message').value='';
document.getElementById('message').focus();
$("#flash").hide();
}
});
} return false;
});
});

</script>


<script id="source" language="javascript" type="text/javascript">
function showComment(me){
	
 $.ajax({
      type:"post",
      url:"messagesAll/"+me,
      data:"action=showcomment",
      success:function(data){
           $("#comment").html(data);
      }
    });
  }

 // showComment(me);
 
  </script>
   <div id="flash"></div>
   <div id="display"></div>
   <ul id="comment" style="list-style: none;">
   </ul>
 <script type="text/javascript">

function openMe(me)
{
	document.getElementById('shiro-'+me).style.display = 'block';
	document.getElementById('staff_id').value=me;
	document.getElementById('messageto').value=me;
	var read = 1;
	var dataString = "messageread="+ read;
	
	$.ajax({
	      type:"post",
	      url:"messageRead/"+me,
	      data:dataString,
	      success:function(data){
	           $("#userstaff").html(data);
	      }
	     });
	
	showComment(me);
}

 </script>



                         <?php //get all staffs for chats
				foreach ($this->load->main_model->getActiveStaffs() as $staffs) {?>
				
              	<ol class="discussion sidebar-content"  id="shiro-<?php echo $staffs['staff_id']?>" style="display: none;">
									<li class="other">
										<input value = "<?php echo $staffs['staff_id'];?>" name = "staff_id" id = "staff_id" type="hidden">
									</li>
								</ol>
								<?php } ?>
							</div>
						</div>
							
							<div class="tab-pane" id="test1">
							<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-users"></i>BACK</a>
							<div class="notifications">
								<div class="pageslide-title">
									Shiro
								</div>
								<ul class="pageslide-list">
									<li>
										<a href="javascript:void(0)">
											<span class="label label-primary"><i class="fa fa-user"></i></span> <span class="message"> New user registration</span> <span class="time"> 1 min</span>
										</a>
									</li>
									
								</ul>
								<div class="view-all">
									<a href="javascript:void(0)">
										Shiro all <i class="fa fa-arrow-circle-o-right"></i>
									</a>
								</div>
							</div>
						</div>
						
						<div class="tab-pane" id="notifications">
							<div class="notifications">
								<div class="pageslide-title">
									You have 11 notifications
								</div>
								<ul class="pageslide-list">
									<li>
										<a href="javascript:void(0)">
											<span class="label label-primary"><i class="fa fa-user"></i></span> <span class="message"> New user registration</span> <span class="time"> 1 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-success"><i class="fa fa-comment"></i></span> <span class="message"> New comment</span> <span class="time"> 7 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-success"><i class="fa fa-comment"></i></span> <span class="message"> New comment</span> <span class="time"> 8 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-success"><i class="fa fa-comment"></i></span> <span class="message"> New comment</span> <span class="time"> 16 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-primary"><i class="fa fa-user"></i></span> <span class="message"> New user registration</span> <span class="time"> 36 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-warning"><i class="fa fa-shopping-cart"></i></span> <span class="message"> 2 items sold</span> <span class="time"> 1 hour</span>
										</a>
									</li>
									<li class="warning">
										<a href="javascript:void(0)">
											<span class="label label-danger"><i class="fa fa-user"></i></span> <span class="message"> User deleted account</span> <span class="time"> 2 hour</span>
										</a>
									</li>
								</ul>
								<div class="view-all">
									<a href="javascript:void(0)">
										See all notifications <i class="fa fa-arrow-circle-o-right"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="settings">
							<h5 class="sidebar-title">General Settings</h5>
							<ul class="media-list">
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green" checked="checked">
											Enable Notifications
										</label>
									</div>
								</li>
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green" checked="checked">
											Show your E-mail
										</label>
									</div>
								</li>
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green">
											Show Offline Users
										</label>
									</div>
								</li>
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green" checked="checked">
											E-mail Alerts
										</label>
									</div>
								</li>
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green">
											SMS Alerts
										</label>
									</div>
								</li>
							</ul>
							<div class="sidebar-content">
								<button class="btn btn-success">
									<i class="icon-settings"></i> Save Changes
								</button>
							</div>
						</div>
					</div>
					
				</div>
			</div>