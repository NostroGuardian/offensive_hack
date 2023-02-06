const input = document.querySelector('input');

input.addEventListener('input', () => {
    input.setCustomValidity('');
    input.checkValidity();
});

input.addEventListener('invalid', () => {
    if (input.value === '') {
        input.setCustomValidity('Must not be empty');
    } else {
        input.setCustomValidity('Only A-Z, a-z, 0-9 characters');
    }
});