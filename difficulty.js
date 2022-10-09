let a = 2;
document.querySelector('#level_current').onclick = function () {
    if (a % 2 == 0) {
        document.querySelector('#level_change').style.display = 'flex';
        a++;
    } else {
        document.querySelector('#level_change').style.display = 'none';
        a++;
    }
}