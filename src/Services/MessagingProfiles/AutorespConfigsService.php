<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingProfiles;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigDeleteParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigRetrieveParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfiles\AutorespConfigsContract;

final class AutorespConfigsService implements AutorespConfigsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create Auto-Reponse Setting
     *
     * @param array{
     *   country_code: string,
     *   keywords: list<string>,
     *   op: 'start'|'stop'|'info',
     *   resp_text?: string,
     * }|AutorespConfigCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $profileID,
        array|AutorespConfigCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse {
        [$parsed, $options] = AutorespConfigCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['messaging_profiles/%1$s/autoresp_configs', $profileID],
            body: (object) $parsed,
            options: $options,
            convert: AutoRespConfigResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Auto-Response Setting
     *
     * @param array{profile_id: string}|AutorespConfigRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        array|AutorespConfigRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse {
        [$parsed, $options] = AutorespConfigRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $profileID = $parsed['profile_id'];
        unset($parsed['profile_id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'messaging_profiles/%1$s/autoresp_configs/%2$s',
                $profileID,
                $autorespCfgID,
            ],
            options: $options,
            convert: AutoRespConfigResponse::class,
        );
    }

    /**
     * @api
     *
     * Update Auto-Response Setting
     *
     * @param array{
     *   profile_id: string,
     *   country_code: string,
     *   keywords: list<string>,
     *   op: 'start'|'stop'|'info',
     *   resp_text?: string,
     * }|AutorespConfigUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $autorespCfgID,
        array|AutorespConfigUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse {
        [$parsed, $options] = AutorespConfigUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $profileID = $parsed['profile_id'];
        unset($parsed['profile_id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'messaging_profiles/%1$s/autoresp_configs/%2$s',
                $profileID,
                $autorespCfgID,
            ],
            body: (object) array_diff_key($parsed, ['profile_id']),
            options: $options,
            convert: AutoRespConfigResponse::class,
        );
    }

    /**
     * @api
     *
     * List Auto-Response Settings
     *
     * @param array{
     *   country_code?: string,
     *   created_at?: array{gte?: string, lte?: string},
     *   updated_at?: array{gte?: string, lte?: string},
     * }|AutorespConfigListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        array|AutorespConfigListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutorespConfigListResponse {
        [$parsed, $options] = AutorespConfigListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s/autoresp_configs', $profileID],
            query: $parsed,
            options: $options,
            convert: AutorespConfigListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete Auto-Response Setting
     *
     * @param array{profile_id: string}|AutorespConfigDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        array|AutorespConfigDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = AutorespConfigDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $profileID = $parsed['profile_id'];
        unset($parsed['profile_id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'messaging_profiles/%1$s/autoresp_configs/%2$s',
                $profileID,
                $autorespCfgID,
            ],
            options: $options,
            convert: 'string',
        );
    }
}
