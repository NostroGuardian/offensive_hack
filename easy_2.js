window.addEventListener('load', () => {
    document.querySelector('.chat_frame_inner').scrollTop;
});

const input = document.querySelector('input');

input.addEventListener('input', () => {
    input.setCustomValidity('');
    input.checkValidity();
});

input.addEventListener('invalid', () => {
    input.setCustomValidity('Must not be empty');
});

// content variable
document.querySelector('.chat_input_button').onclick = function () {
    document.querySelector('.chat_input_button').setAttribute('isEmpty', 'true');
};