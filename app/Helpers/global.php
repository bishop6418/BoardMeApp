<?php

    function hashChecker($hash){
        if(strlen($hash) == 60 && preg_match('/^\$2y\$/', $hash )){
            return 'true';
        }
        return 'false';
    }

    function uploadPhotos($img, $path)
    {
        $imageName = "";
        try {
            $random = generateRandomString();
            $image = $img;  // your base64 encoded
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $data = base64_decode($image);
            $imageName = date("YmdHis").$random.'.jpeg';
            file_put_contents(public_path() . '/' . $path . $imageName, $data);
        } catch (\Exception $e) {}

        return $imageName;
        // file_put_contents(public_path() . '/' . 'images/items/' . $imageName, $data);
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>
