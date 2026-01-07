<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Messaging10dlcGetEnumParams\Endpoint;
use Telnyx\Messaging10dlc\Messaging10dlcGetEnumResponse\EnumPaginatedResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface Messaging10dlcRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<string>|list<array<string,mixed>>|EnumPaginatedResponse|array<string,mixed>|array<string,mixed>,>
     *
     * @throws APIException
     */
    public function getEnum(
        Endpoint|string $endpoint,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
