<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DocumentLinks\DocumentLinkListParams;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;

interface DocumentLinksContract
{
    /**
     * @api
     *
     * @param array<mixed>|DocumentLinkListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DocumentLinkListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DocumentLinkListResponse;
}
