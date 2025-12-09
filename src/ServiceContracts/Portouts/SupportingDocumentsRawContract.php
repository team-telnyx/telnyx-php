<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;

interface SupportingDocumentsRawContract
{
    /**
     * @api
     *
     * @param string $id Portout id
     * @param array<mixed>|SupportingDocumentCreateParams $params
     *
     * @return BaseResponse<SupportingDocumentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|SupportingDocumentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Portout id
     *
     * @return BaseResponse<SupportingDocumentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
