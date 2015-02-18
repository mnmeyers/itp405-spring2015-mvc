<!doctype html>
<html>
<head>
    <title>Dvds</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<h1>
    DVDs
</h1>
<?php if ($title != '') :?>
<p>

    you searched for <?php echo $title ?>
</p>
<?php endif ?>
<?php// var_dump($dvds); ?>
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
    </tr>
    </thead>
    <tbody>

    <?php foreach ($dvds as $dvd) : ?>
        <tr>

            <td><?php echo $dvd->title ?></td>
            <td><?php echo $dvd->genre_name ?></td>
            <td><?php echo $dvd->rating_name ?></td>
            <td><?php echo $dvd->label_name ?></td>
            <td><?php echo $dvd->sound_name ?></td>
            <td><?php echo $dvd->format_name ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($dvd->release_date), 'M j, Y') ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
</body>
