@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-success mb-4" href="{{route('owner.create')}}"><i class="fa-solid fa-plus"></i> Create</a>
            <table class="table table-hover table-bordered" style="width:100%">
                <tr class="table-primary">
                    <th>name</th>
                    <th>surname</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>address</th>
                    <th>Actions</th>
                </tr>
                @foreach($owners as $owner)
                <tr>
                    <td>{{$owner->name}}</td>
                    <td>{{$owner->surname}}</td>
                    <td>{{$owner->phone}}</td>
                    <td>{{$owner->email}}</td>
                    <td>{{$owner->address}}</td>
                    <td>
                        <a href="{{route('owner.edit', $owner->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="{{route('owner.delete', $owner->id)}}"><i class="fa-solid fa-trash"></i></a>

                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
