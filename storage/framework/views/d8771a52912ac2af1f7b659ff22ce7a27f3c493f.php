<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    
    <div class="container">
        
        <div class="row">
            <div class="col s12">
                <div class="row">
                
                    <div class="col l4 push-l8 m4 push-m8 s12 ">
                        
                        <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <div class="block profile-wrapper">

                            <div class="user-img-profile">
                                <img src="images/user.png">
                            </div>    

                            <div class="user-info-profile">
                               
                                
                                
                                <div class="edit-button" >
                                    <a href="#user-profile-edit-modal"><i class="material-icons" href="#modal1">mode_edit</i></a>
                                </div>
                                
                                <table class="user-info-profile-table">

                                    <tr>
                                        <th class="user-name-profile" colspan="2"><?php echo e($a->user_name); ?></th>
                                    </tr>
                                    <tr>
                                        <th class="user-job-profile" colspan="2"><?php echo e($a->occupation); ?></th>
                                    </tr>

                                </table>

                                <div class="divider"></div>
                                
                                <div class="edit-button personal-info" >
                                    <a href="#user-profile-info-edit-modal"><i class="material-icons" >mode_edit</i></a>
                                </div>
                                
                                <table class="user-info-profile-table">
                                    <tr>
                                        <th style="width:15%"><i class="material-icons">room</i></th>
                                        <th class="td-info"><?php echo e($a->location); ?></th>
                                    </tr>
                                    <tr>
                                        <th style="width:15%"><i class="material-icons">schedule</i></th>
                                        <th class="td-info"><?php echo e($a->working_hours); ?></th>
                                    </tr>
                                    <tr>
                                        <th style="width:15%"><i class="material-icons">navigation</i></th>
                                        <th class="td-info"><?php echo e($a->working_location); ?></th>
                                    </tr>
                                    <tr>
                                        <th style="width:15%"><i class="material-icons">stay_current_portrait</i></th>
                                        <th class="td-info"><?php echo e($a->mobile_no); ?></th>
                                    </tr>
                                </table>

                                

                            </div>
                            
                            
                            <div class="hire-button-profile">
                                <a  href="#hire-me-modal">    Hire Me !</a>
                            </div>
                            
                            
                        </div>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>


                    <div class="col l9 pull-l1 pull-m1 m9 s12" >

                        <div class="block" style="">

                            <div class="col l12">
                                <div class="block-heading">
                                    My skills (6)
                                </div>

                                <div class="skills-wrapper">
                                    <div class="skill-chips">Home electrical work</div>
                                    <div class="skill-chips">A/C Service</div>
                                    <div class="skill-chips">TV repair</div>
                                    <div class="skill-chips">Washing machine service</div>
                                    <div class="skill-chips">Wiring</div>
                                    <div class="skill-chips">Solar panel maintenance</div>
                                </div>
                            </div>    
                        </div>

                        <div class="block" style="">

                            <div class="col l12">
                                <div class="block-heading">
                                    About me
                                </div>
                                <div class="edit-button about-edit" >
                                    <a href="#user-profile-about-edit-modal"><i class="material-icons" >mode_edit</i></a>
                                </div>
                            </div>
                            
                            <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="col l12">
                                <div class="about">
                                    <?php echo e($a->about); ?>

                                </div>
                            </div>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                        <div class="block" style="">

                            <div class="col l12">
                                <div class="block-heading">
                                    Feedbacks
                                </div>            
                            </div>

                            <div class="feedback-textarea">
                                
                                <?php echo e(Form::open(['url' => 'feedback', 'method' => 'post'])); ?>

                                
                                <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" value="<?php echo e($a->id); ?>" name="id" />
                                    <input type="hidden" value="<?php echo e($a->user_name); ?>" name="uname" />
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                
                                <div class="input-field col s12">
                                    <textarea  name="feedback" id="feedback-profile" class="materialize-textarea"></textarea>
                                    <label for="feedback-profile">Your feedback</label>
                                    <button class="btn waves-effect waves-light site-button" type="submit" name="action">
                                                Submit feedback
                                    </button>
                                </div>
                                
                                <?php echo e(Form::close()); ?>

                                
                            </div>
                            
                            
                            <div class="col l12">
                                <div class="block-heading">
                                    Customer Satisfaction - 60%
                                </div>            
                            </div>
                            
                            <?php $__currentLoopData = $feedback_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="feedback-list-wrapper">
                                
                                
                                <div class="feedback-user-img col s2">
                                    <img src="images/user.png">
                                </div>
                                <div class="feedback-comment col s10">
                                    <div class="feedback-comment-username"><?php echo e($feed->giver_uname); ?> - </div>
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
                                    <div class="feedback-comment-value"><?php echo e($feed->feedback); ?></div>
                                    <div class="feedback-comment-time ">2:15 pm , 12 May 2017</div>
                                </div>
                                
                                
                                
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>

                    </div>

                </div>
                
                
            </div>
        </div>
    
    </div>
    
</body>