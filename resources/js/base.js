document.addEventListener('DOMContentLoaded', function() {

    //パスワード表示／非表示（入力画面）
    let eye = document.getElementById("eye");
    eye.addEventListener('click', function () {
        if (this.previousElementSibling.getAttribute('type') == 'password') {
            this.previousElementSibling.setAttribute('type', 'text');
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        } else {
            this.previousElementSibling.setAttribute('type', 'password');
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        }
    })

});
