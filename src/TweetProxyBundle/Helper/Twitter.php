<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TweetProxyBundle\Helper;

use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter
{
    public function __construct()
    {
        $this->access_token = '307418717-DWLiDPzw8A5xFPUWfy5sIpl3oFpa80893tHwr7kQ';
        $this->access_token_secret = 'ymbfk6SPXuRCDmM55mpR93AtJN58oegkZnIigxRo1yFv5';
        $this->consumer_key = 'Yx2LBAniAxm03CW6McNYoWdjU';
        $this->consumer_secret = 'fZ4J3ssnpNlvEFM8dpp4a5KfMO2okEbMeGxaLl8UXm4Hp89TBy';
    }

    public function init()
    {
        $connection = new TwitterOAuth(
            $this->consumer_key,
            $this->consumer_secret,
            $this->access_token,
            $this->access_token_secret
        );
        $content = $connection->get('account/verify_credentials');

        return $connection;
    }
}
