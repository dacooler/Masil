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
    <style>
        * {
            box-sizing: border-box;
        }

        .side-button {
            width: 100%;
            display: inline;
            padding: 16px;
            padding-left: 36px;
            background-color: inherit;
            border: 0;
            text-wrap: nowrap;
            text-align: left;
        }

        .selected-side-button {
            border-left: 3px solid rgb(98, 190, 233);
            background-color: rgb(246, 246, 246);
        }
    </style>
</head>
<body style="margin: 0; overflow-x: hidden;">

<div style="width: 100%; height: 100vh;">
    <div style="display: flex; flex-direction: column; width: 100%; height: 100%;">
        <div style="flex: 0 0 64px; display: flex; flex-direction: row; justify-content: center; background-color: rgb(98, 190, 233); align-items: center;">
            <div style="flex: 0 1 16px"></div>
            <img style="width: 32px;" src="../assets/images/icons/Bullet-List--Streamline-Core.svg" alt="">
            <div style="flex: 0 1 16px"></div>
            <h2>LiU</h2>
            <div style="flex: 1 0 0"></div>
            <h3>SharePoint</h3>
            <div style="flex: 1 0 0"></div>
            <div style="display: flex; flex-direction: row; background-color: white; height: 50%; align-items: center; border-radius: 8px;">
                <div style="flex: 0 0 8px"></div>
                <img style="width: 16px;" src="../assets/images/icons/Help-Chat-2--Streamline-Core.svg" alt="">
                <div style="flex: 0 0 8px"></div>
                <p style="text-wrap: nowrap">Search this site</p>
                <div style="flex: 0 0 128px"></div>
            </div>
            <div style="flex: 2 0 0"></div>
            <img style="width: 32px;" src="../assets/images/icons/Paperclip-1--Streamline-Core.svg" alt="">
            <div style="flex: 0 1 16px"></div>
            <img style="width: 32px;" src="../assets/images/icons/Cloud--Streamline-Core.svg" alt="">
            <div style="flex: 0 1 16px"></div>
            <img style="width: 32px;" src="../assets/images/icons/Sleep--Streamline-Core.svg" alt="">
            <div style="flex: 0 1 16px"></div>
            <img style="width: 32px;" src="../assets/images/icons/Skull-1--Streamline-Core.svg" alt="">
            <div style="flex: 0 1 16px"></div>
            <img style="width: 32px;" src="../assets/images/icons/Trophy--Streamline-Core.svg" alt="">
            <div style="flex: 0 1 16px"></div>
        </div>
        <div style="flex: 0 0 19; width: 100%;">
            <div style="display: flex; flex-direction: row; width: 100%;">
                <div style="flex 0 0 1fr; display: flex; align-items: right; flex-direction: column; padding: 16px; align-items: center;">
                    <img style="width: 24px;" src="../assets/images/icons/Add-Square--Streamline-Core.svg" alt="">
                    <div style="flex: 0 1 32px"></div>
                    <img style="width: 24px;" src="../assets/images/icons/Alarm-Clock--Streamline-Core.svg" alt="">
                    <div style="flex: 0 1 32px"></div>
                    <img style="width: 24px;" src="../assets/images/icons/Align-Back-1--Streamline-Core.svg">
                    <div style="flex: 0 1 32px"></div>
                    <img style="width: 24px;" src="../assets/images/icons/Archive-Box--Streamline-Core.svg">
                    <div style="flex: 0 1 32px"></div>
                    <img style="width: 24px;" src="../assets/images/icons/Arrow-Down-2--Streamline-Core.svg">
                    <div style="flex: 0 1 32px"></div>
                    <img style="width: 24px;" src="../assets/images/icons/Blank-Calendar--Streamline-Core.svg">
                </div>
                <div style="flex: 0 0 19fr; min-width: 0">
                    <header style="display: flex; flex-direction: row; padding: 1px; padding-left: 32px; background-color: rgb(246, 246, 246)">
                        <p style="flex: 1 1 0">Start / Masil / <?= $course_code ?></p>
                        <div style="flex: 0 0 1px; background-color: rgb(236, 236, 236); margin-right: 8px;"></div>
                        <p style="flex: 0 1 0; text-wrap: nowrap;">Courses and programs</p>
                    </header>
                    <header style="display: flex; flex-direction: row; align-items: center;">
                        <div style="flex: 0 1 16px;"></div>
                        <img src="../assets/images/IT.png" style="width: 60px">
                        <div style="flex: 0 1 64px;"></div>
                        <h1><?= $course_code ?></h1>
                        <div style="flex: 1 1 0"></div>
                        <p>Private Group</p>
                        <div style="flex: 0 1 64px;"></div>
                        <p>Share</p>
                        <div style="flex: 0 1 16px;"></div>
                        <p>...</p>
                        <div style="flex: 0 1 16px"></div>
                    </header>
                    <div style="display: flex; height: 100%;">
                        <div style="display: flex; flex: 15; flex-direction: column;">
                            <button class="side-button selected-side-button">Startsida</button>
                            <button class="side-button">Kursplan</button>
                            <button class="side-button">Kursdokument</button>
                            <button class="side-button">Samarbetsyta</button>
                            <button class="side-button">Medlemmar och grupper</button>
                            <button class="side-button">Schema</button>
                            <button class="side-button">Inlämningar</button>
                        </div>
                        <div style="flex: 0 1 85; height: 100%; min-width: 0;">
                            <div style="display: flex; flex-direction: column; padding-bottom: 16px; width: 100%;">
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
                                    <div style="display: grid; grid-template-columns: 50% 50%; gap: 32px; overflow: hidden;">
                                        <?php foreach ($informations as $info): ?>
                                            <div style="width: 100%; height: 100%;">
                                                <div style="display: flex; height: 100px; width: 100%; justify-content: space-between">
                                                    <img src=<?= $info['img_src'] ?> style="flex: 0 1 40;">
                                                    <div style="width: 16px"></div>
                                                    <div style="flex: 50; overflow: hidden;">
                                                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?= $info['text1'] ?></p>
                                                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?= $info['text2'] ?></p>
                                                        <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?= $info['text3'] ?></p>
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
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>