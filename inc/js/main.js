function javascriptTest() {
  console.log("JAVASCRIPT WERKT HIER");  
}  

const collapsibles = document.querySelectorAll(".collapsible");
collapsibles.forEach((item) =>
  item.addEventListener("click", function () {
    this.classList.toggle("collapsible--expanded");
  })
);

/* ----------------------------------------------------------------------------------- */

var addToCartButtons = document.getElementsByClassName('product-item-button')
for (var i = 0; i < addToCartButtons.length; i++) {
  var button = addToCartButtons[i]
  button.addEventListener('click', addToCartClicked)
}

function addToCartClicked(event) {
  var button = event.target
  var productItem = button.parentElement.parentElement
  var title = productItem.getElementsByClassName('product-item-title')[0].innerText
  var price = productItem.getElementsByClassName('product-item-price')[0].innerText
  var imageSrc = productItem.getElementsByClassName('product-item-image')[0].src
  console.log(title, price, imageSrc)
  addItemToCart(title, price, imageSrc)
}

function addItemToCart(title, price, imageSrc) {
  var cartRow = document.createElement('div')
  cartRow.classList.add('cart-row')
  var cartItems = document.getElementsByClassName('cart-items')[0]  
  var cartRowContents = `
    <div class="cart-item cart-column">
      <img class="cart-item-image" src="${imageSrc}" width="100"
      height="100">
      <span class="cart-item-title">${title}</span>
    </div>
    <span class="cart-price cart-column">${price}</span>
    <div class="cart-quantity cart-column">
      <input class="cart-quantity-input" type="number" value="1">
      <button class="btn btn-danger" type="button">REMOVE</button>
    </div>`
    cartRow.innerHTML = cartRowContents
  cartItems.append(cartRow)
}