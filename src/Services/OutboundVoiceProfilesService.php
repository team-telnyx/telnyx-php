<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Sort;
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
     *     call_recording_channels?: 'single'|'dual',
     *     call_recording_format?: 'wav'|'mp3',
     *     call_recording_type?: 'all'|'none'|'by_caller_phone_number',
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'outbound_voice_profiles',
            body: (object) $parsed,
            options: $options,
            convert: OutboundVoiceProfileNewResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['outbound_voice_profiles/%1$s', $id],
            options: $requestOptions,
            convert: OutboundVoiceProfileGetResponse::class,
        );
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
     *     call_recording_channels?: 'single'|'dual',
     *     call_recording_format?: 'wav'|'mp3',
     *     call_recording_type?: 'all'|'none'|'by_caller_phone_number',
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['outbound_voice_profiles/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: OutboundVoiceProfileUpdateResponse::class,
        );
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
     * @return DefaultPagination<OutboundVoiceProfile>
     *
     * @throws APIException
     */
    public function list(
        array|OutboundVoiceProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = OutboundVoiceProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'outbound_voice_profiles',
            query: $parsed,
            options: $options,
            convert: OutboundVoiceProfile::class,
            page: DefaultPagination::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['outbound_voice_profiles/%1$s', $id],
            options: $requestOptions,
            convert: OutboundVoiceProfileDeleteResponse::class,
        );
    }
}
