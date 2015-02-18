<!doctype html>
<html>
<head>
    <title>DVD Search</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<h1>
   DVD Search
</h1>
<form class="navbar-form navbar-left" action="/dvds" method="get">
    <div class="form-group">
        <label>
           DVD Title:
        </label>
        <input type="text" class="form-control" placeholder="DVD Title" name="title">
    </div><br>

    <div class="form-group">
        <label>
           Genre:
        </label>
        <select class="form-control" name="genre">
            <option>All</option>
            <?php
            foreach($genres as $genre):
                ?>
                <option><?php echo $genre->genre_name ?></option>
            <?php
            endforeach;
            ?>
        </select>
    </div><br>

    <div class="form-group">
        <label>
            Rating:
        </label>
        <select class="form-control" name="rating">
            <option>All</option>
            <?php
            foreach($ratings as $rating):
                ?>
                <option><?php echo $rating->rating_name ?></option>
            <?php
            endforeach;
            ?>
        </select>
    </div><br>

    <div class="form-group">
        <label>
        </label>

            <input type="submit" name="submit" value="Search">

    </div>
</form>

</body>
</html>