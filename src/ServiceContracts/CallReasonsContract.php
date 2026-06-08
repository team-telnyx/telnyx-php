<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CallReasons\CallReasonListResponse;
use Telnyx\CallReasons\CallReasonValidateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallReasonsContract
{
    /**
     * @api
     *
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Default `100` for this endpoint (the call-reason library is small and most callers want the whole list in one call). Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<CallReasonListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 100,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param list<string> $body **Bare JSON array** of candidate call-reason strings (NOT an object - there is no top-level `call_reasons` key on this endpoint). 1–10 strings, each ≤64 characters.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function validate(
        array $body,
        RequestOptions|array|null $requestOptions = null
    ): CallReasonValidateResponse;
}
