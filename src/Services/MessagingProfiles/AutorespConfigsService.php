<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingProfiles;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams\Op;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfiles\AutorespConfigsContract;

final class AutorespConfigsService implements AutorespConfigsContract
{
    /**
     * @api
     */
    public AutorespConfigsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AutorespConfigsRawService($client);
    }

    /**
     * @api
     *
     * Create Auto-Reponse Setting
     *
     * @param list<string> $keywords
     * @param 'start'|'stop'|'info'|Op $op
     *
     * @throws APIException
     */
    public function create(
        string $profileID,
        string $countryCode,
        array $keywords,
        string|Op $op,
        ?string $respText = null,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse {
        $params = [
            'countryCode' => $countryCode,
            'keywords' => $keywords,
            'op' => $op,
            'respText' => $respText,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Auto-Response Setting
     *
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        string $profileID,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse {
        $params = ['profileID' => $profileID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($autorespCfgID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update Auto-Response Setting
     *
     * @param string $autorespCfgID Path param:
     * @param string $profileID Path param:
     * @param string $countryCode Body param:
     * @param list<string> $keywords Body param:
     * @param 'start'|'stop'|'info'|\Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op $op Body param:
     * @param string $respText Body param:
     *
     * @throws APIException
     */
    public function update(
        string $autorespCfgID,
        string $profileID,
        string $countryCode,
        array $keywords,
        string|\Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op $op,
        ?string $respText = null,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse {
        $params = [
            'profileID' => $profileID,
            'countryCode' => $countryCode,
            'keywords' => $keywords,
            'op' => $op,
            'respText' => $respText,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($autorespCfgID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List Auto-Response Settings
     *
     * @param array{
     *   gte?: string, lte?: string
     * } $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param array{
     *   gte?: string, lte?: string
     * } $updatedAt Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte]
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        ?string $countryCode = null,
        ?array $createdAt = null,
        ?array $updatedAt = null,
        ?RequestOptions $requestOptions = null,
    ): AutorespConfigListResponse {
        $params = [
            'countryCode' => $countryCode,
            'createdAt' => $createdAt,
            'updatedAt' => $updatedAt,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete Auto-Response Setting
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        string $profileID,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = ['profileID' => $profileID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($autorespCfgID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
