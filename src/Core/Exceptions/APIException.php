<?php

namespace OursPrivacy\Core\Exceptions;

use OursPrivacy\Core\Util;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class APIException extends OursPrivacyException
{
    public ?int $status = null;

    public mixed $body = null;

    public ?ResponseInterface $response = null;

    public function __construct(
        public RequestInterface $request,
        ?\Throwable $previous = null,
        string $message = '',
    ) {
        parent::__construct(message: $message, previous: $previous);
    }

    /** @return array<string,mixed> */
    public function __debugInfo(): array
    {
        $request = $this->request;

        return [
            'message' => $this->getMessage(),
            'status' => $this->status,
            'body' => Util::redactSensitive($this->body),
            'request' => [
                'method' => $request->getMethod(),
                'uri' => (string) $request->getUri(),
                'headers' => Util::redactSensitive($request->getHeaders()),
            ],
            'responseHeaders' => Util::redactSensitive($this->response?->getHeaders()),
        ];
    }
}
