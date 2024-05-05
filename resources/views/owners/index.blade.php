@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-success mb-4" href="{{route('owner.create')}}"><i class="fa-solid fa-plus"></i> {{__("Create")}} </a>
            <a class="btn btn-primary mb-4 ms-3" href="{{route('cars.index')}}">{{__("Cars")}}</a>
            <h6>{{__("Phone Number:")}}  [[phone]]</h6>
            <h6>{{__("Email:")}}  [[email]]</h6>
            <table class="table table-hover table-bordered" style="width:100%">
                <tr class="table-primary">
                    <th colspan="7" style="text-align:center; border-bottom: 2px solid black;" >{{__("Owners")}}</th>
                </tr>
                <tr class="table-primary">
                    <th>{{__("Name")}}</th>
                    <th>{{__("Surname")}}</th>
                    <th>{{__("Phone")}}</th>
                    <th>{{__("Email")}}</th>
                    <th>{{__("Address")}}</th>
                    <th>{{__("Cars")}}</th>
                    <th>{{__("Actions")}}</th>
                </tr>
                @foreach($owners as $owner)
                    @can('view', $owner)
                <tr>
                    <td>{{$owner->name}}</td>
                    <td>{{$owner->surname}}</td>
                    <td>{{$owner->phone}}</td>
                    <td>{{$owner->email}}</td>
                    <td>{{$owner->address}}</td>
                    <td>
                        @foreach($owner->cars as $car)
                            {{$car->brand}} {{$car->model}} <br>
                        @endforeach
                    </td>
                    <td>
                        @can('update', $owner)
                        <a href="{{route('owner.edit', $owner->id)}}"><i style="color:orange" class="fa-regular fa-pen-to-square"></i></a>
                        @endcan
                        @can('delete', $owner)
                        <a href="{{route('owner.delete', $owner->id)}}" onclick="return confirm('{{__('Are you sure?')}}')"><i style="color:red" class="fa-solid fa-trash"></i></a>
                        @endcan
                    </td>
                </tr>
                    @endcan
                @endforeach
            </table>
            <h4 style="text-align: center">[[year]]</h4>
        </div>
    </div>
</div>
@endsection
