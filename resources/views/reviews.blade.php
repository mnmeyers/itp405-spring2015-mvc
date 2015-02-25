@extends('layout')
@section('content')
    <?php $dvd = $dvdDetails[0]; ?>
<h1>{{{$dvd->title}}}</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Label</th>
            <th>Sound</th>
            <th>Format</th>
            <th>Release Date</th>
            <th>Review</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>{{{$dvd->title}}}</td>
            <td>{{{$dvd->genre_name}}}</td>
            <td>{{{$dvd->rating_name}}}</td>
            <td>{{{$dvd->label_name}}}</td>
            <td>{{{$dvd->sound_name}}}</td>
            <td>{{{$dvd->format_name}}}</td>
            <td>{{{DATE_FORMAT(new DateTime($dvd->release_date), 'M j, Y')}}}</td>
            <td><a href="#addreview">Add Review</a></td>
        </tr>
        </tbody>
    </table>
    <h3>Reviews for {{{$dvd->title}}}</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Review Title</th>
            <th>Rating</th>
            <th>Review</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dvdReviews as $review)
        <tr>
            <td>{{{$review->title}}}</td>
            <td>{{{$review->rating}}}</td>
            <td>{{{$review->description}}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        <h3>Add Review for {{{$dvd->title}}}</h3>
        @foreach ($errors->all() as $errorMessage)
            <p>{{$errorMessage}}</p>
        @endforeach
        @if(Session::has('success'))
        <p>{{{Session::get('success')}}}</p>
        @endif
        <form method="post" action={{{url("/dvds/submit")}}}>
            <input type="hidden" name="_token" value="{{{csrf_token()}}}">
            <input type="hidden" name="dvd_id" value="{{{$dvd->id}}}">
            <div class="form-group">
                <label>Rating (1-10)</label>
                <select class="form-control" name="rating">
                    <option></option>
                    <?php $selectRating =  array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');?>
                    @foreach ($selectRating as $select)
                        @if ($select == Request::old('rating'))
                    <option value ="{{{$select}}}" selected="1">{{{$select}}}</option>
                            @else
                            <option value ="{{{$select}}}">{{{$select}}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">

                <label>Title for your review:</label>
                <input type="text" class="form-control" name="review_title" value="{{{Request::old('review_title')}}}">
            </div>

            <div class="form-group">
                <label>Your Review:</label>
                <textarea class="form-control" name="review" value="{{{Request::old('review')}}}"></textarea>
            </div>
            <a name="addreview"></a>
            <button type="submit" class="btn btn-default">Add Review</button>
        </form>
    </div>
@stop