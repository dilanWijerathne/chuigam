@include('header')
@include('modals')


<body>

    <div class="container">

        <div class="row">
            <div class="col s12">
                <div class="row">

                    <div class="col l4 push-l8 m4 push-m8 s12 ">

                        @foreach($user_data as $a)

                        <div class="block profile-wrapper">

                            <div class="user-img-profile">
                                <img id="profile_image_display" src="uploads/{{$a->profile_image}}">

                            </div>

                            <div class="user-info-profile">





                                <table class="user-info-profile-table">

                                    <tr>
                                        <th class="user-name-profile" colspan="2" id="uname">{{$a->username}}</th>
                                    </tr>
                                    <tr>
                                        <th class="user-job-profile" colspan="2" id="occupation">{{$a->occupation}}</th>
                                    </tr>

                                </table>

                                <div class="divider"></div>


                                <table class="user-info-profile-table">
                                    <tr>
                                        <th style="width:15%"><i class="material-icons">room</i></th>
                                        <th class="td-info" id="location">{{$a->location}}</th>
                                    </tr>
                                    <tr>
                                        <th style="width:15%"><i class="material-icons">schedule</i></th>
                                        <th class="td-info" id="working_hours">{{$a->working_hours}}</th>
                                    </tr>
                                    <tr>
                                        <th style="width:15%"><i class="material-icons">navigation</i></th>
                                        <th class="td-info" id="working_location">{{$a->working_location}}</th>
                                    </tr>
                                    <tr>
                                        <th style="width:15%"><i class="material-icons">stay_current_portrait</i></th>
                                        <th class="td-info" id="mobile_no">{{$a->mobile_no}}</th>
                                    </tr>
                                </table>



                            </div>


                            <div class="hire-button-profile">
                                <a  data-toggle="modal" data-target="#hire-me-modal">    Hire Me !</a>
                            </div>


                        </div>

                        @endforeach

                    </div>


                    <div class="col l9 pull-l1 pull-m1 m9 s12" >

                        <div class="block" style="">

                            <div class="col l12">
                                <div class="block-heading">
                                    <?php $count=0; ?>
                                    @foreach($skills_data as $s)
                                        <?php
                                            $ss = explode(',',$s->skills);

                                            for($i=0;$i<count($ss)-1;$i++) {
                                                $count = $count + 1;
                                          }?>
                                      @endforeach()
                                    My skills (<span id="skills_count">{{$count}}</span>)
                                </div>



                                <div id="skills-wrapper" class="skills-wrapper">
                                    @foreach($skills_data as $s)
                                            <?php $ss = explode(',',$s->skills); ?>

                                            <?php for($i=0;$i<count($ss)-1;$i++) {?>
                                                <div class="skill-chips">{{$ss[$i]}}</div>
                                            <?php }?>
                                    @endforeach()
                                </div>
                            </div>
                        </div>

                        <div class="block" style="">

                            <div class="col l12">

                                <div class="block-heading">
                                    About me
                                </div>

                            </div>

                            @foreach($user_data as $a)

                            <div class="col l12">
                                <div class="about" id="about">
                                    {{$a->about}}
                                </div>
                            </div>

                            @endforeach()

                        </div>

                        <div class="block" style="">

                            <div class="col l12">
                                <div class="block-heading">
                                    Feedbacks
                                </div>
                                <div class="rate_row">
                                  <span class="rate_star" data-value="1"></span>
                                  <span class="rate_star" data-value="2"></span>
                                  <span class="rate_star" data-value="3"></span>
                                  <span class="rate_star" data-value="4"></span>
                                  <span class="rate_star" data-value="5"></span>
                                  <input type="hidden" class="get_star" value="">
                                </div>
                            </div>

                            <div class="feedback-textarea">


                                <form method="post" action="/feedback" id="feedback_form">
                                     {{ csrf_field() }}

                                    @foreach($user_data as $b)
                                        <input type="hidden" id="feed_uname" value="{{$b->username}}" name="uname" />
                                        <input type="hidden" id="feed_id" value="{{$b->id}}" name="id" />
                                    @endforeach()


                                    <div class="input-field col s12">
                                        <textarea  name="feedback" id="feedback-profile" class="materialize-textarea"></textarea>
                                        <label for="feedback-profile">Your feedback</label>
                                        <button class="btn waves-effect waves-light site-button" id="feedback_submit" type="button" name="action">
                                                    Submit feedbacks
                                        </button>
                                    </div>

                                </form>

                                <script>
                                  $(document).ready(function(e){
                                      $('#feedback_submit').click(function(e){
                                          //alert('dddd');
                                        //e.preventDefault();

                                            var formData = {
                                                _token    : "{{ csrf_token() }}",
                                                getter_id     : $('#feed_id').val(),
                                                getter_uname    : $('#feed_uname').val(),
                                                feedback : $('#feedback-profile').val()
                                            }

                                            $.ajax({
                                                type     : "post",
                                                url      : "/feedback",
                                                data     : formData,
                                                cache    : false,

                                                success  : function(feed_data) {
                                                    console.log(feed_data);

                                                    var f = $(
                                                      '<div class="feedback-list-wrapper">'+

                                                        '<div class="feedback-user-img col s2">'+
                                                            '<img src="images/user.png">'+
                                                        '</div>'+
                                                        '<div class="feedback-comment col s10">'+
                                                            '<div class="feedback-comment-username">'+
                                                              feed_data.giver_uname+
                                                            '</div>'+
                                                            '<div class="feedback-comment-ratings">'+
                                                                        '<i class="material-icons rating-light">star</i>'+
                                                            '</div>'+
                                                            '<div class="feedback-comment-value">'+
                                                                feed_data.feedback+
                                                            '</div>'+
                                                            '<div class="feedback-comment-time ">'+
                                                              feed_data.date+
                                                            '</div>'+
                                                        '</div>'+

                                                    '</div>');


                                                    $('#feedback_list').prepend(f);
                                                }
                                          });


                                      });
                                    });


                                </script>

                            </div>


                            <div class="col l12">
                                <div class="block-heading">
                                    Customer Satisfaction - 60%
                                </div>
                            </div>

                            <div id="feedback_list">

                            @foreach($feedback_data as $feed)

                            <div class="feedback-list-wrapper">

                                <div class="feedback-user-img col s2">
                                    <img src="images/user.png">
                                </div>
                                <div class="feedback-comment col s10">
                                    <div class="feedback-comment-username">
                                      {{$feed->giver_uname}}
                                    </div>
                                    <div class="feedback-comment-ratings">
                                        <?php
                                            $y=1;
                                            $x=3;

                                            if($x<=5){
                                                while($y<=$x){
                                                    echo '<i class="material-icons rating-dark">star</i>';
                                                    $y++;
                                                }
                                                while($y<=5){
                                                    echo'<i class="material-icons rating-light">star</i>';
                                                    $y++;
                                                }
                                            }

                                            $y=0;
                                        ?>
                                    </div>
                                    <div class="feedback-comment-value">
                                        {{$feed->feedback}}
                                    </div>
                                    <div class="feedback-comment-time ">
                                      {{$feed->date}}
                                    </div>
                                </div>

                            </div>
                            @endforeach

                            </div>

                        </div>

                    </div>

                </div>


            </div>
        </div>

    </div>

</body>
