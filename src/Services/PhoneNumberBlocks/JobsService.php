<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumberBlocks;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumberBlocks\Jobs\Job;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobGetResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter\Status;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter\Type;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Sort;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberBlocks\JobsContract;

final class JobsService implements JobsContract
{
    /**
     * @api
     */
    public JobsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new JobsRawService($client);
    }

    /**
     * @api
     *
     * Retrieves a phone number blocks job
     *
     * @param string $id identifies the Phone Number Blocks Job
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): JobGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the phone number blocks jobs
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
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates a new background job to delete all the phone numbers associated with the given block. We will only consider the phone number block as deleted after all phone numbers associated with it are removed, so multiple executions of this job may be necessary in case some of the phone numbers present errors during the deletion process.
     *
     * @throws APIException
     */
    public function deletePhoneNumberBlock(
        string $phoneNumberBlockID,
        ?RequestOptions $requestOptions = null
    ): JobDeletePhoneNumberBlockResponse {
        $params = ['phoneNumberBlockID' => $phoneNumberBlockID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deletePhoneNumberBlock(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
