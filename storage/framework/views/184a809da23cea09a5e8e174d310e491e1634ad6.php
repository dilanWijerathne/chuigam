<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    
    <div class="container">
        
        <div class="row">
            <div class="col s12 block">
                
                <div class="row">
                    <div class="col l12">
                        
                        <div class="search-wrapper">
                            <div class="input-field col l6 s12">

                                <input placeholder="eg - Carpentar, Driver, Designer ..." id="first_name" type="text" class="validate">
                                <label>I'm looking for a</label>

                            </div>

                            <div class="input-field col l3 s12">

                                <label style="top:-10px !important">near</label>
                                <select>
                                    <option value="1">My location</option>
                                    <option value="2">Wellawatte</option>
                                    <option value="3">Bambalapitiya</option>
                                </select>

                            </div>

                            <div class="input-field col l3 s12">

                                <label style="top:-10px !important">who can work</label>
                                <select>
                                    <option value="1">anytime</option>
                                    <option value="2">Mornings</option>
                                    <option value="3">Afternoon</option>
                                    <option value="3">Evening</option>
                                </select>

                            </div>
                        </div>
                        
                        <div class="col l12">
                            <div class="block-heading">You've got 20 helpers</div>
                        </div>
                        
                        <div class="search-results-wrapper col l12">
                            
                            <?php
                                    $y=1;
                                    $x=20;
                                        
                                    if($x<=20){
                                            while($y<=$x){
                                                
                            ?>
                            <div class=" col l6 s12">
                                
                                <div class="results-block-wrapper">
                                
                                    <div class="results-img">
                                        <img src="images/user.png">
                                    </div>

                                    <div class="results-details-wrapper">
                                        <div class="results-name"><?php echo e(session()->get('uname')); ?></div>
                                        <div class="results-job">Carpenter</div>
                                        <div class="results-job">Rajagiriya</div>
                                        <div class="results-rating">Customer satisfaction - 66%</div>
                                    </div>

                                </div>
                                
                            </div>
                            
                            <?php
                            
                                                $y++;
                            
                                            }
                                    }
                                ?>
                            
                        </div>
                        
                    </div>    
                </div>
                
            </div>
        </div>
    
    </div>
    
</body>