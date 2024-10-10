document.querySelector('form').addEventListener('submit', function(e) {
    const passwordInput = document.getElementById('passwordInput').value;

    // Basic client-side validation
    if (!passwordInput) {
        e.preventDefault();
        document.getElementById('errorMessage').innerText = 'Password cannot be empty!';
        document.getElementById('errorMessage').style.display = 'block';
    }
});
