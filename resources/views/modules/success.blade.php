@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sucesso</div>
                    <div class="card-body">
                        <h1>Parabéns! Você ganhou a aposta!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicione o script do Particle.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <!-- Crie um elemento para exibir os confetes -->
    <div id="particles-js" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;"></div>

    <!-- Inicie o Particle.js -->
    <script>
        particlesJS.load('particles-js', {
            "particles": {
                "number": {
                    "value": 100
                },
                "shape": {
                    "type": "circle"
                },
                "size": {
                    "value": 10,
                    "random": true
                },
                "move": {
                    "direction": "bottom",
                    "out_mode": "out"
                }
            },
            "interactivity": {
                "events": {
                    "onhover": {
                        "enable": false
                    },
                    "onclick": {
                        "enable": false
                    }
                }
            }
        });
    </script>
@endsection
