<!-- EDIT PROFILE INFO MODAL -->

<div class="modal fade bd-example-modal-lg" id="edit-profile-info-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit your personal information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="edit_personal_info_form" action="/update_profile_info" method="post" >

             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">First name</label>
            <div class="col-9">
              <!-- <input class="form-control" type="text" value="Artisanal kale" id="example-text-input"> -->
              <input class="form-control" type="text" name="first_name" value="<?php echo e($u_data->first_name); ?>" id="example-text-input">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">Last name</label>
            <div class="col-9">
              <input class="form-control" type="text" name="last_name" value="<?php echo e($u_data->last_name); ?>" id="example-text-input">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">Username</label>
            <div class="col-9">
              <input class="form-control" type="text" name="user_name" value="<?php echo e($u_data->username); ?>" id="example-text-input">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">Occupation</label>
            <div class="col-9">
              <input class="form-control" type="text" name="occupation" value="<?php echo e($u_data->occupation); ?>" id="example-text-input">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">E-mail</label>
            <div class="col-9">
              <input class="form-control" type="email" name="email" value="<?php echo e($u_data->email); ?>" id="example-text-input">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">Contact number</label>
            <div class="col-9">
              <input class="form-control" type="text" name="mobile_no" value="<?php echo e($u_data->mobile_no); ?>" id="example-text-input">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">Address</label>
            <div class="col-9">
              <input class="form-control" type="text" name="address" value="<?php echo e($u_data->location); ?>" id="example-text-input">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">City</label>
            <div class="col-3">
              <input class="form-control" type="text" name="location" value="<?php echo e($u_data->location); ?>" id="example-text-input">
            </div>

            <label for="example-text-input" class="col-3 col-form-label">Country</label>
            <div class="col-3">
              <input class="form-control" type="text" name="country" value="<?php echo e($u_data->location); ?>" id="example-text-input">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">Date of birth</label>
            <div class="col-9">
              <input class="form-control" type="date" name="dob" value="" id="example-text-input">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-text-input" class="col-3 col-form-label">About</label>
            <div class="col-9">
              <textarea class="form-control"  name="about" value="<?php echo e($u_data->about); ?>" id="example-text-input"><?php echo e($u_data->about); ?></textarea>
            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
      <div class="modal-footer">
        <button type="" class="btn btn-primary form-button">Save changes</button>
      </div>

    </form>

    </div>
  </div>
</div>

<script>

    $(document).ready(function(e){

          $('#edit_personal_info_form').submit(function(e){
                e.preventDefault();
            $('#edit-profile-info-modal').modal('hide');

                var formData = $('#edit_personal_info_form').serializeArray();

                $.ajax({
                    type     : "POST",
                    url      : "/update_profile_info",
                    data     : formData,
                    cache    : false,

                    success  : function(personal_data) {
                        console.log(personal_data);
                        $("#user-full-name").html(personal_data.first_name+' '+personal_data.last_name);
                        $("#user-occupation").val(personal_data.occupation);
                        $("#user-location").html(personal_data.location);
                        $("#user-about").html(personal_data.about);
                    }
              });


          });

      });

</script>











<!--         EDIT SKILLS MODAL             -->




<div class="modal fade bd-example-modal-lg" id="edit-skills-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit your skills</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <div class="form-group row">

                <div class="col-12">
                      <?php $__currentLoopData = $skills_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="text" id="skills-input" value="<?php echo e($skills->skills); ?>" data-role="tagsinput"/>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


            </div>

            <div class="modal-footer">
              <button id="edit-skills-form-button" type="button" class="btn btn-primary form-button">Save changes</button>
            </div>



      </div>

    </div>
  </div>
</div>


<script>

    $(document).ready(function(e){

          $('#edit-skills-form-button').on('click',function(e){
                e.preventDefault();
            // $('#edit-profile-info-modal').modal('hide');
                //
                // var formData = $("#skills-input").tagsinput('items');
                // console.log($("#skills-input").val());
                //
                // var jsonConvertedData = JSON.stringify(formData);  // Convert to json
                //
                // var skill_data_json = "";
                //
                // for(i in formData){
                //   var x = formData[i];
                //   var skill_data_json = skill_data_json  + x + ",";
                // }

                var skill_data = {data:$("#skills-input").val()};

                $.ajax({
                    type     : "POST",
                    url      : "/skills_update",
                    data     : skill_data,
                    cache    : false,

                    success  : function(skill_data_response) {

                        var skills = '';
                        var skill_return = skill_data_response.skills.split(",");
                            for(i=0;i<skill_return.length;i++){
                              skills = skills + '<div class="skills">'+skill_return[i]+'</div>'
                            };

                        $('#skills-wrapper').html(skills);
                    }
              });


          });

      });

</script>









<!-- HIRE MODAL -->


<div class="modal fade bd-example-modal-lg" id="hire-me-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hire me !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form action="" id="hire-me-form" method="post">

            <div class="form-group row">

                <label for="example-text-input" class="col-3 col-form-label">Contact number</label>
                <div class="col-9">
                  <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input name="helper_id" type="hidden" value="<?php echo e($user->id); ?>" />
                    <input class="form-control" type="text" id="contact-hire-me" value="<?php echo e($user->mobile_no); ?>"  />
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-3 col-form-label">How can i Help?</label>
                <div class="col-9">
                  <textarea class="form-control"  name="help" id="help-hire-me"></textarea>
                </div>
            </div>


            <div class="modal-footer">
              <button id="edit-skills-form-button" class="btn btn-primary form-button">Request help</button>
            </div>

        </form>

      </div>

    </div>
  </div>
</div>


<script>

    $(document).ready(function(e){

          $('#hire-me-form').submit(function(e){
                e.preventDefault();
            $('#hire-me-modal').modal('hide');

                var formData = $('#hire-me-form').serializeArray();

                $.ajax({
                    type     : "POST",
                    url      : "/help_request",
                    data     : formData,
                    cache    : false,

                    success  : function(personal_data) {
                        console.log(personal_data);
                    }
              });


          });

      });

</script>
