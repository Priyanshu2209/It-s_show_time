 src="https://code.jquery.com/jquery-3.6.0.js";
 
const container=document.querySelector('.seat_container');
const seats=document.querySelectorAll('.rows_container .seat_style:not(.booked)');
const showprice=document.getElementById('show_price');
const count = document.getElementById("count");
const total = document.getElementById("total");
const seat_no=document.getElementById("seat_no");
// const c=document.getElementsByClassName('seat_style');

var price=localStorage.getItem("price");
// console.log("price=",price);
let selectedseatcount;
function selectedlist()
{
    const selectedseat=document.querySelectorAll('.rows_container .seat_style.selected');
    selectedseatcount=selectedseat.length;
    count.innerText=selectedseatcount;
    total.innerText=selectedseatcount*price;
    // console.log(count);
    // console.log(seat_id);
    
}
let i=0;
var seat=[];
container.addEventListener('click',(e)=>{
    
    if(e.target.classList.contains('seat_style')&&!e.target.classList.contains('booked'))
    {
        e.target.classList.toggle('selected');
        
        var seat_id=e.target.id;
        // console.log(seat_id);
       
        if(e.target.classList.contains('selected'))
        {
            // seat[i]=seat_id;
            // i++;
            seat.push(seat_id);
        }
        else
        {
            var s=e.target.id;
            // console.log(seat.length);
            for ( i = 0; i < seat.length; i++) 
            {
                if(seat[i]==s)
                { 
                    
                    if(seat[i]==seat[seat.length-1])
                    {
                        seat.pop();
                    }
                    else
                    {
                        for(var j=i;j<seat.length;j++)
                        {
                         seat[j]=seat[j+1];                  
                        }
                        seat.pop();
                    }
                    
                //     seat[i]=seat[i+1];
                //    console.log(seat[i],"hey");
                    break;
                }               
            }
            
        }
    }
    
    selectedlist();
});

function totalseat_()
{
    console.log(seat);

//    var login="<?php check_login(); ?>'";
//    console.log(login);
    if(selectedseatcount>0)
    {
         var src="bill_payment.php?seat="+seat;
        window.location.href=src;
    }
    else
    {
        alert("Select seat");
    }
    console.log(src);
}
