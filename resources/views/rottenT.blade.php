@extends('layout')
@section('page_title')Reviews
@stop
@section('content')


@foreach($rottentomatoes as $tomato)
<h1>{{$tomato->title}}</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <th>{{$tomato->title}}</th>
        <th>Critics' Score</th>
        <th>Audience Score</th>
        <th>Movie Runtime</th>
        <th>Cast</th>
    </tr>
    </thead>
    <tbody>


    <tr>
        <td><img src="{{$tomato->posters->thumbnail}}"></td>
        <td>{{{$tomato->ratings->critics_score}}}/100</td>
        <td>{{{$tomato->ratings->audience_score}}}/100</td>
        <td>{{$tomato->runtime}} Minutes</td><td>
            @foreach ($tomato->abridged_cast as $castMember)
            {{$castMember->name}}<br>
            @endforeach
        </td>
    </tr>
    @endforeach
    </tbody>
</table>


@stop