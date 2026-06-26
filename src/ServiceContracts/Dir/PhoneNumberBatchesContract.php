<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListParams\FilterStatus;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberBatchesContract
{
    /**
     * @api
     *
     * @param string $batchID the batch id (lowercase UUID)
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $batchID,
        string $dirID,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberBatchGetResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param FilterStatus|value-of<FilterStatus> $filterStatus restrict to batches whose aggregate status equals this value
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumberBatchListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        FilterStatus|string|null $filterStatus = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
