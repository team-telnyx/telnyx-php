<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enumeration\EnumerationRetrieveParams\Endpoint;
use Telnyx\RequestOptions;

interface EnumerationContract
{
    /**
     * @api
     *
     * @param Endpoint|value-of<Endpoint> $endpoint
     *
     * @return mixed|list<string>
     *
     * @throws APIException
     */
    public function retrieve(
        Endpoint|string $endpoint,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
