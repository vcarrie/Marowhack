
@extends('template.master')

@section('title', 'Drifblim')

@section('main')


    <style>
        body{ font-family: 'Quicksand', sans-serif; }

        #conteneur {
            width: 600px;
            height: 600px;

        }

        ul > li{
            list-style: none;
        }


        .draggable {
            width: 70px;
            height: 70px;
            background-color: red;
            text-align: center;
            color: white;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">

        (function($) {
            $.fn.agrandirPoliceAuSurvol = function(param) {
                this.each(function() {
                    $(this).mouseover(function() {
                        $(this).stop().animate({width: '+=10px'}, 200);
                    });
                });
                return this;
            };
        })(jQuery);

        $(document).ready(function(){




            $('img').agrandirPoliceAuSurvol();

        });
    </script>

    <div class="row-fluid">
        <div class="col-md-5">

        </div>

        <div class="col-md-7">
            <div id="conteneur">
                <table>
                    <tr>
                        <td>
                            <ul>
                                <li><img class="image-drifblim" width='40%' src="../../images/426.png" alt=""></li>
                                <li><img class="image-drifblim" width='40%' src="../../images/426.png" alt=""></li>
                                <li><img class="image-drifblim" width='40%' src="../../images/426.png" alt=""></li>

                            </ul>
                        </td>
                    </tr>
                </table>

            </div>
        </div>


    </div>



@endsection