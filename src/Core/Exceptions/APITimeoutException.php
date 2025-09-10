<?php

namespace Telnyx\Core\Exceptions;

use Psr\Http\Message\RequestInterface;

class APITimeoutException extends APIConnectionException
{
    /** @var string */
    protected const DESC = 'Telnyx API Timeout Exception';

    public function __construct(
        public RequestInterface $request,
        ?\Throwable $previous = null,
        string $message = 'Request timed out.',
    ) {
        parent::__construct(request: $request, message: $message, previous: $previous);
    }
}
