@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-success mb-4" href="{{route('cars.create')}}"><i class="fa-solid fa-plus"></i> {{__("Create")}}</a>
            <a class="btn btn-primary mb-4 ms-3" href="{{route('owner.index')}}">{{__("Owners")}}</a>
            <h6> {{__("Phone Number:")}} [[phone]]</h6>
            <h6>{{__("Email:")}} [[email]]</h6>
            <table class="table table-hover table-bordered" style="width:100%">
                <tr class="table-primary">
                    <th colspan="7" style="text-align:center; border-bottom: 2px solid black;" >{{__("CARS")}}</th>
                </tr>
                <tr class="table-primary">
                    <th>{{__("Registration Number")}}</th>
                    <th>{{__("Brand")}}</th>
                    <th>{{__("Model")}}</th>
                    <th>{{__("Owner")}}</th>
                    <th colspan="2">{{__("Actions")}}</th>
                </tr>
                @foreach($cars as $car)
                    <tr>
                        <td>{{$car->reg_number}}</td>
                        <td>{{$car->brand}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->owner->name ?? ''}} {{$car->owner->surname ?? ''}}</td>
                        <td>
                            <a href="{{route('cars.edit', $car->id)}}"><i style="color:orange" class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('cars.destroy', $car) }}">
                                @csrf
                                @method("delete")
                                <button class="fa-solid fa-trash" onclick="return confirm('{{__('Are you sure?')}}')" style="color:red; border:none; background:none"></button>
                            </form>
                            </div>
                        </td>
                </tr>
                @endforeach
            </table>
            <h4 style="text-align: center">[[year]]</h4>
        </div>
    </div>
</div>
@endsection
