const hamburgerMenu = document.querySelector('.hamburger-menu');
    const navMenu = document.querySelector('.nav-menu');

    hamburgerMenu.addEventListener('click', () => {
        hamburgerMenu.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    window.onload = function loader() {
        setTimeout(() => {
            document.getElementById("loading").style.visibility = "hidden";
            document.getElementById("loading").style.opacity = "0";
        }, 1000);
    };

    // <!-- backt to top tooltip  -->

let mybutton = document.getElementById("btn-back-to-top");

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// <!-- !backt to top tooltip  -->

