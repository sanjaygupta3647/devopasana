 <!-- Page header -->
 <div class="page-header page-header-default">
     <div class="page-header-content">
         <div class="page-title">
             <h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold"><?php echo $department->title ?> - Faq list</span></h4>
         </div>

     </div>

 </div>

 <!-- Content area -->
 <div class="content">
     <div class="panel-group" id="accordion">
         <?php if (!empty($faqs)) : ?>
             <?php foreach ($faqs as $key => $val) :  ?>
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <h4 class="panel-title">
                             <a data-toggle="collapse" data-parent="#accordion" href="#collapsebtn<?php echo $key; ?>"><span class="glyphicon glyphicon-menu-right"></span> <?php echo $val->subject; ?></a>
                         </h4>
                     </div>
                     <div id="collapsebtn<?php echo $key; ?>" class="panel-collapse collapse <?php echo ($key == 0) ? 'in' : '' ?>">
                         <div class="panel-body">
                             <?php echo $val->body; ?>
                         </div>
                     </div>
                 </div>
             <?php endforeach; ?>
         <?php else : ?>
             <div class="well text-center">
                 <h3>No records found!</h3>
             </div>
         <?php endif; ?>

     </div>
     <?php $this->load->view('includes/user/tagline'); ?>
 </div>
 <!-- /content area -->