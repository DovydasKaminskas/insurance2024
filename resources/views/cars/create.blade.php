@extends('layouts.app')

@section ("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add a Car
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cars.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="reg_number">Registration Number</label>
                                <input type="text" class="form-control" name="reg_number" id="reg_number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="brand">Brand</label>
                                <input type="text" class="form-control" name="brand" id="brand">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="model">Model</label>
                                <input type="text" class="form-control" name="model" id="model">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="owner">Owner</label>
                                <select name="owner_id" class="form-select">
                                    <option value=""></option>
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-info">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
