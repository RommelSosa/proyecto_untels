
<!-- Modal -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>



<!-- Modal -->
<form action="{{url('/admin/egresado')}}" name="crear" id="crear" method="post">
    @csrf
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-create">Agregar nuevo egresado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                        <label for="matricula">Matricula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula')}}"  maxlength="10" >
                        {{$errors->first('matricula')}}
                    </div>
                    <div class="form-group">
                        <label for="ap_paterno">Apellido paterno</label>
                        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="{{ old('ap_paterno')}}" required maxlength="20" >
                        {{$errors->first('ap_paterno')}}
                    </div>
                    <div class="form-group">
                        <label for="ap_materno">Apellido materno</label>
                        <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="{{ old('ap_materno')}}" required maxlength="20" >
                        {{$errors->first('ap_materno')}}
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres')}}" required maxlength="30" >
                        {{$errors->first('nombres')}}
                    </div>

                    <div class="form-group">
                        <label for="id_academico">Carrera</label>
                        <select name="id_academico" class="form-control"  id="id_academico" required>
                            <option selected disabled value="">Seleccione carrera</option>
                                <option value="1">Ingeniería de Sistemas</option>
                                <option value="2">Ingeniería Electrónica y Telecomunicaciones</option>
                                <option value="3">Ingeniería Ambiental</option>
                                <option value="4">Ingeniería Mecánica y Eléctrica</option>
                                <option value="5">Administración de Empresas</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="genero">Género</label>
                        <select name="genero" class="form-control"  id="genero" required>
                            <option selected disabled value="">Seleccione genero</option>
                            <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni')}}"   maxlength="8">
                        {{$errors->first('dni')}}
                    </div>



                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" min="1910-01-01" max="2100-12-31" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento')}}" required  >
                        {{$errors->first('fecha_nacimiento')}}
                    </div>

                    <div>
                        <div>
                            <label for="semestre_ingreso">Ciclo de ingreso</label>
                        </div>

                        <div class="form-group">
                            <div id="color_plomo">Año de ingreso</div>
                            <input type="number"  name="año_ingreso" class="form-control" min="1900" max="2099" step="1" value="2016" />
                        </div>
                        <div class="form-group">
                            <div id="color_plomo">Semestre de ingreso</div>
                            <select name="semestre_ingreso" class="form-control" id="semestre_ingreso" required>
                                <option selected disabled value="">Seleccione semestre de ingreso</option>
                                <option value="1">1</option>
                                    <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div >
                            <label for="semestre_ingreso">Ciclo de egreso</label>
                        </div>

                        <div class="form-group">
                            <div id="color_plomo">Año de egreso</div>
                            <input type="number" name="año_egreso"  class="form-control" min="1900" max="2099" step="1" value="2016" />
                        </div>
                        <div class="form-group">
                            <div id="color_plomo">Semestre de egreso</div>
                            <select name="semestre_egreso" class="form-control" id="semestre_egreso" required>
                                <option selected disabled value="">Seleccione semestre de egreso</option>
                                <option value="1">1</option>
                                    <option value="2">2</option>
                            </select>
                        </div>
                    </div>




                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular')}}"   maxlength="9">
                        {{$errors->first('celular')}}
                    </div>

                    <div class="form-group">
                        <label for="pais_origen">Pais de origen</label>
                        <input type="text" class="form-control" id="pais_origen" name="pais_origen" value="{{ old('pais_origen')}}"   maxlength="9">
                        {{$errors->first('pais_origen')}}
                    </div>

                    <div class="form-group">
                        <label for="departamento_origen">Departamento de origen</label>
                        <input type="text" class="form-control" id="departamento_origen" name="departamento_origen" value="{{ old('departamento_origen')}}"   maxlength="20">
                        {{$errors->first('departamento_origen')}}
                    </div>

                    <div class="form-group">
                        <label for="pais_residencia">País de residencia</label>
                        <input type="text" class="form-control" id="pais_residencia" name="pais_residencia" value="{{ old('pais_residencia')}}"   maxlength="20">
                        {{$errors->first('pais_residencia')}}
                    </div>

                    <div class="form-group">
                        <label for="ciudad_residencia">Ciudad de residencia</label>
                        <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia" value="{{ old('ciudad_residencia')}}"   maxlength="20">
                        {{$errors->first('ciudad_residencia')}}
                    </div>

                    <div class="form-group">
                        <label for="lugar_residencia">Lugar de residencia</label>
                        <input type="text" class="form-control" id="lugar_residencia" name="lugar_residencia" value="{{ old('lugar_residencia')}}"   maxlength="20">
                        {{$errors->first('lugar_residencia')}}
                    </div>


        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

        </div>
        </div>
    </div>
    </div>
</form>
