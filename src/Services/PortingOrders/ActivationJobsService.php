<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
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
     */
    public function retrieve(
        string $activationJobID,
        $id,
        ?RequestOptions $requestOptions = null
    ): ActivationJobGetResponse {
        [$parsed, $options] = ActivationJobRetrieveParams::parseRequest(
            ['id' => $id],
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
     */
    public function update(
        string $activationJobID,
        $id,
        $activateAt = omit,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobUpdateResponse {
        [$parsed, $options] = ActivationJobUpdateParams::parseRequest(
            ['id' => $id, 'activateAt' => $activateAt],
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        string $id,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ActivationJobListResponse {
        [$parsed, $options] = ActivationJobListParams::parseRequest(
            ['page' => $page],
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
