const openMenyu = document.getElementById("open-menu");
if (openMenyu) {
  openMenyu.addEventListener("click", () => {
    let hiddenMenu = document.querySelector(".hidden-menyu");
    hiddenMenu.classList.add("hidden-active");
  });
}

const closeMenyu = document.querySelector(".close-hidden");
closeMenyu.addEventListener("click", () => {
  let hiddenMenu = document.querySelector(".hidden-menyu");
  hiddenMenu.classList.remove("hidden-active");
});

const openSearch = document.getElementById('open-search')
openSearch.addEventListener('click' , () => {
  let hiddenSearch = document.querySelector('.search-bar')
  hiddenSearch.classList.toggle('open-searchbar')
})