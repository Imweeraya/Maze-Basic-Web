<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>

    <title>Maze Game</title>
    <style>
        * {

            background-size: cover;

        }

        body {
            background-color: #ffc0cb;
            font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .top {
            width: 100%;
            height: 100px;
            align-items: center;
            display: flex;
            justify-content: center;
            margin-top: 7rem;
        }

        .title-g {
            font-size: 135px;
            margin: 0 3rem;
            color: #504136;
            text-shadow: 3px 2px #36827F;
            font-family: 'Courier New', Courier, monospace;
        }

        .container {
            width: 1000px;
            height: 500px;
            margin: 0 auto;
            padding-top: 7rem;
        }

        .button-maze {
            width: 500px;
            height: 100px;
            margin: 3rem auto;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #504136;
            font-size: 40px;
            color: #F6F3E4;
            text-shadow: 1px 2px gray;
            box-shadow: 0.7rem 0.7rem #8f7968;
            font-family: 'Courier New', Courier, monospace;
            transition: background-color 0.3s ease;
        }

        .button-maze:hover {
            background-color: #f5c6c9;
        }
    </style>
</head>

<body>
    <audio controls loop autoplay>
        <source srcset="BMGPM_GRML0059_020_Game_On_A_Day-Off__Ohmori.mp3" type="audio/mp3">
    </audio>

    <div class="top">
        <div class="img-l"><img src="https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/3-2.thumb128.png" alt="cat-l"></div>
        <div class="title-g"><em>Kitten Maze</em></div>
        <div class="img-r"><img src="https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/12-2.thumb128.png" alt="cat-r"></div>
    </div>
    <div class="container">
        <div class="button-maze" onclick="maze()">Start</div>
        <div class="button-maze" onclick="character()">Select Character</div>
        <div class="button-maze" onclick="showPopup()">How to play</div>
    </div>
    <?php echo "hi" ?>
    <script>
        function maze() {
            window.location.href = "Maze.html"
        }

        function character() {
            window.location.href = "Cha.html"
        }

        function showPopup() {
            Swal.fire({
                title: 'How to play Kitten Maze',
                html: `
                <p>Use the arrow keys to move the kitten through the maze.</p>
                <p>Find the key to unlock the exit.</p> 
                <p>Avoid the BOMB and reach the end to win!</p>
                <p>Cake is special gift</p>
                `,
                imageUrl: 'https://cdn-icons-png.flaticon.com/512/3468/3468341.png',
                imageWidth: 200,
                imageHeight: 200,
                imageAlt: 'Cat',
                padding: '2em',
                confirmButtonText: 'Got it!',
                background: '#ffc0cb url(https://sweetalert2.github.io/#downloadimages/trees.png) ',
                backdrop: `
                    rgba(0,0,123,0.4)
                    url("https://media.tenor.com/xzjlrhYq_lQAAAAj/cat-nyan-cat.gif")
                    left top
                    no-repeat
                `
            })


        }
    </script>
</body>

</html>