<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingProfiles;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams\Op;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigDeleteParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\CreatedAt;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\UpdatedAt;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigRetrieveParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op as Op1;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfiles\AutorespConfigsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $countryCode
     * @param list<string> $keywords
     * @param Op|value-of<Op> $op
     * @param string $respText
     *
     * @return AutoRespConfigResponse<HasRawResponse>
     */
    public function create(
        string $profileID,
        $countryCode,
        $keywords,
        $op,
        $respText = omit,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse {
        [$parsed, $options] = AutorespConfigCreateParams::parseRequest(
            [
                'countryCode' => $countryCode,
                'keywords' => $keywords,
                'op' => $op,
                'respText' => $respText,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @param string $profileID
     *
     * @return AutoRespConfigResponse<HasRawResponse>
     */
    public function retrieve(
        string $autorespCfgID,
        $profileID,
        ?RequestOptions $requestOptions = null
    ): AutoRespConfigResponse {
        [$parsed, $options] = AutorespConfigRetrieveParams::parseRequest(
            ['profileID' => $profileID],
            $requestOptions
        );
        $profileID = $parsed['profileID'];
        unset($parsed['profileID']);

        // @phpstan-ignore-next-line;
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
     * @param string $profileID
     * @param string $countryCode
     * @param list<string> $keywords
     * @param Op1|value-of<Op1> $op
     * @param string $respText
     *
     * @return AutoRespConfigResponse<HasRawResponse>
     */
    public function update(
        string $autorespCfgID,
        $profileID,
        $countryCode,
        $keywords,
        $op,
        $respText = omit,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse {
        [$parsed, $options] = AutorespConfigUpdateParams::parseRequest(
            [
                'profileID' => $profileID,
                'countryCode' => $countryCode,
                'keywords' => $keywords,
                'op' => $op,
                'respText' => $respText,
            ],
            $requestOptions,
        );
        $profileID = $parsed['profileID'];
        unset($parsed['profileID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'messaging_profiles/%1$s/autoresp_configs/%2$s',
                $profileID,
                $autorespCfgID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['profileID'])),
            options: $options,
            convert: AutoRespConfigResponse::class,
        );
    }

    /**
     * @api
     *
     * List Auto-Response Settings
     *
     * @param string $countryCode
     * @param CreatedAt $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param UpdatedAt $updatedAt Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte]
     *
     * @return AutorespConfigListResponse<HasRawResponse>
     */
    public function list(
        string $profileID,
        $countryCode = omit,
        $createdAt = omit,
        $updatedAt = omit,
        ?RequestOptions $requestOptions = null,
    ): AutorespConfigListResponse {
        [$parsed, $options] = AutorespConfigListParams::parseRequest(
            [
                'countryCode' => $countryCode,
                'createdAt' => $createdAt,
                'updatedAt' => $updatedAt,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @param string $profileID
     */
    public function delete(
        string $autorespCfgID,
        $profileID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AutorespConfigDeleteParams::parseRequest(
            ['profileID' => $profileID],
            $requestOptions
        );
        $profileID = $parsed['profileID'];
        unset($parsed['profileID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'messaging_profiles/%1$s/autoresp_configs/%2$s',
                $profileID,
                $autorespCfgID,
            ],
            options: $options,
            convert: 'mixed',
        );
    }
}
