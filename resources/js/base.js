window.addEventListener('load', function(){

    //パスワード表示／非表示（入力画面）
    // let eye = document.getElementById('eye');

    // eye.addEventListener('click', function () {
    //     if (this.previousElementSibling.getAttribute('type') == 'password') {
    //         this.previousElementSibling.setAttribute('type', 'text');
    //         this.classList.toggle('fa-eye');
    //         this.classList.toggle('fa-eye-slash');
    //     } else {
    //         this.previousElementSibling.setAttribute('type', 'password');
    //         this.classList.toggle('fa-eye');
    //         this.classList.toggle('fa-eye-slash');
    //     }
    // });

    //モーダルウィンドウ表示／非表示（plus code説明）
    const modal_btn01 = document.querySelector('#modal-btn01');
    const modal_btn02 = document.querySelector('#modal-btn02');
    const modal_overlay = document.querySelector('.modal-overlay');
    const close = document.querySelector('.close');

    modal_btn01.addEventListener('click', function() {
        modal_overlay.classList.add('active');
        document.querySelector('body').classList.add('modal-opened'); //body要素にクラスを与える
        close.addEventListener('click', function() {
            modal_overlay.classList.remove('active');
           document.querySelector('body').classList.remove('modal-opened');
        }, false);
    }, false);
    modal_btn02.addEventListener('click', function() {
        modal_overlay.classList.add('active');
        document.querySelector('body').classList.add('modal-opened'); //body要素にクラスを与える
        close.addEventListener('click', function() {
            modal_overlay.classList.remove('active');
           document.querySelector('body').classList.remove('modal-opened');
        }, false);
    }, false);
});
