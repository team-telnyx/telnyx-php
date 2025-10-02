<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TexmlApplicationsContract;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Outbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\VoiceMethod;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationListParams;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Filter;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Page;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Sort;
use Telnyx\TexmlApplications\TexmlApplicationListResponse;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;

use const Telnyx\Core\OMIT as omit;

final class TexmlApplicationsService implements TexmlApplicationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a TeXML Application.
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
    ): TexmlApplicationNewResponse {
        $params = [
            'friendlyName' => $friendlyName,
            'voiceURL' => $voiceURL,
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
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

        return $this->createRaw($params, $requestOptions);
    }

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
    ): TexmlApplicationNewResponse {
        [$parsed, $options] = TexmlApplicationCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'texml_applications',
            body: (object) $parsed,
            options: $options,
            convert: TexmlApplicationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing TeXML Application.
     *
     * @return TexmlApplicationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

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
    ): TexmlApplicationGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['texml_applications/%1$s', $id],
            options: $requestOptions,
            convert: TexmlApplicationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing TeXML Application.
     *
     * @param string $friendlyName a user-assigned name to help manage the application
     * @param string $voiceURL URL to which Telnyx will deliver your XML Translator webhooks
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $firstCommandTimeout specifies whether calls to phone numbers associated with this connection should hangup after timing out
     * @param int $firstCommandTimeoutSecs specifies how many seconds to wait before timing out a dial command
     * @param Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Inbound $inbound
     * @param Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Outbound $outbound
     * @param string $statusCallback URL for Telnyx to send requests to containing information about call progress events
     * @param telnyx\TexmlApplications\TexmlApplicationUpdateParams\StatusCallbackMethod|value-of<Telnyx\TexmlApplications\TexmlApplicationUpdateParams\StatusCallbackMethod> $statusCallbackMethod HTTP request method Telnyx should use when requesting the status_callback URL
     * @param list<string> $tags tags associated with the Texml Application
     * @param string $voiceFallbackURL URL to which Telnyx will deliver your XML Translator webhooks if we get an error response from your voice_url
     * @param Telnyx\TexmlApplications\TexmlApplicationUpdateParams\VoiceMethod|value-of<Telnyx\TexmlApplications\TexmlApplicationUpdateParams\VoiceMethod> $voiceMethod HTTP request method Telnyx will use to interact with your XML Translator webhooks. Either 'get' or 'post'.
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
    ): TexmlApplicationUpdateResponse {
        $params = [
            'friendlyName' => $friendlyName,
            'voiceURL' => $voiceURL,
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
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

        return $this->updateRaw($id, $params, $requestOptions);
    }

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
    ): TexmlApplicationUpdateResponse {
        [$parsed, $options] = TexmlApplicationUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['texml_applications/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: TexmlApplicationUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your TeXML Applications.
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
    ): TexmlApplicationListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): TexmlApplicationListResponse {
        [$parsed, $options] = TexmlApplicationListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'texml_applications',
            query: $parsed,
            options: $options,
            convert: TexmlApplicationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a TeXML Application.
     *
     * @return TexmlApplicationDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

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
    ): TexmlApplicationDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['texml_applications/%1$s', $id],
            options: $requestOptions,
            convert: TexmlApplicationDeleteResponse::class,
        );
    }
}
