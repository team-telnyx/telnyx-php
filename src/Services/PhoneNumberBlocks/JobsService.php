<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumberBlocks;

use Telnyx\Client;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockParams;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobGetResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Page;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Sort;
use Telnyx\PhoneNumberBlocks\Jobs\JobListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberBlocks\JobsContract;

use const Telnyx\Core\OMIT as omit;

final class JobsService implements JobsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves a phone number blocks job
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): JobGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['phone_number_blocks/jobs/%1$s', $id],
            options: $requestOptions,
            convert: JobGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the phone number blocks jobs
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
    ): JobListResponse {
        [$parsed, $options] = JobListParams::parseRequest(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_number_blocks/jobs',
            query: $parsed,
            options: $options,
            convert: JobListResponse::class,
        );
    }

    /**
     * @api
     *
     * Creates a new background job to delete all the phone numbers associated with the given block. We will only consider the phone number block as deleted after all phone numbers associated with it are removed, so multiple executions of this job may be necessary in case some of the phone numbers present errors during the deletion process.
     *
     * @param string $phoneNumberBlockID
     */
    public function deletePhoneNumberBlock(
        $phoneNumberBlockID,
        ?RequestOptions $requestOptions = null
    ): JobDeletePhoneNumberBlockResponse {
        [$parsed, $options] = JobDeletePhoneNumberBlockParams::parseRequest(
            ['phoneNumberBlockID' => $phoneNumberBlockID],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'phone_number_blocks/jobs/delete_phone_number_block',
            body: (object) $parsed,
            options: $options,
            convert: JobDeletePhoneNumberBlockResponse::class,
        );
    }
}
