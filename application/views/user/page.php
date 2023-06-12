 <!-- Page header -->
 <div class="page-header page-header-default">
     <div class="page-header-content">
         <div class="page-title">
             <h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold"><?php echo $details->title ?></span></h4>
         </div>

     </div>

 </div>

 <!-- Content area -->
 <div class="content">
     <div class="panel-group">
        
             <div class="well text-center">
                 <?php echo $details->body?>
             </div>
         

     </div>
     <?php $this->load->view('includes/user/tagline'); ?>
 </div>
 <!-- /content area -->