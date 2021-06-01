// variables
// nav link which open dropdown on hover
let dropdownLink = document.querySelector('.dropdown-link')
// dropdown menu
let dropdownMenu = document.querySelector('.dropdown-menu')

// events on dropdown link
// open dropdown menu when nav link is hover
dropdownLink.addEventListener('mouseover', (e) => {
    dropdownMenu.style.display = 'unset'
})
// close dropdown menu when nav link is not hover
dropdownLink.addEventListener('mouseout', (e) => {
    dropdownMenu.style.display = 'none'
})
// events on dropdown menu
// open dropdown menu when dropdown menu is hover
dropdownMenu.addEventListener('mouseover', (e) => {
    dropdownMenu.style.display = 'unset'
})
// close dropdown menu when dropdown menu is not hover
dropdownMenu.addEventListener('mouseout', (e) => {
    dropdownMenu.style.display = 'none'
})