<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BillingGroups\BillingGroupCreateParams;
use Telnyx\BillingGroups\BillingGroupDeleteResponse;
use Telnyx\BillingGroups\BillingGroupGetResponse;
use Telnyx\BillingGroups\BillingGroupListParams;
use Telnyx\BillingGroups\BillingGroupListResponse;
use Telnyx\BillingGroups\BillingGroupNewResponse;
use Telnyx\BillingGroups\BillingGroupUpdateParams;
use Telnyx\BillingGroups\BillingGroupUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BillingGroupsContract;

final class BillingGroupsService implements BillingGroupsContract
{
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
     * @throws APIException
     */
    public function create(
        array|BillingGroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BillingGroupNewResponse {
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupGetResponse {
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
     * @param array{name?: string}|BillingGroupUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|BillingGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BillingGroupUpdateResponse {
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
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|BillingGroupListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|BillingGroupListParams $params,
        ?RequestOptions $requestOptions = null
    ): BillingGroupListResponse {
        [$parsed, $options] = BillingGroupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'billing_groups',
            query: $parsed,
            options: $options,
            convert: BillingGroupListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a billing group
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupDeleteResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['billing_groups/%1$s', $id],
            options: $requestOptions,
            convert: BillingGroupDeleteResponse::class,
        );
    }
}
