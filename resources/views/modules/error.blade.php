@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Erro</div>
                    <div class="card-body">
                        <h1 id="error-message">Que pena! Você perdeu a aposta 😞</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclua o script do GSAP na sua página -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3"></script>

    <script>
        // Use a API do GSAP para adicionar animações aos elementos da página
        gsap.to("#error-message", {duration: 2, x: 100, backgroundColor: "red", borderRadius: "20%", ease: "bounce"});
    </script>
@endsection
