<?php

/*
 * GestPayCrypt-PHP
 * Copyright (C) 2001-2011 Alessandro Astarita <aleast@capri.it>
 *
 * http://github.com/asterixcapri/gestpaycrypt-php
 *
 * GestPayCrypt-PHP is an implementation in PHP of GestPayCrypt e
 * GestPayCryptHS italian bank Banca Sella java classes. It allows to
 * connect to online credit card payment GestPay.
 *
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * version 2.1 as published by the Free Software Foundation.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details at
 * http://www.gnu.org/copyleft/lgpl.html
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

class GestPayCrypt
{
    private $ShopLogin;
    private $Currency;
    private $Amount;
    private $ShopTransactionID;
    private $CardNumber;
    private $ExpMonth;
    private $ExpYear;
    private $BuyerName;
    private $BuyerEmail;
    private $Language;
    private $CustomInfo;
    private $AuthorizationCode;
    protected $ErrorCode;
    protected $ErrorDescription;
    private $BankTransactionID;
    private $AlertCode;
    private $AlertDescription;
    private $EncryptedString;
    private $ToBeEncrypt;
    private $Decrypted;
    private $TransactionResult;
    private $Transport;
    private $DomainName;
    private $TestDomainName;
    private $PaymentUrl;
    private $Port;
    private $separator;
    private $errDescription;
    private $errNumber;
    private $Version;
    private $Min;
    private $CVV;
    private $Country;
    private $VBV;
    private $VBVrisp;
    private $ScriptEnCrypt;
    private $ScriptDeCrypt;
    private $TestEnv;

    public function __construct()
    {
        $this->ShopLogin = "";
        $this->Currency = "";
        $this->Amount = "";
        $this->ShopTransactionID = "";
        $this->CardNumber = "";
        $this->ExpMonth = "";
        $this->ExpYear = "";
        $this->BuyerName = "";
        $this->BuyerEmail = "";
        $this->Language = "";
        $this->CustomInfo = "";
        $this->AuthorizationCode = "";
        $this->ErrorCode = "0";
        $this->ErrorDescription = "";
        $this->BankTransactionID = "";
        $this->AlertCode = "";
        $this->AlertDescription = "";
        $this->EncryptedString = "";
        $this->ToBeEncrypt = "";
        $this->Decrypted = "";
        $this->Transport = "tcp";
        $this->DomainName = "ecomm.sella.it";
        $this->TestDomainName = "testecomm.sella.it";
        $this->PaymentUrl = "/pagam/pagam.aspx";
        $this->Port = "80";
        $this->ScriptEnCrypt = "/CryptHTTP/Encrypt.asp";
        $this->ScriptDeCrypt = "/CryptHTTP/Decrypt.asp";
        $this->separator = "*P1*";
        $this->errDescription = "";
        $this->errNumber = "0";
        $this->Version = "2.0";
        $this->Min = "";
        $this->CVV = "";
        $this->Country = "";
        $this->VBV = "";
        $this->VBVrisp = "";
        $this->TestEnv = false;
    }

    /**
     * @param bool $enable
     * @return GestPayCrypt
     */
    public function SetTestEnv($enable)
    {
        $this->TestEnv = $enable;

        return $this;
    }

    /**
     * @return bool
     */
    public function GetTestEnv()
    {
        return $this->TestEnv;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetShopLogin($val)
    {
        $this->ShopLogin = $val;

        return $this;
    }

    /**
     * @return string
     */
    public function GetShopLogin()
    {
        return $this->ShopLogin;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetCurrency($val)
    {
        $this->Currency = $val;

        return $this;
    }

    /**
     * @return string
     */
    public function GetCurrency()
    {
        return $this->Currency;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetAmount($val)
    {
        $this->Amount = $val;

        return $this;
    }

    /**
     * @return string
     */
    public function GetAmount()
    {
        return $this->Amount;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetShopTransactionID($val)
    {
        $this->ShopTransactionID = urlencode(trim($val));

        return $this;
    }

    /**
     * @return string
     */
    public function GetShopTransactionID()
    {
        return urldecode($this->ShopTransactionID);
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetCardNumber($val)
    {
        $this->CardNumber = $val;

        return $this;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetExpMonth($val)
    {
        $this->ExpMonth = $val;

        return $this;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetExpYear($val)
    {
        $this->ExpYear = $val;

        return $this;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetMIN($val)
    {
        $this->Min = $val;

        return $this;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetCVV($val)
    {
        $this->CVV = $val;

        return $this;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetBuyerName($val)
    {
        $this->BuyerName = urlencode(trim($val));

        return $this;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetBuyerEmail($val)
    {
        $this->BuyerEmail = trim($val);

        return $this;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetLanguage($val)
    {
        $this->Language = trim($val);

        return $this;
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetCustomInfo($val)
    {
        $this->CustomInfo = urlencode(trim($val));

        return $this;
    }

    /**
     * @return string
     */
    public function GetCustomInfo()
    {
        return urldecode($this->CustomInfo);
    }

    /**
     * @param string $val
     *
     * @return GestPayCrypt
     */
    public function SetEncryptedString($val)
    {
        $this->EncryptedString = $val;

        return $this;
    }

    /**
     * @return string
     */
    public function GetCountry()
    {
        return $this->Country;
    }

    /**
     * @return string
     */
    public function GetVBV()
    {
        return $this->VBV;
    }

    /**
     * @return string
     */
    public function GetVBVrisp()
    {
        return $this->VBVrisp;
    }

    /**
     * @return string
     */
    public function GetBuyerName()
    {
        return urldecode($this->BuyerName);
    }

    /**
     * @return string
     */
    public function GetBuyerEmail()
    {
        return $this->BuyerEmail;
    }

    /**
     * @return string
     */
    public function GetAuthorizationCode()
    {
        return $this->AuthorizationCode;
    }

    /**
     * @return string
     */
    public function GetErrorCode()
    {
        return $this->ErrorCode;
    }

    /**
     * @return string
     */
    public function GetErrorDescription()
    {
        return $this->ErrorDescription;
    }

    /**
     * @return string
     */
    public function GetBankTransactionID()
    {
        return $this->BankTransactionID;
    }

    /**
     * @return string
     */
    public function GetTransactionResult()
    {
        return $this->TransactionResult;
    }

    /**
     * @return string
     */
    public function GetAlertCode()
    {
        return $this->AlertCode;
    }

    /**
     * @return string
     */
    public function GetAlertDescription()
    {
        return $this->AlertDescription;
    }

    /**
     * @return string
     */
    public function GetEncryptedString()
    {
        return $this->EncryptedString;
    }

    /**
     * @param string $port
     *
     * @return GestPayCrypt
     */
    public function SetPort($port)
    {
        $this->Port = $port;

        return $this;
    }

    /**
     * @return string
     */
    public function GetPort()
    {
        return $this->Port;
    }

    /**
     * @param string $domain_name
     *
     * @return GestPayCrypt
     */
    public function SetDomainName($domain_name)
    {
        $this->DomainName = $domain_name;

        return $this;
    }

    /**
     * @return string
     */
    public function GetDomainName()
    {
        if (true == $this->TestEnv) {
            return $this->TestDomainName;
        }
        return $this->DomainName;
    }

    /**
     * @return string
     */
    public function GetPaymentUrl()
    {
        return $this->PaymentUrl;
    }

    /**
     * @param $url
     * @return GestPayCrypt
     */
    public function SetPaymentUrl($url)
    {
        $this->PaymentUrl = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function GetTransport()
    {
        return $this->Transport;
    }

    /**
     * @param string $type
     *
     * @return GestPayCrypt
     */
    public function SetTransport($type)
    {
        $this->Transport = $type;

        return $this;
    }

    public function GetRedirectUrl()
    {
        $url = 'https://' . $this->GetDomainName() . $this->GetPaymentUrl() .
            '?a=' . $this->GetShopLogin() .
            '&b=' . $this->GetEncryptedString();
        return $url;
    }

    /**
     * @param string $script
     *
     * @return GestPayCrypt
     */
    public function SetScriptEnCrypt($script)
    {
        $this->ScriptEnCrypt = $script;

        return $this;
    }

    /**
     * @param string $script
     *
     * @return string
     */
    public function SetScriptDeCrypt($script)
    {
        $this->ScriptDeCrypt = $script;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return string
     */
    public function GetScriptType($type)
    {
        if ($type == "crypt") {
            return $this->ScriptEnCrypt;
        } else {
            return $this->ScriptDeCrypt;
        }
    }

    /**
     * @return bool
     */
    public function Encrypt()
    {
        $this->ErrorCode = "0";
        $this->ErrorDescription = "";

        if (empty($this->ShopLogin)) {
            $this->ErrorCode = "546";
            $this->ErrorDescription = "IDshop not valid";

            return false;
        }

        if (empty($this->Currency)) {
            $this->ErrorCode = "552";
            $this->ErrorDescription = "Currency not valid";

            return false;
        }

        if (empty($this->Amount)) {
            $this->ErrorCode = "553";
            $this->ErrorDescription = "Amount not valid";

            return false;
        }

        if (empty($this->ShopTransactionID)) {
            $this->ErrorCode = "551";
            $this->ErrorDescription = "Shop Transaction ID not valid";

            return false;
        }

        $response = $this->_http_get_response("crypt", $this->ShopLogin, $this->_get_parsed_encrypt_arguments());

        if ($response == -1) {
            return false;
        }

        $this->EncryptedString = $this->_parse_response("crypt", $response);

        if ($this->EncryptedString == -1) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function _get_parsed_encrypt_arguments()
    {
        $args = "";

        $vars = array(
            "PAY1_CVV" => $this->CVV,
            "PAY1_MIN" => $this->Min,
            "PAY1_UICCODE" => $this->Currency,
            "PAY1_AMOUNT" => $this->Amount,
            "PAY1_SHOPTRANSACTIONID" => $this->ShopTransactionID,
            "PAY1_CARDNUMBER" => $this->CardNumber,
            "PAY1_EXPMONTH" => $this->ExpMonth,
            "PAY1_EXPYEAR" => $this->ExpYear,
            "PAY1_CHNAME" => $this->BuyerName,
            "PAY1_CHEMAIL" => $this->BuyerEmail,
            "PAY1_IDLANGUAGE" => $this->Language
        );

        foreach ($vars as $name => $value) {
            if (!empty($value)) {
                $args .= $name . "=" . $value . $this->separator;
            }
        }

        $args = substr($args, 0, -strlen($this->separator));
        $args .= $this->CustomInfo;
        $args = str_replace(" ", "�", $args);

        return $args;
    }

    /**
     * @return bool
     */
    public function Decrypt()
    {
        $this->ErrorCode = "0";
        $this->ErrorDescription = "";

        if (empty($this->ShopLogin)) {
            $this->ErrorCode = "546";
            $this->ErrorDescription = "IDshop not valid";

            return false;
        }

        if (empty($this->EncryptedString)) {
            $this->ErrorCode = "1009";
            $this->ErrorDescription = "String to Decrypt not valid";

            return false;
        }

        $response = $this->_http_get_response("decrypt", $this->ShopLogin, $this->EncryptedString);

        if ($response == -1) {
            false;
        }

        $this->Decrypted = $this->_parse_response("decrypt", $response);

        if ($this->Decrypted == -1) {
            return false;
        } elseif (empty($this->Decrypted)) {
            $this->ErrorCode = "9999";
            $this->ErrorDescription = "Empty decrypted string";

            return false;
        }

        $this->Decrypted = str_replace("�", " ", $this->Decrypted);

        $this->_parse_decrypted_data();

        return true;
    }

    /**
     * @param string $type
     * @param string $a
     * @param string $b
     *
     * @return int|string
     */
    protected function _http_get_response($type, $a, $b)
    {
        $errno = "";
        $errstr = "";

        $socket = fsockopen(
            $this->GetTransport() . "://" . $this->GetDomainName(),
            $this->GetPort(),
            $errno,
            $errstr,
            60
        );

        if (!$socket) {
            $this->ErrorCode = "9999";
            $this->ErrorDescription = "Impossible to connect to host: " .
                $this->GetTransport() . "://" . $this->GetDomainName() . ':' . $this->GetPort();

            return -1;
        }

        $uri = $this->GetScriptType($type) . "?a=" . $a . "&b=" . $b;

        fputs($socket, "GET " . $uri . " HTTP/1.0\r\n\r\n");

        while (fgets($socket, 4096) != "\r\n") {
            ;
        }

        $line = fgets($socket, 4096);

        fclose($socket);

        return $line;
    }

    /**
     * @param string $type
     * @param string $response
     *
     * @return string
     */
    private function _parse_response($type, $response)
    {
        $matches = array();

        if (preg_match("/#" . $type . "string#([\w\W]*)#\/" . $type . "string#/", $response, $matches)) {
            $parsed = trim($matches[1]);
        } elseif (preg_match("/#error#([\w\W]*)#\/error#/", $response, $matches)) {
            $err = explode("-", $matches[1]);

            if (empty($err[0]) && empty($err[1])) {
                $this->ErrorCode = "9999";
                $this->ErrorDescription = "Unknown error";
            } else {
                $this->ErrorCode = trim($err[0]);
                $this->ErrorDescription = trim($err[1]);
            }

            return -1;
        } else {
            $this->ErrorCode = "9999";
            $this->ErrorDescription = "Response from server not valid";

            return -1;
        }

        return $parsed;
    }

    private function _parse_decrypted_data()
    {
        $keyval = explode($this->separator, $this->Decrypted);

        foreach ($keyval as $tagPAY1) {
            $tagPAY1val = explode("=/", $tagPAY1);

            if (preg_match("/^PAY1_UICCODE/", $tagPAY1)) {
                $this->Currency = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_AMOUNT/", $tagPAY1)) {
                $this->Amount = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_SHOPTRANSACTIONID/", $tagPAY1)) {
                $this->ShopTransactionID = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_CHNAME/", $tagPAY1)) {
                $this->BuyerName = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_CHEMAIL/", $tagPAY1)) {
                $this->BuyerEmail = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_AUTHORIZATIONCODE/", $tagPAY1)) {
                $this->AuthorizationCode = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_ERRORCODE/", $tagPAY1)) {
                $this->ErrorCode = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_ERRORDESCRIPTION/", $tagPAY1)) {
                $this->ErrorDescription = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_BANKTRANSACTIONID/", $tagPAY1)) {
                $this->BankTransactionID = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_ALERTCODE/", $tagPAY1)) {
                $this->AlertCode = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_ALERTDESCRIPTION/", $tagPAY1)) {
                $this->AlertDescription = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_CARDNUMBER/", $tagPAY1)) {
                $this->CardNumber = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_EXPMONTH/", $tagPAY1)) {
                $this->ExpMonth = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_EXPYEAR/", $tagPAY1)) {
                $this->ExpYear = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_COUNTRY/", $tagPAY1)) {
                $this->ExpYear = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_VBVRISP/", $tagPAY1)) {
                $this->ExpYear = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_VBV/", $tagPAY1)) {
                $this->ExpYear = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_IDLANGUAGE/", $tagPAY1)) {
                $this->Language = $tagPAY1val[1];
            } elseif (preg_match("/^PAY1_TRANSACTIONRESULT/", $tagPAY1)) {
                $this->TransactionResult = $tagPAY1val[1];
            } else {
                $this->CustomInfo .= $tagPAY1 . $this->separator;
            }
        }

        $this->CustomInfo = substr($this->CustomInfo, 0, -strlen($this->separator));
    }
}
