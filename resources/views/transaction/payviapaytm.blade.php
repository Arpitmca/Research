@extends("layouts.blank")
@section("title", "Please wait...")
@section("content")
<div class="site__body">
    <div class="block-space block-space--layout--spaceship-ledge-height"></div>
    <div class="block order-success">
        <div class="container">
            <div class="order-success__body">
                <div class="order-success__header">
                    <div class="order-success__icon">
                        <svg width="100" height="100">
                            <path d="M50,100C22.4,100,0,77.6,0,50S22.4,0,50,0s50,22.4,50,50S77.6,100,50,100z M50,2C23.5,2,2,23.5,2,50
                            s21.5,48,48,48s48-21.5,48-48S76.5,2,50,2z M44.2,71L22.3,49.1l1.4-1.4l21.2,21.2l34.4-34.4l1.4,1.4L45.6,71
                            C45.2,71.4,44.6,71.4,44.2,71z" />
                        </svg>
                    </div>
                    <h1 class="order-success__title">Please wait...</h1>
                    <div class="order-success__subtitle">while we take you to the payment gateway...</div>
                    <div class="order-success__actions">
                        <form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
                            <table border="1">
                                <tbody>
                                <?php
                                foreach($paramList as $name => $value) {
                                    echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
                                }
                                ?>
                                <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
                                <button type="submit" class="btn btn-sm btn-secondary">Click here if not automatically redirected.</button>
                                </tbody>
                            </table>
                            <script type="text/javascript">
                                document.f1.submit();
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
@endsection