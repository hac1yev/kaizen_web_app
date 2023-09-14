const confirmWaitPosts = document.querySelector('.confirm-wait-posts');
const confirmedPosts = document.querySelector('.confirmed-posts');

const collapseButton1 = document.querySelector('#collapseButton1');
const collapseButton2 = document.querySelector('#collapseButton2');
const collapseOne = document.querySelector('#collapseOne');
const collapseTwo = document.querySelector('#collapseTwo');

confirmWaitPosts.addEventListener('click', () => {
    collapseButton1.classList.remove('collapsed');
    collapseButton1.ariaExpanded = true;
    collapseOne.classList.add('show');
    collapseTwo.classList.remove('show');
});

confirmedPosts.addEventListener('click', () => {
    collapseButton2.classList.remove('collapsed');
    collapseButton2.ariaExpanded = true;
    collapseTwo.classList.add('show');
    collapseOne.classList.remove('show');
});