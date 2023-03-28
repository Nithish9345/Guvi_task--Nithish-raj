const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
    event.preventDefault();
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#psw').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/login.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = () => {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                window.location.href = 'testfile.php';
            } else {
                const errorDiv = document.querySelector('.error');
                errorDiv.innerHTML = '';
                const error = document.createElement('p');
                error.textContent = response.message;
                errorDiv.appendChild(error);
            }
        }
    };
    xhr.send(`email=${email}&psw=${password}`);
});
