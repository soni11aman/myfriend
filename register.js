let clik=document.getElementById("cfme");
clik.onclick = function (){
    let erase= document.getElementById("fn");
    let insert=document.createElement("input");
    insert.type= "numbers";
    insert.pattern = "[0-9]{5}";
    insert.placeholder = "OTP";
    erase.insertBefore(insert,clik);
    erase.removeChild(clik);
}
let clk=document.getElementById("cfmp");
clk.onclick = function (){
    let erase= document.getElementById("fn2");
    let insert=document.createElement("input");
    insert.type= "numbers";
    insert.pattern = "[0-9]{5}";
    insert.placeholder = "OTP";
    erase.insertBefore(insert,clk);
    erase.removeChild(clk);
}