<?php

namespace Codecourse\Utilities;

    class CurrencyConverter implements CurrencyConverterInterface
    {
        protected $currencyUrl = 'http://apilayer.net/api';
        
        protected $convertEndpoint = '';
        
        public function convert (array $conversions) 
        {
            $query = '';
            $result = [];
            
            $query = implode(',', array_map(function($c) {
                return "{$c[0]}_{$c[1]}";    
            }, $conversions));
            
            // Build URL
            $convertEndpoint = sprintf($this->convertEndpoint, $query);
            $url = "{$this->currencyUrl}/{$convertEndpoint}";
            
            // Get response 
            $response = json_decode($this->curlRequest($url), true);
            
            // Build up results
            foreach($conversions as $c) {
                $key = "$c[0]_$c[1]";
                $results[] = isset($response[$key]) ? $response[$key]['val'] * $c[2] : null;
            }
            
            var_dump($results);
        }
        
        public function getCurrencies ()
        {
            
        }
        
        protected function curlRequest ($url)
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $url);
            
            return curl_exec($curl);
        }
    }