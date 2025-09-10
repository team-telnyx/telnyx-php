<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface SupportingDocumentsContract
{
    /**
     * @api
     *
     * @param list<Document> $documents List of supporting documents parameters
     */
    public function create(
        string $id,
        $documents = omit,
        ?RequestOptions $requestOptions = null
    ): SupportingDocumentNewResponse;

    /**
     * @api
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SupportingDocumentListResponse;
}
