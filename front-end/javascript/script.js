let feed = document.getElementById("instafeed");
let feed2 = document.getElementById("instafeed2");



 function show(){
     feed.style.display = "none";
     feed2.style.display="block";
 }
 function show2(){
    feed.style.display = "block";
    feed2.style.display="none";
}
 feed.addEventListener("click" , show);
 feed2.addEventListener("click" , show2);