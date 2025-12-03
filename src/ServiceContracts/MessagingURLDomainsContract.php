<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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
     * @return DefaultPagination<MessagingURLDomainListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingURLDomainListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
