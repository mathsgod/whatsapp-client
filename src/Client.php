<?php

namespace WhatsApp;

class Client
{
    private $client;

    /**
     * @param string $token Generate it from https://business.facebook.com/settings/system-users/
     * @param string $phone_number_id Not phone number, but phone number ID, find it in https://developers.facebook.com/apps/{app_id}/whatsapp-business/wa-dev-console/
     */
    public function __construct(string $token, string $phone_number_id)
    {
        $this->client = new \GuzzleHttp\Client([
            "base_uri" => "https://graph.facebook.com/v17.0/$phone_number_id/",
            "headers" => [
                "Authorization" => "Bearer " . $token
            ],
            "verify" => false
        ]);
    }

    public function getBusinessProfile()
    {
        $response = $this->client->get("whatsapp_business_profile");
        return json_decode($response->getBody()->getContents(), true);
    }

    private function post(string $uri, array $json)
    {
        $response = $this->client->post($uri, [
            "json" => $json
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function sendText(string $wa_id, string $body)
    {
        return $this->post("messages", [
            "messaging_product" => "whatsapp",
            "to" => $wa_id,
            "type" => "text",
            "text" => [
                "preview_url" => false,
                "body" => $body
            ]
        ]);
    }

    public function sendDocument(string $wa_id, string $url, string $filename)
    {
        return $this->post("messages", [
            "messaging_product" => "whatsapp",
            "to" => $wa_id,
            "type" => "document",
            "document" => [
                "link" => $url,
                "filename" => $filename,
            ]
        ]);
    }

    public function markAsRead(string $message_id)
    {
        return $this->post("messages", [
            "messaging_product" => "whatsapp",
            "status" => "read",
            "message_id" => $message_id
        ]);
    }

    public function sendInteractive(string $wa_id)
    {
        return $this->post("messages", [
            "messaging_product" => "whatsapp",
            "to" => $wa_id,
            "type" => "interactive",
            "interactive" => [
                "type" => "button",
                "body" => [
                    "text" => "Is this the correct address?",
                ],
                "action" => [
                    "buttons" => [

                        [
                            "type" => "reply",
                            "reply" => [
                                "id" => "Button_Yes_ID",
                                "title" => "yes"
                            ]
                        ]
                    ]

                ]
            ]
        ]);
    }
}
