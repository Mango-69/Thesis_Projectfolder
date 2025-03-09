function toggleTheme() {
  const checkbox = document.getElementById('checkbox');
  const currentTheme = document.documentElement.getAttribute('data-theme');
  
  if (currentTheme === 'dark') {
      document.documentElement.setAttribute('data-theme', 'light');
      localStorage.setItem('theme', 'light');
      checkbox.checked = false; // Uncheck the toggle
  } else {
      document.documentElement.setAttribute('data-theme', 'dark');
      localStorage.setItem('theme', 'dark');
      checkbox.checked = true; // Check the toggle
  }
}

// On page load, check for saved theme preference
const savedTheme = localStorage.getItem('theme') || 'light';
document.documentElement.setAttribute('data-theme', savedTheme);
document.getElementById('checkbox').checked = savedTheme === 'dark'; // Set the toggle state

// Close the sidebar when the page loads
window.onload = function() {
  closeNav();
};

// Open sidebar function (doesn't affect main content)
function openNav() {
  document.getElementById("mySidebar").style.left = "0"; // Move the sidebar into view
  document.getElementById("sidebarButton").classList.add("hidden"); // Hide the button
  // Add a padding to the main content only when the sidebar opens
  document.getElementById("main").style.paddingLeft = "250px";
}

// Close sidebar function (restore main content padding)
function closeNav() {
  document.getElementById("mySidebar").style.left = "-250px"; // Hide sidebar
  document.getElementById("sidebarButton").classList.remove("hidden"); // Show the button
  // Reset the padding when sidebar is closed
  document.getElementById("main").style.paddingLeft = "20px";
}
