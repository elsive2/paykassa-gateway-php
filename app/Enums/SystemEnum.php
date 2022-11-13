<?php

namespace App\Enums;

class SystemEnum
{
    public static $SYSTEMS_ID = [
        "bitcoin" => 11, // supported currencies BTC    
        "ethereum" => 12, // supported currencies ETH    
        "litecoin" => 14, // supported currencies LTC    
        "dogecoin" => 15, // supported currencies DOGE    
        "dash" => 16, // supported currencies DASH    
        "bitcoincash" => 18, // supported currencies BCH    
        "zcash" => 19, // supported currencies ZEC    
        "ethereumclassic" => 21, // supported currencies ETC    
        "ripple" => 22, // supported currencies XRP    
        "tron" => 27, // supported currencies TRX    
        "stellar" => 28, // supported currencies XLM    
        "binancecoin" => 29, // supported currencies BNB    
        "tron_trc20" => 30, // supported currencies USDT    
        "binancesmartchain_bep20" => 31, // supported currencies USDT, BUSD, USDC, ADA, EOS, BTC, ETH, DOGE, SHIB    
        "ethereum_erc20" => 32, // supported currencies USDT    
    ];

    public static $INSTANT_SYSTEMS_ID = [
        "berty" => 7, // supported currencies RUB, USD    
        "bitcoin" => 11, // supported currencies BTC    
        "ethereum" => 12, // supported currencies ETH    
        "litecoin" => 14, // supported currencies LTC    
        "dogecoin" => 15, // supported currencies DOGE    
        "dash" => 16, // supported currencies DASH    
        "bitcoincash" => 18, // supported currencies BCH    
        "zcash" => 19, // supported currencies ZEC    
        "ethereumclassic" => 21, // supported currencies ETC    
        "ripple" => 22, // supported currencies XRP    
        "tron" => 27, // supported currencies TRX    
        "stellar" => 28, // supported currencies XLM    
        "binancecoin" => 29, // supported currencies BNB    
        "tron_trc20" => 30, // supported currencies USDT    
        "binancesmartchain_bep20" => 31, // supported currencies USDT, BUSD, USDC, ADA, EOS, BTC, ETH, DOGE, SHIB    
        "ethereum_erc20" => 32, // supported currencies USDT    
    ];

    public static function getKeys()
    {
        return array_keys(self::$SYSTEMS_ID);
    }

    public static function getInstantKeys()
    {
        return array_keys(self::$INSTANT_SYSTEMS_ID);
    }
}