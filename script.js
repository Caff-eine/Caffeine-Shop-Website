// Select the cart icon and cart container
var cartIcon = document.getElementById('cart-icon');
var cartContainer = document.getElementById('cart-container');
var totalPrice = 0;

// Attach click event listener to cart icon to toggle cart display
cartIcon.addEventListener('click', function() {
  cartContainer.style.display = cartContainer.style.display === 'none' ? 'block' : 'none';
});

function updateTotalPrice() {
  // Select all cart items
  var cartItems = document.querySelectorAll('.cart-item');

  // Reset total price
  totalPrice = 0;

  // Loop through each cart item
  cartItems.forEach(function(cartItem) {
    // Get item price and quantity
    var priceText = cartItem.querySelector('.cart-item-price').innerText;
    var price = parseFloat(priceText.substring(1)); // Remove the dollar sign
    var quantity = parseInt(cartItem.querySelector('.cart-item-quantity').innerText.replace('(', '').replace(')', ''));

    // Update total price
    totalPrice += price * quantity;
  });

  // Update the total amount displayed
  document.getElementById('total-amount').innerText = totalPrice.toFixed(2);
}

// Attach event listener to checkout button
document.getElementById('checkout-button').addEventListener('click', function() {
  // Perform checkout process
  console.log('Checkout clicked!');
});

// Function to add item to cart
function addToCart(name, price, imageUrl) {
  // Check if the item is already in the cart
  var existingCartItem = Array.from(cartContainer.children).find(function(item) {
    return item.dataset.name === name;
  });

  if (existingCartItem) {
    // If item already exists, increase quantity
    console.log('Item already exists in the cart:', name);
    var quantityElement = existingCartItem.querySelector('.cart-item-quantity');
    var quantity = parseInt(quantityElement.textContent.slice(1, -1)); // Extract current quantity
    console.log('Current quantity:', quantity);
    quantity++;
    console.log('New quantity:', quantity);
    quantityElement.textContent = `(${quantity})`; // Update quantity display
  } else {
    // Create HTML elements to display the item in the cart container
    console.log('Adding new item to cart:', name);
    var cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');
    cartItem.dataset.name = name; // Set data attribute for item name
    cartItem.innerHTML = `
      <img class="cart-item-image" src="${imageUrl}" alt="${name}">
      <div class="cart-item-details">
        <span class="cart-item-name">${name}</span>
        <span class="cart-item-quantity">(1)</span> <!-- Quantity initialized to 1 -->
        <span class="cart-item-price">$${price.toFixed(2)}</span>
      </div>
      <button class="delete-item"><i class="fas fa-trash-alt"></i></button>
    `;

    // Append the cart item to the cart container
    cartContainer.appendChild(cartItem);
  }
  updateTotalPrice();
}

// Function to handle delete item button click
function handleDeleteItemClick(event) {
  var deleteButton = event.target.closest('.delete-item');
  if (deleteButton) {
    var cartItem = deleteButton.closest('.cart-item');
    var quantityElement = cartItem.querySelector('.cart-item-quantity');
    var quantity = parseInt(quantityElement.textContent.slice(1, -1)); // Extract current quantity
    if (quantity === 1) {
      // If quantity is 1, remove the cart item from the container
      console.log('Removing item from cart:', cartItem.dataset.name);
      cartItem.remove();
    } else {
      // If quantity is more than 1, decrement the quantity
      console.log('Decreasing quantity for item:', cartItem.dataset.name);
      quantity--;
      console.log('New quantity:', quantity);
      quantityElement.textContent = `(${quantity})`; // Update quantity display
    }
    updateTotalPrice();
  }
}

// Add event listener to handle delete item button click
cartContainer.addEventListener('click', handleDeleteItemClick);

// Event listener for "Add to Cart" buttons (using event delegation)
document.addEventListener('click', function(event) {
  if (event.target.matches('.add-to-cart')) {
    var itemName = event.target.getAttribute('data-name');
    var itemPrice = parseFloat(event.target.getAttribute('data-price'));
    var itemImageUrl = event.target.getAttribute('data-image-url');
    addToCart(itemName, itemPrice, itemImageUrl);
  }
});
// Select the order now button
var orderNowButton = document.getElementById('order-now-button');

// Add click event listener to the button
orderNowButton.addEventListener('click', function() {
  // Select the menu section
  var menuSection = document.getElementById('MENU');
  
  // Scroll smoothly to the menu section
  menuSection.scrollIntoView({ behavior: 'smooth' });
});
