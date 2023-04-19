var navItems = document.querySelectorAll(".bottom-nav-item");

navItems.forEach(function(e, i) {
  e.addEventListener("click", function(e) {
    navItems.forEach(function(e2, i2) {
      e2.classList.remove("active");
    });
    this.classList.add("active");
  });
});

// function myFunction(x) {
//   if (x.matches) { 
//     document.getElementsByClassName('.nav-container').style.padding = "0 20px";
//   } else {
//    document.getElementsByClassName('.nav-container').style.padding = "0 40px"
//   }
// }

// var x = window.matchMedia("(max-width: 480px)")
// myFunction(x) 
// x.addEventListener(myFunction) 


var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 1,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    
  },
  breakpoints: {
    480: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
   
  },
},
);

var cancel_field={};
let field = 1;
function add(){
  if(document.getElementById("fields").childElementCount<=3){
     document.getElementById('fields').innerHTML+=`<div id="input`+field+`">
     <input type="search" id="via`+field+`" class="mt-3" onfocus="initMap('via`+field+`','')" name="via_location[]" placeholder="Locations" pattern="[A-za-z0-9,./()'' ]{3,100}" title="Via Location must contain 3 to 100 character no special character allowed other than , . / () '' " required>
     <input type="hidden" id="via`+field+`_lat" name="via_lat[]">
       <button type="button" onclick='remove("input`+field+`","via`+field+`","index")' class="remore"><i class="fas fa-times"></i></button>
       </div>`
    for (var i=1;i<=field;i++){
      if(document.getElementById("via"+i) && sessionStorage.getItem("via"+i)){
        document.getElementById("via"+i).value=sessionStorage.getItem("via"+i)
      }
    }
    field++;
  }else{
  alert('Please Contact Admin for more via Locations')
  }
}

function remove(id,input_id,page){
  document.getElementById(id).remove();
  if(input_id!=''){
    sessionStorage.removeItem(input_id);
  }
  if(page=="booking-form"){
    initMap('','nothing beats real experience',"no")
  }
}

datePickerId.min = new Date().toISOString().split("T")[0];

// datePicker_Id.min = new Date().toISOString().split("T")[0];




