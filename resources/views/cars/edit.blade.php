@extends('layouts.app')

@section ("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Owner
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('cars.update', $car->id) }}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label" for="reg_number">Registration Number</label>
                            <input type="text" class="form-control" name="reg_number" id="reg_number" value="{{$car->reg_number}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="brand">Brand</label>
                            <input type="text" class="form-control" name="brand" id="brand" value="{{$car->brand}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="model">Model</label>
                            <input type="text" class="form-control" name="model" id="model" value="{{$car->model}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="owner">Owner</label>
                            <select name="owner_id" class="form-select">
                                <option value=""></option>
                                @if($car->owner->id ?? '' != '')
                                    @foreach($owners as $owner)
                                        @if($owner->id === $car->owner->id)
                                            <option value="{{ $owner->id }}" selected>{{ $owner->name }} {{ $owner->surname }}</option>
                                        @else
                                            <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <button class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
