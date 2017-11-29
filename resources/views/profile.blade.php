@include('header')
@include('modals')

<div class="container-wrapper">

  <div class="container body-container">

    <div class="row">

      <div class="col-lg-8 left-column"> <!-- LEFT COLUMN -->

        <!--         USER INFO BLOCK WRAPPER           -->

          <div class="block" style="">

              @foreach($user_data as $a)

                @if($a->username == session()->get('uname'))
                  
                  <div id="" class="edit-button-profile">

                    <div id="edit-profile-info-wrapper" class="edit-option-wrapper">
                        <div class="menu-list" data-toggle="modal" data-target="#edit-profile-info-modal">Edit profile picture</div>
                        <div class="menu-list">Edit Basic info</div>
                    </div>

                    <i id="edit-profile-info-button" class="material-icons">more_vert</i>

                  </div>

                @else

                  <div class="hire-me-button" data-toggle="modal" data-target="#hire-me-modal">Hire Me !</div>

                @endif  

              <div class="user-image-profile">
                  <img src="images/user.png">
              </div>

              <div class="user-info-wrapper">

                  <div class="user-name" id="user-full-name">{{$a->first_name}}&nbsp;{{$a->last_name}}</div>
                  <div class="user-occupation" id="user-occupation">{{$a->occupation}}</div>
                  <div class="user-location" id="user-location">{{$a->location}}</div>

                  <div class="divider"></div>

                  <div class="user-about" id="user-about">
                      {{$a->about}}
                  </div>

              </div>

              @endforeach

          </div>



          <!--         USER SKILLS BLOCK WRAPPER           -->

          <div class="inner-left-column">

          <div class="block" style="">

            @foreach($user_data as $a)

              @if($a->username == session()->get('uname'))
                <div class="edit-button"><i class="material-icons" data-toggle="modal" data-target="#edit-skills-modal">mode_edit</i></div>
              @endif

            @endforeach
              
            @foreach($user_data as $a)  
              <div class="block-heading">{{$a->first_name}}'s Skills</div>
            @endforeach  

              <div class="skills-wrapper" id="skills-wrapper">
                
                @if($skills_data == '')
                  no skills found
                @else
                  @foreach($skills_data as $s)

                        @if($s->skills == '')
                          no skills found
                        @else

                          <?php $ss = explode(',',$s->skills); ?>

                          <?php for($i=0;$i<count($ss);$i++) {?>
                              <div class="skills">{{$ss[$i]}}</div>
                          <?php }?>

                        @endif()  
                  @endforeach()
                @endif()  

              </div>

          </div>

          <!--         USER FEEDBACKS BLOCK WRAPPER           -->


          <div class="block" style="">

              <div class="block-heading">User Feedbacks</div>

              <form action="/feedback" method="post" id="feedback_form">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

                  @foreach($user_data as $b)
                      <input type="hidden" id="feed_uname" value="{{$b->username}}" name="uname" />
                      <input type="hidden" id="feed_id" value="{{$b->id}}" name="getter_id" />
                  @endforeach()

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

                @foreach($feedback_data as $feed_data)

                  <div class="feedback-wrapper">
                      <div class="feedback-user-image"><img src="images/user.png"></div>
                      <div class="feedback-user-feedback">
                          <a href="/{{$feed_data->username}}">{{$feed_data->first_name.' '.$feed_data->last_name}}</a>
                          <div class="feedback-user-feedback-value">{{$feed_data->feedback}}</div>
                          <div class="feedback-user-feedback-date">12th June 2017</div>
                      </div>
                  </div>

                @endforeach

              </div>

          </div>

          </div>


          <div class="inner-right-column">
    
        
          <div class="block">

              <div class="block-heading">About me</div>

              <div class="user-info-wrapper">

                  @foreach($user_data as $a)

                    <div class="user-about" id="user-about">
                        {{$a->about}}
                    </div>

                  @endforeach

              </div>


          </div>

          <div class="block">

              <div class="block-heading">About my work</div>

              <div class="user-info-wrapper">

                  @foreach($user_data as $a)

                    <div class="user-about" id="user-about">
                        {{$a->about}}
                    </div>

                  @endforeach

              </div>

          </div>              

      </div>

      </div>



      <div class="col-lg-4 right-column">  <!-- RIGHT COLUMN -->
        <div class="sticky-wrapper">

          <div class="block">

              <div class="block-heading">New requests</div>

              @if($request_data != 'null')

                @foreach($request_data as $help_data)

                  <div style="float:left;width:100%" id="{{$help_data->help_id}}" class="request_wrapper" data-toggle="modal" data-target="#request-details-modal">

                    <div class="suggestions-wrapper">
                        <div class="suggestions-user-image"><img src="images/user.png"></div>
                        <div class="suggestions-user-info-wrapper">
                            <div class="suggestions-user-info-name">{{$help_data->first_name}}&nbsp;{{$help_data->last_name}}</div><br>
                            <div class="suggestions-user-info-occupation">{{$help_data->help}}</div>
                        </div>
                    </div>

                  </div>

                @endforeach  

                @else

                  <div class="col-xs-12 text-center">No new requests...</div>

              @endif

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

              @foreach($request_pending_data as $help_pending_data)

              <div style="float:left;width:100%" id="{{$help_pending_data->help_id}}" class="request_wrapper" data-toggle="modal" data-target="#request-details-modal">

                <div class="suggestions-wrapper">
                    <div class="suggestions-user-image"><img src="images/user.png"></div>
                    <div class="suggestions-user-info-wrapper">
                        <div class="suggestions-user-info-name">{{$help_pending_data->first_name}}&nbsp;{{$help_pending_data->last_name}}</div><br>
                        <div class="suggestions-user-info-occupation">{{$help_pending_data->help}}</div>
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

              @endforeach


          </div>  




          <div class="block">

              <div class="block-heading">Suggestions</div>

              @foreach($suggestions_data as $suggest)

                <a href="/{{$suggest->username}}">
                  <div class="suggestions-wrapper">
                      <div class="suggestions-user-image"><img src="images/user.png"></div>
                      <div class="suggestions-user-info-wrapper">
                          <div class="suggestions-user-info-name">{{$suggest->first_name}}&nbsp;{{$suggest->last_name}}</div><br>
                          <div class="suggestions-user-info-occupation">{{$suggest->occupation}}</div>
                      </div>
                  </div>
                </a>

              @endforeach


          </div>
         </div> 
      </div> <!-- RIGHT COLUMN -->


    </div>

  </div>

</div>

</body>
