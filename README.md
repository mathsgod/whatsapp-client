# WhatsApp Client

## Description

This is a simple WhatsApp client that uses the WhatsApp Web API to send and receive messages.

## Installation

```bash
composer require mathsgod/whatsapp-client
```

## Usage
You can generate token from https://business.facebook.com/settings/system-users/

Phone number id is not phone number, find it in https://developers.facebook.com/apps/{app_id}/whatsapp-business/wa-dev-console/


### Send a text message
```php

$wa = new WhatsApp\Client($token, $phone_number_id);

$wa->sendText("85298765432","Hello World!");

```


### Send a document
```php

$wa = new WhatsApp\Client($token, $phone_number_id);

$wa->sendDocument("85298765432",$url,"document.pdf");

```

```


