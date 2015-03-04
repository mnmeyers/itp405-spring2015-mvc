@extends('layout')
@section('page_title')
    Genres
@stop
@section('content')
    <h1>
        DVDs in the {{$genre_name}} Genre
    </h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Label</th>
        </tr>
        </thead>
        <tbody>

        @foreach($dvds as $dvd)


        <tr>
            <td>{{$dvd->title}}</td>
            <td>{{$genre_name}}</td>
            <td>{{$dvd->rating->rating_name}}</td>
            <td>{{$dvd->label->label_name}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop
