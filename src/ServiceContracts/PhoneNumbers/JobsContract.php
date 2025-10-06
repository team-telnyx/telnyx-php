<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Page;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Sort;
use Telnyx\PhoneNumbers\Jobs\JobListResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface JobsContract
{
    /**
     * @api
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[type]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): JobListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): JobListResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers
     *
     * @throws APIException
     */
    public function deleteBatch(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): JobDeleteBatchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): JobDeleteBatchResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers Array of phone number ids and/or phone numbers in E164 format to update. This parameter is required if no filter parameters are provided. If you want to update specific numbers rather than all numbers matching a filter, you must use this parameter. Each item must be either a valid phone number ID or a phone number in E164 format (e.g., '+13127367254').
     * @param \Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference]
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with the phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param bool $deletionLockEnabled Indicates whether to enable or disable the deletion lock on each phone number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     * @param string $externalPin If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     * @param bool $hdVoiceEnabled Indicates whether to enable or disable HD Voice on each phone number. HD Voice is a paid feature and may not be available for all phone numbers, more details about it can be found in the Telnyx support documentation.
     * @param list<string> $tags a list of user-assigned tags to help organize phone numbers
     * @param UpdateVoiceSettings $voice
     *
     * @throws APIException
     */
    public function updateBatch(
        $phoneNumbers,
        $filter = omit,
        $billingGroupID = omit,
        $connectionID = omit,
        $customerReference = omit,
        $deletionLockEnabled = omit,
        $externalPin = omit,
        $hdVoiceEnabled = omit,
        $tags = omit,
        $voice = omit,
        ?RequestOptions $requestOptions = null,
    ): JobUpdateBatchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): JobUpdateBatchResponse;

    /**
     * @api
     *
     * @param bool $emergencyEnabled indicates whether to enable or disable emergency services on the numbers
     * @param list<string> $phoneNumbers
     * @param string|null $emergencyAddressID Identifies the address to be used with emergency services. Required if emergency_enabled is true, must be null or omitted if emergency_enabled is false.
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatch(
        $emergencyEnabled,
        $phoneNumbers,
        $emergencyAddressID = omit,
        ?RequestOptions $requestOptions = null,
    ): JobUpdateEmergencySettingsBatchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): JobUpdateEmergencySettingsBatchResponse;
}
