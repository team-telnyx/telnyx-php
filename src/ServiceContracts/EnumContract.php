<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function retrieve(
        Endpoint|string $endpoint,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param Endpoint|value-of<Endpoint> $endpoint
     *
     * @return mixed|list<mixed|string>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        Endpoint|string $endpoint,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
