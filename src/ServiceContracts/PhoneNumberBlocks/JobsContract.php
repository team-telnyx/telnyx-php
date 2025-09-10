<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumberBlocks;

use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobGetResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Page;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Sort;
use Telnyx\PhoneNumberBlocks\Jobs\JobListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface JobsContract
{
    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): JobGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): JobListResponse;

    /**
     * @api
     *
     * @param string $phoneNumberBlockID
     */
    public function deletePhoneNumberBlock(
        $phoneNumberBlockID,
        ?RequestOptions $requestOptions = null
    ): JobDeletePhoneNumberBlockResponse;
}
