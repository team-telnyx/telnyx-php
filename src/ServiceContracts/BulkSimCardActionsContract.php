<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams\FilterActionType;
use Telnyx\BulkSimCardActions\BulkSimCardActionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

interface BulkSimCardActionsContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param 'bulk_set_public_ips'|FilterActionType $filterActionType filter by action type
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return DefaultFlatPagination<BulkSimCardActionListResponse>
     *
     * @throws APIException
     */
    public function list(
        string|FilterActionType|null $filterActionType = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;
}
