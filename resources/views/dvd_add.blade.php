@extends('layout')
@section('page_title')
    Add Dvd
@stop
@section('content')
    <h1>
        Add DVD
    </h1>
    @if (Session::has('success'))
    <div class="alert">{{{Session::get('success')}}}</div>
    @endif
    <form method="post" class="navbar-form navbar-left" action={{{url("/dvds")}}}>
        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
        <div class="form-group">
            <label>
                DVD Title:
            </label>
            <input type="text" class="form-control" placeholder="DVD Title" name="dvd_title">
        </div><br>

        <div class="form-group">
            <label>
                Label:
            </label>
            <select class="form-control" name="label">
                <option>All</option>
                @foreach($labels as $label)
                    @if ($label == Request::old('label'))
                        <option selected="1" value="{{{$label->id}}}">{{{$label->label_name}}}</option>
                        @else
                    <option value="{{{$label->id}}}">{{{$label->label_name}}}</option>
                    @endif

                @endforeach

            </select>
        </div><br>

        <div class="form-group">
            <label>
                Sound:
            </label>
            <select class="form-control" name="sound">
                <option>All</option>
                @foreach($sounds as $sound)
                    <option value="{{{$sound->id}}}">{{{$sound->sound_name}}}</option>

                @endforeach
            </select>
        </div><br>

        <div class="form-group">
            <label>
                Genre:
            </label>
            <select class="form-control" name="genre">
                <option>All</option>
                @foreach($genres as $genre)
                    <option value="{{{$genre->id}}}">{{{$genre->genre_name}}}</option>

                @endforeach
            </select>
        </div><br>

        <div class="form-group">
            <label>
                Rating:
            </label>
            <select class="form-control" name="rating">
                <option>All</option>
                @foreach($ratings as $rating)
                    <option value="{{{$rating->id}}}">{{{$rating->rating_name}}}</option>

                @endforeach
            </select>
        </div><br>

        <div class="form-group">
            <label>
                Format:
            </label>
            <select class="form-control" name="format">
                <option>All</option>
                @foreach($formats as $format)
                    <option value="{{{$format->id}}}">{{{$format->format_name}}}</option>

                @endforeach
            </select>
        </div><br>

        <div class="form-group">
            <input type="submit" name="submit" value="Add DVD">

        </div>
    </form>
@stop
