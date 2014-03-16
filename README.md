[![Build Status](https://travis-ci.org/fullybaked/pslackr.png?branch=master)](https://travis-ci.org/fullybaked/pslackr)

# pslackr [slak-er]

pSlackr is a library for integrating Slack.com's inbound web hook
into your application enabling you to send messages to your group
chat channels from your application

## Installing via Composer

The recommended way to install Pslackr is via [Composer][1]

```
# Install composer
curl -sS https://getcomposer.org/installer | php
```

Edit `composer.json`
```
{
    "require": {
        "fullybaked/pslackr": "dev-master"
    }
}
```

Then run `composer install`

After installing you will need to require Composer's autoloader.

```
require 'vendor/autoload.php';
```

## Usage

### Example of basic usage with suplied classes

```
<?php
require_once 'vendor/autoload.php';

use FullyBaked\Pslackr\Messages\CustomMessage;
use FullyBaked\Pslackr\Pslackr;

$message = new CustomMessage('Testing from Pslackr');

$config = ['token' => 'YOUR_TOKEN', 'domain' => 'YOUR_DOMAIN'];
$slack = new Pslackr($config);
$slack->send($message);
```

### Customise the message

The supplied CustomMessage class details the optional parameters that can be sent as part of the request. These
parameters allow you to customise the message.

1. Channel
2. Username
3. Icon (url or emoji)

```
<?php 

use FullyBaked\Pslackr\Messages\CustomMessage;

$message = new CustomMessage('Testing from Pslackr');

$message->channel('#my-other-channel');

$message->username('slackbot');

$message->iconUrl('http://example.tld/path/to/my.png');
// OR //
$message->iconEmoji(':ghost:');

```

### Changing the HTTP Client

By default Pslackr was built with [Guzzle][2] and has it listed as a dependency, however for various reasons you may
wish to use your own HTTP client.  If so, this can be acheived by implementing the `TransportInterface` using your
own choice of HTTP client.

[1]: https://getcomposer.org/
[2]: http://docs.guzzlephp.org/en/latest/index.html
