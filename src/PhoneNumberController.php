<?php
namespace rapulu\laravelngphonepassword;

use libphonenumber\PhoneNumberUtil;

class PhoneNumberController
{

    public function validPhoneNumber($value){
        
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
              $NumberProto = $phoneUtil->parse($value, "NG");
              $isValid = $phoneUtil->isValidNumber($NumberProto);
              return $isValid;

        } catch (NumberParseException $e) {
            $e;
        }
    }


}