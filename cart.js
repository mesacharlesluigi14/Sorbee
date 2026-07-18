    function loadCartItems() {
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        const cartItemsContainer = document.getElementById('cartItemsContainer');
        cartItemsContainer.innerHTML = '';
        let grandTotal = 0;

        cartItems.forEach((item, index) => {
            const itemRow = document.createElement('div');
            itemRow.className = 'row';
            itemRow.innerHTML = `
                <div class="col-sm">
                    <div class="row">
                        <div class="col">
                            <div class="backproduct">
                                <div class="innerproduct">
                                    <img class="icecream" src="${item.imageUrl}" alt="${item.name}">
                                </div>                        
                            </div>
                        </div>
                        <div class="col">
                            <p class="elemproduct">${item.name}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="price">
                        <p class="priceproduct">${parseFloat(item.price).toFixed(2)}</p>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="quan">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">-</button>
                                        <input type="text" class="form-control input-number" value="${item.quantity || 0 }" min="0" max="100">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">+</button>
                                    </div>
                                    <div class="remove text-center"> 
                                        <button type="button" class="btn btnremove" data-index="${index}">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="total">
                        <p class="totalproduct">${(parseFloat(item.price) * (item.quantity || 1)).toFixed(2)}</p>
                    </div>
                </div>
                <hr style="height:2px;border-width:0;color:gray;background-color:#fff; margin-top: 15px;">
            `;
            cartItemsContainer.appendChild(itemRow);

            let totalProduct = itemRow.querySelector('.totalproduct');
            let currentTotal = parseFloat(totalProduct.textContent);
            grandTotal += currentTotal;

            const plusButton = itemRow.querySelector('.quantity-right-plus');
            const minusButton = itemRow.querySelector('.quantity-left-minus');
            const inputNumber = itemRow.querySelector('.input-number');

            plusButton.addEventListener('click', () => {
                updateQuantity(index, parseInt(inputNumber.value) + 1);
            });

            minusButton.addEventListener('click', () => {
                if (inputNumber.value > 1) {
                    updateQuantity(index, parseInt(inputNumber.value) - 1);
                }
            });

            itemRow.querySelector('.btnremove').addEventListener('click', () => {
                cartItems.splice(index, 1);
                saveCartItems(cartItems);
                loadCartItems();
            });
        });

        function updateQuantity(index, newQuantity) {
            cartItems[index].quantity = newQuantity;
            saveCartItems(cartItems);
            loadCartItems();
        }

        function updateGrandTotal() {
            let formattedTotal = `₱${grandTotal.toFixed(2)} PHP`;
            document.getElementById('totalAmount').textContent = formattedTotal;
            document.getElementById('checkoutButton').disabled = grandTotal <= 0;
        }

        updateGrandTotal();
    }

    function saveCartItems(cartItems) {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    document.addEventListener('DOMContentLoaded', loadCartItems);
