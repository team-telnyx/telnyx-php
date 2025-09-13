<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\RequestOptions;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Outbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\VoiceMethod;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Filter;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Page;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Sort;
use Telnyx\TexmlApplications\TexmlApplicationListResponse;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Inbound as Inbound1;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Outbound as Outbound1;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams\StatusCallbackMethod as StatusCallbackMethod1;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams\VoiceMethod as VoiceMethod1;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface TexmlApplicationsContract
{
    /**
     * @api
     *
     * @param string $friendlyName a user-assigned name to help manage the application
     * @param string $voiceURL URL to which Telnyx will deliver your XML Translator webhooks
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param Inbound $inbound
     * @param Outbound $outbound
     * @param string $statusCallback URL for Telnyx to send requests to containing information about call progress events
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod HTTP request method Telnyx should use when requesting the status_callback URL
     * @param list<string> $tags tags associated with the Texml Application
     * @param string $voiceFallbackURL URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url
     * @param VoiceMethod|value-of<VoiceMethod> $voiceMethod HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @return TexmlApplicationNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $friendlyName,
        $voiceURL,
        $active = omit,
        $anchorsiteOverride = omit,
        $dtmfType = omit,
        $firstCommandTimeout = omit,
        $firstCommandTimeoutSecs = omit,
        $inbound = omit,
        $outbound = omit,
        $statusCallback = omit,
        $statusCallbackMethod = omit,
        $tags = omit,
        $voiceFallbackURL = omit,
        $voiceMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TexmlApplicationNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationNewResponse;

    /**
     * @api
     *
     * @return TexmlApplicationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationGetResponse;

    /**
     * @api
     *
     * @return TexmlApplicationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationGetResponse;

    /**
     * @api
     *
     * @param string $friendlyName a user-assigned name to help manage the application
     * @param string $voiceURL URL to which Telnyx will deliver your XML Translator webhooks
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param Inbound1 $inbound
     * @param Outbound1 $outbound
     * @param string $statusCallback URL for Telnyx to send requests to containing information about call progress events
     * @param StatusCallbackMethod1|value-of<StatusCallbackMethod1> $statusCallbackMethod HTTP request method Telnyx should use when requesting the status_callback URL
     * @param list<string> $tags tags associated with the Texml Application
     * @param string $voiceFallbackURL URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url
     * @param VoiceMethod1|value-of<VoiceMethod1> $voiceMethod HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
     *
     * @return TexmlApplicationUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $friendlyName,
        $voiceURL,
        $active = omit,
        $anchorsiteOverride = omit,
        $dtmfType = omit,
        $firstCommandTimeout = omit,
        $firstCommandTimeoutSecs = omit,
        $inbound = omit,
        $outbound = omit,
        $statusCallback = omit,
        $statusCallbackMethod = omit,
        $tags = omit,
        $voiceFallbackURL = omit,
        $voiceMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TexmlApplicationUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[outbound_voice_profile_id], filter[friendly_name]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
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
     *
     * @return TexmlApplicationListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TexmlApplicationListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationListResponse;

    /**
     * @api
     *
     * @return TexmlApplicationDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationDeleteResponse;

    /**
     * @api
     *
     * @return TexmlApplicationDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationDeleteResponse;
}
