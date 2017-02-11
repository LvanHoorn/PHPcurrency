<?php

namespace Codecourse\Utilities;

    interface CurrencyConverterInterface
    {
        public function convert (array $conversion);
        public function getCurrencies();
    }