<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingProfiles;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigDeleteParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigRetrieveParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams;
use Telnyx\RequestOptions;

interface AutorespConfigsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AutorespConfigCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $profileID,
        array|AutorespConfigCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse;

    /**
     * @api
     *
     * @param array<mixed>|AutorespConfigRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        array|AutorespConfigRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse;

    /**
     * @api
     *
     * @param array<mixed>|AutorespConfigUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $autorespCfgID,
        array|AutorespConfigUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutoRespConfigResponse;

    /**
     * @api
     *
     * @param array<mixed>|AutorespConfigListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        array|AutorespConfigListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutorespConfigListResponse;

    /**
     * @api
     *
     * @param array<mixed>|AutorespConfigDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        array|AutorespConfigDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
