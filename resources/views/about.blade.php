@extends('template.master')


@section('title', 'A propos')

@section('main')
    <div class="row-fluid">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <div class="row-fluid" style="min-height: 400px">
                <div class="col-md-3"><img src="../../images/profile_marowhack.jpg" alt=""></div>

                <div class="col-md-9" style="padding-left: 5%;">

                    <h1 style="text-align: center">Marowhack</h1>
                    <br><br>
                    <div style="font-size: 18px">
                        <h3>Mon parcours:</h3>

                        <br>

                        <ul>
                            <li>BTS SIO <a href="http://www.eiffel-bordeaux.org/">Lycée Gustave Eiffel</a></li>
                            <br>
                            <li>Licence Pro DAWIN à <a href="https://www.iut.u-bordeaux.fr/general/">l'IUT de
                                    Bordeaux</a></li>

                        </ul>

                    </div>


                </div>

            </div>


            <div class="row-fluid">
                <table width="100%">
                    <tr>
                        <td width="25%"><a target="_blank" href="https://twitter.com/MarowhackFr"><img src="../../images/twitter_mini.png" alt=""></a></td>
                        <td width="25%"><a target="_blank" href="https://www.linkedin.com/in/valentin-carri%C3%A9/"><img src="../../images/linkedin_mini.png" alt=""></a></td>
                        <td width="25%"><a target="_blank" href="../../images/CV_Valentin_Carrie.pdf"><img src="../../images/file_mini.png" alt=""></a></td>
                        <td width="25%"><a target="_blank" href="https://myanimelist.net/profile/Marowhack"><img src="../../images/mal_mini.png" alt=""></a></td>

                    </tr>

                </table>
            </div>

        </div>

        <div class="col-md-3"></div>

    </div>


@endsection