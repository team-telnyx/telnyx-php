<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\PortingOrders\PortingOrdersActivationJob;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActivationJobsContract;

/**
 * Endpoints related to porting orders management.
 *
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
     * Returns the details of a single activation job for the porting order, including its current status.
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
        $params = ['id' => $id];

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
        $params = array_filter(
            ['id' => $id, 'activateAt' => $activateAt ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PortingOrdersActivationJob>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
