let cart = [];

function addToCart(productId, productName, productPrice) {
    let product = {
        id: productId,
        name: productName,
        price: productPrice
    };
    cart.push(product);
    displayCart();
}

function removeFromCart(index) {
    cart.splice(index, 1);
    displayCart();
}

function displayCart() {
    let cartItems = document.getElementById("cart-items");
    let total = 0;
    cartItems.innerHTML = "";
    cart.forEach((item, index) => {
        total += item.price;
        let li = document.createElement("li");
        li.textContent = `${item.name} - DT${item.price.toFixed(2)}`;
        let removeBtn = document.createElement("button");
        removeBtn.textContent = "Remove";
        removeBtn.addEventListener("click", () => {
            removeFromCart(index);
        });
        li.appendChild(removeBtn);
        cartItems.appendChild(li);
    });
    document.getElementById("total").textContent = `DT${total.toFixed(2)}`;
}


function checkout() {
    alert("Thank you for your purchase!");
    cart = [];
    displayCart();
}

