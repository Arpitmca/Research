<?php

/**
 * GST Calculation Class for PHP
 * @author: Adnan Hussain Turki
 * @email: adnanhussainturki@gmail.com
 */

namespace App\Helpers;

use App\Helpers\GST;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Money;
use Money\Parser\DecimalMoneyParser;
use Money\Parser\IntlLocalizedDecimalParser;


class GST 
{
    protected $states =  array (
        ["code" => "29","fullname" => "KARNATAKA" , "acronym" => "KARNA."],
        ["code" => "33","fullname" => "TAMIL NADU" , "acronym" => "T.N."],
        ["code" => "01","fullname" => "JAMMU & KASHMIR" , "acronym" => "J&K"],
        ["code" => "01","fullname" => "JAMMU &amp; KASHMIR" , "acronym" => "J&K"],
        ["code" => "07","fullname" => "DELHI" , "acronym" => "DELHI"],
        ["code" => "27","fullname" => "MAHARASHTRA" , "acronym" => "MAHAR."],
        ["code" => "24","fullname" => "GUJARAT" , "acronym" => "GUJA."],
        ["code" => "28","fullname" => "ANDHRA PRADESH (OLD)" , "acronym" => "AN.P."],
        ["code" => "09","fullname" => "UTTAR PRADESH" , "acronym" => "U.P."],
        ["code" => "26","fullname" => "DADRA & NAGAR HAVELI" , "acronym" => "D&N H."],
        ["code" => "32","fullname" => "KERALA" , "acronym" => "KERELA"],
        ["code" => "19","fullname" => "WEST BENGAL" , "acronym" => "W.B."],
        ["code" => "06","fullname" => "HARYANA" , "acronym" => "HRYNA"],
        ["code" => "35","fullname" => "ANDAMAN & NICOBAR" , "acronym" => "A&N"],
        ["code" => "36","fullname" => "TELANGANA" , "acronym" => "TEL"],
        ["code" => "37","fullname" => "ANDHRA PRADESH" , "acronym" => "A&N"],
        ["code" => "04","fullname" => "CHANDIGARH" , "acronym" => "CHAND."],
        ["code" => "03","fullname" => "PUNJAB" , "acronym" => "PUBJAB"],
        ["code" => "30","fullname" => "GOA" , "acronym" => "GOA"],
        ["code" => "02","fullname" => "HIMACHAL PRADESH" , "acronym" => "H.P."],
        ["code" => "10","fullname" => "BIHAR" , "acronym" => "BIHAR"],
        ["code" => "23","fullname" => "MADHYA PRADESH" , "acronym" => "M.P."],
        ["code" => "18","fullname" => "ASSAM" , "acronym" => "ASSAM"],
        ["code" => "12","fullname" => "ARUNACHAL PRADESH" , "acronym" => "AR.P"],
        ["code" => "11","fullname" => "SIKKIM" , "acronym" => "SIKKIM"],
        ["code" => "21","fullname" => "ODISHA" , "acronym" => "ODISHA"],
        ["code" => "08","fullname" => "RAJASTHAN" , "acronym" => "RAJAS."],
        ["code" => "22","fullname" => "CHHATTISGARH" , "acronym" => "CHHAT."],
        ["code" => "05","fullname" => "UTTARAKHAND" , "acronym" => "U.K"],
        ["code" => "20","fullname" => "JHARKHAND" , "acronym" => "JHAR."],
        ["code" => "13","fullname" => "NAGALAND" , "acronym" => "NAGA."],
        ["code" => "17","fullname" => "MEGHALAYA" , "acronym" => "MEGHA."],
        ["code" => "31","fullname" => "LAKSHADWEEP" , "acronym" => "LAKSHA."],
        ["code" => "25","fullname" => "DAMAN & DIU" , "acronym" => "DMN & DIU"],
        ["code" => "14","fullname" => "MANIPUR" , "acronym" => "MANI."],
        ["code" => "15","fullname" => "MIZORAM" , "acronym" => "MIZO."],
        ["code" => "16","fullname" => "TRIPURA" , "acronym" => "TRIPURA"],
        ["code" => "37","fullname" => "TELANGANA" , "acronym" => "TELEN."],
        ["code" => "34","fullname" => "PUDUCHERRY" , "acronym" => "PUDU."]
    );
   
