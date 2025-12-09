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
     *   billingGroupID?: string|null,
     *   callRecording?: array{
     *     callRecordingCallerPhoneNumbers?: list<string>,
     *     callRecordingChannels?: 'single'|'dual'|CallRecordingChannels,
     *     callRecordingFormat?: 'wav'|'mp3'|CallRecordingFormat,
     *     callRecordingType?: 'all'|'none'|'by_caller_phone_number'|CallRecordingType,
     *   }|OutboundCallRecording,
     *   callingWindow?: array{
     *     callsPerCld?: int, endTime?: string, startTime?: string
     *   },
     *   concurrentCallLimit?: int|null,
     *   dailySpendLimit?: string,
     *   dailySpendLimitEnabled?: bool,
     *   enabled?: bool,
     *   maxDestinationRate?: float,
     *   servicePlan?: 'global'|ServicePlan,
     *   tags?: list<string>,
     *   trafficType?: 'conversational'|TrafficType,
     *   usagePaymentMethod?: 'rate-deck'|UsagePaymentMethod,
     *   whitelistedDestinations?: list<string>,
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
     *   billingGroupID?: string|null,
     *   callRecording?: array{
     *     callRecordingCallerPhoneNumbers?: list<string>,
     *     callRecordingChannels?: 'single'|'dual'|CallRecordingChannels,
     *     callRecordingFormat?: 'wav'|'mp3'|CallRecordingFormat,
     *     callRecordingType?: 'all'|'none'|'by_caller_phone_number'|CallRecordingType,
     *   }|OutboundCallRecording,
     *   callingWindow?: array{
     *     callsPerCld?: int, endTime?: string, startTime?: string
     *   },
     *   concurrentCallLimit?: int|null,
     *   dailySpendLimit?: string,
     *   dailySpendLimitEnabled?: bool,
     *   enabled?: bool,
     *   maxDestinationRate?: float,
     *   servicePlan?: 'global'|ServicePlan,
     *   tags?: list<string>,
     *   trafficType?: 'conversational'|TrafficType,
     *   usagePaymentMethod?: 'rate-deck'|UsagePaymentMethod,
     *   whitelistedDestinations?: list<string>,
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
