@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (session('errors'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('truck.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name truck: </label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="truckHelp"
                                placeholder="Enter name">
                            <small id="truckHelp" class="form-text text-muted">
                                Here add truck
                            </small>
                        </div>
                        <div class="form-group">
                            <label>Mark: </label>
                            <input type="text" class="form-control" name="mark" id="mark" aria-describedby="markHelp"
                                placeholder="Enter mark">
                            <small id="markHelp" class="form-text text-muted">
                                Here add mark
                            </small>
                        </div>
                        <div class="form-group">
                            <label>License Plate: </label>
                            <input type="text" class="form-control" name="license_plate" id="license_plate"
                                aria-describedby="licenseHelp" placeholder="Enter license">
                            <small id="licenseHelp" class="form-text text-muted">
                                Here add license
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Type truck:</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="type_truck_id">
                                @if (isset($types_truck))
                                    @foreach ($types_truck as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Weight:</label>
                            <input type="text" class="form-control" name="weight" id="weight"
                                placeholder="Weight">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop