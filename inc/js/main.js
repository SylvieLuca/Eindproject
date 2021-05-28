// function javascriptTest() {
//   console.log("JAVASCRIPT WERKT HIER");  
// }  

const collapsibles = document.querySelectorAll(".collapsible");
collapsibles.forEach((item) =>
  item.addEventListener("click", function () {
    this.classList.toggle("collapsible--expanded");
  })
);

/* -------------------------------JAVASCRIPT TEST------------------------------------------------ */

// console.log("TEST");
// var x = Array.from(document.querySelectorAll("div"));
// console.log ("Aantal div's op deze pagina: " +   x.length);

/* -------------------------------SUBSCRIBE BUTTON------------------------------------------------ */

const toggleModal = () => {
  document.querySelector('.modal')
    .classList.toggle('modal--hidden');
};

document.querySelector('.show-modal')
  .addEventListener('click', toggleModal);

document.querySelector('#learn-more')
  .addEventListener('submit', (event) => {
    event.preventDefault();
  toggleModal();
});

document.querySelector('.modal__close-bar span')
  .addEventListener('click', toggleModal);

/* -------------------------------ITEM TOEVOEGEN------------------------------------------------- */

var cart = [];

class Item {
  constructor (id, name, price, image, count) {
    this.id = id;
    this.name = name;
    this.price = price;
    this.image = image;
    this.count = count;
  }
}

/* Voegt aan alle BUY-BUTTONS een eventlistener toe die geactiveerd wordt bij clicked */
var addToCartButtons = document.getElementsByClassName('buy-button');
for (var i = 0; i < addToCartButtons.length; i++) {
  var button = addToCartButtons[i]
  button.addEventListener('click', addToCartClicked)
}

/* Selecteert de geklikte button, zoekt parent van parent om het product te kennen, neemt van dat product id, name, price en image. 
Met die gegevens en met count = 1 maken we een new Item en voegen dat item toe aan de cart. */
function addToCartClicked(event) {
  var button = event.target
  var productItem = button.parentElement.parentElement
  console.log("het productItem is " + productItem);
  var id = productItem.getElementsByClassName('product-id')[0].value
  console.log("ID is: " + id);
  var name = productItem.getElementsByClassName('product-name')[0].innerText
  console.log("Name is: " + name);
  var price = productItem.getElementsByClassName('product-price')[0].innerText
  console.log("Price is: " + price);
  var imageSrc = productItem.getElementsByClassName('product-image')[0].src
  console.log("ImageSrc is: " + imageSrc);
  var item = new Item(id, name, price, imageSrc, 1);
  console.log("We zitten hier: " + id, name, price, imageSrc)
  addItemToCart(item);
}

/* Voor alle items die al bestaan count += 1. 
Voor nieuwe items wordt er een nieuw item aangemaakt, item wordt toegevoegd aan de cart. 
JSON-string wordt gemaakt met alle properties van het item. Die string wordt opgeslagen in localstorage. 
Een unordered list wordt gemaakt en per item voegen we een nieuw listitem aan die unordered list toe. */
function addItemToCart(item) {
  
    // loadCart();
    for (var i in cart) {
      if (cart[i].name === item.name) {
        cart[i].count +=1;
        var x = document.getElementsByClassName("cart-quantity-input-" + item.id + "\n");
        x.value = item.count;
        // saveCart();
        return;
      }
    }
    var item = new Item(item.id, item.name, item.price, item.image, item.count);

  console.log("Bij het aanmaken van het nieuwe item is ID: " + item.id + "\nNAME " + item.name + "\nPRICE " + item.price + "\nIMAGE " + item.image + "\nCOUNT " + item.count);

    cart.push(item);

    var cartRowContents = `
    <div class="cart-item">
      <span class="cart-item-id">${item.id}</span>
      <img class="cart-item-image" src="${item.image}" width="100"
      height="100">
      <span class="cart-item-name">${item.name}</span>
    </div>
    <span class="cart-price">${item.price}</span>
    <div class="cart-quantity">
      <input class="cart-quantity-input-${item.id}" type="number" value="${item.count}">
      <button class="btn btn-remove" type="button">REMOVE</button>
    </div>`

    console.log("JSON: " + JSON.stringify(cartRowContents));

    localStorage.setItem("shoppingcart", JSON.stringify(cartRowContents));
    var ul = document.getElementById('show-cart');
    var li = document.createElement("li");
    li.innerHTML += cartRowContents;
    ul.appendChild(li);
    //saveCart();

    console.log("Mijn cart is gevuld met: " + cart[0].count);
}

/* ---------------------------------------ITEM VERWIJDEREN-------------------------------------------- */

/* TODO: juiste div verwijderen - op dit moment wordt de parent van de node verwijderd: de div waar ook SHOP in staat */
var removeCartItemButtons = document.getElementsByClassName('btn-remove');
for (var i = 0; i < removeCartItemButtons.length; i++) {
  var button = removeCartItemButtons[i];
  button.addEventListener('click', function(event) {
    var buttonClicked = event.target;
    console.log(buttonClicked.parentNode.nodeName)  ;
    buttonClicked.parentElement.remove();
  })
}

/* -------------------------------------ALLE ITEMS VERWIJDEREN---------------------------------------------- */

/* TODO: juiste div's verwijderen - op dit moment wordt de parent van de node verwijderd: de div waar ook SHOP in staat */
var removeCartItemButtons = document.getElementsByClassName('btn-remove');
for (var i = 0; i < removeCartItemButtons.length; i++) {
  var button = removeCartItemButtons[i];
  button.addEventListener('click', function(event) {
    var buttonClicked = event.target;
    console.log(buttonClicked.parentNode.nodeName)  ;
    buttonClicked.parentElement.remove();
  })
}

/* ------------------------------MAKE CART ARRAY EMPTY----------------------------------------------------- */

function clearCart() {
  cart = [];
  saveCart();
}

/* ------------------------------SAVE CART IN LOCALSTORAGE----------------------------------------------------- */

function saveCart() {
  localStorage.setItem("shoppingcart", JSON.stringify(cart));

}

/* ------------------------------LOAD CART FROM LOCALSTORAGE----------------------------------------------------- */

function loadCart() {
  var a = JSON.parse(localStorage.getItem("shoppingcart"));
}

/* ------------------------------COUNT ALL ITEMS IN CART----------------------------------------------------- */

function countCart() {
  var totalCount = 0;
  for (var i in cart) {
    totalCount += cart[i].count;
  }

  return totalCount;
}

/* ------------------------------TOTAL PRICE----------------------------------------------------- */

function totalCart() {
  var totalCost = 0;
  for (var i in cart) {
    totalCost += cart[i].price * cart[i].count;
  }

  return totalCost.toFixed(2);
}

/* ------------------------------COPY CART ARRAY (SHOULD BE USED TO DISPLAY CART)----------------------------------------------------- */

function listCart() {
  var cartCopy = [];
  for (var i in cart) {
    var item = cart[i];
    var itemCopy = {};
    for (var p in item) {
      itemCopy[p] = item[p];
    }
    itemCopy.total = (item.price * item.count).toFixed(2);
    cartCopy.push(itemCopy);
  }
  return cartCopy;
}