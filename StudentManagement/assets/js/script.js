const toast = document.querySelector('.toast');

const button = document.querySelector('.close');

button.addEventListener('click', function () {
    toast.classList.remove('show');
});
