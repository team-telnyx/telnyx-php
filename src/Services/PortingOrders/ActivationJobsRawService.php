<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobRetrieveParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\PortingOrders\PortingOrdersActivationJob;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActivationJobsRawContract;

final class ActivationJobsRawService implements ActivationJobsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a porting activation job.
     *
     * @param string $activationJobID Activation Job Identifier
     * @param array{id: string}|ActivationJobRetrieveParams $params
     *
     * @return BaseResponse<ActivationJobGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $activationJobID,
        array|ActivationJobRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
     * @param string $activationJobID Path param: Activation Job Identifier
     * @param array{
     *   id: string, activateAt?: string|\DateTimeInterface
     * }|ActivationJobUpdateParams $params
     *
     * @return BaseResponse<ActivationJobUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $activationJobID,
        array|ActivationJobUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
            body: (object) array_diff_key($parsed, array_flip(['id'])),
            options: $options,
            convert: ActivationJobUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your porting activation jobs.
     *
     * @param string $id Porting Order id
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|ActivationJobListParams $params
     *
     * @return BaseResponse<DefaultPagination<PortingOrdersActivationJob>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ActivationJobListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
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
            convert: PortingOrdersActivationJob::class,
            page: DefaultPagination::class,
        );
    }
}
