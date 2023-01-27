let cart = [];

function addToCart(type, cake, price) {
  let size = document.getElementById("size").value;
  let design = document.getElementById("design").files[0];
  let item = { type, cake, size, design, price };
  cart.push(item);
  displayCart();
}

function displayCart() {
  let cartItems = "";
  let total = 0;
  for (let i = 0; i < cart.length; i++) {
    let item = cart[i];
    let { type, cake, size, design, price } = item;
    let designName = design ? design.name : "N/A";
    let itemPrice = parseFloat(price) * parseFloat(size);
    total += itemPrice;
    cartItems += `
      <tr>
        <td>${type}</td>
        <td>${cake}</td>
        <td>${size}</td>
        <td>${designName}</td>
        <td>${itemPrice}</td>
        <td>
          <button onclick="removeFromCart(${i})">Remove</button>
        </td>
      </tr>
    `;
  }
  document.getElementById("cart-items").innerHTML = cartItems;
  document.getElementById("total-price").value = total;
}

function removeFromCart(index) {
  cart.splice(index, 1);
  displayCart();
}

function submitOrder(event) {
  event.preventDefault();
  // add logic to process payment and submit order
  alert("Your order has been placed!");
  cart = [];
  displayCart();
}
