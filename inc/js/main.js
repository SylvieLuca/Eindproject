
/* -------------------------------JAVASCRIPT TESTS------------------------------------------------ */

function javascriptTest() {
  console.log("JAVASCRIPT WERKT HIER");  
}  

let x = Array.from(document.querySelectorAll("div"));
let y = Array.from(document.getElementsByClassName("buy-button"));
let z = Array.from(document.getElementsByClassName("product-item"));

/* -------------------------------HEADER & FOOTER COLLAPSIBLES------------------------------------------------ */

const collapsibles = document.querySelectorAll(".collapsible");
collapsibles.forEach((item) =>
  item.addEventListener("click", function () {
    this.classList.toggle("collapsible--expanded");
  })
);

/* -------------------------------SHOW PASSWORD------------------------------------------------ */

function showPassword() {
  let x = document.getElementById("myInput");

  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

/* -------------------------------ITEM TOEVOEGEN------------------------------------------------- */

let cart = [];

class Item {
  constructor (name, image, price, description, count) {
    this.name = name;
    this.image = image;
    this.price = price;
    this.description = description;
    this.count = count;
  }
}

loadCart();
showCartBadge();

/* Voegt aan alle BUY-BUTTONS een eventlistener toe die geactiveerd wordt bij clicked */
let addToCartButtons = document.getElementsByClassName('buy-button');
for (let i = 0; i < addToCartButtons.length; i++) {
  let button = addToCartButtons[i]
  button.addEventListener('click', addToCartClicked)
}

function woopCartToServer(cart) {
	$.ajax({
    type: 'POST',
    url: 'get_query.php',                      
    data: {cart: cart},
    success: function(data) {
    //  alert(data);
		}
	});
}

/* Selecteert de geklikte button, zoekt parent van parent om het product te kennen, neemt van dat product name, image, price en description. 
Met die gegevens en met count = 1 maken we een new Item en voegen dat item toe aan de cart. */
function addToCartClicked(event) {

  let button = event.target;
  let productItem = button.parentElement.parentElement;
  let name = productItem.getElementsByClassName('product-name')[0].innerText;
  let imageSrc = productItem.getElementsByClassName('product-image')[0].src;
  let description = productItem.getElementsByClassName('product-description')[0].innerText;
  let price = productItem.getElementsByClassName('product-price')[0].innerText;
  
  let item = new Item(name, imageSrc, price, description, 1);
  addItemToCart(item);
}

/* Voor alle items die al bestaan count += 1. 
Voor nieuwe items wordt er een nieuw item aangemaakt, item wordt toegevoegd aan de cart. 
JSON-string wordt gemaakt met alle properties van het item. Die string wordt opgeslagen in localstorage. 
Een unordered list wordt gemaakt en per item voegen we een nieuw listitem aan die unordered list toe. */
function addItemToCart(item) {

    //loadCart();
    for (let i in cart) {
      if (cart[i].name === item.name) {
        cart[i].count +=1;
        saveCart();
		    showCartBadge();
        return;
      }
    }

    item = new Item(item.name, item.image, item.price, item.description, item.count);
  
    cart.push(item);
    saveCart();
    showCartBadge();
}


/* ---------------------------------------ITEM VERWIJDEREN-------------------------------------------- */

function removeItemFromCart(name)
{
	for (let i in cart) {
      if (cart[i].name === name) {
	  cart.splice(i,1);
		saveCart();
		showCartBadge();
      }
    }
}

/* ------------------------------MAKE CART ARRAY EMPTY----------------------------------------------------- */

function clearCart() {
  cart = [];
  location.reload();
  saveCart();
}

/* ------------------------------SAVE CART IN LOCALSTORAGE----------------------------------------------------- */

function saveCart() {
  sessionStorage.setItem("shoppingcart", JSON.stringify(cart));
  woopCartToServer(cart);
}

/* ------------------------------LOAD CART FROM LOCALSTORAGE----------------------------------------------------- */

function loadCart() {
	if (sessionStorage.getItem("shoppingcart") !== null)
	{
		cart = JSON.parse(sessionStorage.getItem("shoppingcart"));
	};
}

/* ------------------------------COUNT ALL ITEMS IN CART----------------------------------------------------- */

function countCart() {
  let totalCount = 0;
  for (let i in cart) {
    totalCount += cart[i].count;
  }

  return totalCount;
}

/* ------------------------------TOTAL PRICE----------------------------------------------------- */

function totalCart() {
  let totalCost = 0;
  for (let i in cart) {
    stringlength = cart[i].price.length;
    totalCost += cart[i].price.slice(2,stringlength) * cart[i].count;
  }

  return totalCost.toFixed(2);
}

/* ------------------------------COPY CART ARRAY (SHOULD BE USED TO DISPLAY CART)----------------------------------------------------- */

function listCart() {
  let cartCopy = [];
  for (let i in cart) {
    let item = cart[i];
    let itemCopy = {};
    for (let p in item) {
      itemCopy[p] = item[p];
    }
    itemCopy.total = (item.price * item.count).toFixed(2);
    cartCopy.push(itemCopy);
  }
  return cartCopy;
}


/*--------------------------  show badge --------------------------------*/
function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

function showCartBadge() {

    let ul = document.getElementById('show-cart');
	
	removeAllChildNodes(ul);
	
  //Show buttons and labels if cart is not empty

	if (cart !== null && cart.length > 0) {

    let showcartcontainer = document.getElementById('show-cart');    

    //Show "clear cart" button if cart is not empty
    let emptyCartBtn = document.createElement("INPUT");
    emptyCartBtn.setAttribute("type", "button");
    emptyCartBtn.setAttribute("value", "Empty Cart");
    emptyCartBtn.className = "emptyCartBtn";
    emptyCartBtn.addEventListener('click', clearCart);
    showcartcontainer.appendChild(emptyCartBtn);

    // Free shipping label
    let shippingCostLabel = document.createElement("LABEL");
    shippingCostLabel.className = "shippingCostLabel";
    shippingCostLabel.textContent = "You get free shipping!";
    showcartcontainer.appendChild(shippingCostLabel);

    //Show total number of items
    let totalItems = document.createElement("LABEL");
    totalItems.className = "totalItemsLabel";
    let totalItemsOnPage = countCart();
    totalItems.innerText = "Items in cart: " + totalItemsOnPage;
    showcartcontainer.appendChild(totalItems);

    //Show total number of items
    let totalPrice = document.createElement("LABEL");
    totalPrice.className = "totalPriceLabel";
    let totalPriceOnPage = totalCart();
    totalPrice.innerText = "Total price: \u20AC " + totalPriceOnPage;

    showcartcontainer.appendChild(totalPrice);

    //Shopping Cart Button
    let purchaseButton = document.createElement("a");
    purchaseButton.href = "#modal";
    purchaseButton.className = "btn contact-form-btn shop-button purchaseButton";
    purchaseButton.type = "submit";
    let text = "Purchase"; 
    purchaseButton.textContent = text;
    // purchaseButton.setAttribute("href", "cart.php");
    // purchaseButton.className = "btn shop-button purchaseButton";
    showcartcontainer.appendChild(purchaseButton);

    let modal = document.createElement("DIV");
    modal.id = "modal";
    showcartcontainer.appendChild(modal);

    let modalDiv = document.createElement("DIV");
    modalDiv.className = "modal__window";
    modal.appendChild(modalDiv);
    
    let anchor = document.createElement("a");
    anchor.className = "modal__cl";
    anchor.href = "#";
    anchor.textContent = "X";
    modalDiv.appendChild(anchor);

    let thanks = document.createElement("h2");
    thanks.className = "thanksText";
    thanks.textContent = "Thank you! We received your order and will contact you to make further arrangements about payment and delivery.";
    anchor.appendChild(thanks);

	} else {
    let showcartcontainer = document.getElementById('show-cart');    
    let label = document.createElement("label");
    text = "Your cart is empty";
    label.innerText = text;
    showcartcontainer.appendChild(label);
  }

  cart.forEach(showCartBadgeItem);

  saveCart();
}

function showCartBadgeItem(item)
{

  myPrice = item.price;
  stringlength = myPrice.length;
  var result = myPrice.slice(2,stringlength);
  result *= 1;

  let myCount = item.count;
  
  let itemTotal = (myCount*result);
  let fixedItemTotal = itemTotal.toFixed(2);

  let cartRowContents = `
  <div class="grid-container">
    <div class="Image">
      <img class="img" src="${item.image}">
    </div>
    <div class="DIV">
      <div class="first">
        <span class="cart-item-name">${item.name}</span>
      </div>
      <div class="second">
        <label class="cart-item-priceCount"
        <label>${myCount} x ${item.price} = &euro; ${fixedItemTotal}</label>
      </div>
  </div>
  <div class="X">
    <a href="#" onclick="removeItemFromCart('${item.name}')">X</a>
  </div>
</div>`

    let ul = document.getElementById('show-cart');
    let li = document.createElement("li");
    li.innerHTML += cartRowContents;
    ul.appendChild(li);
}

