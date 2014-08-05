<?php

/*
 * GestPayCrypt-PHP
 * Copyright (C) 2014 Manuel Dalla Lana <endelwar@aregar.it>
 *
 * http://github.com/endelwar/gestpaycrypt-php
 *
 * GestPayCrypt-PHP is an implementation in PHP of GestPayCrypt and
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

class GestPayCurrency
{
    const USD = 1; // US Dollar
    const GBP = 2; // Pound sterling
    const CHF = 3; // Swiss franc
    const DKK = 7; // Danish krone
    const NOK = 8; // Norwegian krone
    const SEK = 9; // Swedish krona
    const CAD = 12; // Canadian dollar
    const ITL = 18; // Italian lira
    const JPY = 71; // Japanese yen
    const HKD = 103; // Hong Kong dollar
    const BRL = 234; // Brazilian real
    const EUR = 242; // Euro

    public static function getCurrencyCode($currency)
    {
        $currency = strtoupper($currency);
        if (defined($currency)) {
            return constant("self::$currency");
        }

        return false;
    }
}
