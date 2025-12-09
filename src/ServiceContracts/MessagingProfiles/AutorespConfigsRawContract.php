<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingProfiles;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigDeleteParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigRetrieveParams;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams;
use Telnyx\RequestOptions;

interface AutorespConfigsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|AutorespConfigCreateParams $params
     *
     * @return BaseResponse<AutoRespConfigResponse>
     *
     * @throws APIException
     */
    public function create(
        string $profileID,
        array|AutorespConfigCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AutorespConfigRetrieveParams $params
     *
     * @return BaseResponse<AutoRespConfigResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        array|AutorespConfigRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $autorespCfgID Path param:
     * @param array<mixed>|AutorespConfigUpdateParams $params
     *
     * @return BaseResponse<AutoRespConfigResponse>
     *
     * @throws APIException
     */
    public function update(
        string $autorespCfgID,
        array|AutorespConfigUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AutorespConfigListParams $params
     *
     * @return BaseResponse<AutorespConfigListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        array|AutorespConfigListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AutorespConfigDeleteParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        array|AutorespConfigDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
