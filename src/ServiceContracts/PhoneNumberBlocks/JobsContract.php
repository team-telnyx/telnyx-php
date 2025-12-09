<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumberBlocks;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumberBlocks\Jobs\Job;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobGetResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter\Status;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter\Type;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Sort;
use Telnyx\RequestOptions;

interface JobsContract
{
    /**
     * @api
     *
     * @param string $id identifies the Phone Number Blocks Job
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): JobGetResponse;

    /**
     * @api
     *
     * @param array{
     *   status?: 'pending'|'in_progress'|'completed'|'failed'|Status,
     *   type?: 'delete_phone_number_block'|Type,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[status]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param 'created_at'|Sort $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @return DefaultPagination<Job>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort|null $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deletePhoneNumberBlock(
        string $phoneNumberBlockID,
        ?RequestOptions $requestOptions = null
    ): JobDeletePhoneNumberBlockResponse;
}
