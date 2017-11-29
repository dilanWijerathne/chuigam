<div id="skills-edit-modal" class="modal" >

    <script>

        $(document).ready(function(){
          $('.chips-initial').material_chip({
            data: [

              @foreach($skills_data as $s)
                      <?php $ss = explode(',',$s->skills); ?>

                      <?php for($i=0;$i<count($ss)-1;$i++) {?>
                          { tag: '{{$ss[$i]}}',},
                      <?php }?>
              @endforeach()



              ],

          });
        });

    </script>

    <form id="skills-edit-form" method="post">

          <div class="modal-content">

                <div class="row">
                    <div class="col s12 block-heading center">
                        Edit your skills
                    </div>
                </div>

                <div class="chips chips-initial chips-autocomplete"></div>

          </div>

          <div class="modal-footer center" style="text-align:center !important">
                  <button class="btn waves-effect waves-light login-botton" id="skills_save" type="submit" name="action" style="float:none">
                                                  Save info
                  </button>
          </div>

      </form>

</div>


<script>

    $(document).ready(function(e){
          $('#skills-edit-form').submit(function(e){

            $('#skills-edit-modal').modal('close');

            e.preventDefault();

                var formData = $('.chips-initial').material_chip('data');
                var jsonConvertedData = JSON.stringify(formData);  // Convert to json

                var skills_datas = "";



                for(i in formData){
                  var x = formData[i]["tag"];
                  var skills_datas = skills_datas  + x + ",";

                }

                var skill_data_string = JSON.stringify(skills_datas);
                var skill_data = {data:skills_datas};
                console.log(skill_data_string);


                $.ajax({
                    type     : "POST",
                    url      : "/skills_update",
                    data     : skill_data,
                    cache    : false,

                    success  : function(skills_data) {
                        var skill_return = skills_data.skills;
                        skill_returns = skill_return.split(",");
                        console.log(skill_returns);

                              var skill_html_data = "";

                              for(i=0;i<skill_returns.length-1;i++){

                                skill_html_data +='<div class="skill-chips">'+ skill_returns[i] +"</div>"

                                $('#skills-wrapper').html(skill_html_data);
                                $('#skills_count').html(i);
                              }



                    }
              });

          });

      });

</script>





<!--      USER PROFILE EDIT PERSONAL INFO MODAL STARTS HERE     -->

<div id="user-profile-edit-modal" class="modal" >
    <div class="modal-content">
        <div class="row">
            <div class="col s12 block-heading center">
                Edit your info
            </div>
        </div>



                <div class="row">

                  <form method="post" id="edit_personal_info" action="/update">

                    @foreach($user_data as $user_info)

                        <input type="hidden" name="occupation" value="{{$user_info->occupation}}" />
                        <input type="hidden" name="location" value="{{$user_info->location}}" />
                        <input type="hidden" name="working_hours" value="{{$user_info->working_hours}}" />
                        <input type="hidden" name="working_location" value="{{$user_info->working_location}}" />
                        <input type="hidden" name="mobile_no" value="{{$user_info->mobile_no}}" />


                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">perm_identity</i>

                            <input name="fname" id="icon_prefix" type="text" class="validate" value="{{$user_info->first_name}}">

                            <label for="icon_prefix">First name</label>

                        </div>

                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">perm_identity</i>

                            <input name="lname" id="icon_prefix" type="text" class="validate" value="{{$user_info->last_name}}">

                            <label for="icon_prefix">Last name</label>

                        </div>

                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">perm_identity</i>

                            <input name="uname" id="icon_prefix" type="text" class="validate" value="{{$user_info->username}}">

                            <label for="icon_prefix">User name</label>

                        </div>

                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">email</i>
                            <input name="email" id="icon_telephone" type="email" class="validate" value="{{$user_info->email}}">
                            <label for="icon_telephone">Email</label>
                        </div>

                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input name="pass" id="icon_telephone" type="password" class="validate" value="{{$user_info->password}}">
                            <label for="icon_telephone">Password</label>
                        </div>

                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="icon_telephone" type="password" class="validate" >
                            <label for="icon_telephone">Re-enter password</label>
                        </div>

                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">perm_identity</i>
                            <input name="occupation" id="icon_prefix" type="text" class="validate" value="{{$user_info->occupation}}">
                            <label for="icon_prefix">occupation</label>
                        </div>

                        <div class="input-field col l6 s12" style="">

                                <i class="material-icons prefix" style="margin-top:;">assignment_ind</i>

                                <?php $type = $user_info->type ?>
                                <select name="type" value="{{$user_info->type}}">
                                    <option value="seeker" <?php if($type='employee'){echo 'selected';}?> >Seeker</option>
                                    <option value="helper" <?php if($type='employee'){echo 'selected';}?> >Helper</option>
                                    <option value="both" <?php if($type='employee'){echo 'selected';}?> >Both</option>
                                </select>

                                <label style="top:-10px !important">I'm gonna be a</label>


                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">perm_identity</i>
                            <textarea name="about" id="textarea1" class="materialize-textarea"  data-length="100">{{$user_info->about}}</textarea>
                            <label for="textarea1">About</label>
                        </div>

                        @endforeach

                </div>

    </div>
    <div class="modal-footer center" style="text-align:center !important">
            <button class="btn waves-effect waves-light login-botton" type="submit" name="action" style="float:none">
                                            Save info
            </button>
    </div>

    </form>

