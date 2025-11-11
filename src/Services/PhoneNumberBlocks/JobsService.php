<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumberBlocks;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockParams;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobGetResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams;
use Telnyx\PhoneNumberBlocks\Jobs\JobListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberBlocks\JobsContract;

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
     * @throws APIException
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
     * @param array{
     *   filter?: array{
     *     status?: "pending"|"in_progress"|"completed"|"failed",
     *     type?: "delete_phone_number_block",
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: "created_at",
     * }|JobListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|JobListParams $params,
        ?RequestOptions $requestOptions = null
    ): JobListResponse {
        [$parsed, $options] = JobListParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   phone_number_block_id: string
     * }|JobDeletePhoneNumberBlockParams $params
     *
     * @throws APIException
     */
    public function deletePhoneNumberBlock(
        array|JobDeletePhoneNumberBlockParams $params,
        ?RequestOptions $requestOptions = null,
    ): JobDeletePhoneNumberBlockResponse {
        [$parsed, $options] = JobDeletePhoneNumberBlockParams::parseRequest(
            $params,
            $requestOptions,
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
