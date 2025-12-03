<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams;
use Telnyx\BulkSimCardActions\BulkSimCardActionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BulkSimCardActionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BulkSimCardActionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|BulkSimCardActionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|BulkSimCardActionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BulkSimCardActionListResponse;
}
