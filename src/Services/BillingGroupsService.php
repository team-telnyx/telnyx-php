<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BillingGroups\BillingGroupCreateParams;
use Telnyx\BillingGroups\BillingGroupDeleteResponse;
use Telnyx\BillingGroups\BillingGroupGetResponse;
use Telnyx\BillingGroups\BillingGroupListParams;
use Telnyx\BillingGroups\BillingGroupListParams\Page;
use Telnyx\BillingGroups\BillingGroupListResponse;
use Telnyx\BillingGroups\BillingGroupNewResponse;
use Telnyx\BillingGroups\BillingGroupUpdateParams;
use Telnyx\BillingGroups\BillingGroupUpdateResponse;
use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BillingGroupsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $name A name for the billing group
     */
    public function create(
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupNewResponse {
        [$parsed, $options] = BillingGroupCreateParams::parseRequest(
            ['name' => $name],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param string $name A name for the billing group
     */
    public function update(
        string $id,
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupUpdateResponse {
        [$parsed, $options] = BillingGroupUpdateParams::parseRequest(
            ['name' => $name],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupListResponse {
        [$parsed, $options] = BillingGroupListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['billing_groups/%1$s', $id],
            options: $requestOptions,
            convert: BillingGroupDeleteResponse::class,
        );
    }
}
