<?php

namespace Textko;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Textko
{
    private $baseUri;
    private $version;
    private $apiToken;
    private $client;

    /**
     * Textko constructor.
     *
     * @param $apiToken
     * @param string $baseUri
     * @param string $version
     */
    public function __construct($apiToken, $baseUri = 'https://textko.com/api', $version = 'v2')
    {
        $this->apiToken = $apiToken;
        $this->baseUri = trim(rtrim($baseUri, '/'));
        $this->version = $version;

        $this->client = new Client($this->options());
    }

    /**
     * Send a text message.
     *
     * @param $number
     * @param $message
     * @return Response
     */
    public function send($number, $message)
    {
        try {

            $response = $this->client->post($this->url('messages'), [
                'json' => [
                    'to_no' => $number,
                    'text' => $message
                ]
            ]);

            return new Response($response);

        } catch (ClientException $e) {
            return new Response($e->getResponse());
        }
    }

    /**
     * Disable SSL verification.
     */
    public function disableSSL()
    {
        $options = $this->options();
        $options['verify'] = false;

        $this->client = new Client($options);
    }


    /**
     * Get message by id.
     *
     * @param $messageId
     * @return Response
     */
    public function message($messageId)
    {
        try {

            $response = $this->client->get($this->url('messages/' . $messageId));

            return new Response($response);

        } catch (ClientException $e) {
            return new Response($e->getResponse());
        }
    }

    /**
     * Get list of messages.
     *
     * Result is paginated, so you need to pass a page no. value
     * to iterate all of your messages.
     *
     * @param int $page
     * @return Response
     */
    public function messages($page = 1)
    {
        try {

            $response = $this->client->get($this->url('messages?page=' . $page));

            return new Response($response);

        } catch (ClientException $e) {
            return new Response($e->getResponse());
        }
    }

    /**
     * Delete a message by id.
     *
     * @param $messageId
     * @return Response
     */
    public function delete($messageId)
    {
        try {

            $response = $this->client->delete($this->url('messages/' . $messageId));

            return new Response($response);

        } catch (ClientException $e) {
            return new Response($e->getResponse());
        }
    }


    /**
     * Default request options.
     *
     * @return array
     */
    private function options()
    {
        return [
            'base_uri' => $this->baseUri,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Content-Type' => 'application/json'
            ]
        ];
    }

    /**
     * Generate request url.
     *
     * @param $path
     * @return string
     */
    private function url($path)
    {
        return $this->baseUri . '/' . $this->version . '/' . $path;
    }
}

#END OF PHP FILE