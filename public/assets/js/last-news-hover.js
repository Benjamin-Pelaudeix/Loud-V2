// variables
let lastNews = document.querySelector('.last-news')
let lastNewsPreview = document.querySelector('.last-news-preview')

lastNews.addEventListener('mouseover', () => {
    lastNewsPreview.style.display = 'unset'
})

lastNews.addEventListener('mouseleave', () => {
    lastNewsPreview.style.display = 'none'
})