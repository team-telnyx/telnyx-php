<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingProfiles;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     * @throws APIException
     */
    public function create(
        string $profileID,
        $countryCode,
        $keywords,
        $op,
        $respText = omit,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse {
        $params = [
            'countryCode' => $countryCode,
            'keywords' => $keywords,
            'op' => $op,
            'respText' => $respText,
        ];

        return $this->createRaw($profileID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $profileID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AutoRespConfigResponse {
        [$parsed, $options] = AutorespConfigCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        $profileID,
        ?RequestOptions $requestOptions = null
    ): AutoRespConfigResponse {
        $params = ['profileID' => $profileID];

        return $this->retrieveRaw($autorespCfgID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $autorespCfgID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AutoRespConfigResponse {
        [$parsed, $options] = AutorespConfigRetrieveParams::parseRequest(
            $params,
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
     * @param Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op|value-of<Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op> $op
     * @param string $respText
     *
     * @throws APIException
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
        $params = [
            'profileID' => $profileID,
            'countryCode' => $countryCode,
            'keywords' => $keywords,
            'op' => $op,
            'respText' => $respText,
        ];

        return $this->updateRaw($autorespCfgID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $autorespCfgID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AutoRespConfigResponse {
        [$parsed, $options] = AutorespConfigUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $countryCode
     * @param CreatedAt $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param UpdatedAt $updatedAt Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte]
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        $countryCode = omit,
        $createdAt = omit,
        $updatedAt = omit,
        ?RequestOptions $requestOptions = null,
    ): AutorespConfigListResponse {
        $params = [
            'countryCode' => $countryCode,
            'createdAt' => $createdAt,
            'updatedAt' => $updatedAt,
        ];

        return $this->listRaw($profileID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $profileID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AutorespConfigListResponse {
        [$parsed, $options] = AutorespConfigListParams::parseRequest(
            $params,
            $requestOptions
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
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        $profileID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['profileID' => $profileID];

        return $this->deleteRaw($autorespCfgID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $autorespCfgID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AutorespConfigDeleteParams::parseRequest(
            $params,
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
