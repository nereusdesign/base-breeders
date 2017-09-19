<?php



    //custom function to add htpp to urls
       function addScheme($url, $scheme = 'http://')
            {
                if(empty($url)){
                  return '';
                }else{
              return parse_url($url, PHP_URL_SCHEME) === null ?
                $scheme . $url : $url;
              }
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

        function fixedzip($z){
          return strtoupper(preg_replace("/[^A-Za-z0-9 ]/", '', $z));
        }

        function make_base_url($txt){
          return strtolower(str_replace(" ","-",preg_replace("/[^A-Za-z0-9- ]/", '', $txt)));
        }

      function neat_trim($string, $max_length, $append = '')
        {
          if (strlen($string) > $max_length) {
            $string = substr($string, 0, $max_length);
            $pos = strrpos($string, ' ');
            if ($pos === false) {
              return substr($string, 0, $max_length) . $append;
            }
            return substr($string, 0, $pos) . $append;
          }
          else {
            return $string;
          }
        }

      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
