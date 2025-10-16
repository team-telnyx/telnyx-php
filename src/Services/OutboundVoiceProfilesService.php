<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OutboundVoiceProfiles\OutboundCallRecording;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams\CallingWindow;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Filter;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams\Page;
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

use const Telnyx\Core\OMIT as omit;

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
     * @param string $name a user-supplied name to help with organization
     * @param string|null $billingGroupID The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     * @param OutboundCallRecording $callRecording
     * @param CallingWindow $callingWindow (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
     * @param int|null $concurrentCallLimit Must be no more than your global concurrent call limit. Null means no limit.
     * @param string $dailySpendLimit the maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls
     * @param bool $dailySpendLimitEnabled specifies whether to enforce the daily_spend_limit on this outbound voice profile
     * @param bool $enabled Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     * @param float $maxDestinationRate maximum rate (price per minute) for a Destination to be allowed when making outbound calls
     * @param ServicePlan|value-of<ServicePlan> $servicePlan indicates the coverage of the termination regions
     * @param list<string> $tags
     * @param TrafficType|value-of<TrafficType> $trafficType specifies the type of traffic allowed in this profile
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod setting for how costs for outbound profile are calculated
     * @param list<string> $whitelistedDestinations the list of destinations you want to be able to call using this outbound voice profile formatted in alpha2
     *
     * @throws APIException
     */
    public function create(
        $name,
        $billingGroupID = omit,
        $callRecording = omit,
        $callingWindow = omit,
        $concurrentCallLimit = omit,
        $dailySpendLimit = omit,
        $dailySpendLimitEnabled = omit,
        $enabled = omit,
        $maxDestinationRate = omit,
        $servicePlan = omit,
        $tags = omit,
        $trafficType = omit,
        $usagePaymentMethod = omit,
        $whitelistedDestinations = omit,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileNewResponse {
        $params = [
            'name' => $name,
            'billingGroupID' => $billingGroupID,
            'callRecording' => $callRecording,
            'callingWindow' => $callingWindow,
            'concurrentCallLimit' => $concurrentCallLimit,
            'dailySpendLimit' => $dailySpendLimit,
            'dailySpendLimitEnabled' => $dailySpendLimitEnabled,
            'enabled' => $enabled,
            'maxDestinationRate' => $maxDestinationRate,
            'servicePlan' => $servicePlan,
            'tags' => $tags,
            'trafficType' => $trafficType,
            'usagePaymentMethod' => $usagePaymentMethod,
            'whitelistedDestinations' => $whitelistedDestinations,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileNewResponse {
        [$parsed, $options] = OutboundVoiceProfileCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $name a user-supplied name to help with organization
     * @param string|null $billingGroupID The ID of the billing group associated with the outbound proflile. Defaults to null (for no group assigned).
     * @param OutboundCallRecording $callRecording
     * @param OutboundVoiceProfileUpdateParams\CallingWindow $callingWindow (BETA) Specifies the time window and call limits for calls made using this outbound voice profile
     * @param int|null $concurrentCallLimit Must be no more than your global concurrent call limit. Null means no limit.
     * @param string $dailySpendLimit the maximum amount of usage charges, in USD, you want Telnyx to allow on this outbound voice profile in a day before disallowing new calls
     * @param bool $dailySpendLimitEnabled specifies whether to enforce the daily_spend_limit on this outbound voice profile
     * @param bool $enabled Specifies whether the outbound voice profile can be used. Disabled profiles will result in outbound calls being blocked for the associated Connections.
     * @param float $maxDestinationRate maximum rate (price per minute) for a Destination to be allowed when making outbound calls
     * @param ServicePlan|value-of<ServicePlan> $servicePlan indicates the coverage of the termination regions
     * @param list<string> $tags
     * @param TrafficType|value-of<TrafficType> $trafficType specifies the type of traffic allowed in this profile
     * @param UsagePaymentMethod|value-of<UsagePaymentMethod> $usagePaymentMethod setting for how costs for outbound profile are calculated
     * @param list<string> $whitelistedDestinations the list of destinations you want to be able to call using this outbound voice profile formatted in alpha2
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $name,
        $billingGroupID = omit,
        $callRecording = omit,
        $callingWindow = omit,
        $concurrentCallLimit = omit,
        $dailySpendLimit = omit,
        $dailySpendLimitEnabled = omit,
        $enabled = omit,
        $maxDestinationRate = omit,
        $servicePlan = omit,
        $tags = omit,
        $trafficType = omit,
        $usagePaymentMethod = omit,
        $whitelistedDestinations = omit,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileUpdateResponse {
        $params = [
            'name' => $name,
            'billingGroupID' => $billingGroupID,
            'callRecording' => $callRecording,
            'callingWindow' => $callingWindow,
            'concurrentCallLimit' => $concurrentCallLimit,
            'dailySpendLimit' => $dailySpendLimit,
            'dailySpendLimitEnabled' => $dailySpendLimitEnabled,
            'enabled' => $enabled,
            'maxDestinationRate' => $maxDestinationRate,
            'servicePlan' => $servicePlan,
            'tags' => $tags,
            'trafficType' => $trafficType,
            'usagePaymentMethod' => $usagePaymentMethod,
            'whitelistedDestinations' => $whitelistedDestinations,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileUpdateResponse {
        [$parsed, $options] = OutboundVoiceProfileUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name][contains]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code>-</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>name</code>: sorts the result by the
     *     <code>name</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-name</code>: sorts the result by the
     *     <code>name</code> field in descending order.
     *   </li>
     * </ul> <br/>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): OutboundVoiceProfileListResponse {
        [$parsed, $options] = OutboundVoiceProfileListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'outbound_voice_profiles',
            query: $parsed,
            options: $options,
            convert: OutboundVoiceProfileListResponse::class,
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
