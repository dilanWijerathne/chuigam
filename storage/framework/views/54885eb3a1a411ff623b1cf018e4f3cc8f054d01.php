<nav class="secondary-bg">
    <div class="nav-wrapper">
        
        <a href="#" class="brand-logo center">HelpGaze</a>
        
        
        
          <a href="#" data-activates="slide-out" class="button-collapse" style="display:block "><i class="material-icons">menu</i></a>
        
    </div>
</nav>

<ul id="slide-out" class="side-nav">
                        
        <li><a class="waves-effect" href="#!"><i class="material-icons">store</i>Home</a></li>
        <li><a class="waves-effect" href="#!"><i class="material-icons">perm_identity</i>Profile</a></li>
        <li><a class="waves-effect" href="#!"><i class="material-icons">settings</i>Settings</a></li>
        <li><a class="waves-effect" href="#!"><i class="material-icons">input</i>Sign out</a></li>
            
</ul>



<!--      USER PROFILE EDIT PERSONAL INFO MODAL STARTS HERE     -->

<div id="user-profile-edit-modal" class="modal" >
    <div class="modal-content">
        <div class="row">
            <div class="col s12 block-heading center">
                Edit your info
            </div>
        </div>
      
        
                                
                <div class="row">
                    
                    <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php echo e(Form::open(['url' => 'update', 'method' => 'post'])); ?>

                    
                    
                    
            <input type="hidden" name="occupation" value="<?php echo e($user_info->occupation); ?>" />
            <input type="hidden" name="location" value="<?php echo e($user_info->location); ?>" />
            <input type="hidden" name="working_hours" value="<?php echo e($user_info->working_hours); ?>" />
            <input type="hidden" name="working_location" value="<?php echo e($user_info->working_location); ?>" />
            <input type="hidden" name="mobile_no" value="<?php echo e($user_info->mobile_no); ?>" />
            <input type="hidden" name="about" value="<?php echo e($user_info->about); ?>" />
                            
                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">perm_identity</i>
                            
                            <input name="fname" id="icon_prefix" type="text" class="validate" value="<?php echo e($user_info->first_name); ?>">
                            
                            <label for="icon_prefix">First name</label>
                            
                        </div>
                    
                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">perm_identity</i>
                            
                            <input name="lname" id="icon_prefix" type="text" class="validate" value="<?php echo e($user_info->last_name); ?>">
                            
                            <label for="icon_prefix">Last name</label>
                            
                        </div>
                    
                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">perm_identity</i>
                            
                            <input name="uname" id="icon_prefix" type="text" class="validate" value="<?php echo e($user_info->user_name); ?>">
                            
                            <label for="icon_prefix">User name</label>
                            
                        </div>
                                    
                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">email</i>
                            <input name="email" id="icon_telephone" type="email" class="validate" value="<?php echo e($user_info->email); ?>">
                            <label for="icon_telephone">Email</label>
                        </div>
                                    
                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input name="pass" id="icon_telephone" type="password" class="validate" value="<?php echo e($user_info->pass); ?>">
                            <label for="icon_telephone">Password</label>
                        </div>
                                    
                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="icon_telephone" type="password" class="validate" >
                            <label for="icon_telephone">Re-enter password</label>
                        </div>
                    
                        <div class="input-field col l6 s12">
                            <i class="material-icons prefix">perm_identity</i>
                            <input name="occupation" id="icon_prefix" type="text" class="validate" value="<?php echo e($user_info->occupation); ?>">
                            <label for="icon_prefix">occupation</label>
                        </div>
                                    
                        <div class="input-field col l6 s12" style="margin-bottom:20px">
                            
                                <i class="material-icons prefix" style="margin-top:;">assignment_ind</i>
                            
                                <?php $type = $user_info->type ?>
                                <select name="type" value="<?php echo e($user_info->type); ?>">
                                    <option value="seeker" <?php if($type='employee'){echo 'selected';}?> >Seeker</option>
                                    <option value="helper" <?php if($type='employee'){echo 'selected';}?> >Helper</option>
                                    <option value="both" <?php if($type='employee'){echo 'selected';}?> >Both</option>
                                </select>
                                
                                <label style="top:-10px !important">I'm gonna be a</label>
                                
                            
                        </div>
                        
                    
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
                                
            
        
    </div>
    <div class="modal-footer center" style="text-align:center !important">
            <button class="btn waves-effect waves-light login-botton" type="submit" name="action" style="float:none">
                                            Save info
            </button>
    </div>
</div>
            
                    <?php echo e(Form::close()); ?>

<!--      USER PROFILE EDIT PERSONAL INFO MODAL ENDS HERE     -->







<!--      USER PROFILE EDIT OTHER PERSONAL INFO MODAL STARTS HERE     -->

