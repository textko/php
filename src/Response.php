<?php

namespace Textko;

use Psr\Http\Message\ResponseInterface;

class Response
{
    private $httpCode;
    private $responseCode;
    private $responseMsg;
    private $data;

    /**
     * Response constructor.
     *
     * @param $response
     * @throws  \InvalidArgumentException
     */
    public function __construct(ResponseInterface $response)
    {
        $response = \GuzzleHttp\json_decode($response->getBody());

        $this->httpCode = isset($response->http_code) ? $response->http_code : null;
        $this->responseCode = isset($response->response_code) ? $response->response_code : null;
        $this->responseMsg = isset($response->response_msg) ? $response->response_msg : null;
        $this->data = isset($response->data) ? $response->data : null;
    }

    /**
     * Get message id.
     *
     * @return int|null
     */
    public function messageId()
    {
        return isset($this->data->id) ? $this->data->id : null;
    }

    /**
     * Get data.
     *
     * @return mixed
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Get HTTP code.
     *
     * @return mixed
     */
    public function httpCode()
    {
        return $this->httpCode;
    }

    /**
     * Get response code.
     *
     * @return mixed
     */
    public function responseCode()
    {
        return $this->responseCode;
    }

    /**
     * Get response msg.
     *
     * @return mixed
     */
    public function responseMsg()
    {
        return $this->responseMsg;
    }

    /**
     * Convert this to array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'http_code' => $this->httpCode,
            'response_code' => $this->responseCode,
            'response_msg' => $this->responseMsg,
            'data' => (array)$this->data
        ];
    }

    /**
     * Convert this to JSON string.
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}

#END OF PHP FILE