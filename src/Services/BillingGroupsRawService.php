<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BillingGroups\BillingGroup;
use Telnyx\BillingGroups\BillingGroupCreateParams;
use Telnyx\BillingGroups\BillingGroupDeleteResponse;
use Telnyx\BillingGroups\BillingGroupGetResponse;
use Telnyx\BillingGroups\BillingGroupListParams;
use Telnyx\BillingGroups\BillingGroupNewResponse;
use Telnyx\BillingGroups\BillingGroupUpdateParams;
use Telnyx\BillingGroups\BillingGroupUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BillingGroupsRawContract;

final class BillingGroupsRawService implements BillingGroupsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a billing group
     *
     * @param array{name?: string}|BillingGroupCreateParams $params
     *
     * @return BaseResponse<BillingGroupNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BillingGroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BillingGroupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'billing_groups',
            body: (object) $parsed,
            options: $options,
            convert: BillingGroupNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a billing group
     *
     * @param string $id The id of the billing group
     *
     * @return BaseResponse<BillingGroupGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['billing_groups/%1$s', $id],
            options: $requestOptions,
            convert: BillingGroupGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a billing group
     *
     * @param string $id The id of the billing group
     * @param array{name?: string}|BillingGroupUpdateParams $params
     *
     * @return BaseResponse<BillingGroupUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|BillingGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BillingGroupUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['billing_groups/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: BillingGroupUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all billing groups
     *
     * @param array{pageNumber?: int, pageSize?: int}|BillingGroupListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<BillingGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|BillingGroupListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = BillingGroupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'billing_groups',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: BillingGroup::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a billing group
     *
     * @param string $id The id of the billing group
     *
     * @return BaseResponse<BillingGroupDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['billing_groups/%1$s', $id],
            options: $requestOptions,
            convert: BillingGroupDeleteResponse::class,
        );
    }
}
