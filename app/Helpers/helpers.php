<?php

if (! function_exists('get_channels_list')) {
        function get_channels_list(){
            return array("1"=>'English',
                            "3"=>"Hindi",
                            // "6"=>"Ganga",
                            "7"=>"Bengali",
                            "519"=>"Punjabi",
                            "5"=>"Marathi",
		                    // "2"=>"FilmyMonkey",
                            "4"=>"Gujarati",
                            "21"=>"Tamil",
                            "22"=>"Telugu"
                            // "8" => "Admatazz",
                            // "11" => "Uncut English"
                        );
        }
    }

    if (! function_exists('getChannelLabelName')) {
        function getChannelLabelName($channelId){
            // dd($channelId);
            switch ($channelId) {
                case '0':
                    return ''
                        . 'English'
                        . 'Bengali'
                        . 'Marathi'
                        . 'Punjabi'
                        . 'Hindi'
                        . 'Gujarati'
                        . 'Tamil';
                    break;

                case '1':
                    return 'English';
                    break;

                

                case '3':
                    return 'Hindi';
                    break;

                

                case '4':
                    return 'Gujarati';
                    break;

                case '5':
                    return 'Marathi';
                    break;

                case '7':
                    return 'Bengali';
                    break;

                case '519':
                    return 'Punjabi';
                    break;

                case '21':
                    return 'Tamil';
                    break;
                case '22':
                    return 'Telugu';
                    break;
                

                default:
                    return 'No channel Selected';
                    break;
            }
        }
    }

    if (! function_exists('getNextSequence')) {
        function getNextSequence($modelName)
        {
            $sequence = NUll;
            try
            {
                $retVal = DB::table($modelName)
                 ->insertGetId(['id' => NULL]);
            }
            catch(Exception $ex)
            {
                echo $ex->getCode(), " : ", $ex->getMessage(), "\n";
            }
            if(isset($retVal) && $retVal)
            {
                $sequence =  $retVal;
            }
            return $sequence;
        }
    }

    if (! function_exists('convert_to_slug')) {
        function convert_to_slug($text){
            // replace non letter or digits by -
            $text = preg_replace('~[^\pL\d]+~u', '-', $text);

            // transliterate
             $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

            // remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);

            // trim
            $text = trim($text, '-');

            // remove duplicate -
            $text = preg_replace('~-+~', '-', $text);

            // lowercase
            $text = strtolower($text);

            if (empty($text)) {
                return 'n-a';
            }

            return $text;
        }
    }