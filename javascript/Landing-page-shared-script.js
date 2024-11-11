// Sidebar functionality
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


window.onload = checkSidebarState;
window.onclick = checkSidebarState;

// Notifications functionality
const notifications = [];

// Simulate fetching notifications from messages.html and Student-community-page.html
function fetchNotifications() {
    // Simulated messages
    const messages = [
        "",
        ""
    ];

    // Simulated posts
    const posts = [
        "",
        ""
    ];

    // Combine messages and posts into notifications
    notifications.length = 0; // Clear previous notifications
    notifications.push(...messages, ...posts);
}

// Function to show notifications
function showNotifications() {
    fetchNotifications(); // Fetch notifications when showing them
    const notificationList = document.getElementById('notificationList');
    notificationList.innerHTML = ''; // Clear previous notifications

    if (notifications.length === 0) {
        notificationList.innerHTML = '<li>No new notifications.</li>';
    } else {
        notifications.forEach(notification => {
            const li = document.createElement('li');
            li.textContent = notification;
            notificationList.appendChild(li);
        });
    }

    // Show the notifications section
    document.getElementById('notifications').style.display = 'block';
}

// Attach the showNotifications function to the notification link
document.querySelector('.fa-bell').parentElement.onclick = function(event) {
    event.preventDefault(); // Prevent default anchor behavior
    stayOpen(); // Keep the sidebar open
    showNotifications(); // Show notifications
};