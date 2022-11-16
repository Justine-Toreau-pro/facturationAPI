<?php

namespace App\Controllers;

//use App\Controllers\CoreController;


class SecurityController //extends CoreController
{
    //Fonction de génération d'un TOKEN
    public static function generateToken()
    {
        // On crée une chaine introuvable
        $token = bin2hex(random_bytes(32));
        // On le stocke en session
        $_SESSION['token'] = $token;

        return $token;
    }


    //Fonction de cryptage
    public static function cryptage($password)
    {
        
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($password, $cipher, $key = 0, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key = 0, $as_binary=true);
        $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );

        return $ciphertext;
    }


    //Fonction de décryptaged
    public static function decryptage($password)
    {
        
        $c = base64_decode($password);
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key = 0, $options=OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key = 0, $as_binary=true);
            if (hash_equals($hmac, $calcmac))// timing attack safe comparison
            {
                return $original_plaintext;
            }
    }


    //Fonction de genration aléatoire d'un code
    public static function codeGenerate()
    {
        $code = md5(time() . uniqid(true) . mt_rand(1, 1000));

        return $code;
    }


    //Fonction de vérification de l'adresse mail utilisateur
    public static function mailValidate($identifiant)
    {
    
    $subject = "Mail de confirmation MicroGestion";
    $message = "Bonjour, cela fonctionne?";
    
        $result = mail($identifiant, $subject, $message);

        return $result;
    }
}