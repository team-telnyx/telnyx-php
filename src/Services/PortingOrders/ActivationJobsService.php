<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams\Page;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\PortingOrders\PortingOrdersActivationJob;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActivationJobsContract;

/**
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActivationJobsService implements ActivationJobsContract
{
    /**
     * @api
     */
    public ActivationJobsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActivationJobsRawService($client);
    }

    /**
     * @api
     *
     * Returns a porting activation job.
     *
     * @param string $activationJobID Activation Job Identifier
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $activationJobID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): ActivationJobGetResponse {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($activationJobID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the activation time of a porting activation job.
     *
     * @param string $activationJobID Path param: Activation Job Identifier
     * @param string $id Path param: Porting Order id
     * @param \DateTimeInterface $activateAt Body param: The desired activation time. The activation time should be between any of the activation windows.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $activationJobID,
        string $id,
        ?\DateTimeInterface $activateAt = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActivationJobUpdateResponse {
        $params = Util::removeNulls(['id' => $id, 'activateAt' => $activateAt]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($activationJobID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your porting activation jobs.
     *
     * @param string $id Porting Order id
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortingOrdersActivationJob>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
