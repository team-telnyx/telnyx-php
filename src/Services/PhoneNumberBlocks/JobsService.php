<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumberBlocks;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return JobGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): JobGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return JobGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     *
     * @return JobListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): JobListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return JobListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): JobListResponse {
        [$parsed, $options] = JobListParams::parseRequest($params, $requestOptions);

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
     *
     * @return JobDeletePhoneNumberBlockResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deletePhoneNumberBlock(
        $phoneNumberBlockID,
        ?RequestOptions $requestOptions = null
    ): JobDeletePhoneNumberBlockResponse {
        $params = ['phoneNumberBlockID' => $phoneNumberBlockID];

        return $this->deletePhoneNumberBlockRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return JobDeletePhoneNumberBlockResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deletePhoneNumberBlockRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): JobDeletePhoneNumberBlockResponse {
        [$parsed, $options] = JobDeletePhoneNumberBlockParams::parseRequest(
            $params,
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
