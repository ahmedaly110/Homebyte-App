const API ='ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6VXhNaUo5LmV5SndjbTltYVd4bFgzQnJJam8xTlRrd05ETXNJbTVoYldVaU9pSnBibWwwYVdGc0lpd2lZMnhoYzNNaU9pSk5aWEpqYUdGdWRDSjkuaGlLN2RWQ3h1QUFEb0xfWGJkNTYtZldYNU5uTHd1Z0s2dUV0S1NETXAtcnNPNDlLaHViNmdDamhGbEtPSlN4XzRodjhDUGlsbkpXbU51VjNYZDQyMkE='

function updatetotal() {
    var cartContent = document.getElementsByClassName("cart-content")[0];
    var cartBoxes = cartContent.getElementsByClassName("cart-box");
    var total = 0;
    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName("cart-price")[0];
        var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
        var price = parseFloat(priceElement.innerText.replace("£", ""));
        var quantity = quantityElement.value;
        total = total + price * quantity;
    }
    // IF THE PRICE HAVE DECIMALS
    total = Math.round(total * 100) / 100;

    document.getElementsByClassName("total-price")[0].innerText = "£" + total;

    totalAmountCents = total * 100; // Store the total amount in cents in the global variable
}
var totalAmountCents = 0; // Define a global variable to store the total amount

async function firststep(){
    let data ={
        "api_key": API
    }
    let request = await fetch ('https://accept.paymob.com/api/auth/tokens',{
        method : 'post',
        headers : {'content-type':'application/json'},
        body : JSON.stringify(data)
    })
    let response = await request.json()

    let token = response.token

    secondstep(token)
}

async function secondstep(token){
    let data ={
        "auth_token":  token,
        "delivery_needed": "false",
        "amount_cents": totalAmountCents,
        "currency": "EGP",
        "items": [],
      }

    let request = await fetch ('https://accept.paymob.com/api/ecommerce/orders',{
        method : 'post',
        headers : {'content-type':'application/json'},
        body : JSON.stringify(data)
    })
    let response = await request.json()
    let id = response.id

    thirdstep(token,id)
}

async function thirdstep(token, id){    
    let data ={
        "auth_token": token,
        "amount_cents": totalAmountCents, 
        "expiration": 3600, 
        "order_id": id,
        "billing_data": {
          "apartment": "803", 
          "email": "claudette09@exa.com", 
          "floor": "42", 
          "first_name": "Clifford", 
          "street": "Ethan Land", 
          "building": "8028", 
          "phone_number": "+86(8)9135210487", 
          "shipping_method": "PKG", 
          "postal_code": "01898", 
          "city": "Jaskolskiburgh", 
          "country": "CR", 
          "last_name": "Nicolas", 
          "state": "Utah"
        }, 
        "currency": "EGP", 
        "integration_id": 2905218
      }

let request = await fetch ('https://accept.paymob.com/api/acceptance/payment_keys',{
    method : 'post',
    headers : {'content-type':'application/json'},
    body : JSON.stringify(data)
})
let response = await request.json()

let TheToken = response.token

cardPayment(TheToken)

}

async function cardPayment (token){

    try {
        let iframeURL = `https://accept.paymob.com/api/acceptance/iframes/685113?payment_token=${token}`;
        location.href = iframeURL;
    } catch (error) {
        console.error("An error occurred during card payment:", error);
    }
}



firststep()