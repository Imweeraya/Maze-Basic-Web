<?php 
$image = $_GET['img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
   
   * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #ffc0cb;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width: 100vw;
        height: 100vh;
    }

    h1 {
        font-size: 50px;
        color: black;
        margin-bottom: 20px;
        font-family: 'Courier New', Courier, monospace;
    }

    #maze-container {
        border: 10px solid black;
        position: relative;
        display: flex;
        flex-direction: column;
        width: max-content;
    }

    .row {
        display: flex;
    }

    .cell {
        width: 30px;
        height: 30px;
        background-color: #F2D1D1;
    }

    .wall {
        background-color: black;
    }

    .bomb {
        content: url(https://creazilla-store.fra1.digitaloceanspaces.com/cliparts/60401/bomb-clipart-xl.png);
    }

    .cupcake {
        content: url(https://static.vecteezy.com/system/resources/previews/019/606/495/non_2x/cupcake-graphic-clipart-design-free-png.png);
    }

    .key {
        content: url(https://www.pngmart.com/files/8/Key-PNG-Free-Image-1.png);
    }

    .timer {
        background-color: #FFEBEB;
        color: rgb(0, 0, 0);
        margin-top: 310px;
        margin-left: 140px;
        text-align: center;
        font-size: 24px;
        padding: 40px;
        border-radius: 8px;
        font-weight: bold;
        position: absolute;
        top: 0;
        left: 20px;
    }

    #maze-container {
        margin-top: 20px;
        position: relative;
    }

    #kitten {
        position: absolute;
        height: 30px;
        width: 30px;
        bottom: 0px;
        left: 30px;
    }

    #house {
        position: absolute;
        right: 30px;
        top: 0;
    }

    .score-board {
        display: grid;
        grid-template-columns: 1fr 1fr;
        justify-content: flex-end;
        margin-top: 300px;
        margin-right: 50px;
        gap: 40px;
        position: absolute;
        top: 0;
        right: 20px;
    }

    .board-cupcakescore {
        text-align: center;
        padding: 20px;
        background-color: #FFD3B0;
        border-radius: 7px;
    }

    .board-keyscore {
        text-align: center;
        padding: 20px;
        background-color: #FFD3B0;
        border-radius: 7px;
    }

    .cupcake-title,
    .key-title {
        font-weight: bold;
    }

    .cupcake-score,
    .key-score {
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
    }

    .Restart-button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #F29393;
        color: #FCE2DB;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 20px;
    }

    .Restart-button:hover {
        background-color: #ffc6ae;
        color: #F29393;
    }



    
</style>

<body onload="createMaze()" style="font-family: Open Sans, -apple-system, BlinkMacSystemFont,Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell,Helvetica Neue, Helvetica, Arial, sans-serif;">
    
    <h1> Kitten Maze</h1>
    <div id="maze-container">
        <div id="character"><img src="<?php echo $image;?>" id="kitten" alt="kitten" width="30px" height="30px">
        <img src="https://cdn-icons-png.flaticon.com/512/3048/3048222.png" id="house" alt="house" width="30px" height="30px">
        </div>
        <div id="maze"></div>
    </div>
    <?php  echo $image;?>

    <div class="score_board">

        <div class="board cupcakescore">
          <div class="cupcake-title">
            CUPCAKE
          </div>
          <div class="cupcake-score">
            <p id="cakescore">0</p>
          </div>
        </div>

        <div class="board keyscore">
          <div class="key-title">
            KEY
          </div>
          <div class="key-score">
            <p id="keyscore">0</p>
          </div>
        </div>
    </div>
    
    <div id="timer" class="timer"></div>



    <button class="Restart-button" onclick="restart()"> Restart </button>



</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>


    let maze = document.getElementById("maze");
    let maze_con = document.getElementById("maze-container");
    let character = document.getElementById("character");
    let kitten = document.getElementById("kitten");
    let house = document.getElementById("house");

    // ------------------------------ Time ------------------------------------

