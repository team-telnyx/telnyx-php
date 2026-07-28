<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupCreateParams;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupListParams;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupUpdateParams;
use Telnyx\EmailUnsubscribeGroups\UnsubscribeGroup;
use Telnyx\EmailUnsubscribeGroups\UnsubscribeGroupResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailUnsubscribeGroupsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailUnsubscribeGroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnsubscribeGroupResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailUnsubscribeGroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnsubscribeGroupResponse>
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
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param array<string,mixed>|EmailUnsubscribeGroupUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnsubscribeGroupResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|EmailUnsubscribeGroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailUnsubscribeGroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<UnsubscribeGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailUnsubscribeGroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param array<string,mixed>|EmailUnsubscribeGroupDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|EmailUnsubscribeGroupDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
