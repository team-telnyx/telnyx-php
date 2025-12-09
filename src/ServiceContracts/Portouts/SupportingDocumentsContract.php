<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document\Type;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;

interface SupportingDocumentsContract
{
    /**
     * @api
     *
     * @param string $id Portout id
     * @param list<array{
     *   documentID: string, type: 'loa'|'invoice'|Type
     * }> $documents List of supporting documents parameters
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?array $documents = null,
        ?RequestOptions $requestOptions = null,
    ): SupportingDocumentNewResponse;

    /**
     * @api
     *
     * @param string $id Portout id
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SupportingDocumentListResponse;
}
