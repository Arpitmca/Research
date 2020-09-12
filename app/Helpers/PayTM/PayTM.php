REDACTED<?php


namespace App\Helpers\PayTM;
require_once "Encryption/Encryption.php";

use paytmpg\pg\constants\LibraryConstants;
use paytmpg\pg\constants\MerchantProperties;
use paytmpg\pg\enums\EChannelId;
use paytmpg\pg\enums\EnumCurrency;
use paytmpg\pg\models\Money;
use paytmpg\pg\models\UserInfo;
use paytmpg\merchant\models\PaymentDetail\PaymentDetailBuilder;
use paytmpg\pg\process\Payment;
use paytmpg\pg\constants\Config;
/**
 *          
 */
class PayTM
{
    
    public function __construct($environment = "staging")
    {
        define('PROJECT', base_path());
        $environment = "staging";
        if ($environment == "production") {
            $envText = "PROD";
            $environment = LibraryConstants::PRODUCTION_ENVIRONMENT;
        } else {
            $envText = "TEST";
            $environment = LibraryConstants::STAGING_ENVIRONMENT;
        }

        // For Production 
         
        // Find your mid, key, website in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
        $mid = "REDACTED";
        $key = "REDACTED!xZ6";
        $website = "DEFAULT";
        $client_id = "ROYAL";

        $callbackUrl = route("paytm.glide") ;
        MerchantProperties::setCallbackUrl($callbackUrl);

        MerchantProperties::initialize($environment, $mid, $key, $client_id, $website);

        Config::$monologName = '[PAYTM]';
        Config::$monologLevel = \Monolog\Logger::INFO;
        Config::$monologLogfile = '/file.log';


        define('PAYTM_ENVIRONMENT', $envText); 
        define('PAYTM_MERCHANT_KEY', $key); //Change this constant's value with Merchant key received from Paytm.
        define('PAYTM_MERCHANT_MID', $mid); //Change this constant's value with MID (Merchant ID) received from Paytm.
        define('PAYTM_MERCHANT_WEBSITE', $website); //Change this constant's value with Website name received from Paytm.

        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
        $PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
        if (PAYTM_ENVIRONMENT == 'PROD') {
            $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
            $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
        }

        define('PAYTM_REFUND_URL', '');
        define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
       
    }
    public function createToken($uid, string $amount)
    {
        $channelId = EChannelId::WEB;
        $orderId = $uid;
        $txnAmount = Money::constructWithCurrencyAndValue(EnumCurrency::INR, $amount);
        $userInfo = new UserInfo("CUSTOMER_ID"); 
        $userInfo->setAddress("CUSTOMER_ADDRESS");
        $userInfo->setEmail("CUSTOMER_EMAIL_ID");
        $userInfo->setFirstName("CUSTOMER_FIRST_NAME");
        $userInfo->setLastName("CUSTOMER_LAST_NAME");
        $userInfo->setMobile("CUSTOMER_MOBILE_NO");
        $userInfo->setPincode("CUSTOMER_PINCODE");
        $paymentDetailBuilder = new PaymentDetailBuilder($channelId, $orderId, $txnAmount, $userInfo);
        $paymentDetail = $paymentDetailBuilder->build();
        $response = Payment::createTxnToken($paymentDetail);
        return $response->getResponseObject()->getBody()->getTxnToken();
    }
    
}