<?php $this->load->view('includes/admin/head'); ?> 

<?php $this->load->view('includes/admin/header-nev'); ?> 

<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar --> 
		     <?php $this->load->view('includes/admin/lft-sidebar'); ?>    
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
<?php $this->load->view('includes/admin/footer'); ?>
	

 

 