</div>



                <script>

                    $(document).ready(function(e){
                          $('#edit_personal_info').submit(function(e){

                            $('#edit_personal_info').modal('close');

                            e.preventDefault();

                                var formData = $('#edit_personal_info').serializeArray();

                                $.ajax({
                                    type     : "POST",
                                    url      : "/update",
                                    data     : formData,
                                    cache    : false,

                                    success  : function(personal_data) {
                                        console.log(personal_data);
                                        $("#uname").html(personal_data.username);
                                        $("#feed_uname").val(personal_data.username);
                                        $("#occupation").html(personal_data.occupation);
                                        $("#about").html(personal_data.about);

                                    }
                              });


                          });

                      });

                </script>




<!--      USER PROFILE EDIT PERSONAL INFO MODAL ENDS HERE     -->







<!--      USER PROFILE EDIT OTHER PERSONAL INFO MODAL STARTS HERE     -->

<div id="user-profile-info-edit-modal" class="modal">
    <div class="modal-content">
        <div class="row">

            <form method="post" action="/update" id="edit_other_info">

            @foreach($user_data as $user_info)

            <input type="hidden" name="fname" value="{{$user_info->first_name}}" />
            <input type="hidden" name="lname" value="{{$user_info->last_name}}" />
            <input type="hidden" name="uname" value="{{$user_info->username}}" />
            <input type="hidden" name="email" value="{{$user_info->email}}" />
            <input type="hidden" name="type" value="{{$user_info->type}}" />
            <input type="hidden" name="pass" value="{{$user_info->pass}}" />
            <input type="hidden" name="occupation" value="{{$user_info->occupation}}" />
            <input type="hidden" name="about" value="{{$user_info->about}}" />


            <div class="input-field col s12">
                <i class="material-icons prefix">perm_identity</i>
                <input name="location" id=" icon_prefix" type="text" class="validate" value="{{$user_info->location}}">
                <label for="icon_prefix">Your location</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">schedule</i>

                <?php $hours = $user_info->working_hours ?>

                <select name="working_hours" multiple>
                    <option value="morning" <?php if(str_contains($hours, 'morning')){echo 'selected';}?> >Morning</option>
                    <option value="afternoon" <?php if(str_contains($hours, 'afternoon')){echo 'selected';} ?> >Afternoon</option>
                    <option value="evening" <?php if(str_contains($hours, 'evening')){echo 'selected';}?> >Evening</option>
                </select>

                <label for="icon_prefix" style="top:-10px !important">Working hours</label>

            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">location_on</i>
                <input name="working_location" id=" icon_prefix" type="text" class="validate" value="{{$user_info->working_location}}">
                <label for="icon_prefix">Working location</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">stay_current_portrait</i>
                <input name="mobile_no" id=" icon_prefix" type="text" class="validate" value="{{$user_info->mobile_no}}">
                <label for="icon_prefix">Contact number</label>
            </div>

        </div>
    </div>

    <div class="modal-footer center" style="text-align:center !important">
            <button class="btn waves-effect waves-light login-botton" type="submit" name="action" style="float:none">
                                            Save info
            </button>
    </div>

        @endforeach

      </form>
