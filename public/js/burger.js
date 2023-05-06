let i = true;
function burger() {
    if (i == true) {
        document.querySelector('.mobile_header nav').classList.add('active');
        i = false;
    }
    else {
        document.querySelector('.mobile_header nav').classList.remove('active');
        i = true;
    }
}