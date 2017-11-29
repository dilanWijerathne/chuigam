<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="body-home">



    <div class="row">
        <div class="col l4 offset-l4 s12 login-wrapper">
            <div class="card card-login">

                <div class="card-tabs">
                  <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a class="active" href="#signin">Sign in</a></li>
                    <li class="tab"><a href="#signup">Sign up</a></li>
                  </ul>
                </div>
                <div class="card-content " style="width:600px;margin:0 auto;margin-top:20px">

                    <div id="signin">

                        <div class="row">



                                    <?php echo e(Form::open(['url' => 'process', 'method' => 'post'])); ?>


<!--                                        <?php echo e(csrf_field()); ?>-->

                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input name="uname" id="icon_prefix" type="text" class="validate">
                                            <label for="icon_prefix">Username/Email</label>
                                        </div>

                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">lock_outline</i>
                                            <input name="pass" id="icon_telephone" type="password" class="validate">
                                            <label for="icon_telephone">Password</label>
                                        </div>

                                        <div class="col s6 left-align" style="font-size:12px;padding:15px 0 0 15px;">forgot password ?</div>

                                        <div class="col s6 right-align">
<!--                                            <button type="submit"  class="btn waves-effect waves-light login-botton" >Signin</button>-->
                                            <input type="submit"/>
                                        </div>


                                    <?php echo e(Form::close()); ?>



                        </div>

                    </div>

                    <div id="signup">

                        <div class="row">



                                <div class="row">

                                    <?php echo e(Form::open(['url' => 'signup', 'method' => 'post'])); ?>



                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">perm_identity</i>
                                        <input name="fname" id="icon_prefix" type="text" class="validate">
                                        <label for="icon_prefix">First name</label>
                                    </div>


                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">perm_identity</i>
                                        <input name="lname" id="icon_prefix" type="text" class="validate">
                                        <label for="icon_prefix">Last name</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">perm_identity</i>
                                        <input name="uname" id="icon_prefix" type="text" class="validate">
                                        <label for="icon_prefix">Username</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input name="email" id="icon_telephone" type="email" class="validate">
                                        <label for="icon_telephone">Email</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock_outline</i>
                                        <input name="pass" id="icon_telephone" type="password" class="validate">
                                        <label for="icon_telephone">Password</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock_outline</i>
                                        <input name="pass_confirm" id="icon_telephone" type="password" class="validate">
                                        <label for="icon_telephone">Re-enter password</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">perm_identity</i>
                                        <input name="occupation" id="icon_prefix" type="text" class="validate">
                                        <label for="icon_prefix">occupation</label>
                                    </div>

                                    <div class="input-field col s12" style="margin-bottom:20px">
                                        <div class="col s12" style="padding:0">
                                            <i class="material-icons prefix" style="margin-top:-25px;">assignment_ind</i>
                                            <select>
                                                <option value="seeker">Seeker</option>
                                                <option value="helper">Helper</option>
                                                <option value="both">Both</option>
                                            </select>

                                            <label style="top:-10px !important">I'm gonna be a</label>

                                        </div>
                                    </div>

                                    <div class="col s6 left-align" style="font-size:12px;padding:15px 0 0 15px;">forgot password ?</div>

                                    <div class="col s6 right-align">
                                        <button  class="btn waves-effect waves-light login-botton" type="submit" name="action">
                                            Sign up
                                        </button>
                                    </div>

                                    <?php echo e(Form::close()); ?>


                                </div>



                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
