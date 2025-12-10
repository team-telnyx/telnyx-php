<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams;
use Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;
use Telnyx\RequestOptions;

interface MessagingURLDomainsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingURLDomainListParams $params
     *
     * @return BaseResponse<DefaultPagination<MessagingURLDomainListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingURLDomainListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
