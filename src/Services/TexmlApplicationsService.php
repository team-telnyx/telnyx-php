<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TexmlApplicationsContract;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationListParams;
use Telnyx\TexmlApplications\TexmlApplicationListResponse;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;

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
     * @param array{
     *   friendly_name: string,
     *   voice_url: string,
     *   active?: bool,
     *   anchorsite_override?: value-of<AnchorsiteOverride>,
     *   dtmf_type?: "RFC 2833"|"Inband"|"SIP INFO"|DtmfType,
     *   first_command_timeout?: bool,
     *   first_command_timeout_secs?: int,
     *   inbound?: array{
     *     channel_limit?: int,
     *     shaken_stir_enabled?: bool,
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: "only_my_connections"|"from_anyone",
     *   },
     *   outbound?: array{channel_limit?: int, outbound_voice_profile_id?: string},
     *   status_callback?: string,
     *   status_callback_method?: "get"|"post",
     *   tags?: list<string>,
     *   voice_fallback_url?: string,
     *   voice_method?: "get"|"post",
     * }|TexmlApplicationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TexmlApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationNewResponse {
        [$parsed, $options] = TexmlApplicationCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
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
     * @param array{
     *   friendly_name: string,
     *   voice_url: string,
     *   active?: bool,
     *   anchorsite_override?: value-of<AnchorsiteOverride>,
     *   dtmf_type?: "RFC 2833"|"Inband"|"SIP INFO"|DtmfType,
     *   first_command_timeout?: bool,
     *   first_command_timeout_secs?: int,
     *   inbound?: array{
     *     channel_limit?: int,
     *     shaken_stir_enabled?: bool,
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: "only_my_connections"|"from_anyone",
     *   },
     *   outbound?: array{channel_limit?: int, outbound_voice_profile_id?: string},
     *   status_callback?: string,
     *   status_callback_method?: "get"|"post",
     *   tags?: list<string>,
     *   voice_fallback_url?: string,
     *   voice_method?: "get"|"post",
     * }|TexmlApplicationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TexmlApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationUpdateResponse {
        [$parsed, $options] = TexmlApplicationUpdateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   filter?: array{friendly_name?: string, outbound_voice_profile_id?: string},
     *   page?: array{number?: int, size?: int},
     *   sort?: "created_at"|"friendly_name"|"active",
     * }|TexmlApplicationListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|TexmlApplicationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationListResponse {
        [$parsed, $options] = TexmlApplicationListParams::parseRequest(
            $params,
            $requestOptions,
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
     * @throws APIException
     */
    public function delete(
        string $id,
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
