<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\DocumentLinks\DocumentLinkListParams;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DocumentLinksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DocumentLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<DocumentLinkListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|DocumentLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
