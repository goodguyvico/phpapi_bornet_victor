
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

    <h1>Les Chats</h1>
    <form action="index.php?action=catList" method="post">
    <label for="cat"></label>
    <select name="cat" id="cat">
        <option value="0">Veuillez choisir un chat</option>
        <?php
        foreach ($cats as $cat): ?>
            <option value="<?php
            echo $cat->name;
            ?>"><?php
                echo $cat->name;
                ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button class="btn btn-dark mt-3" type="submit" name="valid" value="valid">Valider
    </button>
    </body>

<?php if (!empty ($_POST['cat'])): ?>
<p><?php echo $cat->temperament ?></p>
<p><?php echo $cat->description ?></p>
<p><?php echo $cat->origin ?></p>
<p><?php echo $cat->image ?></p>
<?php endif; ?>
</html>