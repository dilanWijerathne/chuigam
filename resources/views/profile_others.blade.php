@include('header')
@include('modals')


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

                  @foreach($user_data as $user)

                  <div class="user-name">{{$user->first_name}}&nbsp;{{$user->last_name}}</div>
                  <div class="user-occupation">{{$user->occupation}}</div>
                  <div class="user-location">{{$user->location}}</div>

                  <div class="divider"></div>

                  <div class="user-about">
                      {{$user->about}}
                  </div>

                  @endforeach

              </div>

          </div>

          <!--         USER SKILLS BLOCK WRAPPER           -->

          <div class="block" style="">

              @foreach($user_data as $user)

              <div class="block-heading">{{$user->first_name}}'s Skills</div>

              @endforeach

              <div class="divider"></div>

              <div class="skills-wrapper">
                  @foreach($skills_data as $s)
                          <?php $ss = explode(',',$s->skills); ?>

                          <?php for($i=0;$i<count($ss);$i++) {?>
                              <div class="skills">{{$ss[$i]}}</div>
                          <?php }?>
                  @endforeach()
              </div>

          </div>

          <!--         USER FEEDBACKS BLOCK WRAPPER           -->


          <div class="block" style="">

              <div class="block-heading">User Feedbacks</div>

              <div class="divider"></div>

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


      <div class="col-lg-4 right-column">

        <div class="block">

            <div class="block-heading">Suggestions</div>

            <div class="divider"></div>

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


    </div>

  </div>

</body>
