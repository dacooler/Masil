<?php
    $informations = [
        [
            "img_src" => "../assets/images/kurssida1.png",
            "text1" => "Create a news post",
            "text2" => "Keep your audience engaged by sharing your latest updates.",
            "text3" => "now",
        ],
        [
            'img_src' => '../assets/images/kurssida2.png',
            'text1' => 'Keep your team updated with news on your team site',
            'text2' => 'From the site home page you\'ll be able to quickly author a news post - a status update, trip report, or even just highlight a document with some additional context provided to the team.',
            'text3' => 'SharePoint now',
        ],
        [
            'img_src' => '../assets/images/kurssida3.png',
            'text1' => 'What is a team site?',
            'text2' => 'A SharePoint team site connects you and your team to the content, information, and apps you rely on every day. For example, you can use a team site to store and collaborate on files or to create and manage lists of information. On a team site home page, you can view links to important team files, apps, and web pages and see recent site activity in the activity feed.',
            'text3' => 'SharePoint now',
        ],  
        [
            'img_src' => '../assets/images/kurssida4.png',
            'text1' => 'Add a page to a site',
            'text2' => 'Using pages is a great way to share ideas using images, Excel, Word and PowerPoint documents, video, and more. You can create and publish pages quickly and easily, and they look great on any device. When you create a page, you add and customize web parts with a toolbox available right in the editing pane. And, you can publish with just a click.',
            'text3' => 'SharePoint now',
        ],
    ];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Default Title" ?></title>
</head>
<body style="margin: 0">


<div style="display: flex; flex-direction: row; width: 100vw; height: 100vh;">
    <div style="flex: 15">
        <button style="display: inline; margin: 8px; margin-left: 24px;">Startsida</button>
        <button style="display: inline; margin: 8px; margin-left: 24px;">Kursplan</button>
        <button style="display: inline; margin: 8px; margin-left: 24px;">Kursdokument</button>
        <button style="display: inline; margin: 8px; margin-left: 24px;">Samarbetsyta</button>
        <button style="display: inline; margin: 8px; margin-left: 24px;">Medlemmar och grupper</button>
        <button style="display: inline; margin: 8px; margin-left: 24px;">Schema</button>
        <button style="display: inline; margin: 8px; margin-left: 24px;">Inlämningar</button>
    </div>
    <div style="flex: 85; height: 100%">
        <header style="margin: 16px;">
            <h1><?= $course_code ?></h1>
        </header>
        <div style="display: flex; flex-direction: column; padding-top: 16px; padding-bottom: 16px; width: 100%;">
            <div style="display: flex; background-color: rgb(246, 246, 246); padding: 16px;">
                <div style="width: 40%;">
                    <h2>Välkommen till ditt kursrum!</h2>
                    <p>Skriv din text här...</p>
                </div>
                <div style="width: 30%;"></div>
                <div style="width: 30%">
                    <h2 style="color: blue;">Something went wrong</h2>
                    <p style="color: blue;">Something went wrong If the problem persists, contact the site administrator and give them the information in Technical Details.</p>
                    <p style="color: blue;">Technical Details</p>
                    <p>ERROR:</p>
                    <p>[object Object]</p>
                </div>
            </div>
            <div style="margin: 16px; width: 100%;">
                <h3>Nyheter från kursrummet</h3>
                <p>Add</p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; gap: 32px;">
                    <?php foreach ($informations as $info): ?>
                        <div style="width: 100%; height: 100%;">
                            <div style="display: flex; height: 100px; width: 100%; justify-content: space-between">
                                <img src=<?= $info['img_src'] ?> style="flex: 0 0 40;">
                                <div style="flex: 50; overflow: hidden;">
                                    <p style="text-overflow: ellipsis; text-wrap: nowrap; width: 100px;"><?= $info['text1'] ?></p>
                                    <p style="text-overflow: ellipsis; text-wrap: nowrap; width: 100px;"><?= $info['text2'] ?></p>
                                    <p style="text-overflow: ellipsis; text-wrap: nowrap; width: 100px;"><?= $info['text3'] ?></p>
                                </div>
                            </div>
                            <hr style="margin-top: 24px">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <footer style="margin: 16px; background-color: rgb(246, 246, 246); padding: 16px; margin: 0;">
            <h3>Kontakta oss lärare</h3>
            <p>Edit the page and select a person</p>
        </footer>
    </div>
</div>

</body>
</html>