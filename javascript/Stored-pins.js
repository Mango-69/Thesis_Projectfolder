function changeBackground() {
    document.body.style.backgroundImage = "url('')"; // Ensure this URL is valid
    document.body.style.backgroundSize = "cover"; // This line is correct
  }
  
  function validatePIN() {
    const enteredPin = document.getElementById('enterPin').value;
    const correctPin = "1234"; // Replace with your actual PIN logic

    if (enteredPin === correctPin) {
        // Redirect to Journal.html
        window.location.href = 'Journal.html'; // Change this to the path of your Journal.html
    } else {
        alert("Incorrect PIN. Please try again.");
    }
}

  function setPIN() {
    // Your set PIN logic here
  }
  
  function openJournal() {
    // Your logic to open the journal here
  }