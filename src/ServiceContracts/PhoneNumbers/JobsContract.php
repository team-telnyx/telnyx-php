<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Page;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Sort;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\Jobs\JobListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\Jobs\JobListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter as FilterShape1
 * @phpstan-import-type UpdateVoiceSettingsShape from \Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JobsContract
{
    /**
     * @api
     *
     * @param string $id identifies the Phone Numbers Job
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): JobGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[type]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PhoneNumbersJob>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBatch(
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null
    ): JobDeleteBatchResponse;

    /**
     * @api
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
    ): JobUpdateBatchResponse;

    /**
     * @api
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
    ): JobUpdateEmergencySettingsBatchResponse;
}
