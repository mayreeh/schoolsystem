<?php
 $q = intval($_GET['q']);
?> 
 <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/smsStaffs">
 <table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr>
												       <th class="center">Select</th>
													   <th>Sn</th>
														<th>Full Name</th>
														<th>Gender</th>
														<th>ID Number</th>
														<th>Email</th>
														<th>Contact Phone Number</th>
														<th>Role</th>
													</tr>
												</thead>
												<tbody>
												<?php $i = 1; foreach ($this->load->main_model->getActiveStaffsByRole($q) as $staffs) {?>
													<tr>
													 <td class="center">
																		<div class="checkbox-table">
																			<label>
																				<input type="checkbox" class="flat-grey foocheck" name="staff_id[]" value = "<?php echo $staffs['staff_id']; ?>">
																			</label>
																		</div>
														</td>
													    <td>
													    <?php if (empty($staffs['file'])) { ?>
													    	<img class="img-circle"  src="<?php echo base_url();?>/assets/images/anonymous.jpg" style="height: 30px; width: 30px;">
													    <?php } else { ?>
													     <img class="img-circle"  src="<?php echo base_url();?>/thumbs/<?php echo $staffs['file']; ?>" style="height: 30px; width: 30px;">
													     <?php } ?>
													    </td>
														<td><?php echo $staffs['firstname'] . '   ' . $staffs['lastname'] . '  ' . $staffs['othername']; ?></td>
														<td><?php echo $staffs['gender']?></td>
														<td><?php echo $staffs['idnumber']?></td>
														<td><?php echo $staffs['email']?></td>
														<td><?php echo $staffs['phonenumber']?></td>
														<td><?php echo $staffs['role']?></td>
													
													</tr>
													<?php } ?>
												</tbody>
											</table>
											<br/>
											  <div class="form-group">
														<label class="col-sm-3 control-label">
															Message <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
																<textarea rows="" cols="" name="staffmessage"   style="width: 456px; height: 45px;"  required></textarea>
														</div>
													</div>
													 <div class="form-group">
														<label class="col-sm-3 control-label">
															 <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
																<input type = "submit" name = "submit" value = "Send SMS For The Selected Staffs" >
														</div>
													</div>
										</form>
										
										<br/> 