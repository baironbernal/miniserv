@extends('adminlte::page')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success btn-sm" href="{{url('home')}}">Crear</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Mark</th>
                        <th scope="col">License(P|V)</th>
                        <th scope="col">Type truck:</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Owner</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($trucks))
                    @foreach ($trucks as $truck)
                    <tr>
                        <td>{{$truck->name}}</td>
                        <td>{{$truck->mark}}</td>
                        <td>{{$truck->license_plate}}</td>
                        <td>{{$truck->typeTruck->name}}</td>
                        <td>{{$truck->weight}}</td>
                        <td>{{$truck->user->name}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr class="no-found">
                        <td colspan="8">No existe registros.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop