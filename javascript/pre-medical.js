document.getElementById('preMedicalForm').onsubmit = async function(event) {
    event.preventDefault(); // Prevent default form submission

    const formData = new FormData(this);

    try {
        const response = await fetch('submit_pre_medical_form.php', {
            method: 'POST',
            body: formData,
        });

        if (response.ok) {
            alert("Pre-Medical Form submitted successfully!");
            closeModal(); // Close the modal
        } else {
            alert("There was an error submitting the form.");
        }
    } catch (error) {
        console.error("Error submitting form:", error);
    }
};
