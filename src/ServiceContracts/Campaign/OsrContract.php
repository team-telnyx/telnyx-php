<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Campaign;

use Telnyx\RequestOptions;

interface OsrContract
{
    /**
     * @api
     */
    public function getAttributes(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
