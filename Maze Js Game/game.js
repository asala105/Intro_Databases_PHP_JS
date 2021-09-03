var YouLosevar = false;
var score = 0;
var GameOvervar = false;
var GameStartvar = false;

function GameStart(){
    console.log("the game started!");
    GameStartvar = true;
    GameOvervar = false;
    YouLosevar = false;
    elements = document.getElementsByClassName("boundary");
    for(var i = 0; i <elements.length; i++){
            elements[i].classList.remove("youlose");
    }    
}

function youLose(){
    if (GameStartvar == true && GameOvervar == false && YouLosevar == false){
        elements = document.getElementsByClassName("boundary");
        for(var i = 0; i <elements.length; i++){
            elements[i].classList.add("youlose");
        }
        YouLosevar = true;
        GameOvervar = true;
        GameStartvar = false;
        score = score - 10;
        document.getElementById("status").innerHTML = "You Lose! and your score is " + score  + " Click on S to start again";
    }
}

function youCheat(){
    if (GameStartvar == true && GameOvervar == false && YouLosevar == false){
        elements = document.getElementsByClassName("boundary");
        for(var i = 0; i <elements.length; i++){
            elements[i].classList.add("youlose");
        }
        YouLosevar = true;
        GameOvervar = true;
        GameStartvar = false;
        score = score - 10;
        document.getElementById("status").innerHTML = "This is Cheating! "+ score  + " Click on S to start again";
    }
}

function GameOver(){
    if(!YouLosevar && !GameOvervar && GameStartvar){
        score = score + 5;
        document.getElementById("status").innerHTML = "You win! and your score is " + score + " Click on S to start again";
        GameOvervar = true;
        GameStartvar = true;
    }
}
