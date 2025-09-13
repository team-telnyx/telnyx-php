<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Campaign;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface OsrContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function getAttributes(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getAttributesRaw(
        string $campaignID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
