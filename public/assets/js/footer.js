// variables
// generate today date
let today = new Date()
// html span where year will be displayed
let footerDateSpan = document.querySelector('#current-year')

footerDateSpan.textContent = today.getFullYear().toString()