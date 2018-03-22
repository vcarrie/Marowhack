@extends('template.master')

@section('title', 'SHRandom')

@section('main')
    <style>

    </style>


    <div class="row-fluid">

    <div style="text-align: center">
        <div id="result">
            <img src="../../public/images/pball.png" id="img_wait" width="5%">
            <img id="img_pkm" src=""><br>
            <div id="id_pkm"></div>

        </div>
        <br>
        <button id="test" onclick="generate()">
            Générer !
        </button>
    </div>


    </div>

    <script>
       

        function generate() {
            var id = Math.floor((Math.random() * 719) + 1);
            $.ajax({
                url: 'https://pokeapi.co/api/v2/pokemon-form/' + id,
                type : 'GET',
                dataType : 'json',
                success : function (data) {
                    document.getElementById('img_wait').style.display = 'none';
                    document.getElementById('img_pkm').setAttribute('src', data.sprites.front_shiny);
                    document.getElementById('id_pkm').textContent =  "#" + data.id
                },
                error : function () {
                    alert('error');
                }
            });

        }


    </script>
@endsection