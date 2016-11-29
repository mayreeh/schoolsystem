<?php
 $q = intval($_GET['q']);
?> 
<?php $timings = $this->load->main_model->getAttendanceTiming();?>
  <table class="table table-striped table-hover" id="Balance">
							<thead>
							<?php $notdone = "";
							foreach ($timings as $timing) {
							$attendance = $this->load->main_model->getAttendanceByClassByDay($q , $timing['description']);?>
							<tr> 
    							<th class="center"><?php echo $timing['description']?></th> 
    							<td style=" color: red; font-weight: bolder;">
    							<?php if (!empty($attendance))  { echo $r =  'DONE FOR THE DAY'; } else { $notdone = $timing['attendancetiming_id'];  echo $r = 'NOT DONE'; } ?>
    							</td>
							</tr>
							<?php } ?>
							</thead>
							</table>
 <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/attendanceSheetAdd">
					  <table class="table table-striped table-hover" id="Balance">
												<thead>
												<tr>
													 <th>Photo</th>
														<th>Full Name</th>
														<th>Gender</th>
														<?php if ($r = 'DONE FOR THE DAY') {?>
														<th>Status</th>
														<?php } ?>
														<?php if ($notdone != "") {?>
														<th class="center hidden-xs">Present</th>
													   	<th class="center hidden-xs">Absent</th>
													   	<?php } ?>
													</tr>
												</thead>
												<tbody>
												<?php $i = 1; foreach ($this->load->main_model->getStudentByClassId($q) as $students) {?>
													<tr>
														
													    <td>
													    <?php if (empty($students['file'])) { ?>
													    	<img class="img-circle"  src="<?php echo base_url();?>/assets/images/anonymous.jpg" style="height: 30px; width: 30px;">
													    <?php } else { ?>
													     <img class="img-circle"  src="<?php echo base_url();?>/thumbs/<?php echo $students['file']; ?>" style="height: 30px; width: 30px;">
													     <?php } ?>
													    </td>
														<td><?php echo $students['firstname'] . '   ' . $students['middlename'] . '  ' . $students['lastname']; ?></td>
														<td><?php echo $students['gender']?></td>
														<?php if ($r = 'DONE FOR THE DAY') {?>
														<td style="color: red; font-weight: bolder;">
														<?php $desc= $this->load->main_model->getAttendanceSheetRecordsByDateByStudent( $students['student_id']);
														  foreach ($desc as $des) {?>
														<p> <?php echo $desc[0]['description'] . ' ' . $desc[0]['attendancetiming']; ?></p>
														<?php } ?>
														</td> 
														<?php } ?>
														<?php if ($notdone != "") {?>
														<td class="center hidden-xs">
													      <div class="checkbox-table">
														    <label>
														    <input type="hidden" name = "class_id" value = "<?php echo $q;?>">
														    <input type="hidden" name="student_id[]" value = "<?php echo $students['student_id']; ?>" >
																<input class="flat-grey selectall" type="radio" name="present<?php echo $students['student_id']; ?>[]"  value = "Present" required>
															</label>
														  </div>
														</td>
													
														<td class="center hidden-xs">
													      <div class="checkbox-table">
														    <label>
														    <input type="hidden" name="student_id[]" value = "<?php echo $students['student_id']; ?>" >
																 <input class="flat-grey selectall" type="radio" name="present<?php echo $students['student_id']; ?>[]"  value = "Absent" required >
															</label>
														  </div>
														</td>
														<?php } ?>
													</tr>
													<?php } ?>
												</tbody>
											</table>
											<div class="form-group">
														<label class="col-sm-3 control-label">
															 <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<select name = "attendancetiming" required>
																<option value = "" <?php  if ($notdone == $timing['attendancetiming_id']) { ?> selected="selected" <?php } ?>>-- Select The Time Of the Day</option>
																<?php foreach ($this->load->main_model->getAttendanceTiming() as $timing) {?>
																<option value="<?php echo $timing['description']?>" <?php  if ($timing['attendancetiming_id'] == $notdone) { ?> selected="selected" <?php } ?>><?php echo $timing['description']?></option>
																<?php } ?>
															</select>
															
															<input type = "submit" name = "submit" value = "Save"  class="btn-green" required>
														</div>
													</div>
										
										
										<br/> 
									</form>
											
												