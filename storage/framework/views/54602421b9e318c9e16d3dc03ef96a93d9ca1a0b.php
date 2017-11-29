<nav class="secondary-bg">
    <div class="nav-wrapper">

        <a href="#" class="brand-logo center">HelpGaze</a>
        <a href="#" data-activates="slide-out" class="button-collapse" style="display:block "><i class="material-icons">menu</i></a>

        <div id="-btn" style="display:block;float:right;margin:0 18px; ">
            <a><i class="material-icons">settings</i></a>
        </div>
        <div id="notification-btn" style="display:block;float:right;margin:0 18px; ">
            <i class="material-icons">notifications</i>
            <?php if(count($request_data)>0): ?>
                <div id="notification-active" class="notification-active"><div><?php echo e(count($request_data)); ?></div></div>
            <?php endif; ?>
        </div>
        <div id="notification-btn" style="display:block;float:right;margin:0; height:55px">

        </div>
        <div id="-btn" style="display:block;float:right;margin:0 18px; ">
            <a href="/<?php echo e($user_data[0]->username); ?>"><i class="material-icons">perm_identity</i></a>
        </div>
        <div id="-btn" style="display:block;float:right;margin:0 18px; ">
            <a href="/search"><i class="material-icons">store</i></a>
        </div>



    </div>
</nav>

<ul id="slide-out" class="side-nav">

        <li><a class="waves-effect" href="#!"><i class="material-icons">store</i>Home</a></li>
        <li><a class="waves-effect" href="#!"><i class="material-icons">perm_identity</i>Profile</a></li>
        <li><a class="waves-effect" href="#!"><i class="material-icons">settings</i>Settings</a></li>
        <li><a class="waves-effect" href="#!"><i class="material-icons">input</i>Sign out</a></li>

</ul>

<div id="notifications-wrapper" class="notifications-wrapper z-depth-2" >

    <?php $__currentLoopData = $request_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $help): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div id="<?php echo e($help->help_id); ?>" class="row col l12 notifications-wrapper-list">
            <div class="col l3 s2 user-img">
                <img src="uploads/default.png">
            </div>
            <div class="col l9 s10">
                <span style="color:#00b0ff;font-weight:400"><?php echo e($help->first_name); ?></span> wants some help from you !
                <div  class="col l6 s6" style="padding-left:0"><button id="accept_<?php echo e($help->help_id); ?>" class="help-now-btn">Help !</button></div>
                <div  class="col l6 s6" style="padding-right:0"><button id="reject_<?php echo e($help->help_id); ?>" class="help-reject-btn">Delete</button></div>
            </div>
            <div class="col l12">

            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


<script>

  $(document).ready(function(){

      function load_notification(){

        $.ajax({
            type     : "POST",
            url      : "/load_notification",
            data     : {data:'notification'},
            cache    : false,

            success  : function(notification_data) {

                      var notification_html_data = "";

                      for(i=0;i<notification_data.length;i++){

                        notification_html_data += '<div class="row col l12 notifications-wrapper-list"><div class="col l3 s2 user-img"><img src="uploads/default.png"></div><div class="col l9 s10"><span style="color:#00b0ff;font-weight:400">'+ notification_data[i].seeker_uname +'</span> wants some help from you !<div class="col l6 s6" style="padding-left:0"><button class="help-now-btn">Help !</button></div><div class="col l6 s6" style="padding-right:0"><button class="help-reject-btn">Delete</button></div></div><div class="col l12"></div></div>'

                        var notification_count = notification_data.length

                        $('#notifications-wrapper').html(notification_html_data);
                        $('#notification-active').html('<div>'+notification_count+'</div>');

                        // var notificaton_id_list = notificaton_id_list + { help_id : +"'"+notification_data[i].help_id + "'" + "}" + "," + ;

                      }

                      // var help_id_req = [notificaton_id_list];
                      // console.log(help_id_req);

                  }
          });

      };

      setInterval(function(){
        load_notification();
        // console.log(window.console);
        // if(window.console || window.console.firebug) {
        // console.clear();
        // }
      },2000);

  });

</script>
