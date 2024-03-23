@extends('layouts.app')

@section ("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{__("Add Owner")}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('owner.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">{{__("Name")}}</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="surname">{{__("Surname")}}</label>
                                <input type="text" class="form-control" name="surname" id="surname">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone">{{__("Phone")}}</label>
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">{{__("Email")}}</label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="address">{{__("Address")}}</label>
                                <input type="text" class="form-control" name="address" id="address">
                            </div>
                            <button class="btn btn-info">{{__("Add")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
