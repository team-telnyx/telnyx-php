<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ManagedAccountsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ManagedAccountCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ManagedAccountCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Managed Account User ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Managed Account User ID
     * @param array<string,mixed>|ManagedAccountUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ManagedAccountUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ManagedAccountListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ManagedAccountListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ManagedAccountListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountGetAllocatableGlobalOutboundChannelsResponse>
     *
     * @throws APIException
     */
    public function getAllocatableGlobalOutboundChannels(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Managed Account User ID
     * @param array<string,mixed>|ManagedAccountUpdateGlobalChannelLimitParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ManagedAccountUpdateGlobalChannelLimitResponse>
     *
     * @throws APIException
     */
    public function updateGlobalChannelLimit(
        string $id,
        array|ManagedAccountUpdateGlobalChannelLimitParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
