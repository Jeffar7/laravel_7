@extends('layouts.master')

@section('content-header')
    <h1>
        {{$judul}}
        <small></small>
    </h1>

@endsection

@section('content')
    <div class="col-md-8">
        <a href="inventory/create">
            <button class="btn-primary">
                Create position
            </button>
        </a>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Table {{$judul}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>DESCRIPTION</th>
                        <th>DETAIL ARCHIVE</th>
                        <th>ACTION</th>
                    </tr>
                    @foreach($data as $d)
                        <tr>
                            <td>#</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->description}}</td>
                            <td>{{$d->archive->name}}</td>
                            <th>
                                <a href="/inventory/edit/{{$d->id}}">EDIT</a>
                                |
                                <a href="/inventory/delete/{{$d->id}}">DELETE</a>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-4">

    </div>

@endsection
