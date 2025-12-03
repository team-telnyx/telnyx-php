<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams;
use Telnyx\PhoneNumbers\Jobs\JobListResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchParams;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\JobsContract;

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
     * @throws APIException
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
     * @param array{
     *   filter?: array{
     *     type?: 'update_emergency_settings'|'delete_phone_numbers'|'update_phone_numbers',
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at',
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
     * @param array{phone_numbers: list<string>}|JobDeleteBatchParams $params
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|JobDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): JobDeleteBatchResponse {
        [$parsed, $options] = JobDeleteBatchParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   phone_numbers: list<string>,
     *   filter?: array{
     *     billing_group_id?: string,
     *     connection_id?: string,
     *     customer_reference?: string,
     *     emergency_address_id?: string,
     *     has_bundle?: string,
     *     phone_number?: string,
     *     status?: 'purchase-pending'|'purchase-failed'|'port-pending'|'active'|'deleted'|'port-failed'|'emergency-only'|'ported-out'|'port-out-pending',
     *     tag?: string,
     *     'voice.connection_name'?: array{
     *       contains?: string, ends_with?: string, eq?: string, starts_with?: string
     *     },
     *     'voice.usage_payment_method'?: 'pay-per-minute'|'channel',
     *   },
     *   billing_group_id?: string,
     *   connection_id?: string,
     *   customer_reference?: string,
     *   deletion_lock_enabled?: bool,
     *   external_pin?: string,
     *   hd_voice_enabled?: bool,
     *   tags?: list<string>,
     *   voice?: array{
     *     call_forwarding?: array{
     *       call_forwarding_enabled?: bool,
     *       forwarding_type?: 'always'|'on-failure',
     *       forwards_to?: string,
     *     }|CallForwarding,
     *     call_recording?: array{
     *       inbound_call_recording_channels?: 'single'|'dual',
     *       inbound_call_recording_enabled?: bool,
     *       inbound_call_recording_format?: 'wav'|'mp3',
     *     }|CallRecording,
     *     caller_id_name_enabled?: bool,
     *     cnam_listing?: array{
     *       cnam_listing_details?: string, cnam_listing_enabled?: bool
     *     }|CnamListing,
     *     inbound_call_screening?: 'disabled'|'reject_calls'|'flag_calls',
     *     media_features?: array{
     *       accept_any_rtp_packets_enabled?: bool,
     *       rtp_auto_adjust_enabled?: bool,
     *       t38_fax_gateway_enabled?: bool,
     *     }|MediaFeatures,
     *     tech_prefix_enabled?: bool,
     *     translated_number?: string,
     *     usage_payment_method?: 'pay-per-minute'|'channel',
     *   },
     * }|JobUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        array|JobUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): JobUpdateBatchResponse {
        [$parsed, $options] = JobUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['filter'];

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
     * @param array{
     *   emergency_enabled: bool,
     *   phone_numbers: list<string>,
     *   emergency_address_id?: string|null,
     * }|JobUpdateEmergencySettingsBatchParams $params
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatch(
        array|JobUpdateEmergencySettingsBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): JobUpdateEmergencySettingsBatchResponse {
        [$parsed, $options] = JobUpdateEmergencySettingsBatchParams::parseRequest(
            $params,
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
