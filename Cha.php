<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>character</title>
    <style>
        .title{
            width: 100%;
            height: 100px;
            border: 1px solid red;
            font-size: 80px;
            text-align: center;
            margin-top: 2rem;
        }
        .container{
            width: 1360px;
            height: 800px;
            margin: 0 auto;
            margin-top: 1rem;
            display: flex;
            flex-wrap: wrap;
            padding-left: 17rem;
        }
        .card{
            width: 330px;
            height: 500px;
            border: 1px solid blue;
            margin-right: 50px;
            margin-bottom: 50px;
        }
        .img-cat > img{
            width: 100%;
            height: 250px;
            background-color: blue;
        }
        .story{
            height: 170px;
            border: 1px solid red;
        }
        .submit{
            margin: 0 auto;
            width: 200px;
            height: 70px;
            border: 1px solid green;
        }
        .submit{
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>
</head>
<body>
    <div class="title"><em>Character</em></div>
    <div class="container">
        <div class="card">
            <div class="img-cat"><img src="https://storage.googleapis.com/sticker-prod/h3fYKAtBc7bJHvjP2MDW/22.thumb128.png" alt="maze"></div>
            <div class="text-cat">
                <div class="story">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam maiores sit facilis corporis omnis consequatur tempore est suscipit deserunt ea?</div>
                <div class="submit" onclick="img1()">Start</div>
            </div>
        </div>
        <div class="card">
            <div class="img-cat"><img src="https://storage.googleapis.com/sticker-prod/h3fYKAtBc7bJHvjP2MDW/12.thumb128.png" alt=""></div>
            <div class="text-cat">
                <div class="story">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam maiores sit facilis corporis omnis consequatur tempore est suscipit deserunt ea?</div>
                <div class="submit" onclick="img2()">Start</div>
            </div>
        </div>
        <div class="card">
            <div class="img-cat"><img src="https://storage.googleapis.com/sticker-prod/liGbkkeb2daR2aGjEjVM/14-2.thumb128.png" alt=""></div>
            <div class="text-cat">
                <div class="story">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam maiores sit facilis corporis omnis consequatur tempore est suscipit deserunt ea?</div>
                <div class="submit" onclick="img3()">Start</div>
            </div>
        </div>
        <div class="card">
            <div class="img-cat"><img src="https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/36-2.thumb128.png" alt=""></div>
            <div class="text-cat">
                <div class="story">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam maiores sit facilis corporis omnis consequatur tempore est suscipit deserunt ea?</div>
                <div class="submit" onclick="img4()">Start</div>
            </div>
        </div>
        <div class="card">
            <div class="img-cat"><img src="https://storage.googleapis.com/sticker-prod/Y6HmEbLim68pXhi6K8P1/14.thumb128.png" alt=""></div>
            <div class="text-cat">
                <div class="story">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam maiores sit facilis corporis omnis consequatur tempore est suscipit deserunt ea?</div>
                <div class="submit" onclick="img5()">Start</div>
            </div>
        </div>
        <div class="card">
            <div class="img-cat"><img src="https://storage.googleapis.com/sticker-prod/XvNkRGoJzmoS2C12Tc4q/18-1.thumb128.webp" alt=""></div>
            <div class="text-cat">
                <div class="story">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam maiores sit facilis corporis omnis consequatur tempore est suscipit deserunt ea?</div>
                <div class="submit" onclick="img6()">Start</div>
            </div>
        </div>
        <div class="card">
            <div class="img-cat"><img src="https://storage.googleapis.com/sticker-prod/tSgft396GlxTD9p7dnJ6/0.thumb128.png" alt=""></div>
            <div class="text-cat">
                <div class="story">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam maiores sit facilis corporis omnis consequatur tempore est suscipit deserunt ea?</div>
                <div class="submit" onclick="img7()">Start</div>
            </div>
        </div>
        <div class="card">
            <div class="img-cat"><img src="https://storage.googleapis.com/sticker-prod/E8nMrPPN3Ifr0NH4370g/7-1.thumb128.png" alt=""></div>
            <div class="text-cat">
                <div class="story">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam maiores sit facilis corporis omnis consequatur tempore est suscipit deserunt ea?</div>
                <div class="submit" onclick="img8()">Start</div>
            </div>
        </div>
    </div>

    <script>
        function img1(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/h3fYKAtBc7bJHvjP2MDW/22.thumb128.png"
        }
        function img2(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/h3fYKAtBc7bJHvjP2MDW/12.thumb128.png"
        }
        function img3(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/liGbkkeb2daR2aGjEjVM/14-2.thumb128.png"
        }
        function img4(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/36-2.thumb128.png"
        }
        function img5(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/Y6HmEbLim68pXhi6K8P1/14.thumb128.png"
        }
        function img6(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/XvNkRGoJzmoS2C12Tc4q/18-1.thumb128.webp"
        }
        function img7(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/tSgft396GlxTD9p7dnJ6/0.thumb128.png"
        }
        function img8(){
            window.location.href = "Maze.php?img="+"https://storage.googleapis.com/sticker-prod/E8nMrPPN3Ifr0NH4370g/7-1.thumb128.png"
        }

    </script>
</body>
</html>