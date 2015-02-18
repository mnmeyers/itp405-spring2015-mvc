<!doctype html>
<html>
<head>
    <title>Results</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<h1>
    Song Search
</h1>
<p>
    you searched for <?php echo $song_title ?>
</p>
<table>
    <thead>
    <tr>
        <th>Artist</th>
        <th>Title</th>
        <th>Genre</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($songs as $song) : ?>
    <tr>
        <td><?php echo $song->artist_name ?></td>
        <td><?php echo $song->title ?></td>
        <td><?php echo $song->genre ?></td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>
</body>
</html>