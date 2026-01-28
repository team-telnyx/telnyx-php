<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams;
use Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingURLDomainsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessagingURLDomainListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MessagingURLDomainListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingURLDomainListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
