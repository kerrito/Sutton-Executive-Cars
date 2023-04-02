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


let field = 1;
function add(){
  if(document.getElementById("fields").childElementCount<=3){
   document.getElementById('fields').innerHTML+=`<div id="input$(field)">
   <input type="search" class="mt-3" name="via_location[]" placeholder="Locations" pattern="[A-za-z ]{3,16}" title="Via Location must contain 3 to 16 character no special character allowed" required>
     <button type="button" onclick='remove("input$(field)")' class="remore"><i class="fas fa-times"></i></button>
     </div>`
    field++;
  }else{
  alert('Please Contact Admin for more via Locations')
  }
}

function remove(id){
  document.getElementById(id).remove();
}

datePickerId.min = new Date().toISOString().split("T")[0];

datePicker_Id.min = new Date().toISOString().split("T")[0];
