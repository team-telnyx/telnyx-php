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
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return BillingGroupNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupNewResponse {
        $params = ['name' => $name];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BillingGroupNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BillingGroupNewResponse {
        [$parsed, $options] = BillingGroupCreateParams::parseRequest(
            $params,
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
     *
     * @return BillingGroupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return BillingGroupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     *
     * @return BillingGroupUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupUpdateResponse {
        $params = ['name' => $name];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BillingGroupUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BillingGroupUpdateResponse {
        [$parsed, $options] = BillingGroupUpdateParams::parseRequest(
            $params,
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
     *
     * @return BillingGroupListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupListResponse {
        $params = ['page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BillingGroupListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BillingGroupListResponse {
        [$parsed, $options] = BillingGroupListParams::parseRequest(
            $params,
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
     *
     * @return BillingGroupDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return BillingGroupDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
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
