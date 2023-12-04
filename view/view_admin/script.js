let sidebar = document.querySelector(".design");
let sidebarBtn = document.querySelector(".designBtn");
let sidelogo =document.querySelector(".logo");
sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    sidelogo.classList.toggle("active");
}
