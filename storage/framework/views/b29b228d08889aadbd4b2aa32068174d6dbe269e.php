<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


  <div class="container body-container">

    <div class="row">

      <div class="col-lg-8 left-column">

        <!--         USER INFO BLOCK WRAPPER           -->

          <div class="block" style="">

              <div class="hire-me-button" data-toggle="modal" data-target="#hire-me-modal">Hire Me !</div>

              <div class="user-image-profile">
                  <img src="images/user.png">
              </div>

              <div class="user-info-wrapper">

                  <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <div class="user-name"><?php echo e($user->first_name); ?>&nbsp;<?php echo e($user->last_name); ?></div>
                  <div class="user-occupation"><?php echo e($user->occupation); ?></div>
                  <div class="user-location"><?php echo e($user->location); ?></div>

                  <div class="divider"></div>

                  <div class="user-about">
                      <?php echo e($user->about); ?>

                  </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>

          </div>

          <!--         USER SKILLS BLOCK WRAPPER           -->

          <div class="block" style="">

              <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div class="block-heading"><?php echo e($user->first_name); ?>'s Skills</div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <div class="divider"></div>

              <div class="skills-wrapper">
                  <?php $__currentLoopData = $skills_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php $ss = explode(',',$s->skills); ?>

                          <?php for($i=0;$i<count($ss);$i++) {?>
                              <div class="skills"><?php echo e($ss[$i]); ?></div>
                          <?php }?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>

          </div>

          <!--         USER FEEDBACKS BLOCK WRAPPER           -->


          <div class="block" style="">

              <div class="block-heading">User Feedbacks</div>

              <div class="divider"></div>

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


      <div class="col-lg-4 right-column">

        <div class="block">

            <div class="block-heading">Suggestions</div>

            <div class="divider"></div>

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


    </div>

  </div>

</body>
