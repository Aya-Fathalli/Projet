let cartItems = [];
let total = 0;

function addToCart(productId, productName, productPrice) {
    cartItems.push({ id: productId, name: productName, price: productPrice });
    updateCart();
}

function removeFromCart(productId) {
    cartItems = cartItems.filter(item => item.id !== productId);
    updateCart();
}

function updateCart() {
    const cartList = document.getElementById('cart-items');
    const totalElement = document.getElementById('total');
    
    cartList.innerHTML = '';
    total = 0;

    cartItems.forEach(item => {
        const listItem = document.createElement('li');
        listItem.textContent = `${item.name} - ${item.price}dt`;
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Supprimer';
        removeButton.onclick = () => removeFromCart(item.id);
        listItem.appendChild(removeButton);
        cartList.appendChild(listItem);
        
        total += item.price;
    });

    totalElement.textContent = total.toFixed(2) + 'dt';
}
