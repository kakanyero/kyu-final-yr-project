document.getElementById('checkoutForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const mobileNumber = document.getElementById('mobileNumber').value;

    // Perform any necessary validation or processing here

    // For simplicity, we'll just display a confirmation message
    document.getElementById('checkoutForm').style.display = 'none';
    document.getElementById('confirmationMessage').style.display = 'block';

    console.log('Checkout Details:', { firstName, lastName, email, mobileNumber });
});