    protected $supplier_state_code;
    protected $customer_state_code;
    protected $taxableAmount;
    protected $withTaxAmount;
    protected $taxPercentage;
    protected $totalIGST;
    protected $totalSGST;
    protected $totalCGST;
    protected $currency;
    protected $taxBands = [
        "igst" => [
            ['name' => "28.0% GST", "percentage" => 28 ],
            ['name' => "18.0% GST", "percentage" => 18 ],
            ['name' => "14% GST", "percentage" => 14 ],
            ['name' => "12.0% GST", "percentage" => 12 ],
            ['name' => "9% GST", "percentage" => 9 ],
            ['name' => "6.0% GST", "percentage" => 6 ],
            ['name' => "5.0% GST", "percentage" => 5 ],
            ['name' => "3.0% GST", "percentage" => 3],
            ['name' => "0.25% GST", "percentage" => 0.25 ],
            ['name' => "0% GST", "percentage" => 0 ]
        ],
        "cgst" => [
            ['name' => "28.0% GST", "percentage" => 28 ],
            ['name' => "18.0% GST", "percentage" => 18 ],
           ['name' => "14% GST", "percentage" => 14 ],
            ['name' => "12.0% GST", "percentage" => 12 ],
            ['name' => "9% GST", "percentage" => 9 ],
            ['name' => "6.0% GST", "percentage" => 6 ],
            ['name' => "5.0% GST", "percentage" => 5 ],
            ['name' => "3.0% GST", "percentage" => 3],
            ['name' => "0.25% GST", "percentage" => 0.25 ],
            ['name' => "0% GST", "percentage" => 0 ]
        ],
        "sgst" => [
            ['name' => "28.0% GST", "percentage" => 28 ],
            ['name' => "18.0% GST", "percentage" => 18 ],
            ['name' => "14% GST", "percentage" => 14 ],
            ['name' => "12.0% GST", "percentage" => 12 ],
            ['name' => "9% GST", "percentage" => 9 ],
            ['name' => "6.0% GST", "percentage" => 6 ],
            ['name' => "5.0% GST", "percentage" => 5 ],
            ['name' => "3.0% GST", "percentage" => 3],
            ['name' => "0.25% GST", "percentage" => 0.25 ],
            ['name' => "0% GST", "percentage" => 0 ]
        ],
            
    ];
    public function __construct($currency = "INR")
    {
        $this->currency = $currency;
        $this->initializeTaxBands();
    }
    public function setTaxableAmountViaMoney(Money $money)
    {
        $this->taxableAmount = $money;
        return $this;
    }
    public function setTaxableAmount($amount, $currency = "INR")
    {
        $currencies = new ISOCurrencies();
        $moneyParser = new DecimalMoneyParser($currencies);
        $money = $moneyParser->parse($amount, $currency);
        $this->taxableAmount = $money;
        $this->currency = $currency;
        return $this;
    }
    public function setWithTaxAmount($amount, $currency = "INR")
    {
        $currencies = new ISOCurrencies();
        $moneyParser = new DecimalMoneyParser($currencies);
        $money = $moneyParser->parse($amount, $currency);
        $this->withTaxAmount = $money;
        $this->currency = $currency;
        return $this;
    }
    public function setTaxPercentage($taxPercentage)
    {
        $this->taxPercentage = $taxPercentage;
        return $this;
    }
    public function setSupplierStateCode($supplier_state_code)
    {
        if (!$this->isStateCodeValid($supplier_state_code)) {
            throw new \Exception("Supplier State code is invalid", 1);
            return;       
        }
        $this->supplier_state_code = intval($supplier_state_code);
        return $this;
    }
    public function setCustomerStateCode($customer_state_code)
    {
        if (!$this->isStateCodeValid($customer_state_code)) {
            throw new \Exception("Customer State code is invalid", 1);
            return;       
        }
        $this->customer_state_code = intval($customer_state_code);
        return $this;
    }
    public function getSummary()
    {
        if ($this->supplier_state_code == null) {
            throw new \Exception("No supplier state code is provided.", 1);
        }
        if ($this->customer_state_code == null) {
            throw new \Exception("No customer state code is provided.", 1);
        }
        return [
            'supplier_state_code'  => $this->supplier_state_code,
            'customer_state_code'  => $this->customer_state_code,
            'total_taxable_amount'  => $this->getTaxableAmount(),
            'total_with_tax_amount'  => $this->withTaxAmount,
            'total_igst'  => $this->getTotalIGST(),
            'total_sgst'  => $this->getTotalSGST(),
            'total_cgst'  => $this->getTotalCGST(),
            'all_tax_bands' => $this->taxBands,
            'tax_bands' => $this->getFilteredTaxBands(),
        ];
    }
    public function getStaticSummary()
    {
         return [
            'supplier_state_code'  => $this->supplier_state_code,
            'customer_state_code'  => $this->customer_state_code,
            'total_taxable_amount'  => $this->taxableAmount,
            'total_with_tax_amount'  => $this->withTaxAmount,
            'total_igst'  => $this->totalIGST,
            'total_sgst'  => $this->totalSGST,
            'total_cgst'  => $this->totalCGST,
            'all_tax_bands' => $this->taxBands,
            'tax_bands' => $this->getFilteredTaxBands(),
        ];
    }
    public function getTaxableAmount()
    {
        if ($this->taxableAmount) {
            return $this->taxableAmount;
        }
        if (!isset($this->taxPercentage)) {
            throw new \Exception("No Tax Percentage set.", 1);
            return;
        }
        return $this->withTaxAmount->multiply(100/($this->taxPercentage+100));
    }
    public function getWithTaxAmount()
    {
        if (!isset($this->taxPercentage)) {
            throw new \Exception("No Tax Percentage set.", 1);
            return;
        }
        $this->withTaxAmount = $this->taxableAmount->multiply(($this->taxPercentage+100)/100);
        return $this->withTaxAmount;
    }
    public function calculateTaxes()
    {
        if ($this->withTaxAmount) {
            $this->taxableAmount = $this->getTaxableAmount();
        } 
        if ($this->taxableAmount) {
            $this->withTaxAmount = $this->getWithTaxAmount();
        }
        $this->totalIGST = $this->getTotalIGST();
        $this->totalCGST = $this->getTotalCGST();
        $this->totalSGST = $this->getTotalSGST();
        return $this;
    }
    public function getTotalIGST()
    {
        if ($this->supplier_state_code === $this->customer_state_code) {
            return $this->getZeroAmount();
        }
        if ($this->taxableAmount) {
            $percentageInAction = $this->taxPercentage;
            $taxValue = $this->taxableAmount->multiply($this->taxPercentage * 0.01);
            $this->incrementTaxBandValue($percentageInAction, 'igst', $taxValue);
            return  $taxValue;
        } else {
            $this->setTaxableAmountViaMoney($this->getTaxableAmount());
            $this->getTotalIGST();
        }
    }
    public function getTotalCGST()
    {
        if ($this->supplier_state_code === $this->customer_state_code) {
            if ($this->taxableAmount) {
                $percentageInAction = ($this->taxPercentage / 2);
                $taxValue = $this->taxableAmount->multiply($this->taxPercentage)->multiply(0.01)->multiply(0.50);

                $this->incrementTaxBandValue($percentageInAction, 'cgst', $taxValue);
                return $taxValue;

            } else {
                $this->setTaxableAmountViaMoney($this->getTaxableAmount());
                $this->getTotalCGST();
            }
        } else {
            return $this->getZeroAmount();
        }
    }
    public function getTotalSGST()
    {
        if ($this->supplier_state_code === $this->customer_state_code) {
            if ($this->taxableAmount) {
                $percentageInAction = ($this->taxPercentage / 2);
                $taxValue = $this->taxableAmount->multiply($this->taxPercentage)->multiply(0.01)->multiply(0.50);
                $this->incrementTaxBandValue($percentageInAction, 'sgst', $taxValue);
                return $taxValue;
            } else {
                $this->setTaxableAmountViaMoney($this->getTaxableAmount());
                return $this->getTotalSGST();
            }
        } else {
            return $this->getZeroAmount();
        }
    }
    public function isStateCodeValid($cCode)
    {
        $array = $this->states; 
        $codes = (array_column($array, 'code'));
        foreach ($codes as $key => $code) {
            // dump("CHECKING " . $cCode . " AGAINST " . $code);
            if (intval($code) === intval($cCode)) {
                // dump("MATCHED");
                return true;
            }
        }
        return false;
    }
    public function getStateFromCode($ccode)
    {
        $array = $this->states; 
        $codes = (array_column($array, 'code'));
        foreach ($codes as $key => $code) {
            // dump("CHECKING " . $cCode . " AGAINST " . $code);
            if (intval($code) === intval($ccode)) {
                // dump("MATCHED");
                return $array[$key];
            }
        }
        return false;
    }
    public function getZeroAmount()
    {
        $currencies = new ISOCurrencies();
        $moneyParser = new DecimalMoneyParser($currencies);
        return $moneyParser->parse("0", $this->currency);
    }
    public function incrementTaxBandValue($percentage, $type, Money $valueToIncrement)
    {
        $array = array_column($this->taxBands[$type], 'percentage');
        $needleIndex = array_search($percentage, $array);
        $this->taxBands[$type][$needleIndex]['value'] = $this->taxBands[$type][$needleIndex]['value']->add($valueToIncrement);
        return $this->taxBands[$type][$needleIndex]['value'];
    }
    public function initializeTaxBands()
    {
        foreach ($this->taxBands as $typeKey => $type) {
            foreach ($type as $key => $band) {
                $this->taxBands[$typeKey][$key]['value'] = $this->getZeroAmount();
            }
        }
        return $this->taxBands;
    }
    public function join(GST $gst)
    {
        // Note: The joined GST object should not be used for calculation / calculatory functions should not be used
        // otherwise results will be incorrect. Join function should only be use for aggregating taxes values.
    
        $g = new GST($this->currency);
        $g->supplier_state_code = $gst->supplier_state_code;
        $g->customer_state_code = $gst->customer_state_code;
        $g->taxableAmount = $this->taxableAmount->add(  $gst->taxableAmount);
        $g->withTaxAmount = $this->withTaxAmount->add(  $gst->withTaxAmount);
        $g->totalIGST = $this->totalIGST->add(  $gst->totalIGST);
        $g->totalCGST = $this->totalCGST->add(  $gst->totalCGST);
        $g->totalSGST = $this->totalSGST->add(  $gst->totalSGST);
        // Adding Tax Bands
        foreach ($this->getFilteredTaxBands() as $typeKey => $type) {
            foreach ($type as $key => $band) {
                $g->incrementTaxBandValue($band['percentage'], $typeKey, $band['value']);
            }
        }
        foreach ($gst->getFilteredTaxBands() as $typeKey => $type) {
            foreach ($type as $key => $band) {
                $g->incrementTaxBandValue($band['percentage'], $typeKey, $band['value']);
            }
        }
        return $g;
    }
    public function getFilteredTaxBands()
    {
        $filteredBands = [];
        foreach ($this->taxBands as $typeKey => $type) {
            foreach ($type as $key => $band) {
                if ($band['value']) {
                    $money = $band['value'];
                    if ($money->getAmount() != "0") {
                        $filteredBands[$typeKey][] = $band;
                    }
                }
            }
        }
        return $filteredBands;
    }
    public function isValidGSTIN(string $gstin)
    {
        // Check if the gstin is of 15 characters
        if (strlen($gstin) !== 15) {
            return false;
        }
        $stateCode = substr($gstin, 0, 2);
        if (!$this->isStateCodeValid($stateCode)) {
            return false;
        }
        $pan = substr($gstin, 2, 10);
        
        $identifier = substr($gstin,12,1);
        if (!is_numeric($identifier)) {
            return false;
        }
        $literals = substr($gstin,13,2 );
        if (is_numeric($literals)) {
            return false;
        }
        // More rules can be implemented but leaving it as it for now.
        return true;
    }
}