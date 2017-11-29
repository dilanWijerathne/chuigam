<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="container-wrapper">

  <div class="container body-container">

    <div class="row">

        <div class="col-lg-12 ">
            <div class="block" style="">
                
                <div class="col-lg-12 float_left search-page-search-wrapper">
                    
                    <input type="text" id="search_job" class="search-page-input-text float-left" placeholder="Search here for helpers..."/>
                
                    

                    <div class="select float-left" id="select-district">
                        <div class="input" id="select-district-input"></div>
                        <input type="hidden" value="0" id="selected-district-id"/>
                        <div class="select-options" id="select-district-options">
                          <ul id="search_districts">
                              <li id="0"><span>Choose a district</span></li>
                            <?php $__currentLoopData = $districts_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li id="<?php echo e($district->id); ?>">
                                <span><?php echo e($district->district); ?></span>
                              </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                          </ul>
                        </div>
                    </div>


                    <script>
                        $(document).ready(function(){

                            $('#search_job').on('keyup change autocomplete',function(){
                                var job = $('#search_job').val();
                                var district_id = $('#selected-district-id').val();
                                var city_id = $('#selected_city_id').val();
                                search(job,district_id,city_id);  
                            });

                            function search(job,district_id,city_id){
                                
                                  // console.log(job);
                                  // console.log(district_id);
                                  // console.log(city_id);

                                   $.ajax({
                                          type     : "POST",
                                          url      : "/search_helpers",
                                          data     : {'job' : job, 'district_id' : district_id, 'city_id' : city_id},
                                          cache    : false,

                                          success  : function(search_data) {
                                              
                                            var search_result = '';

                                            console.log(search_data);
                                   
                                              for(i=0;i<search_data.length;i++){
                                                var search_result = search_result + '<div class="search-page-results-profile-wrapper">'+

                                                      '<div class="search-page-results-profile-wrapper-inner">'+
                                                        
                                                          '<div class="search-page-results-image-wrapper">'+
                                                              '<img src="images/user.png">'+
                                                          '</div>'+  

                                                          '<div class="search-page-results-info-wrapper">'+
                                                              '<div class="search-page-results-info"><a href="'+search_data[i].username+'">'+search_data[i].first_name+' '+search_data[i].last_name+'</a></div>'+
                                                              '<div class="search-page-results-info-sub"><i class="material-icons">work</i>'+search_data[i].job +'</div>'+
                                                              '<div class="search-page-results-info-sub"><i class="material-icons">'+'location_on</i>Wellawatte, Colombo</div>'+
                                                          '</div>'+

                                                      '</div>'+

                                                    '</div>'
                                              }

                                              $('.search-page-results-wrapper').html(search_result);

                                              
                                          }
                                    });
                            }


                            $(function() {
                                
                                if ($('#select-district-options ul li').hasClass('selected')) {
                                  $('#select-district .input').text($('#select-district-options li.selected > span:first-child').text());
                                } else {
                                  $('#select-district .input').text($('#select-district-options li:first-child > span:first-child').text());
                                }
                                
                                $('#select-district').click(function() {
                                    
                                    $('#select-district-options').toggleClass('visible');

                                });

                                
                                $('#select-district-options li').click(function() {

                                    $('.selected').removeClass('selected');
                                    $(this).addClass('selected');
                                    $('#select-district .input').text($('#select-district-options li.selected > span:first-child').text());
                                    $('#select-district .input').val($(this).find('span:first-child').text());
                                    $('#selected-district-id').attr('value',$(this).attr('id'));

                                    var job = $('#search_job').val();
                                    var district_id = $('#selected-district-id').val();
                                    var city_id = $('#selected_city_id').val();
                                    search(job,district_id,city_id);  
                                  
                                     $.ajax({
                                          type     : "POST",
                                          url      : "/get_cities",
                                          data     : {'district_id' : district_id},
                                          cache    : false,

                                          success  : function(cities_data) {
                                              
                                              var city_option = '';

                                              for(i=0;i<cities_data.length;i++){
                                                var city_option = city_option + '<li id="'+cities_data[i].id+'" ><span>'+cities_data[i].city+'</span></li>'
                                              }

                                              $('#search_cities').html(city_option);


                                          }
                                    });

                                });

                            })

                        });
                    </script>


                    <div class="select float-left" id="select-city">
                        <div class="input" id="select-city-input"></div>
                        <input type="hidden" id="selected_city_id" value="0">
                        <div class="select-options" id="select-city-options">
                          <ul id="search_cities">

                              <li id="0">
                                <span>Choose a city</span>
                              </li>

                          </ul>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function(){



                            $(function() {
                                
                                if ($('#select-city-options li').hasClass('selected')) {
                                  $('#select-city .input').text($('#select-city-options li.selected > span:first-child').text());
                                } else {
                                  $('#select-city .input').text($('#select-city-options li:first-child > span:first-child').text());
                                }
                                
                                $('#select-city').click(function() {
                                  $('#select-city-options').toggleClass('visible');
                                });
                                
                                $('#search_cities li').on('click',function() {
                                  $('.selected').removeClass('selected');
                                  $(this).addClass('selected');
                                  $('#select-city .input').text($('#select-city-options li.selected > span:first-child').text());
                                  // $('#select-city .input').text($(this).find('span:first-child').text());
                                  $('#selected_city_id').attr('value',$(this).attr('value'));

                                  
                                });

                            })

                           

                        });

                       

                        jQuery(document).on('click', '#search_cities li', function(e){
                                  $('.selected').removeClass('selected');
                                  $(this).addClass('selected');
                                  $('#select-city .input').text($('#select-city-options li.selected > span:first-child').text());
                                  // $('#select-city .input').text($(this).find('span:first-child').text());
                                  $('#selected_city_id').attr('value',$(this).attr('id'));

                                  var job = $('#search_job').val();
                                  var district_id = $('#selected-district-id').val();
                                  var city_id = $('#selected_city_id').val();
                                  
                                  search(job,district_id,city_id);  



                                  function search(job,district_id,city_id){
                                
                                  // console.log(job);
                                  // console.log(district_id);
                                  // console.log(city_id);

                                         $.ajax({
                                                type     : "POST",
                                                url      : "/search_helpers",
                                                data     : {'job' : job, 'district_id' : district_id, 'city_id' : city_id},
                                                cache    : false,

                                                success  : function(search_data) {
                                                    
                                                  var search_result = '';

                                                  console.log(search_data);
                                         
                                                    for(i=0;i<search_data.length;i++){
                                                      var search_result = search_result + '<div class="search-page-results-profile-wrapper">'+

                                                            '<div class="search-page-results-profile-wrapper-inner">'+
                                                              
                                                                '<div class="search-page-results-image-wrapper">'+
                                                                    '<img src="images/user.png">'+
                                                                '</div>'+  

                                                                '<div class="search-page-results-info-wrapper">'+
                                                                    '<a href="'+search_data[i].username+'">'+
                                                                    '<div class="search-page-results-info">'+search_data[i].first_name+' '+search_data[i].last_name+'</div>'+
                                                                    '<div class="search-page-results-info-sub"><i class="material-icons">work</i>'+search_data[i].job +'</div>'+
                                                                    '<div class="search-page-results-info-sub"><i class="material-icons">'+'location_on</i>Wellawatte, Colombo</div>'+
                                                                '</div>'+

                                                            '</div>'+

                                                          '</div>'
                                                    }

                                                    $('.search-page-results-wrapper').html(search_result);

                                                    
                                                }
                                          });
                                  }
                        });

                    </script>

                    

                </div>

                <script>
                  
                    $(document).ready(function(){
                        $('#search_districts').change(function(){
                          
                           
                        });
                    });

                </script>


                <div class="col-lg-4">
                    

                </div>

            </div>
        </div>

    </div>


    <div class="row">
      
        <div class="col-lg-12 ">
            <div class="block" style="">
            
                <div class="search-page-results-wrapper">

                  <?php $__currentLoopData = $helpers_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $helper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                    <div class="search-page-results-profile-wrapper">

                      <div class="search-page-results-profile-wrapper-inner">
                        
                          <div class="search-page-results-image-wrapper">
                              <img src="images/user.png">
                          </div>  

                          <div class="search-page-results-info-wrapper">
                              <div class="search-page-results-info"><a href="<?php echo e($helper->username); ?>"><?php echo e($helper->first_name.' '.$helper->last_name); ?></a></div>
                              <div class="search-page-results-info-sub"><i class="material-icons">work</i><?php echo e($helper->job); ?></div>
                              <div class="search-page-results-info-sub"><i class="material-icons">location_on</i><?php echo e($helper->city); ?>, <?php echo e($helper->district); ?></div>
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