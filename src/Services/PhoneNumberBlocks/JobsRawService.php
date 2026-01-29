<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumberBlocks;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumberBlocks\Jobs\Job;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockParams;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobGetResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Sort;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberBlocks\JobsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class JobsRawService implements JobsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves a phone number blocks job
     *
     * @param string $id identifies the Phone Number Blocks Job
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|JobListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Job>>
     *
     * @throws APIException
     */
    public function list(
        array|JobListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JobListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'phone_number_blocks/jobs',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: Job::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Creates a new background job to delete all the phone numbers associated with the given block. We will only consider the phone number block as deleted after all phone numbers associated with it are removed, so multiple executions of this job may be necessary in case some of the phone numbers present errors during the deletion process.
     *
     * @param array{phoneNumberBlockID: string}|JobDeletePhoneNumberBlockParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobDeletePhoneNumberBlockResponse>
     *
     * @throws APIException
     */
    public function deletePhoneNumberBlock(
        array|JobDeletePhoneNumberBlockParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JobDeletePhoneNumberBlockParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'phone_number_blocks/jobs/delete_phone_number_block',
            body: (object) $parsed,
            options: $options,
            convert: JobDeletePhoneNumberBlockResponse::class,
        );
    }
}
