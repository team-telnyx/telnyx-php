<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter\Type;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Sort;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\Status;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallForwarding\ForwardingType;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingChannels;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingFormat;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings\UsagePaymentMethod;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\JobsRawContract;

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
     *
     * @return BaseResponse<JobGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *   filter?: array{
     *     type?: 'update_emergency_settings'|'delete_phone_numbers'|'update_phone_numbers'|Type,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|Sort,
     * }|JobListParams $params
     *
     * @return BaseResponse<DefaultPagination<PhoneNumbersJob>>
     *
     * @throws APIException
     */
    public function list(
        array|JobListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = JobListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/jobs',
            query: $parsed,
            options: $options,
            convert: PhoneNumbersJob::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Creates a new background job to delete a batch of numbers. At most one thousand numbers can be updated per API call.
     *
     * @param array{phoneNumbers: list<string>}|JobDeleteBatchParams $params
     *
     * @return BaseResponse<JobDeleteBatchResponse>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|JobDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null
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
     *   filter?: array{
     *     billingGroupID?: string,
     *     connectionID?: string,
     *     customerReference?: string,
     *     emergencyAddressID?: string,
     *     hasBundle?: string,
     *     phoneNumber?: string,
     *     status?: 'purchase-pending'|'purchase-failed'|'port-pending'|'active'|'deleted'|'port-failed'|'emergency-only'|'ported-out'|'port-out-pending'|Status,
     *     tag?: string,
     *     voiceConnectionName?: array{
     *       contains?: string, endsWith?: string, eq?: string, startsWith?: string
     *     },
     *     voiceUsagePaymentMethod?: 'pay-per-minute'|'channel'|VoiceUsagePaymentMethod,
     *   },
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   deletionLockEnabled?: bool,
     *   externalPin?: string,
     *   hdVoiceEnabled?: bool,
     *   tags?: list<string>,
     *   voice?: array{
     *     callForwarding?: array{
     *       callForwardingEnabled?: bool,
     *       forwardingType?: 'always'|'on-failure'|ForwardingType,
     *       forwardsTo?: string,
     *     }|CallForwarding,
     *     callRecording?: array{
     *       inboundCallRecordingChannels?: 'single'|'dual'|InboundCallRecordingChannels,
     *       inboundCallRecordingEnabled?: bool,
     *       inboundCallRecordingFormat?: 'wav'|'mp3'|InboundCallRecordingFormat,
     *     }|CallRecording,
     *     callerIDNameEnabled?: bool,
     *     cnamListing?: array{
     *       cnamListingDetails?: string, cnamListingEnabled?: bool
     *     }|CnamListing,
     *     inboundCallScreening?: 'disabled'|'reject_calls'|'flag_calls'|InboundCallScreening,
     *     mediaFeatures?: array{
     *       acceptAnyRtpPacketsEnabled?: bool,
     *       rtpAutoAdjustEnabled?: bool,
     *       t38FaxGatewayEnabled?: bool,
     *     }|MediaFeatures,
     *     techPrefixEnabled?: bool,
     *     translatedNumber?: string,
     *     usagePaymentMethod?: 'pay-per-minute'|'channel'|UsagePaymentMethod,
     *   },
     * }|JobUpdateBatchParams $params
     *
     * @return BaseResponse<JobUpdateBatchResponse>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|JobUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null
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
     * @param array{
     *   emergencyEnabled: bool,
     *   phoneNumbers: list<string>,
     *   emergencyAddressID?: string|null,
     * }|JobUpdateEmergencySettingsBatchParams $params
     *
     * @return BaseResponse<JobUpdateEmergencySettingsBatchResponse>
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatch(
        array|JobUpdateEmergencySettingsBatchParams $params,
        ?RequestOptions $requestOptions = null,
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
