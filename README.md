# WhatsApp Client

## Description

This is a simple WhatsApp client that uses the WhatsApp Web API to send and receive messages.

## Installation

```bash
composer require mathsgod/whatsapp-client
```

## Usage

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


