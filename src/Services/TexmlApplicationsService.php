<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TexmlApplicationsContract;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\VoiceMethod;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Sort;
use Telnyx\TexmlApplications\TexmlApplicationListResponse;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;

final class TexmlApplicationsService implements TexmlApplicationsContract
{
    /**
     * @api
     */
    public TexmlApplicationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TexmlApplicationsRawService($client);
    }

    /**
     * @api
     *
     * Creates a TeXML Application.
     *
     * @param string $friendlyName a user-assigned name to help manage the application
     * @param string $voiceURL URL to which Telnyx will deliver your XML Translator webhooks
     * @param bool $active specifies whether the connection can be used
     * @param 'Latency'|'Chicago, IL'|'Ashburn, VA'|'San Jose, CA'|'Sydney, Australia'|'Amsterdam, Netherlands'|'London, UK'|'Toronto, Canada'|'Vancouver, Canada'|'Frankfurt, Germany'|AnchorsiteOverride $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this TeXML Application
     * @param 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param array{
     *   channelLimit?: int,
     *   shakenStirEnabled?: bool,
     *   sipSubdomain?: string,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     * } $inbound
     * @param array{channelLimit?: int, outboundVoiceProfileID?: string} $outbound
     * @param string $statusCallback URL for Telnyx to send requests to containing information about call progress events
     * @param 'get'|'post'|StatusCallbackMethod $statusCallbackMethod HTTP request method Telnyx should use when requesting the status_callback URL
     * @param list<string> $tags tags associated with the Texml Application
     * @param string $voiceFallbackURL URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url
     * @param 'get'|'post'|VoiceMethod $voiceMethod HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @throws APIException
     */
    public function create(
        string $friendlyName,
        string $voiceURL,
        bool $active = true,
        string|AnchorsiteOverride $anchorsiteOverride = 'Latency',
        bool $callCostInWebhooks = false,
        string|DtmfType $dtmfType = 'RFC 2833',
        bool $firstCommandTimeout = false,
        int $firstCommandTimeoutSecs = 30,
        ?array $inbound = null,
        ?array $outbound = null,
        ?string $statusCallback = null,
        string|StatusCallbackMethod $statusCallbackMethod = 'post',
        ?array $tags = null,
        ?string $voiceFallbackURL = null,
        string|VoiceMethod $voiceMethod = 'post',
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationNewResponse {
        $params = [
            'friendlyName' => $friendlyName,
            'voiceURL' => $voiceURL,
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
            'callCostInWebhooks' => $callCostInWebhooks,
            'dtmfType' => $dtmfType,
            'firstCommandTimeout' => $firstCommandTimeout,
            'firstCommandTimeoutSecs' => $firstCommandTimeoutSecs,
            'inbound' => $inbound,
            'outbound' => $outbound,
            'statusCallback' => $statusCallback,
            'statusCallbackMethod' => $statusCallbackMethod,
            'tags' => $tags,
            'voiceFallbackURL' => $voiceFallbackURL,
            'voiceMethod' => $voiceMethod,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of an existing TeXML Application.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates settings of an existing TeXML Application.
     *
     * @param string $id identifies the resource
     * @param string $friendlyName a user-assigned name to help manage the application
     * @param string $voiceURL URL to which Telnyx will deliver your XML Translator webhooks
     * @param bool $active specifies whether the connection can be used
     * @param 'Latency'|'Chicago, IL'|'Ashburn, VA'|'San Jose, CA'|'Sydney, Australia'|'Amsterdam, Netherlands'|'London, UK'|'Toronto, Canada'|'Vancouver, Canada'|'Frankfurt, Germany'|AnchorsiteOverride $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this TeXML Application
     * @param 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param array{
     *   channelLimit?: int,
     *   shakenStirEnabled?: bool,
     *   sipSubdomain?: string,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|\Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Inbound\SipSubdomainReceiveSettings,
     * } $inbound
     * @param array{channelLimit?: int, outboundVoiceProfileID?: string} $outbound
     * @param string $statusCallback URL for Telnyx to send requests to containing information about call progress events
     * @param 'get'|'post'|\Telnyx\TexmlApplications\TexmlApplicationUpdateParams\StatusCallbackMethod $statusCallbackMethod HTTP request method Telnyx should use when requesting the status_callback URL
     * @param list<string> $tags tags associated with the Texml Application
     * @param string $voiceFallbackURL URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url
     * @param 'get'|'post'|\Telnyx\TexmlApplications\TexmlApplicationUpdateParams\VoiceMethod $voiceMethod HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $friendlyName,
        string $voiceURL,
        bool $active = true,
        string|AnchorsiteOverride $anchorsiteOverride = 'Latency',
        bool $callCostInWebhooks = false,
        string|DtmfType $dtmfType = 'RFC 2833',
        bool $firstCommandTimeout = false,
        int $firstCommandTimeoutSecs = 30,
        ?array $inbound = null,
        ?array $outbound = null,
        ?string $statusCallback = null,
        string|\Telnyx\TexmlApplications\TexmlApplicationUpdateParams\StatusCallbackMethod $statusCallbackMethod = 'post',
        ?array $tags = null,
        ?string $voiceFallbackURL = null,
        string|\Telnyx\TexmlApplications\TexmlApplicationUpdateParams\VoiceMethod $voiceMethod = 'post',
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationUpdateResponse {
        $params = [
            'friendlyName' => $friendlyName,
            'voiceURL' => $voiceURL,
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
            'callCostInWebhooks' => $callCostInWebhooks,
            'dtmfType' => $dtmfType,
            'firstCommandTimeout' => $firstCommandTimeout,
            'firstCommandTimeoutSecs' => $firstCommandTimeoutSecs,
            'inbound' => $inbound,
            'outbound' => $outbound,
            'statusCallback' => $statusCallback,
            'statusCallbackMethod' => $statusCallbackMethod,
            'tags' => $tags,
            'voiceFallbackURL' => $voiceFallbackURL,
            'voiceMethod' => $voiceMethod,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your TeXML Applications.
     *
     * @param array{
     *   friendlyName?: string, outboundVoiceProfileID?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[outbound_voice_profile_id], filter[friendly_name]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param 'created_at'|'friendly_name'|'active'|Sort $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>friendly_name</code>: sorts the result by the
     *     <code>friendly_name</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-friendly_name</code>: sorts the result by the
     *     <code>friendly_name</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort $sort = 'created_at',
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a TeXML Application.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
