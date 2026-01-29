<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Sort;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\JobsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\Jobs\JobListParams\Filter
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter as FilterShape1
 * @phpstan-import-type UpdateVoiceSettingsShape from \Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings
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
     * Retrieve a phone numbers job
     *
     * @param string $id identifies the Phone Numbers Job
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
            path: ['phone_numbers/jobs/%1$s', $id],
            options: $requestOptions,
            convert: JobGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the phone numbers jobs
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|JobListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumbersJob>>
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
            path: 'phone_numbers/jobs',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PhoneNumbersJob::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Creates a new background job to delete a batch of numbers. At most one thousand numbers can be updated per API call.
     *
     * @param array{phoneNumbers: list<string>}|JobDeleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobDeleteBatchResponse>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|JobDeleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JobDeleteBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'phone_numbers/jobs/delete_phone_numbers',
            body: (object) $parsed,
            options: $options,
            convert: JobDeleteBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * Creates a new background job to update a batch of numbers. At most one thousand numbers can be updated per API call. At least one of the updateable fields must be submitted. IMPORTANT: You must either specify filters (using the filter parameters) or specific phone numbers (using the phone_numbers parameter in the request body). If you specify filters, ALL phone numbers that match the given filters (up to 1000 at a time) will be updated. If you want to update only specific numbers, you must use the phone_numbers parameter in the request body. When using the phone_numbers parameter, ensure you follow the correct format as shown in the example (either phone number IDs or phone numbers in E164 format).
     *
     * @param array{
     *   phoneNumbers: list<string>,
     *   filter?: JobUpdateBatchParams\Filter|FilterShape1,
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   deletionLockEnabled?: bool,
     *   externalPin?: string,
     *   hdVoiceEnabled?: bool,
     *   tags?: list<string>,
     *   voice?: UpdateVoiceSettings|UpdateVoiceSettingsShape,
     * }|JobUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobUpdateBatchResponse>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|JobUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JobUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['filter']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'phone_numbers/jobs/update_phone_numbers',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: JobUpdateBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * Creates a background job to update the emergency settings of a collection of phone numbers. At most one thousand numbers can be updated per API call.
     *
     * @param array{
     *   emergencyEnabled: bool,
     *   phoneNumbers: list<string>,
     *   emergencyAddressID?: string|null,
     * }|JobUpdateEmergencySettingsBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobUpdateEmergencySettingsBatchResponse>
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatch(
        array|JobUpdateEmergencySettingsBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JobUpdateEmergencySettingsBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'phone_numbers/jobs/update_emergency_settings',
            body: (object) $parsed,
            options: $options,
            convert: JobUpdateEmergencySettingsBatchResponse::class,
        );
    }
}
