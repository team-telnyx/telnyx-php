<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\Campaign;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface OsrContract
{
    /**
     * @api
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function getAttributes(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array;
}