<div id="user-profile-info-edit-modal" class="modal">
    <div class="modal-content">
        <div class="row">
            
            <?php echo e(Form::open(['url' => 'update', 'method' => 'post'])); ?>

            
            <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <input type="hidden" name="fname" value="<?php echo e($user_info->first_name); ?>" />
            <input type="hidden" name="lname" value="<?php echo e($user_info->last_name); ?>" />
            <input type="hidden" name="uname" value="<?php echo e($user_info->user_name); ?>" />
            <input type="hidden" name="email" value="<?php echo e($user_info->email); ?>" />
            <input type="hidden" name="type" value="<?php echo e($user_info->type); ?>" />
            <input type="hidden" name="pass" value="<?php echo e($user_info->pass); ?>" />
            <input type="hidden" name="occupation" value="<?php echo e($user_info->occupation); ?>" />
            <input type="hidden" name="about" value="<?php echo e($user_info->about); ?>" />
                            
            
            <div class="input-field col s12">
                <i class="material-icons prefix">perm_identity</i>
                <input name="location" id="icon_prefix" type="text" class="validate" value="<?php echo e($user_info->location); ?>">
                <label for="icon_prefix">Your location</label>
            </div>
            
            <div class="input-field col s12">
                <i class="material-icons prefix">schedule</i>
                
                <?php $hours = $user_info->working_hours ?>
                
                <select name="working_hours"  multiple>
                    <option value="morning" <?php if(str_contains($hours, 'morning')){echo 'selected';}?> >Morning</option>
                    <option value="afternoon" <?php if(str_contains($hours, 'afternoon')){echo 'selected';} ?> >Afternoon</option>
                    <option value="evening" <?php if(str_contains($hours, 'evening')){echo 'selected';}?> >Evening</option>
                </select>

                <label for="icon_prefix" style="top:-10px !important">Working hours</label>
                
            </div>
            
            <div class="input-field col s12">
                <i class="material-icons prefix">location_on</i>
                <input name="working_location" id="icon_prefix" type="text" class="validate" value="<?php echo e($user_info->working_location); ?>">
                <label for="icon_prefix">Working location</label>
            </div>
            
            <div class="input-field col s12">
                <i class="material-icons prefix">stay_current_portrait</i>
                <input name="mobile_no" id="icon_prefix" type="text" class="validate" value="<?php echo e($user_info->mobile_no); ?>">
                <label for="icon_prefix">Contact number</label>
            </div>
            
        </div>
    </div>  
        
    <div class="modal-footer center" style="text-align:center !important">
            <button class="btn waves-effect waves-light login-botton" type="submit" name="action" style="float:none">
                                            Save info
            </button>
    </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
        <?php echo e(Form::close()); ?>

</div>



<!--      USER PROFILE EDIT OTHER PERSONAL INFO MODAL ENDS HERE     -->


<div id="user-profile-about-edit-modal" class="modal">
    <div class="modal-content">
        <div class="row">
            
            <?php echo e(Form::open(['url' => 'update', 'method' => 'post'])); ?>

            
            <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <input type="hidden" name="fname" value="<?php echo e($user_info->first_name); ?>" />
            <input type="hidden" name="lname" value="<?php echo e($user_info->last_name); ?>" />
            <input type="hidden" name="uname" value="<?php echo e($user_info->user_name); ?>" />
            <input type="hidden" name="email" value="<?php echo e($user_info->email); ?>" />
            <input type="hidden" name="type" value="<?php echo e($user_info->type); ?>" />
            <input type="hidden" name="pass" value="<?php echo e($user_info->pass); ?>" />
            <input type="hidden" name="occupation" value="<?php echo e($user_info->occupation); ?>" />
            <input type="hidden" name="location" value="<?php echo e($user_info->location); ?>" />
            <input type="hidden" name="working_hours" value="<?php echo e($user_info->working_hours); ?>" />
            <input type="hidden" name="working_location" value="<?php echo e($user_info->working_location); ?>" />
            <input type="hidden" name="mobile_no" value="<?php echo e($user_info->mobile_no); ?>" />
            
            <div class="input-field col s12">
                <textarea name="about" id="textarea1" class="materialize-textarea" value="<?php echo e($user_info->about); ?>" data-length="100"></textarea>
                <label for="textarea1">About</label>
            </div>
            
        </div>
    </div>  
        
    <div class="modal-footer center" style="text-align:center !important">
            <button class="btn waves-effect waves-light login-botton" type="submit" name="action" style="float:none">
                                            Save info
            </button>
    </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
        <?php echo e(Form::close()); ?>

</div>



<!--      USER PROFILE EDIT ABOUT INFO MODAL STARTS HERE     -->









<!--      USER PROFILE EDIT ABOUT INFO MODAL ENDS HERE     -->





<!--      HIRE ME MODAL STARTS HERE     -->

<div id="hire-me-modal" class="modal">
    <div class="modal-content">
        <div class="row">
            
            <div class="input-field col s12">
                <i class="material-icons prefix">perm_identity</i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">What</label>
            </div>
            
            <div class="input-field col s12">
                <i class="material-icons prefix">perm_contact_calendar</i>
                <input type="date" class="datepicker">
                <label for="icon_prefix">When</label>
            </div>
            
            <div class="input-field col s12">
                <i class="material-icons prefix">location_on</i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Where</label>
            </div>
            
        </div>
    </div>  
        
    <div class="modal-footer center" style="text-align:center !important">
            <button class="btn waves-effect waves-light login-botton" type="submit" name="action" style="float:none">
                                            Save info
            </button>
    </div>
</div>

<!--      HIRE ME MODAL ENDS HERE     -->