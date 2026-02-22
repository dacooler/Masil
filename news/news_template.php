<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>
<body style="margin: 0; overflow-x: hidden;">

<div style="width: 100%; height: 100vh;">
    <h1 style="text-align: center;">Masil news</h1>
    <div style="display: flex; flex-direction: row;">
        <img style="width: 30%; height: 300px;" src=<?= $img_src ?> alt="">
        <div style="flex: 0 0 16px"></div>
        <div style="display: flex; flex-direction: column">
            <h2><?= $title ?></h2>
            <p><?= $text ?></p>
            <div style="display: flex; flex-direction: row;">
                <p><?= $date ?></p>
                <div style="flex: 1 0 0"></div>
                <p><?= $author ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>