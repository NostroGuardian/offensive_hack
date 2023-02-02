var blackList = [`<script>`, `</script>`, `<SCRIPT>`, `</SCRIPT>`];

document.querySelector('input').onkeyup = function() {
    var expr = new RegExp(blackList.join('|'));
    if (this.value.search(expr) !== -1) {
        this.value = '';
    }
}
