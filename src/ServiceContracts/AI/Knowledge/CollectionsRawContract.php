<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Knowledge;

use Telnyx\AI\Knowledge\Collections\CollectionGetDocumentsResponse;
use Telnyx\AI\Knowledge\Collections\CollectionRetrieveDocumentsParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CollectionsRawContract
{
    /**
     * @api
     *
     * @param string $slug the collection's slug (unique within your organization)
     * @param array<string,mixed>|CollectionRetrieveDocumentsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionGetDocumentsResponse>
     *
     * @throws APIException
     */
    public function retrieveDocuments(
        string $slug,
        array|CollectionRetrieveDocumentsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
