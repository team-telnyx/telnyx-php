<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams\FilterActionType;
use Telnyx\BulkSimCardActions\BulkSimCardActionListResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface BulkSimCardActionsContract
{
    /**
     * @api
     *
     * @return BulkSimCardActionGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BulkSimCardActionGetResponse;

    /**
     * @api
     *
     * @param FilterActionType|value-of<FilterActionType> $filterActionType filter by action type
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return BulkSimCardActionListResponse<HasRawResponse>
     */
    public function list(
        $filterActionType = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): BulkSimCardActionListResponse;
}
