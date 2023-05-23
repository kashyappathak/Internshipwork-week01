// Validate the product price to be a positive number
const productPrice = document.querySelector('input[name="product_price"]');
productPrice.addEventListener('input', () => {
    if (productPrice.value < 0) {
        productPrice.setCustomValidity('Product price must be a positive number');
    } else {
        productPrice.setCustomValidity('');
    }
});
