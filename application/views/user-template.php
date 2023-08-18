<?php $this->load->view('includes/user/head'); ?> 

<?php $this->load->view('includes/user/header-nev'); ?> 

<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar --> 
		     <?php $this->load->view('includes/user/lft-sidebar'); ?>    
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper"> 
 
				<?php $this->load->view($pageContent); ?>	
				 
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
<?php $this->load->view('includes/user/footer'); ?>
	

 

 