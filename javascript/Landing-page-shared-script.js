function openNav() {

  document.getElementById("mySidebar").style.left = "0";

  localStorage.setItem('sidebarOpen', 'true'); // Save state to localStorage

}


function closeNav() {

  document.getElementById("mySidebar").style.left = "-250px";

  localStorage.setItem('sidebarOpen', 'false'); // Save state to localStorage

}


function stayOpen() {

  // Do nothing, just prevent the sidebar from closing

}


function checkSidebarState() {

  const sidebarState = localStorage.getItem('sidebarOpen');

  if (sidebarState === 'true') {

      openNav(); // Open sidebar if state is true

  } else {

      closeNav(); // Close sidebar if state is false

  }

}


// Call the function to check the sidebar state on page load

window.onload = checkSidebarState;