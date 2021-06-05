
/* -------------------------------JAVASCRIPT TESTS------------------------------------------------ */

function javascriptTest() {
  console.log("JAVASCRIPT WERKT HIER");  
}  

console.log("TEST - AANTAL ELEMENTEN OP PAGINA - TEST");
let x = Array.from(document.querySelectorAll("div"));
let y = Array.from(document.getElementsByClassName("buy-button"));
let z = Array.from(document.getElementsByClassName("product-item"));
console.log ("Aantal div's op deze pagina: " +   x.length);
console.log ("Aantal buy-buttons op deze pagina: " + y.length);
console.log ("Aantal product-items op deze pagina: " + z.length);

/* -------------------------------HEADER & FOOTER COLLAPSIBLES------------------------------------------------ */

const collapsibles = document.querySelectorAll(".collapsible");
collapsibles.forEach((item) =>
  item.addEventListener("click", function () {
    this.classList.toggle("collapsible--expanded");
  })
);

/* -------------------------------SHOW PASSWORD------------------------------------------------ */

function showPassword() {
  console.log("myFunction is gestart");
  let x = document.getElementById("myInput");
  console.log(x);
  console.log(x.type);

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
console.log("Er zijn " + addToCartButtons.length + " buy-buttons op deze pagina");
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
  console.log("BUY BUTTON WAS CLICKED");

  let button = event.target;

  let productItem = button.parentElement.parentElement;
  console.log(productItem);
  console.log("het productItem is " + productItem);

  let name = productItem.getElementsByClassName('product-name')[0].innerText;
  console.log("Name is: " + name);

  let imageSrc = productItem.getElementsByClassName('product-image')[0].src;
  console.log("ImageSrc is: " + imageSrc);
  
  let description = productItem.getElementsByClassName('product-description')[0].innerText;
  console.log("Description is: " + description);

  let price = productItem.getElementsByClassName('product-price')[0].innerText;
  console.log("Price is: " + price);
  
  let item = new Item(name, imageSrc, price, description, 1);
  console.log("Het item wordt aangemaakt")
  console.log(JSON.stringify(item));
  addItemToCart(item);
    
  console.log("Het item is hopelijk toegevoegd aan de functie testje..............................................................")
}

/* Voor alle items die al bestaan count += 1. 
Voor nieuwe items wordt er een nieuw item aangemaakt, item wordt toegevoegd aan de cart. 
JSON-string wordt gemaakt met alle properties van het item. Die string wordt opgeslagen in localstorage. 
Een unordered list wordt gemaakt en per item voegen we een nieuw listitem aan die unordered list toe. */
function addItemToCart(item) {
  console.log("We zijn aanbeland in de functie addItemToCart");

    //loadCart();
    for (let i in cart) {
      if (cart[i].name === item.name) {
        cart[i].count +=1;
        saveCart();
		    showCartBadge();
        return;
      }
    }

    console.log("Na de check of het item al bestaat");
    console.log(item.name);
    console.log(item.image);
    console.log(item.price);
    console.log(item.description);
    console.log(item.count);

    item = new Item(item.name, item.image, item.price, item.description, item.count);

    console.log("Bij het aanmaken van het nieuwe item is NAME: " + item.name + "\nIMAGE " + item.image + "\nPRICE " + item.price + "\nDESCR " + item.description + "\nCOUNT " + item.count);
  
    cart.push(item);
    console.log("Item toegevoegd aan de cart");

    saveCart();
    showCartBadge();

    console.log("Mijn cart is gevuld met: " + cart[0].count);
}


/* ---------------------------------------ITEM VERWIJDEREN-------------------------------------------- */

function removeItemFromCart(name)
{
	console.log("Dit item werd verwijderd: " + name);
	for (let i in cart) {
      if (cart[i].name === name) {
	  cart.splice(i,1);
		saveCart();
		showCartBadge();
      }
    }
}

/* -------------------------------------ALLE ITEMS VERWIJDEREN---------------------------------------------- */

// /* TODO: juiste div's verwijderen - op dit moment wordt de parent van de node verwijderd: de div waar ook SHOP in staat */
// removeCartItemButtons = document.getElementsByClassName('btn-remove');
// for (let i = 0; i < removeCartItemButtons.length; i++) {
//   let button = removeCartItemButtons[i];
//   button.addEventListener('click', function(event) {
//     let buttonClicked = event.target;
//     console.log(buttonClicked.parentNode.nodeName)  ;
//     buttonClicked.parentElement.remove();
//   })
// }

/* ------------------------------MAKE CART ARRAY EMPTY----------------------------------------------------- */

function clearCart() {
  cart = [];
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
    totalCost += cart[i].price * cart[i].count;
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
function showCartBadge()
{
    let ul = document.getElementById('show-cart');
	
	removeAllChildNodes(ul);
	
	if (cart !== null && cart.length > 0)
	{
		cart.forEach(showCartBadgeItem);
	}
}
function showCartBadgeItem(item)
{
	console.log(item.name);
	let cartRowContents = `
    <div class="cart-item">
      <img class="cart-item-image" src="${item.image}" width="100" height="100">
      <span class="cart-item-name">${item.name}</span>
    <span class="cart-price">${item.price}</span>
    <div class="cart-quantity">
      <input class="cart-quantity-input" type="number" value="${item.count}">
      <button class="btn btn-remove" onclick="removeItemFromCart('${item.name}');" type="button">REMOVE</button>
    </div>`

    console.log("JSON: " + JSON.stringify(cartRowContents));

    let ul = document.getElementById('show-cart');
    let li = document.createElement("li");
    li.innerHTML += cartRowContents;
    ul.appendChild(li);
}

