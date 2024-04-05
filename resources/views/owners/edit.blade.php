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
                    {{__("Edit Owner")}}
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('owner.save', $owner->id) }}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label" for="name">{{__("Name")}}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name', $owner->name)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="surname">{{__("Surname")}}</label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="surname" value="{{old('surname', $owner->surname)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone">{{__("Phone")}}</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{old('phone', $owner->phone)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">{{__("Email")}}</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email', $owner->email)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address">{{__("Address")}}</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{old('address', $owner->address)}}">
                        </div>
                        <button class="btn btn-info">{{__("Save")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
