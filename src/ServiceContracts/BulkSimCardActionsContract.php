<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams\FilterActionType;
use Telnyx\BulkSimCardActions\BulkSimCardActionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface BulkSimCardActionsContract
{
    /**
     * @api
     *
     * @return BulkSimCardActionGetResponse<HasRawResponse>
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
     * @return BulkSimCardActionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     *
     * @throws APIException
     */
    public function list(
        $filterActionType = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): BulkSimCardActionListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BulkSimCardActionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BulkSimCardActionListResponse;
}
