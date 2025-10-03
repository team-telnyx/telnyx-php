<?php

declare(strict_types=1);

namespace Telnyx\Core\Conversion\Contracts;

use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
interface ResponseConverter
{
    /**
     * @internal
     */
    public static function fromResponse(ResponseInterface $response): static;
}
