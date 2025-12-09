<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingProfiles;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams\Op;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Telnyx\RequestOptions;

interface AutorespConfigsContract
{
    /**
     * @api
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
    ): AutoRespConfigResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        string $profileID,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse;

    /**
     * @api
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
    ): AutoRespConfigResponse;

    /**
     * @api
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
    ): AutorespConfigListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        string $profileID,
        ?RequestOptions $requestOptions = null,
    ): string;
}
