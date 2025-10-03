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

use const Telnyx\Core\OMIT as omit;

interface AutorespConfigsContract
{
    /**
     * @api
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
    ): AutoRespConfigResponse;

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
    ): AutoRespConfigResponse;

    /**
     * @api
     *
     * @param string $profileID
     *
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        $profileID,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse;

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
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse;

    /**
     * @api
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
    ): AutoRespConfigResponse;

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
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse;

    /**
     * @api
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
    ): AutorespConfigListResponse;

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
    ): AutorespConfigListResponse;

    /**
     * @api
     *
     * @param string $profileID
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        $profileID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
