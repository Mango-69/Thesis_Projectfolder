function redirectToStudentLandingPage(event) {
    event.preventDefault(); // Prevent form submission

    var userType = document.getElementById('user-type').value;

    // Ensure the user has selected a user type
    if (!userType) {
        alert("Please select a user type.");
        return;
    }

    // Redirect based on the selected user type
    if (userType === 'student') {
        window.location.href = 'Student-landing-page.html';
    } else if (userType === 'therapist') {
        window.location.href = 'Therapist-landing-page.html';
    } else if (userType === 'admin') {
        window.location.href = 'Admin-landing-page.html';
    }
}
