@extends('app')

@section('content')
    <style>
        body {
            background: #eee
        }

        #regForm {
            background-color: #ffffff;
            margin: 0px auto;
            font-family: Raleway;
            padding: 40px;
            border-radius: 10px
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
            width: 40px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;
            color: #1b289a;
            opacity: 0.5;
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
            margin-top: 30px;
            margin-bottom: 30px
        }

        .thanks-message {
            display: none
        }
    </style>
    <h1 class="text-center">Formulario de Verificación de Compatibilidad de Espacio Aéreo</h1>
    <div class="container mt-6">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-12">
                <form id="regForm">
                    <h1 id="register">Formulario de Verificación de Compatibilidad de Espacio Aéreo</h1>
                    <div class="all-steps" id="all-steps">
                        <span class="step"><i class="fa fa-user"></i></span>
                        <span class="step"><i class="fa fa-mobile"></i></span>
                        <span class="step"><i class="fa fa-map-marker"></i></span>
                    </div>

                    <div class="tab">
                        <h6>Nombre del Aeródromo</h6>
                        <p>
                            <input placeholder="Nombre..." oninput="this.className = ''" name="fname">
                        </p>
                        <h6>Nombre del Aeródromo</h6>
                        <p>
                            <input placeholder="Nombre..." oninput="this.className = ''" name="fname">
                        </p>
                        <h6>Nombre del Aeródromo</h6>
                        <p>
                            <input placeholder="Nombre..." oninput="this.className = ''" name="fname">
                        </p>
                        <h6>Nombre del Aeródromo</h6>
                        <p>
                            <input placeholder="Nombre..." oninput="this.className = ''" name="fname">
                        </p>

                    </div>
                    <div class="tab">
                        <h6>Coordenada </h6>
                        <p><input placeholder="Coordenadas" oninput="this.className = ''" name="dd"></p>
                        <h6>Coordenada </h6>
                        <p><input placeholder="Coordenadas" oninput="this.className = ''" name="dd"></p>
                        <h6>Coordenada </h6>
                        <p><input placeholder="Coordenadas" oninput="this.className = ''" name="dd"></p>
                        <h6>Coordenada </h6>
                        <p><input placeholder="Coordenadas" oninput="this.className = ''" name="dd"></p>
                        <h6>Coordenada </h6>
                        <p><input placeholder="Coordenadas" oninput="this.className = ''" name="dd"></p>

                    </div>
                    <div class="tab">
                        <h6>Mapa</h6>
                        <p><input placeholder="Mapa" oninput="this.className = ''" name="email"></p>

                    </div>

                    <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png"
                            width="100" class="mb-4">
                        <h3>Gracias por tu tiempo!</h3>
                    </div>
                    <div style="overflow:auto;" id="nextprevious">
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
    <script>
        var currentTab = 0;
        document.addEventListener("DOMContentLoaded", function(event) {
            showTab(currentTab);
        });

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
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
            }
            showTab(currentTab);
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
    </script>
@endsection
