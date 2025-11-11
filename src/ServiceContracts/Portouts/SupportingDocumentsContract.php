<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;

interface SupportingDocumentsContract
{
    /**
     * @api
     *
     * @param array<mixed>|SupportingDocumentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|SupportingDocumentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SupportingDocumentNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SupportingDocumentListResponse;
}
