<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams\Page;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobRetrieveParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActivationJobsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $id
     *
     * @throws APIException
     */
    public function retrieve(
        string $activationJobID,
        $id,
        ?RequestOptions $requestOptions = null
    ): ActivationJobGetResponse {
        $params = ['id' => $id];

        return $this->retrieveRaw($activationJobID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $activationJobID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobGetResponse {
        [$parsed, $options] = ActivationJobRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
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
     * @param string $id
     * @param \DateTimeInterface $activateAt The desired activation time. The activation time should be between any of the activation windows.
     *
     * @throws APIException
     */
    public function update(
        string $activationJobID,
        $id,
        $activateAt = omit,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobUpdateResponse {
        $params = ['id' => $id, 'activateAt' => $activateAt];

        return $this->updateRaw($activationJobID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $activationJobID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobUpdateResponse {
        [$parsed, $options] = ActivationJobUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        string $id,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ActivationJobListResponse {
        $params = ['page' => $page];

        return $this->listRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActivationJobListResponse {
        [$parsed, $options] = ActivationJobListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/activation_jobs', $id],
            query: $parsed,
            options: $options,
            convert: ActivationJobListResponse::class,
        );
    }
}
