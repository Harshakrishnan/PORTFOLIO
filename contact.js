document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Send form data using Fetch API
    fetch('send_email.php', {
        method: 'POST',
        body: new FormData(this),
    })
    .then(response => response.json())
    .then(data => {
        // Display response message
        document.getElementById('response-message').innerText = data.message;

        // Clear form fields if the message was sent successfully
        if (data.success) {
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('message').value = '';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