var seconds = 60;

           
function NubwiNatee(){
    
    var mimnutes = Math.round((seconds - 30) / 60);
    var Nubwi = seconds % 60;

    if(Nubwi < 10){
        Nubwi = "0" + Nubwi;
    }

    document.getElementById("timer").innerHTML = mimnutes + " : " + Nubwi;

    if(seconds == 0){
        seconds = null;
        Swal.fire({
        imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/23-2.thumb128.png',
        imageHeight: 150,
        title : 'OHH TIME OUT...MEOWWWW!!',
        text: 'Click button to try again Meow!',
        imageAlt: 'A tall image',
        confirmButtonText: 'MEOW'}).then((result) => {
            if (result.isConfirmed) {
                count = 1;
                createMaze();
                return;
            }else{
                count = 1;
                createMaze();
                return;
            }
        })
    }else{
        seconds--;
    }
    
}
var countdownTimer = setInterval('NubwiNatee()',1000)


/*-----------------------------------------------------------------------------------------*/

    function setKittenPosition(x,y){
        kitten.style.bottom = x + "px";
        kitten.style.left = y + "px";
    }

    function setHousenPosition(x,y){
        house.style.top = x + "px";
        house.style.right = y + "px";
    }

    function setBombPosition(x,y){
        kitten.style.bottom = x + "px";
        kitten.style.left = y + "px";
    }

    var map =
        [  //position(add class)1 0=wall , 1=space , 2=kitten  , 3=cupcake , 5=bomb  position(active)2  0=nothing , 1=boom bomb , 2=collect cupcake
            // cupcake [3,2]  , bomb [5,1] , kitten [2,0] , wall [0,0] , space [1,0]
        [[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[1,0],[0,0]],
        [[0,0],[4,3],[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[0,0],[3,2],[5,1],[1,0],[0,0]],
        [[0,0],[1,0],[1,0],[1,0],[5,1],[1,0],[0,0],[1,0],[0,0],[1,0],[5,1],[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[0,0],[1,0],[0,0],[1,0],[1,0],[0,0],[1,0],[0,0],[1,0],[0,0],[0,0],[0,0]],
        [[0,0],[5,1],[0,0],[0,0],[0,0],[0,0],[0,0],[1,0],[3,2],[5,1],[1,0],[0,0],[1,0],[1,0],[1,0],[0,0],[3,2],[0,0]],
        [[0,0],[3,2],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0],[0,0],[1,0],[0,0],[0,0],[0,0],[0,0],[0,0],[1,0],[0,0]],
        [[0,0],[1,0],[0,0],[1,0],[0,0],[1,0],[0,0],[1,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[1,0],[1,0],[1,0],[0,0],[1,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[5,1],[1,0],[0,0]],
        [[0,0],[1,0],[0,0],[3,2],[0,0],[1,0],[1,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[0,0],[1,0],[0,0],[1,0],[0,0]],
        [[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[5,1],[1,0],[0,0],[1,0],[0,0],[0,0],[3,2],[1,0],[1,0],[0,0],[1,0],[0,0]],
        [[0,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0],[1,0],[1,0],[1,0],[5,1],[0,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[0,0],[1,0],[0,0],[0,0],[0,0],[0,0],[1,0],[0,0],[0,0],[0,0],[1,0],[1,0],[0,0],[0,0],[0,0],[0,0],[0,0]],
        [[0,0],[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[0,0],[1,0],[0,0],[1,0],[0,0],[5,1],[0,0],[0,0],[1,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[1,0],[0,0]],
        [[0,0],[1,0],[1,0],[5,1],[3,2],[0,0],[3,2],[0,0],[1,0],[1,0],[1,0],[0,0],[0,0],[3,2],[1,0],[0,0],[1,0],[0,0]],
        [[0,0],[1,0],[1,0],[1,0],[0,0],[0,0],[1,0],[0,0],[1,0],[0,0],[1,0],[1,0],[0,0],[0,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0],[0,0],[3,2],[1,0],[1,0],[1,0],[5,1],[1,0],[0,0]],
        [[0,0],[2,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]]
        ]


    var count = 0
    var count_Cupcake = 0
    var key = 0;


    function createMaze(){

        NubwiNatee();
        
        if(count == 1){
            
            seconds = 59; 
            count = 0
            count_Cupcake = 0
            key = 0
            

            character.innerHTML=`<img src="<?php echo $image;?>" id="kitten" alt="kitten" width="30px" height="30px">
        <img src="https://cdn-icons-png.flaticon.com/512/3048/3048222.png" id="house" alt="house" width="30px" height="30px"> `
        

            
           
        map = [  //position(add class)1 0=wall , 1=space , 2=kitten  , 3=cupcake , 5=bomb  position(active)2  0=nothing , 1=boom bomb , 2=collect cupcake
            // cupcake [3,2]  , bomb [5,1] , kitten [2,0] , wall [0,0] , space [1,0]
        [[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[1,0],[0,0]],
        [[0,0],[4,3],[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[0,0],[3,2],[5,1],[1,0],[0,0]],
        [[0,0],[1,0],[1,0],[1,0],[5,1],[1,0],[0,0],[1,0],[0,0],[1,0],[5,1],[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[0,0],[1,0],[0,0],[1,0],[1,0],[0,0],[1,0],[0,0],[1,0],[0,0],[0,0],[0,0]],
        [[0,0],[5,1],[0,0],[0,0],[0,0],[0,0],[0,0],[1,0],[3,2],[5,1],[1,0],[0,0],[1,0],[1,0],[1,0],[0,0],[3,2],[0,0]],
        [[0,0],[3,2],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0],[0,0],[1,0],[0,0],[0,0],[0,0],[0,0],[0,0],[1,0],[0,0]],
        [[0,0],[1,0],[0,0],[1,0],[0,0],[1,0],[0,0],[1,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[1,0],[1,0],[1,0],[0,0],[1,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[5,1],[1,0],[0,0]],
        [[0,0],[1,0],[0,0],[3,2],[0,0],[1,0],[1,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[0,0],[1,0],[0,0],[1,0],[0,0]],
        [[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[5,1],[1,0],[0,0],[1,0],[0,0],[0,0],[3,2],[1,0],[1,0],[0,0],[1,0],[0,0]],
        [[0,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0],[1,0],[1,0],[1,0],[5,1],[0,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[0,0],[1,0],[0,0],[0,0],[0,0],[0,0],[1,0],[0,0],[0,0],[0,0],[1,0],[1,0],[0,0],[0,0],[0,0],[0,0],[0,0]],
        [[0,0],[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[0,0],[1,0],[0,0],[1,0],[0,0],[5,1],[0,0],[0,0],[1,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[1,0],[0,0]],
        [[0,0],[1,0],[1,0],[5,1],[3,2],[0,0],[3,2],[0,0],[1,0],[1,0],[1,0],[0,0],[0,0],[3,2],[1,0],[0,0],[1,0],[0,0]],
        [[0,0],[1,0],[1,0],[1,0],[0,0],[0,0],[1,0],[0,0],[1,0],[0,0],[1,0],[1,0],[0,0],[0,0],[1,0],[1,0],[1,0],[0,0]],
        [[0,0],[1,0],[0,0],[1,0],[1,0],[1,0],[1,0],[1,0],[1,0],[0,0],[0,0],[3,2],[1,0],[1,0],[1,0],[5,1],[1,0],[0,0]],
        [[0,0],[2,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]]
        ]
        }
        
        maze.innerHTML = ``

        document.getElementById("cakescore").innerHTML = count_Cupcake + "pieces";
        document.getElementById("keyscore").innerHTML = key + "pieces";
        

        
        
       /* maze.innerHTML=`<img src="https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/37-2.thumb128.png" id="kitten" alt="kitten" width="30px" height="30px">
        <img src="https://cdn-icons-png.flaticon.com/512/3048/3048222.png" id="house" alt="house" width="30px" height="30px">`;
        let po = getKittenPosition();
        kitten.style.bottom = (po[0]*30) + "px";
        kitten.style.left = (po[1]*30) + "px";*/

        


     

        for(let i=0 ; i < map.length; i++){
            let row = document.createElement("div"); //สร้าง div แต่ละ row (0-3): <div></div>
            row.classList.add("row"); //ใส่ชื่อ class row  : <div class="row"></div>

            for(let j=0 ; j< map[i].length ;j++){
                let cell = document.createElement("div");
                cell.classList.add("cell"); 

                /*
                    <div class="row">

                        <div class="wall cell" ></div>
                        <div class="cell" ></div>
                        <div class="cell" ></div>
                        <div class="cell" ></div>
                    
                    </div>
                
                */

                if(map[i][j][0] == 0){
                    cell.classList.add("wall");
                }

                if(map[i][j][0] == 5){
                    cell.classList.add("bomb");
                }

                if(map[i][j][0] == 3){
                    cell.classList.add("cupcake");
                }

                if(map[i][j][0] == 4){
                    cell.classList.add("key");
                }



                if(i == 0 && j == 0){
                    map[i][j][0] = 2; //กำหนดตำแหน่งแมวเป็น 2 คือจุด 0 0
                }
                row.appendChild(cell); //ให้ div cell อยู่ใน div row
                
            }
            maze.appendChild(row); //ให้ div row อยู่ใน div maze
        }

      
        //setKittenPosition(0,30);
        /*setHousePosition(0,30);*/

    }


    function getKittenPosition(){
        let position = [-1,-1]; //กำหนดไว้ชั่วคราว
        for(let i=0 ; i<map.length ; i++){
            for(let j=0 ; j<map[i].length ; j++){
                if(map[i][j][0]==2){
                    position[0] = i;
                    position[1] = j;
                }
            }
        }

        console.log(position);
        return position;
    }

    /*var kitleft = 0;
    var kittop = 0;*/

    document.addEventListener("keydown",
    function (e){
        kitten = document.getElementById("kitten");
        house = document.getElementById("house");

        let kittenLeft = kitten.offsetLeft;
        let kittenTop = kitten.offsetTop;

        let houseLeft = house.offsetLeft;
        let houseTop = house.offsetTop;

        let kittenPosition = getKittenPosition();

        if((e.key == "ArrowRight" || e.key == "d") && kittenLeft < (map.length - 1)*30 && map[kittenPosition[0]][kittenPosition[1] + 1 ][0] != 0){   
                kittenLeft += 30;

                if(map[kittenPosition[0]][kittenPosition[1] + 1 ][1] == 1){
                    seconds = null;
                    Swal.fire({
                    imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/19-2.thumb128.png',
                    imageHeight: 150,
                    title : 'OH THIS IS BOOM MEOWWWW!!',
                    text: 'Click button to try again Meow!',
                    imageAlt: 'A tall image',
                    confirmButtonText: 'MEOW'}).then((result) => {
                        if (result.isConfirmed) {
                            count = 1;
                            createMaze();
                            return;
                        }else{
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                }

                if(map[kittenPosition[0]][kittenPosition[1] + 1 ][1] == 2){
                    count_Cupcake = count_Cupcake+1
                    kitten.style.left = kittenLeft + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0]][kittenPosition[1] + 1 ][0]  = 2;
                    map[kittenPosition[0]][kittenPosition[1] + 1 ][1] = 0;
                    console.log("cupcake" + count_Cupcake)
                    createMaze();
                    return;
                }

                kitten.style.left = kittenLeft + "px";
                map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                map[kittenPosition[0]][kittenPosition[1] + 1 ][0]  = 2;
                

            
        }

        if((e.key == "ArrowLeft" || e.key == "a") && kittenLeft > 0 && map[kittenPosition[0]][kittenPosition[1] - 1 ][0] != 0 ){
                kittenLeft -= 30;
                
                if(map[kittenPosition[0]][kittenPosition[1] - 1 ][1] == 1){
                    seconds = null;
                    Swal.fire({
                    imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/19-2.thumb128.png',
                    imageHeight: 150,
                    title : 'OH THIS IS BOOM MEOWWWW!!',
                    text: 'Click button to try again Meow!',
                    imageAlt: 'A tall image',
                    confirmButtonText: 'MEOW'}).then((result) => {
                        if (result.isConfirmed) {
                            count = 1;
                            createMaze();
                            return;
                        }else{
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                }

                if(map[kittenPosition[0]][kittenPosition[1] - 1 ][1] == 2){
                    count_Cupcake = count_Cupcake+1
                    kitten.style.left = kittenLeft + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0]][kittenPosition[1] - 1 ][0]  = 2;
                    map[kittenPosition[0]][kittenPosition[1] - 1 ][1] = 0;
                    console.log("cupcake" + count_Cupcake)
                    createMaze();
                    return;
                }
                kitten.style.left = kittenLeft + "px";
                map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                map[kittenPosition[0]][kittenPosition[1] - 1 ][0]  = 2;

            
        }



        if((e.key == "ArrowUp" || e.key == "w") && kittenTop > 0 && map[kittenPosition[0] - 1][kittenPosition[1]][0] != 0 ){
                kittenTop -= 30;
                
                if(map[kittenPosition[0] - 1][kittenPosition[1]][1] == 1){
                    seconds = null;
                    Swal.fire({
                    imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/19-2.thumb128.png',
                    imageHeight: 150,
                    title : 'OH THIS IS BOOM MEOWWWW!!',
                    text: 'Click button to try again Meow!',
                    imageAlt: 'A tall image',
                    confirmButtonText: 'MEOW'}).then((result) => {
                        if (result.isConfirmed) {
                            count = 1;
                            createMaze();
                            return;
                        }else{
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                }

                if(map[kittenPosition[0] - 1][kittenPosition[1]][1] == 2){
                    count_Cupcake = count_Cupcake+1
                    kitten.style.top = kittenTop + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0] - 1][kittenPosition[1]][0]  = 2;
                    map[kittenPosition[0] - 1 ][kittenPosition[1]][1] = 0;
                    console.log("cupcake" + count_Cupcake)
                    createMaze();
                    return;
                }

                if(map[kittenPosition[0] - 1][kittenPosition[1]][1] == 3){
                    key = 1
                    kitten.style.top = kittenTop + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0] - 1][kittenPosition[1]][0]  = 2;
                    map[kittenPosition[0] - 1 ][kittenPosition[1]][1] = 0;
                    console.log("Key" + key)
                    createMaze();
                    return;
                }
                kitten.style.top = kittenTop + "px";
                map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                map[kittenPosition[0] - 1][kittenPosition[1]][0]  = 2;

            
        }

        if((e.key == "ArrowDown" || e.key == "s") && kittenTop < (map.length - 1)*30 && map[kittenPosition[0] + 1][kittenPosition[1]][0] != 0 ){
                kittenTop += 30;
                
                if(map[kittenPosition[0] + 1][kittenPosition[1]][1] == 1){
                    seconds = null;
                    Swal.fire({
                    imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/19-2.thumb128.png',
                    imageHeight: 150,
                    title : 'OH THIS IS BOOM MEOWWWW!!',
                    text: 'Click button to try again Meow!',
                    imageAlt: 'A tall image',
                    confirmButtonText: 'MEOW'}).then((result) => {
                        if (result.isConfirmed) {
                            count = 1;
                            createMaze();
                            return;
                        }else{
                            count = 1;
                            createMaze();
                            return;
                        }
                    })
                }

                if(map[kittenPosition[0] + 1 ][kittenPosition[1]][1] == 2){
                    count_Cupcake = count_Cupcake+1
                    kitten.style.top = kittenTop + "px";
                    map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                    map[kittenPosition[0] + 1][kittenPosition[1]][0]  = 2;
                    map[kittenPosition[0] + 1][kittenPosition[1]][1] = 0;
                    console.log("cupcake" + count_Cupcake)
                    createMaze();
                    return;
                }

                kitten.style.top = kittenTop + "px";
                map[kittenPosition[0]][kittenPosition[1]][0] = 1;
                map[kittenPosition[0] + 1][kittenPosition[1]][0]  = 2;

            
        }

        if(kittenLeft == houseLeft && kittenTop == houseTop && key ==1){
            Swal.fire({
            imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/2-2.thumb128.png',
            imageHeight: 150,
            title : 'AMAZING MEOW MEOW!',
            text: 'Click button Meow!',
            imageAlt: 'A tall image'
            })

            //createMaze();
            
            /*Swal.fire(
                'AMAZING MEOW MEOW!',
                'Click button Meow!',
                'success Meow!!'
            )*/
            }else if(kittenLeft == houseLeft && kittenTop == houseTop){
                Swal.fire({
                imageUrl: 'https://storage.googleapis.com/sticker-prod/sX90U4BNjjsjvGRuqTnk/17-2.thumb128.png',
                imageHeight: 150,
                title : 'I can not go inside Meowww!!',
                text: 'Please collect the Key MEOWWW!',
                text: 'Click button Meow!',
                imageAlt: 'A tall image'

            })
            }


    }
    )

    function restart(){
        count = 1;
        createMaze();
    }


    //window.localStorage.setItem('game-state',JSON)

    


    



</script>

</html>