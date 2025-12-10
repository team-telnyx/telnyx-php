<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DocumentLinks\DocumentLinkListParams;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;

interface DocumentLinksRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|DocumentLinkListParams $params
     *
     * @return BaseResponse<DocumentLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|DocumentLinkListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
