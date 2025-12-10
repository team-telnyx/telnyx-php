<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TexmlApplicationsRawContract;
use Telnyx\TexmlApplications\TexmlApplication;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\VoiceMethod;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationListParams;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Sort;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;

final class TexmlApplicationsRawService implements TexmlApplicationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a TeXML Application.
     *
     * @param array{
     *   friendlyName: string,
     *   voiceURL: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   callCostInWebhooks?: bool,
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   firstCommandTimeout?: bool,
     *   firstCommandTimeoutSecs?: int,
     *   inbound?: array{
     *     channelLimit?: int,
     *     shakenStirEnabled?: bool,
     *     sipSubdomain?: string,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *   },
     *   outbound?: array{channelLimit?: int, outboundVoiceProfileID?: string},
     *   statusCallback?: string,
     *   statusCallbackMethod?: 'get'|'post'|StatusCallbackMethod,
     *   tags?: list<string>,
     *   voiceFallbackURL?: string,
     *   voiceMethod?: 'get'|'post'|VoiceMethod,
     * }|TexmlApplicationCreateParams $params
     *
     * @return BaseResponse<TexmlApplicationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TexmlApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TexmlApplicationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     *
     * @return BaseResponse<TexmlApplicationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param array{
     *   friendlyName: string,
     *   voiceURL: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   callCostInWebhooks?: bool,
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   firstCommandTimeout?: bool,
     *   firstCommandTimeoutSecs?: int,
     *   inbound?: array{
     *     channelLimit?: int,
     *     shakenStirEnabled?: bool,
     *     sipSubdomain?: string,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|TexmlApplicationUpdateParams\Inbound\SipSubdomainReceiveSettings,
     *   },
     *   outbound?: array{channelLimit?: int, outboundVoiceProfileID?: string},
     *   statusCallback?: string,
     *   statusCallbackMethod?: 'get'|'post'|TexmlApplicationUpdateParams\StatusCallbackMethod,
     *   tags?: list<string>,
     *   voiceFallbackURL?: string,
     *   voiceMethod?: 'get'|'post'|TexmlApplicationUpdateParams\VoiceMethod,
     * }|TexmlApplicationUpdateParams $params
     *
     * @return BaseResponse<TexmlApplicationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TexmlApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TexmlApplicationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: array{friendlyName?: string, outboundVoiceProfileID?: string},
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'friendly_name'|'active'|Sort,
     * }|TexmlApplicationListParams $params
     *
     * @return BaseResponse<DefaultPagination<TexmlApplication>>
     *
     * @throws APIException
     */
    public function list(
        array|TexmlApplicationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TexmlApplicationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'texml_applications',
            query: $parsed,
            options: $options,
            convert: TexmlApplication::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes a TeXML Application.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<TexmlApplicationDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['texml_applications/%1$s', $id],
            options: $requestOptions,
            convert: TexmlApplicationDeleteResponse::class,
        );
    }
}
