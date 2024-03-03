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
                    <form method="post" action="{{ route('owner.save', $owner->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$owner->name}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="surname">Surnamne</label>
                            <input type="text" class="form-control" name="surname" id="surname" value="{{$owner->surname}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$owner->phone}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{$owner->email}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{$owner->address}}">
                        </div>
                        <button class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
