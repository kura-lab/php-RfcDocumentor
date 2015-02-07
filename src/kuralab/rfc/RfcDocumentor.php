<?php

namespace kuralab\rfc;

class RfcDocumentor
{
    private $url = 'http://tools.ietf.org/rfc/rfc';
    private $userAgent = 'Mozilla/5.0';
    private $rfcNumber;

    public function __construct($rfcNumber)
    {
        $this->rfcNumber = $rfcNumber;
    }

    public function generateWordFrequency()
    {
        $text = $this->fetchRfc();
        $words = $this->analyzeWord($text);
        $rank = array_count_values($words);
        arsort($rank);

        return $rank;
    }

    public function fetchRfc()
    {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $this->url . $this->rfcNumber);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $response = substr($response, $header_size);
        curl_close($ch);

        return $response;
    }

    public function analyzeWord($text)
    {
        $text = preg_replace("/[^a-zA-Z]/", " ", $text);
        $text = preg_replace("/\s+/", " ", $text);
        $text = strtolower($text);
        $text = rtrim($text);

        return explode(" ", $text);
    }
}
