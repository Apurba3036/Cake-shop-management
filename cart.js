let cart = [];

function addToCart(type, cake, price) {
  let size = document.getElementById("size").value;
  let design = document.getElementById("design").files[0];
  let item = { type, cake, size, design: design ? design.name : "", price };
  cart.push(item);
  displayCart();
}

function displayCart() {
  let cartItems = "";
  let total = 0;

  for (let i = 0; i < cart.length; i++) {
    if(i <= 10){
      let item = cart[i];
      let { type, cake, size, design, price } = item;
      let designName = design ? design : "N/A";
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
    } else {
      alert("You cannot order more than 10 items");
      break;
    }
  }
  document.getElementById("cart-items").innerHTML = cartItems;
  document.getElementById("total-price").value = total;
}

function removeFromCart(index) {
  cart.splice(index, 1);
  displayCart();
}

async function submitOrder(event) {
  event.preventDefault();

  const formData = new FormData();
  formData.append('items', JSON.stringify(cart));
  formData.append('totalPrice', document.getElementById("total-price").value);
  formData.append('username', document.getElementById("username").value);

  try {
    const response = await fetch('http://localhost:8000/cartPost.php', {
      method: 'POST',
      body: formData
    });
    const result = await response.text();
    alert(result);
    cart = [];
    displayCart();
  } catch (error) {
    console.error('Error:', error);
    alert('There was an error placing your order.');
  }
}
