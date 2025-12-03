<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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

interface ManagedAccountsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ManagedAccountCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ManagedAccountCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ManagedAccountGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ManagedAccountUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ManagedAccountUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ManagedAccountListParams $params
     *
     * @return DefaultPagination<ManagedAccountListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ManagedAccountListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getAllocatableGlobalOutboundChannels(
        ?RequestOptions $requestOptions = null
    ): ManagedAccountGetAllocatableGlobalOutboundChannelsResponse;

    /**
     * @api
     *
     * @param array<mixed>|ManagedAccountUpdateGlobalChannelLimitParams $params
     *
     * @throws APIException
     */
    public function updateGlobalChannelLimit(
        string $id,
        array|ManagedAccountUpdateGlobalChannelLimitParams $params,
        ?RequestOptions $requestOptions = null,
    ): ManagedAccountUpdateGlobalChannelLimitResponse;
}
