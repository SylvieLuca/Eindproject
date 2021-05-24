      // ************************** Shopping Cart Functions *********************
      var cart = [];

      var Item = function (name, price, count) {
        this.name = name;
        this.price = price;
        this.count = count;
      };

      function addItemToCart(name, price, count) {
        for (var i in cart) {
          if (cart[i].name === name) {
            cart[i].count += count;
            saveCart();
            return;
          }
        }
        var item = new Item(name, price, count);
        cart.push(item);
        saveCart();
      }

      function setCountForItem(name, count) {
        for (var i in cart) {
          if (cart[i].name === name) {
            cart[i].count = count;
            break;
          }
        }
        saveCart();
      }

        function removeItemFromCart(name) {
          for (var i in cart) {
            if (cart[i].name === name) {
              cart[i].count--;
              if (cart[i].count === 0) {
                cart.splice(i, 1);
              }

              break;
            }
          }
          saveCart();
        }

      function removeItemFromCartAll(name) {
        for (var i in cart) {
          if (cart[i].name === name) {
            cart.splice(i, 1);
            break;
          }
        }
        saveCart();
      }

      function clearCart() {
        cart = [];
        saveCart();
      }

      function countCart() {
        var totalCount = 0;
        for (var i in cart) {
          totalCount += cart[i].count;
        }

        return totalCount;
      }

      function totalCart() {
        var totalCost = 0;
        for (var i in cart) {
          totalCost += cart[i].price * cart[i].count;
        }

        return totalCost.toFixed(2);
      }

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

      function saveCart() {
        localStorage.setItem("shoppingCart", JSON.stringify(cart));
      }

      function loadCart() {
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
      }

