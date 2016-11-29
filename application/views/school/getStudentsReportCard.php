<?php
 $q = intval($_GET['q']);
 
?> 

  <table class="table table-striped table-hover" id="Balance">
												<thead>
													<tr>
													   <th class="center">Select</th>
														<th>Photo</th>
														<th>Full Name</th>
														<th>Gender</th>
														<th>Guardian Fullname</th>
														<th>Email</th>
														<th>Contact Phone Number</th>
														<th> Report Card</th>
														<th> Report Form</th>
													</tr>
												</thead>
												<tbody>
												<?php $i = 1; foreach ($this->load->main_model->getStudentByClassId($q) as $students) {?>
													<tr>
																    <td class="center">
																		<div class="checkbox-table">
																			<label>
																				<input type="checkbox" class="flat-grey foocheck" name="student_id[]" value = "<?php echo $students['student_id']; ?>">
																			</label>
																		</div>
																	</td>
													    <td>
													    <?php if (empty($students['file'])) { ?>
													    	<img class="img-circle"  src="<?php echo base_url();?>/assets/images/anonymous.jpg" style="height: 30px; width: 30px;">
													    <?php } else { ?>
													     <img class="img-circle"  src="<?php echo base_url();?>/thumbs/<?php echo $students['file']; ?>" style="height: 30px; width: 30px;">
													     <?php } ?>
													    </td>
														<td><?php echo $students['firstname'] . '   ' . $students['middlename'] . '  ' . $students['lastname']; ?></td>
														<td><?php echo $students['gender']?></td>
														<td><?php echo $students['guardianfullname']?></td>
														<td><?php echo $students['guardianemail']?></td>
														<td><?php echo $students['guardianphone']?></td>
														<td><a class="btn btn-green show-sv"  href="<?php echo base_url();?>/index.php/school/reportCardStudent/<?php echo $students['student_id']; ?>" data-startFrom="right">
														Report Card<i class="fa fa-chevron-right"></i>
													    </a>
														</td>
														<td><a class="btn btn-green show-sv"href="<?php echo base_url(); ?>/index.php/school/reportFormChoose/<?php echo $students['student_id']?>/"  data-startFrom="right">
														Report Form<i class="fa fa-chevron-right"></i>
													    </a>
														</td>
														
													</tr>
													<?php } ?>
												</tbody>
											</table>
											
										
									