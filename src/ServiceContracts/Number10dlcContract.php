<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Number10dlcGetEnumParams\Endpoint;
use Telnyx\Number10dlc\Number10dlcGetEnumResponse\EnumPaginatedResponse;
use Telnyx\RequestOptions;

interface Number10dlcContract
{
    /**
     * @api
     *
     * @param Endpoint|value-of<Endpoint> $endpoint
     *
     * @return list<string>|list<array<string,mixed>>|EnumPaginatedResponse|array<string,mixed>|array<string,mixed>
     *
     * @throws APIException
     */
    public function getEnum(
        Endpoint|string $endpoint,
        ?RequestOptions $requestOptions = null
    ): array|EnumPaginatedResponse;
}
