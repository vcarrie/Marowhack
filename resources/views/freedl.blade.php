
@extends('template.master')

@section('title', 'Transfert')

@section('main')


    <div class="row-fluid container-result">
        <h1 class="title-drag">Help yourself, this is good stuff</h1><br>
<div class="result_div col-md-6 col-md-offset-3 ">
    <ul class="result" id="results">

    </ul>
</div>


    </div>
    <script type="text/javascript">
        update()
        function update() {
            $.ajax({
                url : "/getmyfiles",
                type : "GET",
                dataType: 'json',
                success : function(ret) {
                    var resultats = $('#results');
                    resultats.empty();
                    for (i=2;i<ret.length;i++){
                        var item = $('<li></li>');
                        var link =  $('<a></a>');
                        link.attr('target', "blank");
                        link.attr('href', "../../storage/app/freedl/" + ret[i]);
                        link.text(ret[i]);
                        item.append(link);
                        resultats.append(item)
                    }
                }
            });
        }

    </script>
@endsection