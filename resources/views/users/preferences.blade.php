@extends('layouts.profilelayout')
@section('titlebox'){{__('Voorkeuren')}}@endsection
@section('contentassets')

    <div class="columndirector">

            <div class="card" style="width: 100%">
                <div class="rowdirector" style="width: 100%">
                    <div class="columndirector" style="width: 100%;">

                        <form method="post">
                            @csrf
                            <h2>Selecteer een taal:</h2>
                            <div class="rowdirector"
                                 style="margin: 2%;justify-content: space-between; align-content: flex-start">

                                <select>
                                    <option>NL</option>
                                    <option>EN</option>
                                </select>

                            </div>
                            <h2>Selecteer een Thema:</h2>
                            <div class="rowdirector"
                                 style="margin: 2%;justify-content: space-between; align-content: flex-start">

                                <select>
                                    <option>Donker</option>
                                    <option>Licht</option>
                                </select>

                            </div>
                            <input  type="submit" id="form" hidden onclick="this.form.submit()">
                        </form>
                        <button style="align-self: flex-end" type="submit" onclick="document.getElementById('form').click();">Opslaan</button>

                    </div>

                </div>
            </div>
        </div>

@endsection
