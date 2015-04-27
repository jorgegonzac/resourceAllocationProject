<!DOCTYPE HTML>
<html>
    <head>
        <!--@include('includes.head')-->
        {{ HTML::style('css/style_login.css')}}
    </head>

    <body>
        <div class="container-login">
            
                <div class="login">
                        <div class="header">
                        <a class="logo-tec"><img src="images\secundario.jpg" style="width:340px;height:200px;"/></a>

                    </div>
                    <div class="sep"></div>

                    {{ Form::open(['route' => 'sessions.store']) }}

                    <div class="inputs">
                        {{ Form::label('school_id', 'Matricula:') }}
                        
                        {{ Form::text('school_id', '', array('placeholder' => 'A00123456','maxlength' => 9)) }}
                    </div> 

                    <div class="errors">
                        {{ $errors->first('school_id', '<div class=school_id_error>:message</div>') }}
                    </div>

                    <div class="inputs">                                  
                        {{ Form::label('password', 'Contraseña:')}}
                        
                        {{ Form::password('password', array('placeholder' => '************')) }}                       

                    </div>                           

                    <div class="errors">                 

                        {{ $errors->first('password', '<div class=password_error>:message</div>') }}

                        @if($errors->any)
                        {{ $errors->first('failed_login', '<div class=failed_login>:message</div>') }}
                        @endif
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success btn-login-submit" value="Login" />                        
                    </div>

                    <!--<div >{{ Form::submit('Login',  array('class' => 'btn'))}}
                        {{ Form::button('Cancelar', array('class' => 'btn')) }}
                    </div>-->

                    {{ Form::close() }}
                </div>
        </div>
        
        <footer class="row">
            
        </footer>
    </body>
</html>

