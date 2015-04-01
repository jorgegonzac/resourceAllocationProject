@extends('layouts.bookinglayout')
@section('content')
<style>

h3{

    color:black;
   
}


.form_booking{

    vertical-align: center;
    width: 800px;
    margin:0 auto;

}

.timetable
{
    width:300px;
    vertical-align: center;
    margin: 0 auto;
    padding: 20px;

}

th{

    text-align: center;
    font-size: large;
}

td{

    text-align: justify;
}

</style>


<div class="content_booking">
    <!-- jumbotron with resource information -->
    <div class="jumbotron">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">

                <h1 align="center">Resource Name</h1>
                <p align="center">Category</p>
                <p align="center">Description</p>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                
                <img src="images/martilloroto.jpg" style="width:500px;height:437px"/>

            </div>
        </div> 
    </div>

    <!-- end of jumbotron with resource information -->
    
      

    <div class="form_booking">
        <div class="panel">
            <div class="panel-body">
                {{Form::open()}}

                <div class="row">

                    <div class="col-md-6" >        

                          <h3 id= "type" align="center">1. Selecciona día que deseas apartarlo...</h3>

                            <div class="funkyradio" align="center" >


                               
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio1" checked>
                                        <label for="radio1">Lunes</label>
                                    </div>
                       

                               
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio2" />
                                        <label for="radio2">Martes</label>
                                    </div>
                              

                               
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio3" />
                                        <label for="radio3">Miércoles</label>
                                    </div>


                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio4" />
                                        <label for="radio4">Jueves</label>
                                    </div>



                                    <div class="funkyradio-primary">
                                        <input type="radio" name="radio" id="radio5" />
                                        <label for="radio5">Viernes</label>
                                    </div>

                            </div>
                    </div>

                    <div class="col-md-6">        

                        <h3 id= "type" align="center">2. Selecciona el horario...</h3>
                            <br>
                            <br>

                            <div class="timetable">



                                <table class="table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Lunes</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" name="checkbox" />       8:00am-9:00am</td>
                                            
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="checkbox" />       9:00am-10:00am</td>
                                    
                                            
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="checkbox" />        10:00am-11:00am</td>
                                          
                                           
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                    </div>


                </div>
                

                <br>
                <br>
                <br>
                <br>

                <div align="center">
                        <button class="btn btn-default">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-raised">Apartar</button>
                </div>

                {{Form::close()}}
            </div>

        </div>
    </div>




</div>



@stop