<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingProfiles;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams\Op;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\CreatedAt;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\UpdatedAt;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type CreatedAtShape from \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\CreatedAt
 * @phpstan-import-type UpdatedAtShape from \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\UpdatedAt
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AutorespConfigsContract
{
    /**
     * @api
     *
     * @param string $profileID unique identifier of the profile
     * @param list<string> $keywords
     * @param Op|value-of<Op> $op
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $profileID,
        string $countryCode,
        array $keywords,
        Op|string $op,
        ?string $respText = null,
        RequestOptions|array|null $requestOptions = null,
    ): AutoRespConfigResponse;

    /**
     * @api
     *
     * @param string $autorespCfgID unique identifier of the autoresp cfg
     * @param string $profileID unique identifier of the profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        string $profileID,
        RequestOptions|array|null $requestOptions = null,
    ): AutoRespConfigResponse;

    /**
     * @api
     *
     * @param string $autorespCfgID path param: Unique identifier of the autoresp cfg
     * @param string $profileID path param: Unique identifier of the profile
     * @param string $countryCode Body param
     * @param list<string> $keywords Body param
     * @param \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op|value-of<\Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op> $op Body param
     * @param string $respText Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $autorespCfgID,
        string $profileID,
        string $countryCode,
        array $keywords,
        \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op|string $op,
        ?string $respText = null,
        RequestOptions|array|null $requestOptions = null,
    ): AutoRespConfigResponse;

    /**
     * @api
     *
     * @param string $profileID unique identifier of the profile
     * @param string $countryCode filter results by country code
     * @param CreatedAt|CreatedAtShape $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param UpdatedAt|UpdatedAtShape $updatedAt Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        ?string $countryCode = null,
        CreatedAt|array|null $createdAt = null,
        UpdatedAt|array|null $updatedAt = null,
        RequestOptions|array|null $requestOptions = null,
    ): AutorespConfigListResponse;

    /**
     * @api
     *
     * @param string $autorespCfgID unique identifier of the autoresp cfg
     * @param string $profileID unique identifier of the profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        string $profileID,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
