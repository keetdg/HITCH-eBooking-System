// let sidebar = document.querySelector(".sidebar");
// let sidebarBtn = document.querySelector(".sidebarBtn");
// sidebarBtn.onclick = function() {
//   sidebar.classList.toggle("active");
//   if(sidebar.classList.contains("active")){
//   sidebarBtn.classList.replace("bx bxs-right-arrow-circle");
// }else
//   sidebarBtn.classList.replace("bx bxs-right-arrow-circle");
// }

let notifMenu = document.getElementById("notifMenu");
  function toggleMenu(){
    notifMenu.classList.toggle("open-menu");
  }

  $(document).ready(function () {
    $('#example').DataTable();
} );