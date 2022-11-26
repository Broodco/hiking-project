let user_menu_button = document.querySelector('#user-menu');
let user_menu_button_image = document.querySelector('#user-menu-image');
let user_menu_dropdown = document.querySelector('#user-dropdown');

let user_menu_dropdown_opened = false

const toggleVisibility = dropdown => {
    if (dropdown.classList.contains('hidden')) {
        dropdown.classList.add('block');
        dropdown.classList.remove('hidden');
    } else {
        dropdown.classList.add('hidden');
        dropdown.classList.remove('block');
    }
    user_menu_dropdown_opened = !user_menu_dropdown_opened;
}

const handleClick = e => {
    if (e.target === user_menu_button || e.target === user_menu_button_image || user_menu_dropdown_opened) {
        toggleVisibility(user_menu_dropdown)
    }

}

document.addEventListener('click', handleClick)
