<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Sort;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\JobsContract;

/**
 * Background jobs performed over a batch of phone numbers.
 *
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\Jobs\JobListParams\Filter
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter as FilterShape1
 * @phpstan-import-type UpdateVoiceSettingsShape from \Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Retrieve a phone numbers job
     *
     * @param string $id identifies the Phone Numbers Job
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): JobGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the phone numbers jobs
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[type]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumbersJob>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates a new background job to delete a batch of numbers. At most one thousand numbers can be updated per API call.
     *
     * @param list<string> $phoneNumbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBatch(
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null
    ): JobDeleteBatchResponse {
        $params = Util::removeNulls(['phoneNumbers' => $phoneNumbers]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates a new background job to update a batch of numbers. At most one thousand numbers can be updated per API call. At least one of the updateable fields must be submitted. IMPORTANT: You must either specify filters (using the filter parameters) or specific phone numbers (using the phone_numbers parameter in the request body). If you specify filters, ALL phone numbers that match the given filters (up to 1000 at a time) will be updated. If you want to update only specific numbers, you must use the phone_numbers parameter in the request body. When using the phone_numbers parameter, ensure you follow the correct format as shown in the example (either phone number IDs or phone numbers in E164 format).
     *
     * @param list<string> $phoneNumbers Body param: Array of phone number ids and/or phone numbers in E164 format to update. This parameter is required if no filter parameters are provided. If you want to update specific numbers rather than all numbers matching a filter, you must use this parameter. Each item must be either a valid phone number ID or a phone number in E164 format (e.g., '+13127367254').
     * @param \Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter|FilterShape1 $filter Query param: Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference]
     * @param string $billingGroupID body param: Identifies the billing group associated with the phone number
     * @param string $connectionID body param: Identifies the connection associated with the phone number
     * @param string $customerReference body param: A customer reference string for customer look ups
     * @param bool $deletionLockEnabled Body param: Indicates whether to enable or disable the deletion lock on each phone number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     * @param string $externalPin Body param: If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     * @param bool $hdVoiceEnabled Body param: Indicates whether to enable or disable HD Voice on each phone number. HD Voice is a paid feature and may not be available for all phone numbers, more details about it can be found in the Telnyx support documentation.
     * @param list<string> $tags body param: A list of user-assigned tags to help organize phone numbers
     * @param UpdateVoiceSettings|UpdateVoiceSettingsShape $voice Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        array $phoneNumbers,
        \Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter|array|null $filter = null,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?bool $deletionLockEnabled = null,
        ?string $externalPin = null,
        ?bool $hdVoiceEnabled = null,
        ?array $tags = null,
        UpdateVoiceSettings|array|null $voice = null,
        RequestOptions|array|null $requestOptions = null,
    ): JobUpdateBatchResponse {
        $params = Util::removeNulls(
            [
                'phoneNumbers' => $phoneNumbers,
                'filter' => $filter,
                'billingGroupID' => $billingGroupID,
                'connectionID' => $connectionID,
                'customerReference' => $customerReference,
                'deletionLockEnabled' => $deletionLockEnabled,
                'externalPin' => $externalPin,
                'hdVoiceEnabled' => $hdVoiceEnabled,
                'tags' => $tags,
                'voice' => $voice,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates a background job to update the emergency settings of a collection of phone numbers. At most one thousand numbers can be updated per API call.
     *
     * @param bool $emergencyEnabled indicates whether to enable or disable emergency services on the numbers
     * @param list<string> $phoneNumbers
     * @param string|null $emergencyAddressID Identifies the address to be used with emergency services. Required if emergency_enabled is true, must be null or omitted if emergency_enabled is false.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatch(
        bool $emergencyEnabled,
        array $phoneNumbers,
        ?string $emergencyAddressID = null,
        RequestOptions|array|null $requestOptions = null,
    ): JobUpdateEmergencySettingsBatchResponse {
        $params = Util::removeNulls(
            [
                'emergencyEnabled' => $emergencyEnabled,
                'phoneNumbers' => $phoneNumbers,
                'emergencyAddressID' => $emergencyAddressID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateEmergencySettingsBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
