// // Get the login and signup forms
// const loginForm = document.getElementById('login-form');
// const signupForm = document.getElementById('signup-form');

// // Hide the signup form initially
// signupForm.style.display = 'none';

// // Event listener for login/signup form submission
// loginForm.addEventListener('submit', function (event) {
//   event.preventDefault();
//   const email = document.getElementById('login-email').value;
//   const password = document.getElementById('login-password').value;

//   // Perform login logic here
//   // e.g., send a request to the server to check the credentials and log in the user

//   // Reset the form
//   this.reset();
// });

// signupForm.addEventListener('submit', function (event) {
//   event.preventDefault();
//   const name = document.getElementById('signup-name').value;
//   const email = document.getElementById('signup-email').value;
//   const password = document.getElementById('signup-password').value;

//   // Perform signup logic here
//   // e.g., send a request to the server to create a new account with the provided information

//   // Reset the form
//   this.reset();
// });

// // Function to switch between login and signup forms
// function toggleForms() {
//   if (loginForm.style.display === 'none') {
//     loginForm.style.display = 'block';
//     signupForm.style.display = 'none';
//   } else {
//     loginForm.style.display = 'none';
//     signupForm.style.display = 'block';
//   }
// }

const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');
const toggleFormLinks = document.getElementsByClassName('toggle-form');

signupForm.style.display = 'none';


loginForm.addEventListener('submit', function (event) {
  event.preventDefault();
  const email = document.getElementById('login-email').value;
  const password = document.getElementById('login-password').value;

  this.reset();
});

signupForm.addEventListener('submit', function (event) {
  event.preventDefault();
  const name = document.getElementById('signup-name').value;
  const email = document.getElementById('signup-email').value;
  const password = document.getElementById('signup-password').value;

  this.reset();
});

Array.from(toggleFormLinks).forEach(function (link) {
  link.addEventListener('click', function (event) {
    event.preventDefault();
    toggleForms();
  });
});

function toggleForms() {
  if (loginForm.style.display === 'none') {
    loginForm.style.display = 'block';
    signupForm.style.display = 'none';
  } else {
    loginForm.style.display = 'none';
    signupForm.style.display = 'block';
  }
}
