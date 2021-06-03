// variables
// dropdown link
let mobileDropdownLink = document.querySelector('#mobile-dropdown-link')
// nav menu
let nav = document.querySelector('#mobile-nav')

mobileDropdownLink.addEventListener('click', (e) => {
    if (nav.style.display === 'unset') {
        nav.style.display = 'none'
    } else {
        nav.style.display ='unset'
    }
    mobileDropdownLink.classList.toggle('fa-times')
})