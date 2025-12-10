<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ManagedAccounts\ManagedAccountCreateParams;
use Telnyx\ManagedAccounts\ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;
use Telnyx\ManagedAccounts\ManagedAccountGetResponse;
use Telnyx\ManagedAccounts\ManagedAccountListParams;
use Telnyx\ManagedAccounts\ManagedAccountListResponse;
use Telnyx\ManagedAccounts\ManagedAccountNewResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitParams;
use Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse;
use Telnyx\ManagedAccounts\ManagedAccountUpdateParams;
use Telnyx\ManagedAccounts\ManagedAccountUpdateResponse;
use Telnyx\RequestOptions;

interface ManagedAccountsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|ManagedAccountCreateParams $params
     *
     * @return BaseResponse<ManagedAccountNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ManagedAccountCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Managed Account User ID
     *
     * @return BaseResponse<ManagedAccountGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Managed Account User ID
     * @param array<mixed>|ManagedAccountUpdateParams $params
     *
     * @return BaseResponse<ManagedAccountUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ManagedAccountUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ManagedAccountListParams $params
     *
     * @return BaseResponse<ManagedAccountListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ManagedAccountListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<ManagedAccountGetAllocatableGlobalOutboundChannelsResponse>
     *
     * @throws APIException
     */
    public function getAllocatableGlobalOutboundChannels(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Managed Account User ID
     * @param array<mixed>|ManagedAccountUpdateGlobalChannelLimitParams $params
     *
     * @return BaseResponse<ManagedAccountUpdateGlobalChannelLimitResponse>
     *
     * @throws APIException
     */
    public function updateGlobalChannelLimit(
        string $id,
        array|ManagedAccountUpdateGlobalChannelLimitParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
