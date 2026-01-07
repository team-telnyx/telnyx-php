<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams\CallingWindow;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Page;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Sort;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileNewResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateResponse;
use Telnyx\OutboundVoiceProfiles\ServicePlan;
use Telnyx\OutboundVoiceProfiles\TrafficType;
use Telnyx\OutboundVoiceProfiles\UsagePaymentMethod;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OutboundVoiceProfilesRawContract;

/**
 * @phpstan-import-type CallingWindowShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams\CallingWindow
 * @phpstan-import-type CallingWindowShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateParams\CallingWindow as CallingWindowShape1
 * @phpstan-import-type FilterShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Page
 * @phpstan-import-type OutboundCallRecordingShape from \Telnyx\OutboundVoiceProfiles\OutboundCallRecording
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OutboundVoiceProfilesRawService implements OutboundVoiceProfilesRawContract
{
    // @phpstan-ignore-next-line
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
     *   callRecording?: OutboundCallRecording|OutboundCallRecordingShape,
     *   callingWindow?: CallingWindow|CallingWindowShape,
     *   concurrentCallLimit?: int|null,
     *   dailySpendLimit?: string,
     *   dailySpendLimitEnabled?: bool,
     *   enabled?: bool,
     *   maxDestinationRate?: float,
     *   servicePlan?: ServicePlan|value-of<ServicePlan>,
     *   tags?: list<string>,
     *   trafficType?: TrafficType|value-of<TrafficType>,
     *   usagePaymentMethod?: UsagePaymentMethod|value-of<UsagePaymentMethod>,
     *   whitelistedDestinations?: list<string>,
     * }|OutboundVoiceProfileCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OutboundVoiceProfileNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|OutboundVoiceProfileCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OutboundVoiceProfileCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OutboundVoiceProfileGetResponse>
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
     * @param string $id identifies the resource
     * @param array{
     *   name: string,
     *   billingGroupID?: string|null,
     *   callRecording?: OutboundCallRecording|OutboundCallRecordingShape,
     *   callingWindow?: OutboundVoiceProfileUpdateParams\CallingWindow|CallingWindowShape1,
     *   concurrentCallLimit?: int|null,
     *   dailySpendLimit?: string,
     *   dailySpendLimitEnabled?: bool,
     *   enabled?: bool,
     *   maxDestinationRate?: float,
     *   servicePlan?: ServicePlan|value-of<ServicePlan>,
     *   tags?: list<string>,
     *   trafficType?: TrafficType|value-of<TrafficType>,
     *   usagePaymentMethod?: UsagePaymentMethod|value-of<UsagePaymentMethod>,
     *   whitelistedDestinations?: list<string>,
     * }|OutboundVoiceProfileUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OutboundVoiceProfileUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|OutboundVoiceProfileUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OutboundVoiceProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: value-of<Sort>
     * }|OutboundVoiceProfileListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<OutboundVoiceProfile>>
     *
     * @throws APIException
     */
    public function list(
        array|OutboundVoiceProfileListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OutboundVoiceProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OutboundVoiceProfileDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['outbound_voice_profiles/%1$s', $id],
            options: $requestOptions,
            convert: OutboundVoiceProfileDeleteResponse::class,
        );
    }
}
