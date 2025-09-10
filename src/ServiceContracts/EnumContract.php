<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Enum\EnumRetrieveParams\Endpoint;
use Telnyx\RequestOptions;

interface EnumContract
{
    /**
     * @api
     *
     * @param Endpoint|value-of<Endpoint> $endpoint
     *
     * @return mixed|list<mixed|string>
     */
    public function retrieve(
        Endpoint|string $endpoint,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
