<?php

namespace Textko;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Textko\Contracts\SmsListResponseContract;
use Textko\Contracts\SmsResponseContract;
use Textko\Entities\SmsException;
use Textko\Entities\SmsListResponse;
use Textko\Entities\SmsResponse;

class Sms
{
    private $baseUri;
    private $version;
    private $accessToken;
    private $client;

    /**
     * The constructor.
     *
     * @param $accessToken
     * @param  string  $baseUri
     * @param  string  $version
     */
    public function __construct(
        $accessToken,
        $baseUri = 'https://textko.com/api',
        $version = 'v3'
    ) {
        $this->accessToken = $accessToken;
        $this->baseUri     = trim(rtrim($baseUri, '/'));
        $this->version     = $version;

        $this->client = new Client($this->options());
    }

    /**
     * Send sms.
     *
     * @param $toNo
     * @param $text
     *
     * @return SmsResponseContract
     * @throws SmsException
     */
    public function send($toNo, $text)
    {
        try {
            $response = $this->client->post($this->url('sms'), [
                'json' => [
                    'to' => $toNo,
                    'text'  => $text,
                ],
            ]);

            $result = \GuzzleHttp\json_decode($response->getBody())->result;

            return new SmsResponse(
                $result->sms_id,
                $result->to,
                $result->text,
                $result->status
            );
        } catch (ClientException $e) {
            throw new SmsException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious()
            );
        } catch (Exception $e) {
            throw new SmsException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious()
            );
        }
    }

    /**
     * Disable SSL verification.
     */
    public function disableSSL()
    {
        $options           = $this->options();
        $options['verify'] = false;

        $this->client = new Client($options);
    }


    /**
     * Get sms by id.
     *
     * @param $smsId
     *
     * @return SmsResponseContract
     * @throws SmsException
     */
    public function get($smsId)
    {
        try {
            $response = $this->client->get($this->url('sms/'.$smsId));

            $result = \GuzzleHttp\json_decode($response->getBody())->result;

            return new SmsResponse(
                $result->sms_id,
                $result->to,
                $result->text,
                $result->status
            );
        } catch (ClientException $e) {
            throw new SmsException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious()
            );
        } catch (Exception $e) {
            throw new SmsException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious()
            );
        }
    }

    /**
     * Get list of sms.
     *
     * Result is paginated, so you need to pass a page no. value
     * to iterate all of your sms.
     *
     * @param  int  $page
     *
     * @return SmsListResponseContract
     * @throws SmsException
     */
    public function getList($page = 1)
    {
        try {
            $response = $this->client->get($this->url('sms?page='.$page));

            $result = \GuzzleHttp\json_decode($response->getBody())->result;

            return new SmsListResponse($result);
        } catch (ClientException $e) {
            throw new SmsException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious()
            );
        } catch (Exception $e) {
            throw new SmsException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious()
            );
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
            'headers'  => [
                'Authorization' => 'Bearer '.$this->accessToken,
                'Content-Type'  => 'application/json',
            ],
        ];
    }

    /**
     * Generate request url.
     *
     * @param $path
     *
     * @return string
     */
    private function url($path)
    {
        return $this->baseUri.'/'.$this->version.'/'.$path;
    }
}

#END OF PHP FILE
