if("function"==typeof Glide){const a=document.querySelectorAll(".layout-hero.carousel-active");a.forEach(e=>{var o=e.querySelector(".glide.content"),t=e.querySelector(".glide.images");let r,l;o&&(r=new Glide(o,{type:"carousel",animationDuration:0,swipeThreshold:!1,dragThreshold:!1}).mount()),t&&(l=new Glide(t,{type:"carousel",animationDuration:0,swipeThreshold:!1,dragThreshold:!1}).mount()),o=e.querySelector(".prev"),t=e.querySelector(".next"),o.addEventListener("click",e=>{e.preventDefault(),console.log("prev"),r&&r.go("<"),l&&l.go("<")}),t.addEventListener("click",e=>{e.preventDefault(),console.log("next"),r&&r.go(">"),l&&l.go(">")})})}