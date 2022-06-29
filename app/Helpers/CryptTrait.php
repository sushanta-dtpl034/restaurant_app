<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Crypt;
trait CryptTrait {
    /**
     * Function to encrypt value
     */
    public function encryptValue($value) {        
        Crypt::encryptString($value);
    }

    /**
     * Function to decrypt value
     */
    public function decryptValue($value) {        
        Crypt::decryptString($value);
    }
}