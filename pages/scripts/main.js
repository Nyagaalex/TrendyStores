// hotdog Menu
const menuButton = document.querySelector('.md\\:hidden button');
const menu = document.querySelector('.md\\:flex');

if (menuButton) {
    menuButton.addEventListener('click', () => {
        if (menu) {
            menu.classList.toggle('hidden');
        }
    });
}

// adding to Cart Button
const addToCartButtons = document.querySelectorAll('.product button');

if (addToCartButtons.length > 0) {
    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Product added to cart!');
        });
    });
}
// Example: Notification styling and removal logic can be added here if needed
// Ensure this block is part of a valid function or event listener
