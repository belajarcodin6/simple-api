<?php
namespace App\Providers;

use Slim\Http\Response;

class JsonProvider
{

    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * Render a JSON response
     *
     * @param object $response
     * @param mixed $data
     * @param int $code
     */
    public function render($data, $code)
    {
        $this->response->withStatus((int) $code)
            ->withHeader('Content-type', 'application/json;charset=utf-8')
            ->withJson($data);
    }

    /**
     * Provide a standardized JSON success response
     *
     * @param object $response
     * @param mixed $data
     * @param int $code (200 OK)
     */
    public function ok($data, $code = 200)
    {
        return $this->render($data, $code);
    }

    /**
     * Provide a standardized JSON error response
     *
     * @param object $response
     * @param mixed $data
     * @param int $code (400 Bad Request)
     */
    public function error($data, $code = 400)
    {
        return $this->render([
            'error'   => true,
            'code'    => $code,
            'message' => $data
        ], $code);
    }

}