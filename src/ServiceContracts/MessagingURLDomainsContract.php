<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams;
use Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;
use Telnyx\RequestOptions;

interface MessagingURLDomainsContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingURLDomainListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MessagingURLDomainListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingURLDomainListResponse;
}
