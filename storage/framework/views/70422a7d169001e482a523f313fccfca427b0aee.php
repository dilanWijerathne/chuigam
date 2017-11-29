<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>

    <div class="container">

        <div class="row">
            <div class="col s12 block">

                <div class="row">
                    <div class="col l12">

                        <div class="search-wrapper">
                            <div class="input-field col l4 s12">

                                <input placeholder="eg - Carpentar, Driver, Designer ..." id="search_job" type="text" class="validate">
                                <label>I'm looking for a</label>

                            </div>

                            <div class="input-field col l4 s12">

                              <input placeholder="eg - Dehiwala, Kolpity, Rajagiriya ..." id="search_location" type="text" class="validate">
                              <label>in</label>

                            </div>

                            <div class="input-field col l4 s12">

                                <label style="top:-10px !important">who can work</label>
                                <select id="search_working_hours">
                                    <option value="" disabled selected>eg - morning,afternoon ...</option>
                                    <option value="anytime">anytime</option>
                                    <option value="morning">morning</option>
                                    <option value="afternoon">afternoon</option>
                                    <option value="evening">evening</option>
                                </select>

                            </div>
                        </div>

                        <div class="col l12">
                            <div class="block-heading">You've got <span id="search_count"><?php echo e(count($user_data)); ?></span> helper(s)</div>
                        </div>

                        <div id="search-results-wrapper" class="search-results-wrapper col l12">

                            <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class=" col l6 s12">

                                <div class="results-block-wrapper">

                                    <div class="results-img">
                                        <img src="images/user.png">
                                    </div>

                                    <div class="results-details-wrapper">
                                        <div class="results-name"><a href="/<?php echo e($a->username); ?>"><?php echo e($a->username); ?></a></div>
                                        <div class="results-job"><?php echo e($a->occupation); ?></div>
                                        <div class="results-job"><?php echo e($a->working_location); ?></div>
                                        <div class="results-rating">Customer satisfaction - 66%</div>
                                    </div>

                                </div>

                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>



    <script>

      $(document).ready(function(){

        $('#search_job,#search_location').keyup(function(){

          var job = {occupation:$('#search_job').val(),working_location:$('#search_location').val(),working_hours:$('#search_working_hours').val()};

          $.ajax({
              type     : "POST",
              url      : "/search_query",
              data     : job,
              cache    : false,

              success  : function(search_result) {


                  var search_result_list = "";

                  for(i=0;i<search_result.length;i++){
                      console.log(search_result[i].username);
                      var search_result_list = search_result_list + '<div class=" col l6 s12"><div class="results-block-wrapper"><div class="results-img"><img src="images/user.png"></div><div class="results-details-wrapper"><div class="results-name"><a href="/'+search_result[i].username+'">'+search_result[i].username+'</a></div><div class="results-job">'+search_result[i].occupation+'</div><div class="results-job">'+search_result[i].working_location+'</div><div class="results-rating">Customer satisfaction - 66%</div></div></div></div>';
                  }



                $('#search-results-wrapper').html(search_result_list);
                $('#search_count').html(search_result.length);
                // console.log(search_result_list);

              }

              });
        });




        $('#search_working_hours').change(function(){

          var job = {occupation:$('#search_job').val(),working_location:$('#search_location').val(),working_hours:$('#search_working_hours').val()};

          $.ajax({
              type     : "POST",
              url      : "/search_query",
              data     : job,
              cache    : false,

              success  : function(search_result) {


                  var search_result_list = "";

                  for(i=0;i<search_result.length;i++){
                      console.log(search_result[i].username);
                      var search_result_list = search_result_list + '<div class=" col l6 s12"><div class="results-block-wrapper"><div class="results-img"><img src="images/user.png"></div><div class="results-details-wrapper"><div class="results-name"><a href="/'+search_result[i].username+'">'+search_result[i].username+'</a></div><div class="results-job">'+search_result[i].occupation+'</div><div class="results-job">'+search_result[i].working_location+'</div><div class="results-rating">Customer satisfaction - 66%</div></div></div></div>';
                  }



                $('#search-results-wrapper').html(search_result_list);
                $('#search_count').html(search_result.length);
                // console.log(search_result_list);

              }

              });
        });


      });

    </script>




</body>
