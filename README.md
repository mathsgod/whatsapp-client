# WhatsApp Client

## Description

This is a simple WhatsApp client that uses the WhatsApp Web API to send and receive messages.

## Installation

```bash
composer require mathsgod/whatsapp-client
```

## Usage

```php

$wa = new WhatsApp\Client($token, $phone_number_id);

$wa->sendText("85298765432","Hello World!");

```


