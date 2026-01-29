<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type DocumentShape from \Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SupportingDocumentsContract
{
    /**
     * @api
     *
     * @param string $id Portout id
     * @param list<Document|DocumentShape> $documents List of supporting documents parameters
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?array $documents = null,
        RequestOptions|array|null $requestOptions = null,
    ): SupportingDocumentNewResponse;

    /**
     * @api
     *
     * @param string $id Portout id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SupportingDocumentListResponse;
}
