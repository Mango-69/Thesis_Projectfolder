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