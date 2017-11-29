<html >

<head>
  <link rel="shorcut icon" href="images/logo.png" />
  <title>HelpGaze</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="csrf-token" content="<?php echo csrf_token() ?>">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/tags.css">
  <link rel="stylesheet" href="css/tags-typehead.css">
  <link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
  

  <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src="js/tags.js" ></script>
  <script src="jquery-ui/jquery-ui.min.js" ></script>
  
  






  <script>


    $(document).ready(function(){
      $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }

        });
      });

        $('#edit-profile-info-button').click(function(){
            $('#edit-profile-info-wrapper').toggle();
        });

        $('.notification-wrapper').click(function(){
            $('.notification-list-wrapper').toggle();
        });

        // $( "#search-input-top-menu" ).focus(function() {
        //     $('.search-results-list-wrapper').show();
        // });

        $( ".container-wrapper" ).click(function() {
            $('.search-results-list-wrapper').hide();
            $('.notification-list-wrapper').hide();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



    });
  </script>

</head>

<body>

  <nav>
    <div class="container">
        <div class="logo"><!-- <img src="images/logo.png"> -->HelpGaze</div>

        <!-- <div class="search-wrapper">
            <input id="search-input-top-menu" type="text" placeholder="Search for helpers..."/>
            <div id="search-results-list-wrapper" class="search-results-list-wrapper">

                <div class="search-results-list">
                    <div class="user-image"><img src="images/user.png"></div>
                    <div class="user-results">
                        <div class="user-name">Vigneshan Seshamany</div>
                        <div class="user-occupation">Web Developer</div>
                    </div>
                </div>

            </div>
        </div> -->

        @if(session()->has('uname'))

        <div class="notification-list-wrapper">

          <?php if(Session::get('uname')!=""){?>

            @foreach($notification_data as $notification)

              <div class="notification-list">
                  <div class="user-image"><img src="images/user.png"></div>
                  <div class="user-notification">
                      <span class="user-name">{{$notification->seeker_name}}</span> wants some help from you !
                      <span class="notification-date-time">12 June 2017 , 2:15 pm</span>
                  </div>
                  <div class="notification-delete">
                      <i class="material-icons delete">close</i>
                  </div>
              </div>

            @endforeach

          <?php } ?>

        </div>

        <div class="menu">
            <a href="/logout">
              <div class="menu-icon"><i class="material-icons">assignment_return</i></div>
              <div class="menu-label">Logout</div>
            </a>  
        </div>

        <div class="menu notification-wrapper">
            <div class="menu-icon"><i class="material-icons">notifications</i></div>
            <div class="menu-label">Notifications</div>
            <?php if(Session::get('uname')!=""){?>
                <?php if(count($notification_data)+1) {?>
                    <div class="notification-count-wrapper"></div>
                <?php } ?> 
            <?php } ?>
        </div>


        <div class="menu">
            <a href="/{{Session::get('uname')}}">
              <div class="menu-icon"><i class="material-icons">perm_identity</i></div>
              <div class="menu-label">Profile</div>
            </a>
        </div>

        <div class="menu">
            <a href="/searchPage">
              <div class="menu-icon"><i class="material-icons">home</i></div>
              <div class="menu-label">Home</div>
            </a>  
        </div>

        @else

        <div class="login-form-wrapper">
            {{ Form::open(['url' => 'process', 'method' => 'post']) }}

              <div class="form-group col-md-5 no-padding-right">
                <input type="text" class="form-control" name="uname" placeholder="username">
              </div>
              <div class="form-group col-md-5 no-padding-right">
                <input type="password" class="form-control" name="pass" placeholder="password">
              </div>
              <div class="form-group col-md-2">
                <button class="home-login-btn">Login</button>
              </div>

            {{ Form::close() }}
        </div>

        

        @endif


    </div>
  </nav>


  <script>

  $.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });

    $(document).ready(function(){

        $(function(){
            $( "#search_job" ).autocomplete({
              source: 'http://127.0.0.1:8000/search/jobs'
            });
        });


        function load_notification(){

          $.ajax({
              type     : "POST",
              url      : "/load_notification",
              data     : {data:'notification'},
              cache    : false,

              success  : function(notification_data) {
                        console.log(notification_data);
                        var notification_html_data = "";

                        for(i=0;i<notification_data.length;i++){

                          notification_html_data += '<div class="notification-list"><div class="user-image"><img src="images/user.png"></div><div class="user-notification"><span class="user-name">'+notification_data[i].first_name+' '+notification_data[i].last_name+'</span> wants some help from you !<span class="notification-date-time">12 June 2017 , 2:15 pm</span></div><div class="notification-delete"><i class="material-icons delete">close</i></div></div>';

                          var notification_count = notification_data.length;

                          $('.notification-list-wrapper').html(notification_html_data);
                          //$('.notification-count-wrapper').html('<div>'+notification_count+'</div>');

                          // var notificaton_id_list = notificaton_id_list + { help_id : +"'"+notification_data[i].help_id + "'" + "}" + "," + ;

                        }

                        // var help_id_req = [notificaton_id_list];
                        // console.log(help_id_req);

                    }
            });

        };

        setInterval(function(){
          //load_notification();
          // console.log(window.console);
          // if(window.console || window.console.firebug) {
          // console.clear();
          // }
        },1000);



    });

  </script>



  <script>

    $(document).ready(function(){

      $('#search-input-top-menu').keyup(function(e){

        //alert('das');

        var data = {search_data:$('#search-input-top-menu').val()};


            if (e.which === 40) {
                results_length = $('#search-results-list-wrapper > .search-results-list').length;
                i = 0;
                // console.log(results_length);
                // while(i<=results_length){
                //   $('.search-results-list').eq( i ).css('background-color','#000');
                //   i++;
                // }
            }else{

                  $.ajax({
                      type     : "POST",
                      url      : "/search_query",
                      data     : data,
                      cache    : false,

                      success  : function(search_result) {

                          

                          $('.search-results-list-wrapper').show();

                          var search_result_list = "";

                          for(i=0;i<search_result.length;i++){

                              if(search_result[i].error == 'true'){
                                var search_result_list = '<div style="color:#777;font-size:13px;padding:10px;">No Helpers found</div>';
                              }
                              else{
                                var search_result_list = search_result_list + '<a href="/'+search_result[i].username+'"><div class="search-results-list"><div class="user-image"><img src="images/user.png"></div><div class="user-results"><div class="user-name">'+search_result[i].first_name+' '+search_result[i].last_name+'</div><div class="user-occupation">'+search_result[i].occupation+'</div></div></div></a>';
                              }

                          }



                        $('#search-results-list-wrapper').html(search_result_list);
                        //$('#search_count').html(search_result.length);
                        // console.log(search_result_list);

                      }

                      });

                }


      });



    });

  </script>
