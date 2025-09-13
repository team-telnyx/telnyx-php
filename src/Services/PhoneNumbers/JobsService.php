<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Page;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Sort;
use Telnyx\PhoneNumbers\Jobs\JobListResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter as Filter1;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\JobsContract;

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
     * Retrieve a phone numbers job
     *
     * @return JobGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): JobGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[type]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @return JobListResponse<HasRawResponse>
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
            path: 'phone_numbers/jobs',
            query: $parsed,
            options: $options,
            convert: JobListResponse::class,
        );
    }

    /**
     * @api
     *
     * Creates a new background job to delete a batch of numbers. At most one thousand numbers can be updated per API call.
     *
     * @param list<string> $phoneNumbers
     *
     * @return JobDeleteBatchResponse<HasRawResponse>
     */
    public function deleteBatch(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): JobDeleteBatchResponse {
        [$parsed, $options] = JobDeleteBatchParams::parseRequest(
            ['phoneNumbers' => $phoneNumbers],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param list<string> $phoneNumbers Array of phone number ids and/or phone numbers in E164 format to update. This parameter is required if no filter parameters are provided. If you want to update specific numbers rather than all numbers matching a filter, you must use this parameter. Each item must be either a valid phone number ID or a phone number in E164 format (e.g., '+13127367254').
     * @param Filter1 $filter Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference]
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with the phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $externalPin If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     * @param bool $hdVoiceEnabled Indicates whether to enable or disable HD Voice on each phone number. HD Voice is a paid feature and may not be available for all phone numbers, more details about it can be found in the Telnyx support documentation.
     * @param list<string> $tags a list of user-assigned tags to help organize phone numbers
     * @param UpdateVoiceSettings $voice
     *
     * @return JobUpdateBatchResponse<HasRawResponse>
     */
    public function updateBatch(
        $phoneNumbers,
        $filter = omit,
        $billingGroupID = omit,
        $connectionID = omit,
        $customerReference = omit,
        $externalPin = omit,
        $hdVoiceEnabled = omit,
        $tags = omit,
        $voice = omit,
        ?RequestOptions $requestOptions = null,
    ): JobUpdateBatchResponse {
        [$parsed, $options] = JobUpdateBatchParams::parseRequest(
            [
                'phoneNumbers' => $phoneNumbers,
                'filter' => $filter,
                'billingGroupID' => $billingGroupID,
                'connectionID' => $connectionID,
                'customerReference' => $customerReference,
                'externalPin' => $externalPin,
                'hdVoiceEnabled' => $hdVoiceEnabled,
                'tags' => $tags,
                'voice' => $voice,
            ],
            $requestOptions,
        );
        $query_params = array_flip(['filter']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'phone_numbers/jobs/update_phone_numbers',
            query: array_diff_key($parsed, $query_params),
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
     * @param bool $emergencyEnabled indicates whether to enable or disable emergency services on the numbers
     * @param list<string> $phoneNumbers
     * @param string|null $emergencyAddressID Identifies the address to be used with emergency services. Required if emergency_enabled is true, must be null or omitted if emergency_enabled is false.
     *
     * @return JobUpdateEmergencySettingsBatchResponse<HasRawResponse>
     */
    public function updateEmergencySettingsBatch(
        $emergencyEnabled,
        $phoneNumbers,
        $emergencyAddressID = omit,
        ?RequestOptions $requestOptions = null,
    ): JobUpdateEmergencySettingsBatchResponse {
        [$parsed, $options] = JobUpdateEmergencySettingsBatchParams::parseRequest(
            [
                'emergencyEnabled' => $emergencyEnabled,
                'phoneNumbers' => $phoneNumbers,
                'emergencyAddressID' => $emergencyAddressID,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'phone_numbers/jobs/update_emergency_settings',
            body: (object) $parsed,
            options: $options,
            convert: JobUpdateEmergencySettingsBatchResponse::class,
        );
    }
}
