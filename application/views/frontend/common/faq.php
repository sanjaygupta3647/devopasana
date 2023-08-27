 <div class="section pcustom-section">
    <div class="container">
      <div class="section-title text-center">
        <h2>Frequently Asked Questions</h2>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="accordion with-gap" id="generalFAQExample">
		     
			<?php if(!empty($faqs) && count($faqs)): ?>
			<?php foreach($faqs as $key=>$val): ?>
            <div class="card">
              <div class="card-header" data-bs-toggle="collapse" role="button" data-bs-target="#generalOne<?php echo $val->id; ?>"
                <?php echo ($key==0) ? 'aria-expanded="true"':'' ?>  aria-controls="generalOne<?php echo $val->id; ?>">
                <?php echo $val->subject; ?>
              </div>

              <div id="generalOne<?php echo $val->id; ?>" class="collapse <?php echo ($key==0) ? 'show':'' ?>" data-bs-parent="#generalFAQExample">
                <div class="card-body">
                  <?php echo $val->body; ?>
                </div>
              </div>
            </div> 
			<?php endforeach; ?>
			<?php endif; ?>
             
          </div>
        </div>

      </div>
    </div>
  </div>