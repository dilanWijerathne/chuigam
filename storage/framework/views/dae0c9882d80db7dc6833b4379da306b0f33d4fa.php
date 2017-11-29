<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<style>
	.menu{
		display:none !Important;
	}
</style>

<div class="container-wrapper">

  <div class="container body-container">
  	
  	<div class="register-wrapper">
  			<div class="col-lg-12 text-center">
  				<h5 style="margin-bottom: 20px;">Don't have an account? Signup</h5>
  			</div>

  		<?php echo e(Form::open(['url' => 'signup', 'method' => 'post'])); ?>


  			<div class="form-group col-md-6 no-padding-right">
                <input type="text" class="form-control" name="fname" placeholder="First name">
            </div>

            <div class="form-group col-md-6 no-padding-right">
                <input type="text" class="form-control" name="lname" placeholder="Last name">
            </div>

            <div class="form-group col-md-6 no-padding-right">
                <input type="text" class="form-control" name="uname" placeholder="Username">
            </div>

            <div class="form-group col-md-6 no-padding-right">
                <input type="email" class="form-control" name="email" placeholder="E-mail">
            </div>

            <div class="form-group col-md-6 no-padding-right">
                <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>

            <div class="form-group col-md-6 no-padding-right">
                <input type="password" class="form-control" name="pass_confirm" placeholder="Re-enter password">
            </div>

            <div class="form-group col-md-6 no-padding-right">
                <input type="text" id="search_job" class="form-control" name="occupation" placeholder="Occupation">
            </div>

            <div class="form-group col-md-6 no-padding-right">
                <input type="text" class="form-control" name="contact_no" placeholder="Contact number">
            </div>

            <div class="form-group col-md-6 no-padding-right">
                <div class="select float-left" id="select-district" style="width:100%">
                    <div class="input" id="select-district-input" style="border-left:1px solid #ddd"></div>
                    <input type="hidden" value="0" id="selected-district-id" name="selected_district"/>
                    <div class="select-options" id="select-district-options" >
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
            </div>

            <div class="form-group col-md-6 no-padding-right">
                <div class="select float-left" id="select-city" style="width:100%">
                    <div class="input" id="select-city-input" style="border-left:1px solid #ddd"></div>
                    <input type="hidden" id="selected_city_id" name="selected_city" value="0">
                    <div class="select-options" id="select-city-options">
                    <ul id="search_cities">
                        <li id="0">
                            <span>Choose a city</span>
                    	</li>
                    </ul>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-12 text-center">
            	<button class="home-signup-btn">Signup</button>
            </div>
            
       	<?php echo e(Form::close()); ?>

  	</div>
  	
  </div>
  
</div>  	


<script>
            $(document).ready(function(){



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
                 
                        });

</script>