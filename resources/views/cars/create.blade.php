@extends('layouts.app')

@section ("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        {{__("Add a Car")}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('cars.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="reg_number">{{__("Registration Number")}}</label>
                                <input type="text" class="form-control @error('reg_number') is-invalid @enderror" name="reg_number" id="reg_number" value="{{old('reg_number')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="brand">{{__("Brand")}}</label>
                                <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand" value="{{old('brand')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="model">{{__("Model")}}</label>
                                <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" id="model" value="{{old('model')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="owner">{{__("Owner")}}</label>
                                <select name="owner_id" class="form-select">
                                    <option value="{{old('owner_id')}}"></option>
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-info">{{__("Add")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
