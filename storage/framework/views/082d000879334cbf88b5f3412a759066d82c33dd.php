<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container-wrapper">

  <div class="container body-container">

    <div class="row">

      <div class="col-lg-8 left-column"> <!-- LEFT COLUMN -->

        <!--         USER INFO BLOCK WRAPPER           -->

          <div class="block" style="">

              <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($a->username == session()->get('uname')): ?>
                  
                  <div id="" class="edit-button-profile">

                    <div id="edit-profile-info-wrapper" class="edit-option-wrapper">
                        <div class="menu-list" data-toggle="modal" data-target="#edit-profile-info-modal">Edit profile picture</div>
                        <div class="menu-list">Edit Basic info</div>
                    </div>

                    <i id="edit-profile-info-button" class="material-icons">more_vert</i>

                  </div>

                <?php else: ?>

                  <div class="hire-me-button" data-toggle="modal" data-target="#hire-me-modal">Hire Me !</div>

                <?php endif; ?>  

              <div class="user-image-profile">
                  <img src="images/user.png">
              </div>

              <div class="user-info-wrapper">

                  <div class="user-name" id="user-full-name"><?php echo e($a->first_name); ?>&nbsp;<?php echo e($a->last_name); ?></div>
                  <div class="user-occupation" id="user-occupation"><?php echo e($a->occupation); ?></div>
                  <div class="user-location" id="user-location"><?php echo e($a->location); ?></div>

                  <div class="divider"></div>

                  <div class="user-about" id="user-about">
                      <?php echo e($a->about); ?>

                  </div>

              </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>



          <!--         USER SKILLS BLOCK WRAPPER           -->

          <div class="inner-left-column">

          <div class="block" style="">

            <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <?php if($a->username == session()->get('uname')): ?>
                <div class="edit-button"><i class="material-icons" data-toggle="modal" data-target="#edit-skills-modal">mode_edit</i></div>
              <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
              <div class="block-heading"><?php echo e($a->first_name); ?>'s Skills</div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

              <div class="skills-wrapper" id="skills-wrapper">
                
                <?php if($skills_data == ''): ?>
                  no skills found
                <?php else: ?>
                  <?php $__currentLoopData = $skills_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($s->skills == ''): ?>
                          no skills found
                        <?php else: ?>

                          <?php $ss = explode(',',$s->skills); ?>

                          <?php for($i=0;$i<count($ss);$i++) {?>
                              <div class="skills"><?php echo e($ss[$i]); ?></div>
                          <?php }?>

                        <?php endif; ?>  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>  

              </div>

          </div>

          <!--         USER FEEDBACKS BLOCK WRAPPER           -->


          <div class="block" style="">

              <div class="block-heading">User Feedbacks</div>

              <form action="/feedback" method="post" id="feedback_form">

                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

                  <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <input type="hidden" id="feed_uname" value="<?php echo e($b->username); ?>" name="uname" />
                      <input type="hidden" id="feed_id" value="<?php echo e($b->id); ?>" name="getter_id" />
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <div class="form-group">
                      <textarea name="feedback" placeholder="Sumbit your feedback..." class="form-control" id="feedback_profile" rows="3"></textarea>
                  </div>

                  <div class="form-group" style="float:right">
                      <button class="form-button" type="button" id="feedback_form_form" >Submit</button>
                  </div>

              </form>


              <script>
                $(document).ready(function(e){
                    $('#feedback_form_form').on('click',function(e){
                        //alert('dddd');
                      e.preventDefault();

                        var formData = $('#feedback_form').serializeArray();

                          $.ajax({
                              type     : "post",
                              url      : "/feedback",
                              data     : formData,
                              cache    : false,

                              success  : function(feed_data) {
                                  console.log(feed_data);

                                  var f = $('<div class="feedback-wrapper">'+'<div class="feedback-user-image"><img src="images/user.png"></div>'+'<div class="feedback-user-feedback">'+'<a href="/'+feed_data.username+'">'+feed_data.first_name+' '+feed_data.last_name+'</a>'+'<div class="feedback-user-feedback-value">'+feed_data.feedback+'</div>'+'<div class="feedback-user-feedback-date">12th June 2017</div>'+'</div>'+'</div>');

                                  $('#feedback_container').prepend(f);

                              }
                        });


                    });
                  });


              </script>


              <div class="feedback-container" id="feedback_container">

                <?php $__currentLoopData = $feedback_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feed_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div class="feedback-wrapper">
                      <div class="feedback-user-image"><img src="images/user.png"></div>
                      <div class="feedback-user-feedback">
                          <a href="/<?php echo e($feed_data->username); ?>"><?php echo e($feed_data->first_name.' '.$feed_data->last_name); ?></a>
                          <div class="feedback-user-feedback-value"><?php echo e($feed_data->feedback); ?></div>
                          <div class="feedback-user-feedback-date">12th June 2017</div>
                      </div>
                  </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>

          </div>

          </div>


          <div class="inner-right-column">
    
        
          <div class="block">

              <div class="block-heading">About me</div>

              <div class="user-info-wrapper">

                  <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="user-about" id="user-about">
                        <?php echo e($a->about); ?>

                    </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>


          </div>

          <div class="block">

              <div class="block-heading">About my work</div>

              <div class="user-info-wrapper">

                  <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="user-about" id="user-about">
                        <?php echo e($a->about); ?>

                    </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>

          </div>              

      </div>

      </div>



      <div class="col-lg-4 right-column">  <!-- RIGHT COLUMN -->
        <div class="sticky-wrapper">

          <div class="block">

              <div class="block-heading">New requests</div>

              <?php if($request_data != 'null'): ?>

                <?php $__currentLoopData = $request_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $help_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div style="float:left;width:100%" id="<?php echo e($help_data->help_id); ?>" class="request_wrapper" data-toggle="modal" data-target="#request-details-modal">

                    <div class="suggestions-wrapper">
                        <div class="suggestions-user-image"><img src="images/user.png"></div>
                        <div class="suggestions-user-info-wrapper">
                            <div class="suggestions-user-info-name"><?php echo e($help_data->first_name); ?>&nbsp;<?php echo e($help_data->last_name); ?></div><br>
                            <div class="suggestions-user-info-occupation"><?php echo e($help_data->help); ?></div>
                        </div>
                    </div>

                  </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                <?php else: ?>

                  <div class="col-xs-12 text-center">No new requests...</div>

              <?php endif; ?>

              <script>
                  $(document).ready(function(e){

                    $('.request_wrapper').click(function(){

                        $('#request-details-modal').modal('show');

                        var help_id = $(this).attr('id');
                        console.log(help_id);

                        $.ajax({

                                  type     : "POST",
                                  url      : "/get_request_data",
                                  data     : {'help_id': help_id},
                                  cache    : false,

                                  success  : function(help_request_data) {
                                      
                                      $("#help_modal_name").html(help_request_data[0].first_name+' '+help_request_data[0].last_name);
                                      $("#help_modal_help").html(help_request_data[0].help);
                                      $("#help_id_modal").val(help_request_data[0].help_id);
                                  }
                        });

                    });
                      

                  });
              </script>

              


          </div>



          <div class="block">

              <div class="block-heading">Pending works</div>

              <?php $__currentLoopData = $request_pending_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $help_pending_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div style="float:left;width:100%" id="<?php echo e($help_pending_data->help_id); ?>" class="request_wrapper" data-toggle="modal" data-target="#request-details-modal">

                <div class="suggestions-wrapper">
                    <div class="suggestions-user-image"><img src="images/user.png"></div>
                    <div class="suggestions-user-info-wrapper">
                        <div class="suggestions-user-info-name"><?php echo e($help_pending_data->first_name); ?>&nbsp;<?php echo e($help_pending_data->last_name); ?></div><br>
                        <div class="suggestions-user-info-occupation"><?php echo e($help_pending_data->help); ?></div>
                    </div>
                </div>

              </div>

              <script>
                  $(document).ready(function(e){

                    $('.request_wrapper').click(function(){

                        $('#request-details-modal').modal('show');

                        var help_id = $(this).attr('id');
                        console.log(help_id);

                        $.ajax({

                                  type     : "POST",
                                  url      : "/get_request_data",
                                  data     : {'help_id': help_id},
                                  cache    : false,

                                  success  : function(help_request_data) {
                                      
                                      $("#help_modal_name").html(help_request_data[0].first_name+' '+help_request_data[0].last_name);
                                      $("#help_modal_help").html(help_request_data[0].help);
                                      $("#help_id_modal").val(help_request_data[0].help_id);
                                  }
                        });

                    });
                      

                  });
              </script>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          </div>  




          <div class="block">

              <div class="block-heading">Suggestions</div>

              <?php $__currentLoopData = $suggestions_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <a href="/<?php echo e($suggest->username); ?>">
                  <div class="suggestions-wrapper">
                      <div class="suggestions-user-image"><img src="images/user.png"></div>
                      <div class="suggestions-user-info-wrapper">
                          <div class="suggestions-user-info-name"><?php echo e($suggest->first_name); ?>&nbsp;<?php echo e($suggest->last_name); ?></div><br>
                          <div class="suggestions-user-info-occupation"><?php echo e($suggest->occupation); ?></div>
                      </div>
                  </div>
                </a>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          </div>
         </div> 
      </div> <!-- RIGHT COLUMN -->


    </div>

  </div>

</div>

</body>
