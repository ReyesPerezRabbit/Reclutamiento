@extends('layouts.app_master')

@section('title', 'Lista de Evaluacion')

@section('content')

    <div class="container vh-75">
        <div class="row justify-content-center align-items-center h-75">
            @auth

                <div class="col-lg-10 mt-5">
                    <div class="shadow p-4 rounded">
                        @include('layouts.partials.menssage')
                        <h1>Lista de Evaluacion</h1>
                        <table class="table table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endauth


        {{-- para los que no están autenticados --}}
        @guest
            <div class="text-center">
                <p class="mt-4">Para poder registrarse, debe iniciar sesión <a href="/login">aquí</a></p>
            </div>
        @endguest
    </div>
    </div>
@endsection
