<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\TexmlApplications\TexmlApplication;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Outbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\VoiceMethod;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Filter;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Page;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Sort;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;

/**
 * @phpstan-import-type InboundShape from \Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\TexmlApplications\TexmlApplicationCreateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type OutboundShape from \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Outbound as OutboundShape1
 * @phpstan-import-type FilterShape from \Telnyx\TexmlApplications\TexmlApplicationListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\TexmlApplications\TexmlApplicationListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TexmlApplicationsContract
{
    /**
     * @api
     *
     * @param string $friendlyName a user-assigned name to help manage the application
     * @param string $voiceURL URL to which Telnyx will deliver your XML Translator webhooks
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this TeXML Application
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param Inbound|InboundShape $inbound
     * @param Outbound|OutboundShape $outbound
     * @param string $statusCallback URL for Telnyx to send requests to containing information about call progress events
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod HTTP request method Telnyx should use when requesting the status_callback URL
     * @param list<string> $tags tags associated with the Texml Application
     * @param string $voiceFallbackURL URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url
     * @param VoiceMethod|value-of<VoiceMethod> $voiceMethod HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $friendlyName,
        string $voiceURL,
        bool $active = true,
        AnchorsiteOverride|string $anchorsiteOverride = 'Latency',
        bool $callCostInWebhooks = false,
        DtmfType|string $dtmfType = 'RFC 2833',
        bool $firstCommandTimeout = false,
        int $firstCommandTimeoutSecs = 30,
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string $statusCallbackMethod = 'post',
        ?array $tags = null,
        ?string $voiceFallbackURL = null,
        VoiceMethod|string $voiceMethod = 'post',
        RequestOptions|array|null $requestOptions = null,
    ): TexmlApplicationNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TexmlApplicationGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $friendlyName a user-assigned name to help manage the application
     * @param string $voiceURL URL to which Telnyx will deliver your XML Translator webhooks
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this TeXML Application
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Inbound|InboundShape1 $inbound
     * @param \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Outbound|OutboundShape1 $outbound
     * @param string $statusCallback URL for Telnyx to send requests to containing information about call progress events
     * @param \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\StatusCallbackMethod|value-of<\Telnyx\TexmlApplications\TexmlApplicationUpdateParams\StatusCallbackMethod> $statusCallbackMethod HTTP request method Telnyx should use when requesting the status_callback URL
     * @param list<string> $tags tags associated with the Texml Application
     * @param string $voiceFallbackURL URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url
     * @param \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\VoiceMethod|value-of<\Telnyx\TexmlApplications\TexmlApplicationUpdateParams\VoiceMethod> $voiceMethod HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $friendlyName,
        string $voiceURL,
        bool $active = true,
        AnchorsiteOverride|string $anchorsiteOverride = 'Latency',
        bool $callCostInWebhooks = false,
        DtmfType|string $dtmfType = 'RFC 2833',
        bool $firstCommandTimeout = false,
        int $firstCommandTimeoutSecs = 30,
        \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Inbound|array|null $inbound = null,
        \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Outbound|array|null $outbound = null,
        ?string $statusCallback = null,
        \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\StatusCallbackMethod|string $statusCallbackMethod = 'post',
        ?array $tags = null,
        ?string $voiceFallbackURL = null,
        \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\VoiceMethod|string $voiceMethod = 'post',
        RequestOptions|array|null $requestOptions = null,
    ): TexmlApplicationUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[outbound_voice_profile_id], filter[friendly_name]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<TexmlApplication>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string $sort = 'created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TexmlApplicationDeleteResponse;
}
