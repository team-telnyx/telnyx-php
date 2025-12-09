<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingChannels;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingFormat;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording\CallRecordingType;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Sort;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileNewResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateResponse;
use Telnyx\OutboundVoiceProfiles\ServicePlan;
use Telnyx\OutboundVoiceProfiles\TrafficType;
use Telnyx\OutboundVoiceProfiles\UsagePaymentMethod;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OutboundVoiceProfilesContract;

final class OutboundVoiceProfilesService implements OutboundVoiceProfilesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create an outbound voice profile.
     *
     * @param array{
     *   name: string,
     *   billing_group_id?: string|null,
     *   call_recording?: array{
     *     call_recording_caller_phone_numbers?: list<string>,
     *     call_recording_channels?: 'single'|'dual'|CallRecordingChannels,
     *     call_recording_format?: 'wav'|'mp3'|CallRecordingFormat,
     *     call_recording_type?: 'all'|'none'|'by_caller_phone_number'|CallRecordingType,
     *   }|OutboundCallRecording,
     *   calling_window?: array{
     *     calls_per_cld?: int, end_time?: string, start_time?: string
     *   },
     *   concurrent_call_limit?: int|null,
     *   daily_spend_limit?: string,
     *   daily_spend_limit_enabled?: bool,
     *   enabled?: bool,
     *   max_destination_rate?: float,
     *   service_plan?: 'global'|ServicePlan,
     *   tags?: list<string>,
     *   traffic_type?: 'conversational'|TrafficType,
     *   usage_payment_method?: 'rate-deck'|UsagePaymentMethod,
     *   whitelisted_destinations?: list<string>,
     * }|OutboundVoiceProfileCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|OutboundVoiceProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileNewResponse {
        [$parsed, $options] = OutboundVoiceProfileCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OutboundVoiceProfileNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'outbound_voice_profiles',
            body: (object) $parsed,
            options: $options,
            convert: OutboundVoiceProfileNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of an existing outbound voice profile.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileGetResponse {
        /** @var BaseResponse<OutboundVoiceProfileGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['outbound_voice_profiles/%1$s', $id],
            options: $requestOptions,
            convert: OutboundVoiceProfileGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates an existing outbound voice profile.
     *
     * @param array{
     *   name: string,
     *   billing_group_id?: string|null,
     *   call_recording?: array{
     *     call_recording_caller_phone_numbers?: list<string>,
     *     call_recording_channels?: 'single'|'dual'|CallRecordingChannels,
     *     call_recording_format?: 'wav'|'mp3'|CallRecordingFormat,
     *     call_recording_type?: 'all'|'none'|'by_caller_phone_number'|CallRecordingType,
     *   }|OutboundCallRecording,
     *   calling_window?: array{
     *     calls_per_cld?: int, end_time?: string, start_time?: string
     *   },
     *   concurrent_call_limit?: int|null,
     *   daily_spend_limit?: string,
     *   daily_spend_limit_enabled?: bool,
     *   enabled?: bool,
     *   max_destination_rate?: float,
     *   service_plan?: 'global'|ServicePlan,
     *   tags?: list<string>,
     *   traffic_type?: 'conversational'|TrafficType,
     *   usage_payment_method?: 'rate-deck'|UsagePaymentMethod,
     *   whitelisted_destinations?: list<string>,
     * }|OutboundVoiceProfileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|OutboundVoiceProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileUpdateResponse {
        [$parsed, $options] = OutboundVoiceProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OutboundVoiceProfileUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['outbound_voice_profiles/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: OutboundVoiceProfileUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all outbound voice profiles belonging to the user that match the given filters.
     *
     * @param array{
     *   filter?: array{name?: array{contains?: string}},
     *   page?: array{number?: int, size?: int},
     *   sort?: value-of<Sort>,
     * }|OutboundVoiceProfileListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|OutboundVoiceProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileListResponse {
        [$parsed, $options] = OutboundVoiceProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OutboundVoiceProfileListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'outbound_voice_profiles',
            query: $parsed,
            options: $options,
            convert: OutboundVoiceProfileListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an existing outbound voice profile.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileDeleteResponse {
        /** @var BaseResponse<OutboundVoiceProfileDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['outbound_voice_profiles/%1$s', $id],
            options: $requestOptions,
            convert: OutboundVoiceProfileDeleteResponse::class,
        );

        return $response->parse();
    }
}
