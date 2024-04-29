@extends('app')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.css" rel="stylesheet">
    <style>
        body {
            background: #eee
        }

        #regForm {
            background-color: #ffffff;
            margin: 0px auto;
            font-family: Raleway;
            padding: 20px 40px 40px 40px;
        }

        #register {

            color: #1b289a;
        }

        h1 {
            text-align: center
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
            border-radius: 10px;
            -webkit-appearance: none;
        }

        .tab input:focus {

            border: 1px solid #1b289a !important;
            outline: none;
        }

        input.invalid {

            border: 1px solid #e03a0666;
        }

        .input-group {
            display: flex;
            justify-content: space-between;
        }

        .input-group input {
            flex: 1; /* Los inputs ocuparán el espacio disponible */
            margin-right: 10px; /* Espacio entre los inputs */
        }

        /* Estilos para cuando un input está enfocado */
        .input-group input:focus {
            border: 1px solid #1b289a !important;
            outline: none;
        }

        /* Estilos para inputs inválidos */
        .input-group input.invalid {
            border: 1px solid #e03a0666;
        }

        .tab {
            display: none
        }

        button {
            background-color: #1b289a;
            color: #ffffff;
            border: none;
            border-radius: 50%;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer
        }

        .btnVerPDF{
            background-color: #1b289a;
            color: #ffffff;
            border: none;
            border-radius: 10%;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }
        .btnVerPDF:hover{
            background-color: #1b289a;
            color: #ffffff;
            opacity: 0.8
        }

        button:hover {
            opacity: 0.8
        }

        button:focus {

            outline: none !important;
        }

        #prevBtn {
            background-color: #bbbbbb
        }


        .all-steps {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
            width: 100%;
            display: inline-flex;
            justify-content: center;
        }

        .step {
            height: 40px;
            width: auto;
            margin: 0 5px;
            padding: 0.5rem 1rem;
            background-color: #bbbbbb;
            border: none;
            border-radius: 0.25rem;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;
            color: #1b289a;
            opacity: 0.5;
        }

        .btnAction{
            color: #fff;
            background-color: #1b289a;
            border-radius: 30px;
        }

        .step i {
            margin-right: 5px;
        }

        .step.active {
            opacity: 1
        }


        .step.finish {
            color: #fff;
            background: #1b289a;
            opacity: 1;

        }

        .all-steps {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 30px
        }

        .thanks-message {
            display: none
        }
        #map {
            height: 350px;
            width: 100%;
        }
        #distance {
            margin-top: 10px;
        }
    </style>
    {{-- <h1 class="text-center">Formulario de Verificación de Compatibilidad de Espacio Aéreo</h1> --}}
    <div class="container mt-6">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9">
                <form id="regForm">
                    <h3 id="register" class="text-center">Formulario de Verificación de Compatibilidad de Espacio Aéreo</h3>
                    <div class="all-steps" id="all-steps">
                        <span class="step"><i class="fa fa-user"></i>Entidad</span>
                        <span class="step"><i class="fa fa-globe"></i>Georreferenciación</span>
                        <span class="step"><i class="fa fa-map-marker"></i>Mapa</span>
                    </div>

                    <div class="tab">
                        <label for="hoja_ruta">Hoja de ruta</label>
                        <p><input placeholder="Ingrese su numero de tramite de hoja de ruta" name="hoja_ruta" id="hoja_ruta" oninput="this.className = ''"></p>
                        <label for="aerodromo">1. Nombre del Aeródromo:</label>
                        <p><input placeholder="aerodromo" name="aerodromo" id="aerodromo" oninput="this.className = ''"></p>
                        <label for="solicitante">2. Nombre del Solicitante:</label>
                        <p><input placeholder="solicitante" name="solicitante" id="solicitante" oninput="this.className = ''"></p>
                        <label for="ci">3. C.I.:</label>
                        <p><input placeholder="ci" name="ci" id="ci" oninput="this.className = ''"></p>
                        <label for="correo">4. Correo Electrónico:</label>
                        <p><input placeholder="correo" name="correo" id="correo" oninput="this.className = ''"></p>
                        <label for="telefono">5. Teléfono:</label>
                        <p><input placeholder="telefono" name="telefono" id="telefono" oninput="this.className = ''"></p>
                        <label for="departamento">6. Departamento:</label>
                        <p><input placeholder="departamento" name="departamento" id="departamento" oninput="this.className = ''"></p>
                        <label for="municipio">7. Municipio:</label>
                        <p><input placeholder="municipio" name="municipio" id="municipio" oninput="this.className = ''"></p>
                    </div>

                    <div class="tab">
                        <label for="designador_umbral_menor">8. Designador del Umbral de Menor Elevación:</label>
                        <p><input type="number" placeholder="Designador del Umbral de Menor Elevación" name="designador_umbral_menor" id="designador_umbral_menor" oninput="this.className = ''"></p>
                        <label for="coord_latitud_sur_8_1">8.1 Coordenada Latitud Sur:</label>
                        {{-- <p><input value="1" placeholder="Coordenada Latitud Sur" name="coord_latitud_sur_8_1" id="coord_latitud_sur_8_1" oninput="this.className = ''"></p> --}}
                        <div class="input-group">
                            <input type="number" placeholder="Grados" name="coord_latitud_sur_8_1_grados" id="coord_latitud_sur_8_1_grados" oninput="this.className = ''">
                            <input type="number" placeholder="Minutos" name="coord_latitud_sur_8_1_minutos" id="coord_latitud_sur_8_1_minutos" oninput="this.className = ''">
                            <input type="number" placeholder="Segundos" name="coord_latitud_sur_8_1_segundos" id="coord_latitud_sur_8_1_segundos" oninput="this.className = ''">
                        </div>
                        <label for="coord_longitud_oeste_8_2">8.2 Coordenada Longitud Oeste:</label>
                        {{-- <p><input value="1" placeholder="Coordenada Longitud Oeste" name="coord_longitud_oeste_8_2" id="coord_longitud_oeste_8_2" oninput="this.className = ''"></p> --}}
                        <div class="input-group">
                            <input type="number" placeholder="Grados" name="coord_longitud_oeste_8_2_grados" id="coord_longitud_oeste_8_2_grados" oninput="this.className = ''">
                            <input type="number" placeholder="Minutos" name="coord_longitud_oeste_8_2_minutos" id="coord_longitud_oeste_8_2_minutos" oninput="this.className = ''">
                            <input type="number" placeholder="Segundos" name="coord_longitud_oeste_8_2_segundos" id="coord_longitud_oeste_8_2_segundos" oninput="this.className = ''">
                        </div>
                        <label for="designador_umbral_mayor">9. Designador del Umbral de Mayor Elevación:</label>
                        <p><input type="number" placeholder="Designador del Umbral de Mayor Elevación" name="designador_umbral_mayor" id="designador_umbral_mayor" oninput="this.className = ''"></p>
                        <label for="coord_latitud_sur_9_1">9.1 Coordenada Latitud Sur :</label>
                        {{-- <p><input value="1" placeholder="Coordenada Latitud Sur" name="coord_latitud_sur_9_1" id="coord_latitud_sur_9_1" oninput="this.className = ''"></p> --}}
                        <div class="input-group">
                            <input type="number" placeholder="Grados" name="coord_latitud_sur_9_1_grados" id="coord_latitud_sur_9_1_grados" oninput="this.className = ''">
                            <input type="number" placeholder="Minutos" name="coord_latitud_sur_9_1_minutos" id="coord_latitud_sur_9_1_minutos" oninput="this.className = ''">
                            <input type="number" placeholder="Segundos" name="coord_latitud_sur_9_1_segundos" id="coord_latitud_sur_9_1_segundos" oninput="this.className = ''">
                        </div>
                        <label for="coord_longitud_oeste_9_2">9.2 Coordenada Longitud Oeste:</label>
                        {{-- <p><input value="1" placeholder="Coordenada Longitud Oeste" name="coord_longitud_oeste_9_2" id="coord_longitud_oeste_9_2" oninput="this.className = ''"></p> --}}
                        <div class="input-group">
                            <input type="number" placeholder="Grados" name="coord_longitud_oeste_9_2_grados" id="coord_longitud_oeste_9_2_grados" oninput="this.className = ''">
                            <input type="number" placeholder="Minutos" name="coord_longitud_oeste_9_2_minutos" id="coord_longitud_oeste_9_2_minutos" oninput="this.className = ''">
                            <input type="number" placeholder="Segundos" name="coord_longitud_oeste_9_2_segundos" id="coord_longitud_oeste_9_2_segundos" oninput="this.className = ''">
                        </div>
                        <label for="elevacion_arp">10. Elevación en pies del Aeródromo en el Punto ARP:</label>
                        <p><input type="number" placeholder="Elevación en pies del Aeródromo en el Punto ARP" name="elevacion_arp" id="elevacion_arp" oninput="this.className = ''"></p>
                        <label for="coord_latitud_sur_10_1">10.1 Coordenada Latitud Sur :</label>
                        {{-- <p><input value="1" placeholder="Coordenada Latitud Sur" name="coord_latitud_sur_10_1" id="coord_latitud_sur_10_1" oninput="this.className = ''"></p> --}}
                        <div class="input-group">
                            <input type="number" placeholder="Grados" name="coord_latitud_sur_10_1_grados" id="coord_latitud_sur_10_1_grados" oninput="this.className = ''">
                            <input type="number" placeholder="Minutos" name="coord_latitud_sur_10_1_minutos" id="coord_latitud_sur_10_1_minutos" oninput="this.className = ''">
                            <input type="number" placeholder="Segundos" name="coord_latitud_sur_10_1_segundos" id="coord_latitud_sur_10_1_segundos" oninput="this.className = ''; convertirCoordenadasAInput('lat2', 'coord_latitud_sur_10_1_grados', 'coord_latitud_sur_10_1_minutos', 'coord_latitud_sur_10_1_segundos', 'S')">
                        </div>
                        <label for="coord_longitud_oeste_10_2">10.2 Coordenada Longitud Oeste:</label>
                        {{-- <p><input value="1" placeholder="Coordenada Longitud Oeste" name="coord_longitud_oeste_10_2" id="coord_longitud_oeste_10_2" oninput="this.className = ''"></p> --}}
                        <div class="input-group">
                            <input type="number" placeholder="Grados" name="coord_longitud_oeste_10_2_grados" id="coord_longitud_oeste_10_2_grados" oninput="this.className = ''">
                            <input type="number" placeholder="Minutos" name="coord_longitud_oeste_10_2_minutos" id="coord_longitud_oeste_10_2_minutos" oninput="this.className = ''">
                            <input type="number" placeholder="Segundos" name="coord_longitud_oeste_10_2_segundos" id="coord_longitud_oeste_10_2_segundos" oninput="this.className = ''; convertirCoordenadasAInput('lng2', 'coord_longitud_oeste_10_2_grados', 'coord_longitud_oeste_10_2_minutos', 'coord_longitud_oeste_10_2_segundos', 'O')">
                        </div>
                    </div>

                    <div class="tab" id="mapa_tab">
                        <label for="hoja_ruta">Aeropuertos de Bolivia:</label>
                        <select id="aeropuertos" class="form-select" onchange="seleccionarAeropuerto();ocultarDIVResultado();">
                            <option value="-16.512047222222222,-68.23347222222222">Aeropuerto Internacional El Alto</option>
                            <option value="-14.799166666666666,-64.93805555555556">Aeropuerto Internacional de Trinidad</option>
                            <option value="-17.42138888888889,-66.17888888888889">Aeropuerto Internacional de Cochabamba</option>
                            <option value="-11.0404277778,-68.783675">Aeropuerto Internacional de Cobija AL AIP2013 </option>
                            <option value="-10.88888888888889,-65.38166666666666">Aeropuerto Internacional de Guayaramerín</option>
                            <option value="-18.975555555555555,-57.82">Aeropuerto Internacional de Puerto Suarez</option>
                            <option value="-21.546944444444446,-64.71305555555556">Aeropuerto Internacional de Tarija</option>
                            <option value="-17.62611111111111,-63.147777777777776">Aeropuerto Internacional Viru Viru</option>
                            <option value="-21.9625,-63.651944444444446">Aeropuerto Internacional de Yacuiba</option>
                            <option value="-19.822499999999998,-63.962500000000006">Aeropuerto de Monteagudo</option>
                            <option value="-14.735555555555555,-68.41111111111111">Aeropuerto Apolo (NO CTR)</option>
                            <option value="-15.932777777777778,-63.15611111111111">Aeropuerto Ascensión de Guarayos (NO CTR)</option>
                            <option value="-22.771944444444443,-64.31222222222222">Aeropuerto Bermejo (NO CTR)</option>
                            <option value="-20.006944444444443,-63.52861111111111">Aeropuerto Camiri (NO CTR)</option>
                            <option value="-16.192222222222224,-69.09638888888888">Aeropuerto de Copacabana (NO CTR)</option>
                            <option value="-16.143333333333334,-62.025555555555556">Aeropuerto de Concepción (NO CTR)</option>
                            <option value="-17.81138888888889,-63.170833333333334">Aeropuerto El Trompillo</option>
                            <option value="-17.83222222222222,-60.743611111111115">Aeropuerto San José de Chiquitos (NO CTR)</option>
                            <option value="-13.065833333333334,-64.67444444444445">Aeropuerto San Joaquín (NO CTR)</option>
                            <option value="-16.265555555555554,-62.47083333333334">Aeropuerto San Javier(NO CTR)</option>
                            <option value="-13.262777777777778,-64.05944444444444">Aeropuerto Magdalena (NO CTR)</option>
                            <option value="-17.979991666666663,-67.07688611111111">Aeropuerto Juan Mendoza</option>
                            <option value="-19.523888888888887,-65.69222222222223">Aeropuerto Nicolas Rojas</option>
                            <option value="-13.264444444444445,-64.60944444444443">Aeropuerto San Ramón (NO CTR)</option>
                            <option value="-18.32777777777778,-59.76583333333333">Aeropuerto Roboré (NO CTR)</option>
                            <option value="-11.01,-66.07277777777777">Aeropuerto Riberalta</option>
                            <option value="-14.429166666666665,-67.50111111111111">Aeropuerto Rurrenabaque</option>
                            <option value="-14.302777777777779,-67.35305555555556">Aeropuerto Reyes (NO CTR)</option>
                            <option value="-13.761666666666667,-65.43472222222222">Aeropuerto Santa Ana del Yacuma (NO CTR)</option>
                            <option value="-14.857777777777777,-66.73861111111111">Aeropuerto San Borja (NO CTR)</option>
                            <option value="-16.399444444444445,-61.04333333333333">Aeropuerto San Ignacio de Velasco - Cap. Av. Juan Cochamanidis Saucedo (NO CTR) </option>
                            <option value="-14.96861111111111,-65.6325">Aeropuerto San Ignacio de Moxos (NO CTR)</option>
                            <option value="-14.074444444444444,-66.78694444444444">Aeropuerto Santa Rosa del Yacuma (NO CTR)</option>
                            <option value="-19.267777777777777,-65.14305555555556">Aeropuerto Alcantarí</option>
                            <option value="-16.339444444444442,-58.40138888888889">Aeropuerto San Matías</option>
                            <option value="-20.453333333333333,-66.83611111111111">Aeropuerto Uyuni</option>
                            <option value="-18.482499999999998,-64.09944444444444">Aeropuerto Valle Grande (NO CTR)</option>
                            <option value="-21.254166666666666,-63.406666666666666">Aeropuerto Villamontes (NO CTR)</option>
                            <option value="-16.9775,-65.14444444444445">Aeropuerto Chimoré</option>
                            <option value="-16.399444444444445,-61.04333333333333">Aeropuerto San Ignacio de Velasco - San Ignacio de Velasco</option>
                        </select>
                        <div style="display: none;">
                            <label for="lat1">Latitud Punto 1:</label>
                            <input type="text" id="lat1" placeholder="Ej. -37.7749" value="-16.512047222222222" />
                            <label for="lng1">Longitud Punto 1:</label>
                            <input type="text" id="lng1" placeholder="Ej. -122.4194" value="-68.23347222222222"/>
                        </div>
                        <div class="row" style="display: none">
                            <div class="col-sm-6">
                                <label for="lat2">Latitud aeródromo:</label>
                                <input type="text" name="lat2" id="lat2" placeholder="Ej. -40.7128">
                            </div>
                            <div class="col-sm-6">
                                <label for="lng2">Longitud aeródromo:</label>
                                <input type="text" name="lng2" id="lng2" placeholder="Ej. -74.0060">
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-borderless table-sm">
                                <thead>
                                    <tr>
                                        <th class="col-7">Sistema decimal</th>
                                        <th class="col-5">Sistema grados, minutos, segundos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><p id="lblDecimal"><b>Latitud : </b> <br> <b>Longitud : </b>-66.1643451</p></td>
                                        <td><p id="lblGraMinSeg"><b>Latitud : </b>45&deg; 30&prime; 15&Prime; <br> <b>Longitud : </b>45&deg; 30&prime; 15&Prime;</p></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="map" style="border: solid 3px #1b289a; margin-top: 10px;"></div>
                        <div id="distance" style="text-align: center;font-size: x-large;color: #1b289a">Distancia: </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <button type="button" class="btnAction" onclick="calcularDistancia()">Medir Distancia</button>
                            </div>
                            <div class="col-sm-3" style="display: none;" id="divImprimirPDF">
                                {{-- <a href="{{ asset('docs/FORMATO_COMPROBANTE_VERIFICACION.pdf') }}" target="_blank" class="btn btn-button btnVerPDF">Ver PDF</a> --}}
                                <a id="btnVerPDF" href="{{ route('verPDF', ['id' => 0]) }}" target="_blank" class="btn btn-button btnVerPDF">Ver PDF</a>
                            </div>
                            <div class="col-sm-6" style="display: none;" id="divComunicado">
                                <p>Comuníquese con el aérea de Navegación Aérea de NAABOL o visite la regional más cercana de NAABOL en su departamento</p>
                            </div>
                        </div>
                    </div>

                    <div class="thanks-message text-center" id="text-message">
                        <h3>¡Gracias por tu tiempo!</h3>
                        <a href="{{ url('/') }}" class="btn btn-outline-primary">Volver al inicio</a>
                    </div>
                    <div style="overflow:auto;margin-top: 10px;" id="nextprevious">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i
                                    class="fa fa-angle-double-left"></i></button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)"><i
                                    class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.min.js"></script>
    <script>

        var currentTab = 0;
        var map = L.map('map').setView([-16.5, -64.5], 5); // Centrado en Bolivia
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        var aeropuertos = [
            { nombre: 'Aeropuerto Internacional El Alto', latitud: -16.512047222222222, longitud: -68.23347222222222 },
            { nombre: 'Aeropuerto Internacional de Trinidad', latitud: -14.799166666666666, longitud: -64.93805555555556 },
            { nombre: 'Aeropuerto Internacional de Cochabamba', latitud: -17.42138888888889, longitud: -66.17888888888889 },
            { nombre: 'Aeropuerto Internacional de Cobija AL AIP2013', latitud: -11.0404277778, longitud: -68.783675 },
            { nombre: 'Aeropuerto Internacional de Guayaramerín', latitud: -10.88888888888889, longitud: -65.38166666666666 },
            { nombre: 'Aeropuerto Internacional de Puerto Suarez', latitud: -18.975555555555555, longitud: -57.82 },
            { nombre: 'Aeropuerto Internacional de Tarija', latitud: -21.546944444444446, longitud: -64.71305555555556 },
            { nombre: 'Aeropuerto Internacional Viru Viru', latitud: -17.62611111111111, longitud: -63.147777777777776 },
            { nombre: 'Aeropuerto Internacional de Yacuiba', latitud: -21.9625, longitud: -63.651944444444446 },
            { nombre: 'Aeropuerto de Monteagudo', latitud: -19.822499999999998, longitud: -63.962500000000006 },
            { nombre: 'Aeropuerto El Trompillo', latitud: -17.81138888888889, longitud: -63.170833333333334 },
            { nombre: 'Aeropuerto Juan Mendoza', latitud: -17.979991666666663, longitud: -67.07688611111111 },
            { nombre: 'Aeropuerto Nicolas Rojas', latitud: -19.523888888888887, longitud: -65.69222222222223 },
            { nombre: 'Aeropuerto Riberalta', latitud: -11.01, longitud: -66.07277777777777 },
            { nombre: 'Aeropuerto Rurrenabaque', latitud: -14.429166666666665, longitud: -67.50111111111111 },
            { nombre: 'Aeropuerto Alcantarí', latitud: -19.267777777777777, longitud: -65.14305555555556 },
            { nombre: 'Aeropuerto San Matías', latitud: -16.339444444444442, longitud: -58.40138888888889 },
            { nombre: 'Aeropuerto Uyuni', latitud: -20.453333333333333, longitud: -66.83611111111111 },
            { nombre: 'Aeropuerto Chimoré', latitud: -16.9775, longitud: -65.14444444444445 },
            { nombre: 'Aeropuerto San Ignacio de Velasco - San Ignacio de Velasco', latitud: -16.399444444444445, longitud: -61.04333333333333 },
        ];
        aeropuertos.forEach(function (aeropuerto) {
            L.marker([aeropuerto.latitud, aeropuerto.longitud]).addTo(map).bindPopup(aeropuerto.nombre);

            // Agregar círculo alrededor del aeropuerto
            var circle = L.circle([aeropuerto.latitud, aeropuerto.longitud], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.2,
                radius: 15 * 1852 // 15 millas náuticas a metros
            }).addTo(map);
        });
        var marker1 = L.marker([0, 0], { draggable: false }).addTo(map);
        var marker2 = L.marker([0, 0], { draggable: false }).addTo(map);


        document.addEventListener("DOMContentLoaded", function(event) {
            showTab(currentTab);
        });

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            // console.log(x[n]);
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            } else {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            }
            if (x[n].id) {
                // console.log("El elemento tiene un ID:", x[n].id);
                map.invalidateSize();
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right">Fin</i>';
                actualizarTablaCoordenadas();
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                document.getElementById("nextprevious").style.display = "none";
                document.getElementById("all-steps").style.display = "none";
                document.getElementById("register").style.display = "none";
                document.getElementById("text-message").style.display = "block";
            } else{
                showTab(currentTab);
            }
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
                if (y[i].id == "hoja_ruta") {
                    y[i].className = "";
                    valid = true;
                }
            }
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
        function actualizarMarcador(marker, lat, lng) {
            marker.setLatLng([lat, lng]);
            map.panTo([lat, lng]);
        }
        function seleccionarAeropuerto() {
            var aeropuertoSeleccionado = document.getElementById('aeropuertos').value.split(',');
            var lat1 = parseFloat(aeropuertoSeleccionado[0]);
            var lng1 = parseFloat(aeropuertoSeleccionado[1]);
            document.getElementById('lat1').value = lat1;
            document.getElementById('lng1').value = lng1;
            actualizarMarcador(marker1, lat1, lng1);
            document.getElementById('distance').innerHTML = 'Distancia: ';
        }

        function validarpuntoNoCTR() {
            var lat = parseFloat(document.getElementById('lat1').value);
            var lon = parseFloat(document.getElementById('lng1').value);
            return aeropuertos.some(function(aeropuerto) {
                return parseFloat(aeropuerto.latitud.toFixed(6)) === parseFloat(lat.toFixed(6)) && parseFloat(aeropuerto.longitud.toFixed(6)) === parseFloat(lon.toFixed(6));
            });
        }


        function calcularDistancia() {
            var lat2 = parseFloat(document.getElementById('lat2').value);
            var lng2 = parseFloat(document.getElementById('lng2').value);
            actualizarMarcador(marker2, lat2, lng2);
            var punto1 = L.latLng(parseFloat(document.getElementById('lat1').value), parseFloat(document.getElementById('lng1').value));
            var punto2 = L.latLng(lat2, lng2);
            var distanciaMillasNauticas = punto1.distanceTo(punto2) * 0.00053996;
            map.eachLayer(function(layer) {
                if (layer instanceof L.Polyline) {
                    map.removeLayer(layer);
                }
            });
            // Crear línea entre los dos puntos
            var line = L.polyline([punto1, punto2], {color: '#1b289a'}).addTo(map);
            // Ajustar el mapa para mostrar ambos puntos
            var bounds = L.latLngBounds([punto1, punto2]);
            map.fitBounds(bounds.pad(0.1));

            $.ajax({
                url: "{{ route('saveForm') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $('#regForm').serialize(),
                success: function(response) {
                    console.log('Formulario guardado correctamente.');
                    document.getElementById('btnVerPDF').href = "{{ route('verPDF', ['id' => ':id']) }}".replace(':id', response.formulario_id);
                    if (validarpuntoNoCTR()) {
                        if (distanciaMillasNauticas > 15) {
                            document.getElementById("divComunicado").style.display = "none";
                            document.getElementById("divImprimirPDF").style.display = "block";
                        } else {
                            document.getElementById("divComunicado").style.display = "block";
                            document.getElementById("divImprimirPDF").style.display = "none";
                        }
                    }
                    else{
                        document.getElementById("divComunicado").style.display = "none";
                        document.getElementById("divImprimirPDF").style.display = "block";
                    }
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.error;
                    var message ='';
                    $.each(errors, function(key, value) {
                        // messaje += 'Error #'+key+': '+value[0];
                        if (value[0] === 'validation.unique') {
                            message += 'El campo ' + key + ' ingresado ya está registrado.';
                        } else {
                            message += 'Error en el campo ' + key + ': ' + value[0];
                        }
                    });
                    alert(message);
                    document.getElementById("divComunicado").style.display = "block";
                    document.getElementById("divImprimirPDF").style.display = "none";
                }
            });
            document.getElementById('distance').innerHTML = 'Distancia: ' + distanciaMillasNauticas.toFixed(2) + ' millas náuticas';
            marker2.bindPopup("<b>Tu Aerodromo!</b>").openPopup();
        }

        function ocultarDIVResultado() {
            document.getElementById("divComunicado").style.display = "none";
            document.getElementById("divImprimirPDF").style.display = "none";
        }
        function convertirDMSaDecimal(grados, minutos, segundos, direccion) {
            var decimal = parseInt(grados) + parseFloat(minutos) / 60 + parseFloat(segundos) / 3600;
            if (direccion === 'S' || direccion === 'O') {
                decimal = -decimal;
            }
            return decimal;
        }

        function convertirCoordenadasAInput(input, grados, minutos, segundos, direccion) {
            var i_grados = parseFloat(document.getElementById(grados).value);
            var i_minutos = parseFloat(document.getElementById(minutos).value);
            var i_segundos = parseFloat(document.getElementById(segundos).value);
            var input = document.getElementById(input);
            coordenadas = convertirDMSaDecimal(i_grados,i_minutos,i_segundos,direccion)
            input.value = coordenadas;
        }

        function actualizarTablaCoordenadas(){
            var lat2 = parseFloat(document.getElementById('lat2').value);
            var lng2 = parseFloat(document.getElementById('lng2').value);
            var lat_gra = parseFloat(document.getElementById('coord_latitud_sur_10_1_grados').value);
            var lat_min = parseFloat(document.getElementById('coord_latitud_sur_10_1_minutos').value);
            var lat_seg = parseFloat(document.getElementById('coord_latitud_sur_10_1_segundos').value);
            var lng_gra = parseFloat(document.getElementById('coord_longitud_oeste_10_2_grados').value);
            var lng_min = parseFloat(document.getElementById('coord_longitud_oeste_10_2_minutos').value);
            var lng_seg = parseFloat(document.getElementById('coord_longitud_oeste_10_2_segundos').value);

            document.getElementById('lblDecimal').innerHTML = '<b>Latitud : </b>'+lat2+' <br> <b>Longitud : </b>'+lng2+'';
            document.getElementById('lblGraMinSeg').innerHTML = '<b>Latitud : </b>'+lat_gra+'&deg; '+lat_min+'&prime; '+lat_seg+'&Prime; <br> <b>Longitud : </b>'+lng_gra+'&deg; '+lng_min+'&prime; '+lng_seg+'&Prime;';
        }

        function convertirCoordenadas() {
            // valores de grados, minutos y segundos desde los input
            var grados = parseFloat(document.getElementById('grados').value);
            var minutos = parseFloat(document.getElementById('minutos').value);
            var segundos = parseFloat(document.getElementById('segundos').value);
            // Convertir a coordenadas decimales
            var coordenadasDecimales = grados + (minutos / 60) + (segundos / 3600);
            // Mostrar el resultado en el recuadro pequeño
            document.getElementById('resultado').innerHTML = 'Coordenadas Decimales: -' + coordenadasDecimales;
        }

    </script>
@endsection
