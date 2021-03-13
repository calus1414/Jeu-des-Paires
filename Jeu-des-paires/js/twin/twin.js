//click system 


let parentClick = 0;
var totalClique = document.getElementById('total-clique')

const parent = document.getElementById('container');

const parentCount = document.getElementById('parent-count');

function parentOnClick() {

    //incremente le counter de click



    parentClick += 1;
    parentCount.innerHTML = parentClick;

}
//timer


let seconds = 0;
let minutes = 0;
let hours = 0;
let time = document.getElementById('time');
var sec = 0;
let setTime = 0;
var finalTime = document.getElementById('finalTime')
function timer() {
    seconds += 1;
    if (seconds > 60) {
        seconds = 0;
        minutes += 1;
    } else if (minutes > 60) {
        minutes = 0;
        hours += 1;
    }
    return time.innerHTML = zero(hours) + ':' + zero(minutes) + ':' + zero(seconds);

}

function zero(num) {
    if (num < 10) {
        return '0' + num;
    } else {
        return num
    }

}

function resetTimer() {
    seconds = 0;
    minutes = 0;
    hours = 0;
    return time.innerHTML = zero(hours) + ':' + zero(minutes) + ':' + zero(seconds);
}





var tab = [1, 2, 3, 4, 5, 6, 7, 8, 9, 1, 2, 3, 4, 5, 6, 7, 8, 9]







const num = document.querySelectorAll('.num');

let checked;

let array = [];

function randomize(tab) {
    //melange un tableau 
    let i;
    let j;
    let tmp;
    for (i = tab.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));


        tmp = tab[i];

        tab[i] = tab[j];

        tab[j] = tmp;


    }
    return tab;
}



function dispearWinAfter05Seconds() {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(
                
                checked[0].classList.add('win'),
                checked[1].classList.add('win'),
                checked[0].classList.replace('checked', 'num'),
                checked[1].classList.replace('checked', 'num'),
                array = []
                )
            
        }, 500);
    });
}
async function asyncCall1() {
//fait disparaitre les cartes de paires trouver
    const result = await dispearWinAfter05Seconds();
    
}

function dispearNumberAfter05Seconds() {
    //fait disparaitre les cartes de paires non trouver
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(
                
                checked[0].classList.replace('checked', 'num'),
                checked[1].classList.replace('checked', 'num'));
                
            array = [];
        }, 500);
    });
}
async function asyncCall2() {

    const result = await dispearNumberAfter05Seconds();
   
}


let startBool;
let startTimer;
let finishGame = 0;
var firstCard = document.querySelector('#num')

var start =document.querySelector('#start');
start.addEventListener('click',function(){
    start.style.display='none';
        parent.addEventListener('click', parentOnClick)
        startTimer = setInterval(timer, 1000);
    firstCard.style.display = 'none';
    table.style.display = 'block';
    
     startBool =true;
     
     randomize(tab)
     var num0 = document.getElementById('num0').value = tab[0]
     var num1 = document.getElementById('num1').value = tab[1]
     var num2 = document.getElementById('num2').value = tab[2]
     var num3 = document.getElementById('num3').value = tab[3]
     var num4 = document.getElementById('num4').value = tab[4]
     var num5 = document.getElementById('num5').value = tab[5]
     var num6 = document.getElementById('num6').value = tab[6]
     var num7 = document.getElementById('num7').value = tab[7]
     var num8 = document.getElementById('num8').value = tab[8]
     var num9 = document.getElementById('num9').value = tab[9]
     var num10 = document.getElementById('num10').value = tab[10]
     var num11 = document.getElementById('num11').value = tab[11]
     var num12 = document.getElementById('num12').value = tab[12]
     var num13 = document.getElementById('num13').value = tab[13]
     var num14 = document.getElementById('num14').value = tab[14]
     var num15 = document.getElementById('num15').value = tab[15]
     var num16 = document.getElementById('num16').value = tab[16]
     var num17 = document.getElementById('num17').value = tab[17]


})

for (let i = 0; i < 18; i++) {
    

    num[i].addEventListener('click', function check() {

     
     
        if (array.length < 2 && startBool ===true) {

            num[i].classList.replace('num', 'checked')
           
            num[i].key = i;
            checked = document.querySelectorAll('.checked')
            if (num[i] !== array[0] && num[i] !== array[1]) {
                array.push(num[i])
               
            }

          



            if (array[0].value === array[1].value) {
               
                finishGame += 1;
                
                
                asyncCall1();
                
                if(finishGame === 9){
                    end.style.display='block';
                    firstCard.style.display = 'block';
                    table.style.display ='none';
                    clearInterval(startTimer)
                    parentOnClick()
                    parent.removeEventListener('click',parentOnClick)
                    totalClique.innerHTML = parentClick;
                    finalTime.innerHTML = zero(hours) + ':' + zero(minutes) + ':' + zero(seconds);

                    }
            } else {
                
                

                asyncCall2()

               





            }
           


        }
    })

}

var end= document.querySelector("#end")
var table = document.querySelector('.table-twin')
var btnReset = document.querySelector('#btn-reset').addEventListener('click',function reset(){
    seconds=0;
    minutes=0;
    hours= 0;

    time.innerHTML = zero(hours) + ':' + zero(minutes) + ':' + zero(seconds);
    start.style.display='inline-block';
    
    firstCard.style.display = 'none';
    
   num.forEach(element=> element.classList.remove('win'))
   
   
    
    parentCount.innerHTML = 0;
    end.style.display ='none';
    parentClick = 0;
    finishGame = 0;
    startBool =false;
})
