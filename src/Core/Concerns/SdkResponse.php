<?php

namespace Telnyx\Core\Concerns;

use Psr\Http\Message\ResponseInterface;
use Telnyx\Core\Util;

/**
 * @internal
 * SdkResponse must only be used in conjunction with classes that use the SdkModel trait
 */
trait SdkResponse
{
    private ?ResponseInterface $_rawResponse;

    public static function fromResponse(ResponseInterface $response): static
    {
        $instance = new static;
        $instance->_rawResponse = $response;
        $instance->__unserialize(Util::decodeContent($response)); // @phpstan-ignore-line

        return $instance;
    }

    public function getRawResponse(): ?ResponseInterface
    {
        return $this->_rawResponse;
    }
}
