// Select all rows in the table except for the header row
console.log("hola");
let rows = document.querySelectorAll('table tr:not(:first-child)');

// Initialize an empty array to store the user objects
let users = [];

// Iterate over each row
for (let row of rows) {
    // Create a new user object
    let user = {
        id: row.querySelector('.id_Usuario').textContent,
        name: row.querySelector('.nombre').textContent,
        lastName: row.querySelector('.apellido_1').textContent,
        surname: row.querySelector('.apellido_2').textContent,
        email: row.querySelector('.mail').textContent,
        // Assuming 'login' is the username
        username: row.querySelector('.login').textContent,
        password: row.querySelector('.pass').textContent,
        gender: row.querySelector('.genero').textContent === 'Hombre' ? 'Male' : 'Female',
        // Assuming 'activo' is the enabled status
        enabled: row.querySelector('.estado').textContent === 'activo'
    };

    // Add the user object to the users array
    users.push(user);
}

// Now 'users' is an array of user objects
console.log(users);
