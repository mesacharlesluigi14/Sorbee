function showItemDetails(name, description, price, imageUrl) {
  const modalTitle = document.getElementById('itemModalLabel');
  const modalBody = document.getElementById('itemDetails');

  modalTitle.innerHTML = `<h5 class="modal-title">${name}</h5>`;
  modalBody.innerHTML = `
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="${imageUrl}" class="img-fluid" alt="${name}" style="width: 180px; height: 180px;">
        </div>
        <div class="col-md-6">
          <p class="modal-description">${description}</p>
          <p class="modal-price">${price}</p>
        </div>
      </div>
    </div>
  `;

const addToCartBtn = document.getElementById('addToCartBtn');

  addToCartBtn.addEventListener("click", function() {
    addToCart(name, description, price, imageUrl);
    showNotification();
  });
  

  $('#itemModal').modal('show');
}

function addToCart(name, description, price, imageUrl) {
  
  let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

 
  cartItems.push({ name, description, price, imageUrl });

  
  localStorage.setItem('cartItems', JSON.stringify(cartItems));
}

function showNotification() {
  const notificationBox = document.createElement('div');
  notificationBox.classList.add('notification-box');
  
  const notificationText = document.createElement('p');
  notificationText.classList.add('notification-text');
  notificationText.innerText = "Login as User to Purchase our Products.";
  
  notificationBox.appendChild(notificationText);
  document.body.appendChild(notificationBox);

  setTimeout(function() {
    document.body.removeChild(notificationBox);
  }, 1000);
} 