</div>

<script>

    $(document).ready(function(e){
          $('#edit_other_info').submit(function(e){

            $('#edit_other_info').modal('close');

            e.preventDefault();

                var formData = $('#edit_other_info').serializeArray();

                $.ajax({
                    type     : "POST",
                    url      : "/update",
                    data     : formData,
                    cache    : false,

                    success  : function(about_data) {
                        console.log(about_data);
                        $("#uname").html(about_data.username);
                        $("#occupation").html(about_data.occupation);
                        $("#location").html(about_data.location);
                        $("#working_location").html(about_data.working_location);
                        $("#working_hours").html(about_data.working_hours);
                        $("#mobile_no").html(about_data.mobile_no);

                    }
              });


          });

      });

</script>



<!--      USER PROFILE EDIT ABOUT INFO MODAL STARTS HERE     -->









<!--      USER PROFILE EDIT ABOUT INFO MODAL ENDS HERE     -->





<!--      HIRE ME MODAL STARTS HERE     -->

<div id="hire-me-modal" class="modal hire-me-modal">

    <form method="post" id="hire-me-form">

    <div class="modal-content">
        <div class="row">



            <!-- <div class="input-field col s12">
                <i class="material-icons prefix">perm_contact_calendar</i>
                <input type="date" class="datepicker">
                <label for="icon_prefix">When</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">perm_contact_calendar</i>
                <input id="timepicker_ampm_dark" class="timepicker" type="time">
                <label for="timepicker">time</label>
            </div> -->

              <div class="input-field col s12">
                  <i class="material-icons prefix">pan_tool</i>
                  <input name="help" id="hire-me-help" type="text" class="validate">
                  <label for="hire-me-help">How can i help you?</label>
              </div>

              <div class="input-field col s12">
                  <i class="material-icons prefix">location_on</i>
                  <input name="adress" id="hire-me-where" type="text" class="validate">
                  <label for="hire-me-where">Where</label>
              </div>

              <div class="input-field col s12">
                  <i class="material-icons prefix">stay_current_portrait</i>
                  <input name="contact" id="hire-me-contact" type="text" class="validate">
                  <label for="hire-me-contact">Contact Number</label>
              </div>

              @foreach($user_data as $data)
              
              <input name="name" type="hidden" value="{{$data->first_name.' '.$data->last_name}}"/>
              <input name="uname" type="hidden" value="{{$data->username}}"/>
              <input name="id" type="hidden" value="{{$data->id}}"/>

              @endforeach()

        </div>
    </div>

    <div class="modal-footer center" style="text-align:center !important">
            <button class="btn waves-effect waves-light login-botton" type="submit" name="action" style="float:none">
                                            Save info
            </button>
    </div>

    </form>

</div>



<script>

    $(document).ready(function(e){
          $('#hire-me-form').submit(function(e){

            $('#hire-me-modal').modal('close');

            e.preventDefault();

                var formData = $('#hire-me-form').serializeArray();
                console.log(formData);

                $.ajax({
                    type     : "POST",
                    url      : "/help_request",
                    data     : formData,
                    cache    : false,

                    success  : function(help_request_data) {

                        console.log(help_request_data);
                        // $("#uname").html(about_data.username);
                        // $("#occupation").html(about_data.occupation);
                        // $("#location").html(about_data.location);
                        // $("#working_location").html(about_data.working_location);
                        // $("#working_hours").html(about_data.working_hours);
                        // $("#mobile_no").html(about_data.mobile_no);

                    }
              });


          });

      });

</script>





<!--      HIRE ME MODAL ENDS HERE     -->
