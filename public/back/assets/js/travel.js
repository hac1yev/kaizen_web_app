const commentId = document.getElementById('comment-id')
const commentSection = document.getElementById('comment-section')
const commentShow = document.getElementById('comment-show')

if (commentId.innerText === '0') {
    commentSection.style.display = 'none'
}
else {
    commentShow.addEventListener('click', () => {
        commentSection.classList.toggle('comment-section-show')
    })
}

const commentBTN = document.getElementById('comment-write')
commentBTN.addEventListener('click' , () => {
    document.querySelector('.comment-write-section').style.display = 'block'
})