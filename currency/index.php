<?php

require 'CurrencyConverterInterface.php';
require 'CurrencyConverter.php';

    $converter = new Codecourse\Utilities\CurrencyConverter;

    $results = $converter->convert([
        ['USDUSD', 'USDBBD', 12.00],
        ['USDBBD', 'USDUSD', 200.00],
    ]);