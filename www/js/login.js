// Get the form
const form = document.querySelector('#buttonlogin');

// Add an event listener to the form for the submit event
form.addEventListener('click', function(event) {
    console.log('e');
  // Prevent the form from submitting

  // Get the input fields
  const id = document.querySelector('#usuario');
  const password = document.querySelector('#password');

  // Create an array to store error messages
  const errorMessages = [];

  // Check if the id field is empty
  if (id.value === '') {
    errorMessages.push('Please enter your ID.');
  }

  // Check if the password field is empty
  if (password.value === '') {
    errorMessages.push('Please enter your password.');
  }

  // Get the error div
  const errorDiv = document.querySelector('#errorDiv');

  // If there are any error messages, display them in the error div
  if (errorMessages.length > 0) {
    errorDiv.classList.remove('d-none');
    errorDiv.innerHTML = '<strong>Error:</strong><br>' + errorMessages.join('<br>');
  } else {
    errorDiv.classList.add('d-none');

  }
});
