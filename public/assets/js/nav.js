/**
 * NAV JS HANDLER
 */

// variables
const icon = document.getElementsByClassName('header_menu_icon')[0]
const nav = document.getElementsByClassName('nav')[0]

icon.addEventListener('click', () => {
    if (icon.classList.contains('fa-bars')) {
        nav.style.left = '-30vw'
        icon.classList.toggle('fa-times')
    }
    if (icon.classList.contains('fa-times')) {
        nav.style.left = '0'
        icon.classList.toggle('fa-bars')
    }
})