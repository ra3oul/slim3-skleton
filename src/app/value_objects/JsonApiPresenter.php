<?php
/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/27/16
 * Time: 10:40 AM
 */

namespace Tourism\value_objects;


use Psr\Http\Message\ResponseInterface;

class JsonApiPresenter
{
    /**
     * @var string
     */
    private $status = ResponseStatuses::ERROR;

    /**
     * @var string
     */
    private $message = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var
     */
    private $dataMainKey;

    /**
     * @var int
     */
    private $statusCode = 400;


    private $pagination = [];

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param mixed $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }


    /**
     * @param mixed $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data = [
            $this->getDataMainKey()=>$this->data,
            'mainKey' => $this->getDataMainKey(),
        ];

        $pagination = $this->getPagination();
        if(!empty($pagination))
        {
            $data['pagination'] = [
                "total" => $pagination['total'],
                "per_page" => $pagination['per_page'],
                "current_page" => $pagination['current_page'],
                "last_page" => $pagination['last_page'],
                "next_page_url" => $pagination['next_page_url'],
                "prev_page_url" => $pagination['prev_page_url'],
                "from" => $pagination['from'],
                "to" => $pagination['to'],
            ];
        }


        return $data;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function toJsonResponse(ResponseInterface $response )
    {
        $responseBody  =   [
            'status' => $this->status,
            'message' => $this->message,
            'description' =>  $this->description,
            'data' => $this->getData()
        ];
        $body = $response->getBody();
        $body->write(json_encode($responseBody));
        $response->withBody($body);
        return $response->withHeader('Content-type', 'application/json')->withStatus($this->statusCode);



//        return new JsonResponse(, $this->statusCode);
    }

    /**
     * @return array
     */
    public function toJson()
    {
        return json_encode([
            'status' => $this->status,
            'message' => $this->message,
            'description' =>   $this->description,
            'data' => $this->getData()
        ]);
    }

    /**
     * @return mixed
     */
    public function getDataMainKey()
    {
        return $this->dataMainKey;
    }

    /**
     * @param mixed $dataMainKey
     */
    public function setDataMainKey($dataMainKey)
    {
        $this->dataMainKey = $dataMainKey;

        return $this;
    }

    /**
     * @return array
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param array $pagination
     */
    public function setPagination($pagination)
    {
        $this->pagination = $pagination;

        return $this;
    }
}