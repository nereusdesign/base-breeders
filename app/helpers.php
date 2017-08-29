<?php



    //custom function to add htpp to urls
       function addScheme($url, $scheme = 'http://')
            {
              return parse_url($url, PHP_URL_SCHEME) === null ?
                $scheme . $url : $url;
            }

       function formatPhoneNumber($phoneNumber) {
                $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

                if(strlen($phoneNumber) > 10) {
                    $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
                    $areaCode = substr($phoneNumber, -10, 3);
                    $nextThree = substr($phoneNumber, -7, 3);
                    $lastFour = substr($phoneNumber, -4, 4);

                    $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
                }
                else if(strlen($phoneNumber) == 10) {
                    $areaCode = substr($phoneNumber, 0, 3);
                    $nextThree = substr($phoneNumber, 3, 3);
                    $lastFour = substr($phoneNumber, 6, 4);

                    $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
                }
                else if(strlen($phoneNumber) == 7) {
                    $nextThree = substr($phoneNumber, 0, 3);
                    $lastFour = substr($phoneNumber, 3, 4);

                    $phoneNumber = $nextThree.'-'.$lastFour;
                }else{
                  return "";
                }

                return $phoneNumber;
    }


    function random_str($type = 'alphanum', $length = 15)
    {
        switch($type)
        {
            case 'basic'    : return mt_rand();
                break;
            case 'alpha'    :
            case 'alphanum' :
            case 'num'      :
            case 'nozero'   :
                    $seedings             = array();
                    $seedings['alpha']    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $seedings['alphanum'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $seedings['num']      = '0123456789';
                    $seedings['nozero']   = '123456789';

                    $pool = $seedings[$type];

                    $str = '';
                    for ($i=0; $i < $length; $i++)
                    {
                        $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
                    }
                    return $str;
                break;
            case 'unique'   :
            case 'md5'      :
                        return md5(uniqid(mt_rand()));
                break;
        }
    }
