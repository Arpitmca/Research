@extends("layouts.blank")
@push("head")
<script>
  function onScriptLoad(){
      var config = {
        "root": "",
        "flow": "DEFAULT",
        "data": {
        "orderId": "{{$order_id}}", /* update order id */
        "token": "{{$token}}", /* update token value */
        "tokenType": "TXN_TOKEN",
        "amount": "{{$amount}}" /* update amount */
        },
        "handler": {
          "notifyMerchant": function(eventName,data){
            console.log("notifyMerchant handler function called");
            console.log("eventName => ",eventName);
            console.log("data => ",data);
          } 
        }
      };

      if(window.Paytm && window.Paytm.CheckoutJS){
          window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
              // initialze configuration using init method 
              console.log("initializing payment checkoutjs");
              window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                console.log("initialized");

                  // after successfully updating configuration, invoke Blink Checkout
                  window.Paytm.CheckoutJS.invoke();
              }).catch(function onError(error){
                  console.log("error => ",error);
              });
          });
      } 
  }
</script>
<script type="application/javascript" crossorigin="anonymous" src=" https://securegw-stage.paytm.in/merchantpgpui/checkoutjs/merchants/HJXtjd17549956910372.js" onload="onScriptLoad();"> </script>

@endpush
@section("content")
<div class="block-space block-space--layout--divider-xs"></div>

@endsection