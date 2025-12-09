<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingProfiles;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams\Op;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigDeleteParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigRetrieveParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfiles\AutorespConfigsRawContract;

final class AutorespConfigsRawService implements AutorespConfigsRawContract
{
    // @phpstan-ignore-next-line
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
     *   countryCode: string,
     *   keywords: list<string>,
     *   op: 'start'|'stop'|'info'|Op,
     *   respText?: string,
     * }|AutorespConfigCreateParams $params
     *
     * @return BaseResponse<AutoRespConfigResponse>
     *
     * @throws APIException
     */
    public function create(
        string $profileID,
        array|AutorespConfigCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
     * @param array{profileID: string}|AutorespConfigRetrieveParams $params
     *
     * @return BaseResponse<AutoRespConfigResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        array|AutorespConfigRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AutorespConfigRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $profileID = $parsed['profileID'];
        unset($parsed['profileID']);

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
     * @param string $autorespCfgID Path param:
     * @param array{
     *   profileID: string,
     *   countryCode: string,
     *   keywords: list<string>,
     *   op: 'start'|'stop'|'info'|AutorespConfigUpdateParams\Op,
     *   respText?: string,
     * }|AutorespConfigUpdateParams $params
     *
     * @return BaseResponse<AutoRespConfigResponse>
     *
     * @throws APIException
     */
    public function update(
        string $autorespCfgID,
        array|AutorespConfigUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AutorespConfigUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $profileID = $parsed['profileID'];
        unset($parsed['profileID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'messaging_profiles/%1$s/autoresp_configs/%2$s',
                $profileID,
                $autorespCfgID,
            ],
            body: (object) array_diff_key($parsed, ['profileID']),
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
     *   countryCode?: string,
     *   createdAt?: array{gte?: string, lte?: string},
     *   updatedAt?: array{gte?: string, lte?: string},
     * }|AutorespConfigListParams $params
     *
     * @return BaseResponse<AutorespConfigListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        array|AutorespConfigListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AutorespConfigListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['messaging_profiles/%1$s/autoresp_configs', $profileID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'countryCode' => 'country_code',
                    'createdAt' => 'created_at',
                    'updatedAt' => 'updated_at',
                ],
            ),
            options: $options,
            convert: AutorespConfigListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete Auto-Response Setting
     *
     * @param array{profileID: string}|AutorespConfigDeleteParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        array|AutorespConfigDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AutorespConfigDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $profileID = $parsed['profileID'];
        unset($parsed['profileID']);

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
