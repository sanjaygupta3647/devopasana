<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Family Member </span> - <?php echo (!$id) ? 'Add' : 'Edit'; ?></h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="<?php echo base_url('family'); ?>" class="btn btn-link btn-float has-text"><i class="icon-list-ordered text-primary"></i> <span>List all family</span></a>
			</div>
		</div>
	</div> 
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
	<!-- Wizard with validation -->
	<div class="panel panel-white">
		 

		<form class="form-validation p-20" id="relation-form" action="" method="post" enctype="multipart/form-data">
			<fieldset class="step" id="myform">
				<?php if (!empty($devotee->id)) : ?>
					<input type="hidden" name="relation_id" value="<?php echo $devotee->id; ?>">
				<?php endif; ?>
				 

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Name: <span class="text-danger">*</span></label>
							<input type="text" name="name" class="form-control" value="<?php echo ($devotee->name) ? $devotee->name : ''; ?>" placeholder="Name">
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Relation: <span class="text-danger">*</span></label>
							<?php
							$options = array('self','mother', 'spouse', 'father', 'son','daughter', 'sibling', 'brother', 'sister', 'friend', 'cousin', 'other');
							?>
							<select name="relation" class="select">
							   <option value="" >Select relation</option>
							    <?php foreach($options as $val): ?>
								<option value="<?php echo $val; ?>" <?php echo (!empty($devotee->relation) && $devotee->relation == $val) ? 'selected' : ''; ?>><?php echo $val; ?></option> 
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Gotra: </label>
							<input type="text" name="gotra" class="form-control" value="<?php echo ($devotee->gotra) ? $devotee->gotra : ''; ?>" placeholder="Gotra">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Nakshatra:</label>
							<input type="text" name="nakshatra" class="form-control" value="<?php echo ($devotee->nakshatra) ? $devotee->nakshatra : ''; ?>" placeholder="Nakshatra">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Rashi:</label>
							<input type="text" name="rashi" class="form-control" value="<?php echo ($devotee->rashi) ? $devotee->rashi : ''; ?>" placeholder="Rashi">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Date Of Birth:</label>
							<input type="date" name="dob" class="form-control" value="<?php echo ($devotee->dob) ? $devotee->dob : ''; ?>" placeholder="Date Of Birth">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Time Of Birth(HH:MM(like 13:20)):</label>
							<input type="text" name="tob" class="form-control" value="<?php echo ($devotee->tob) ? $devotee->tob : ''; ?>" placeholder="HH:MM(like 13:20)">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Place Of Birth:</label>
							<input type="text" name="pob" class="form-control" value="<?php echo ($devotee->pob) ? $devotee->pob : ''; ?>" placeholder="Place Of Birth">
						</div>
					</div>
				</div>
				<div class="row">
					 
					<div class="col-md-6">
						<div class="form-group">
							<label>Additional Info:</label>
							<input type="text" name="pob" class="form-control" value="<?php echo ($devotee->additional_info) ? $devotee->additional_info : ''; ?>" placeholder="Additional Info">
						</div>
					</div>
					 
				</div> 


			</fieldset>

			<div class="form-wizard-actions">
				<button class="btn btn-info" type="submit"><?php echo (!$id) ? 'Submit' : 'Update'; ?></button>
			</div>
		</form>
	</div>

	<?php $this->load->view('includes/user/tagline'); ?>
</div>
<!-- /content area -->