@include('header')

<body class="body-home">



    <div class="container-wrapper body-container" style=""> 

       <div class="home-card"> 
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="home" aria-selected="true">Signin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="profile" aria-selected="false">Signup</a>
          </li>
        
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="home-tab">
              {{ Form::open(['url' => 'process', 'method' => 'post']) }}

<!--                                        {{ csrf_field() }}-->

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

                                    {{ Form::close() }}
          </div>
          <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="profile-tab">
                {{ Form::open(['url' => 'signup', 'method' => 'post']) }}


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

                                    {{ Form::close() }}
          </div>
          
        </div>
        
                

        
    </div>

</body>
