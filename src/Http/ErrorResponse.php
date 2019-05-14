<?php

namespace Dyned\ServiceAdapter\Http;

use Symfony\Component\HttpFoundation\Response;

trait ErrorResponses
{
    /**
     * Error validation response
     *
     * @param string $message
     * @param null $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseErrorValidation($message = '', $errors = null)
    {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Error response not found
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseErrorNotFound($message = '')
    {
        return $this->responseError($message, Response::HTTP_NOT_FOUND);
    }

    /**
     * Error response forbidden
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseErrorForbidden($message = '')
    {
        return $this->responseError($message, Response::HTTP_FORBIDDEN);
    }

    /**
     * Error response
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($message = '', $status = Response::HTTP_NOT_FOUND)
    {
        return response()->json([
            'message' => $message,
            'errors' => null
        ], $status);
    }
}