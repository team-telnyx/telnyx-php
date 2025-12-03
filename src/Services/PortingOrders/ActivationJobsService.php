<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobRetrieveParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActivationJobsContract;

final class ActivationJobsService implements ActivationJobsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a porting activation job.
     *
     * @param array{id: string}|ActivationJobRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $activationJobID,
        array|ActivationJobRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobGetResponse {
        [$parsed, $options] = ActivationJobRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/activation_jobs/%2$s', $id, $activationJobID],
            options: $options,
            convert: ActivationJobGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates the activation time of a porting activation job.
     *
     * @param array{
     *   id: string, activate_at?: string|\DateTimeInterface
     * }|ActivationJobUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $activationJobID,
        array|ActivationJobUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobUpdateResponse {
        [$parsed, $options] = ActivationJobUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['porting_orders/%1$s/activation_jobs/%2$s', $id, $activationJobID],
            body: (object) array_diff_key($parsed, ['id']),
            options: $options,
            convert: ActivationJobUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your porting activation jobs.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|ActivationJobListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ActivationJobListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobListResponse {
        [$parsed, $options] = ActivationJobListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/activation_jobs', $id],
            query: $parsed,
            options: $options,
            convert: ActivationJobListResponse::class,
        );
    }
}
