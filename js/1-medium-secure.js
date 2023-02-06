function payloadSecure() {
    let originalText = document.querySelector('.chat_input_window').value;
    let newText = originalText.replace(/script/g, '');
    document.querySelector('.chat_input_window').value = newText;
}
