/*sticky header -> add "sticky" in header class*/
window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    var navItems = document.querySelectorAll("header .nav-item");
    var toTop = document.querySelector(".back-to-top");
    var logoImg = document.querySelector(".logo img");
    var loginButton = document.querySelector(".login-button");

    /*add sticky class to Login-Button when scroll down*/
    loginButton.classList.toggle("sticky", window.scrollY > 0);

    /*add sticky class to Header when scroll down*/
    header.classList.toggle("sticky", window.scrollY > 0);
    
    /*display the back-to-top button when scroll down*/
    toTop.classList.toggle("display", window.scrollY > 0);

    /*add sticky class to nav-Item when scroll down*/
    navItems.forEach(function(navItem) {
      navItem.classList.toggle("sticky", window.scrollY > 0);
    });

    /*change logo img src when scroll down*/
    if(window.scrollY > 0) {
      logoImg.setAttribute("src", "https://tinyurl.com/bpjs-ks-logo-white");
    } else {
      logoImg.setAttribute("src", "https://tinyurl.com/bpjs-ks-logo");
    }
  });
  
  /*smooth scroll animation to the top*/
  document.querySelector(".back-to-top").addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
  
  // Smooth scroll function
  function smoothScroll(target) {
    const element = document.querySelector(target);
    window.scrollTo({
      top: element.offsetTop,
      behavior: "smooth",
    });
  }
  
  // Add click event listeners to header links
  const links = document.querySelectorAll("header .nav-item");
  links.forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      const target = event.target.getAttribute("href");
      smoothScroll(target);
    });
  });


  //Contact Form Validation Function
  const form = document.querySelector("#contact-form");
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    //Get values from form
    const name = document.querySelector("#name").value;
    const email = document.querySelector("#email").value;
    const message = document.querySelector("#message").value;
  
    //Send the message via email
    const bpjsEmail = "makermoney942@gmail.com";
    const subject = `Pesan Baru untuk Mata Kuliah PHP-HTML`;
    const emailContent = `From: ${name} (${email}\n\n${message})`;
  
    //send the email using service
  });
  
  