
<!doctype html>
<html>
<head>
    <title>Dvds</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="//ironsummitmedia.github.io/startbootstrap-simple-sidebar/css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Genres</a>

                    <?php foreach ($genres as $genre) : ?>
                <?php $name = $genre->genre_name ?>
                    <li><a href="/genres/<?php echo $name ?>/dvds"><?php echo $genre->genre_name ?></a></li>
                    <?php endforeach ?>

            </li>
        </ul>
    </div>
    <div id="page-content-wrapper">
        <div class="container-fluid">
<h1>
    DVDs
</h1>
<?php if ($title != '') :?>
<p>

    you searched for <?php echo $title ?>
</p>
<?php endif ?>

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
<!--        <th>Review</th>-->
    </tr>
    </thead>
    <tbody>

    <?php foreach ($dvds as $dvd) : ?>
        <tr>
            <?php $id = $dvd->id ?>
            <td><?php echo $dvd->title ?></td>
            <td><?php echo $dvd->genre_name ?></td>
            <td><?php echo $dvd->rating_name ?></td>
            <td><?php echo $dvd->label_name ?></td>
            <td><?php echo $dvd->sound_name ?></td>
            <td><?php echo $dvd->format_name ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($dvd->release_date), 'M j, Y') ?></td>
<!--            <td><a href="dvds/--><?php //echo $id ?><!--">Add Review</a></td>-->
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- jQuery -->
<script src="http://ironsummitmedia.github.io/startbootstrap-simple-sidebar/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="http://ironsummitmedia.github.io/startbootstrap-simple-sidebar/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
