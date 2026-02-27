<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SubNumberOrdersReportContract;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams\Status;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;

/**
 * Number orders.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SubNumberOrdersReportService implements SubNumberOrdersReportContract
{
    /**
     * @api
     */
    public SubNumberOrdersReportRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubNumberOrdersReportRawService($client);
    }

    /**
     * @api
     *
     * Create a CSV report for sub number orders. The report will be generated asynchronously and can be downloaded once complete.
     *
     * @param string $countryCode Filter by country code
     * @param \DateTimeInterface $createdAtGt Filter for orders created after this date
     * @param \DateTimeInterface $createdAtLt Filter for orders created before this date
     * @param string $customerReference Filter by customer reference
     * @param string $orderRequestID Filter by specific order request ID
     * @param Status|value-of<Status> $status Filter by order status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAtGt = null,
        ?\DateTimeInterface $createdAtLt = null,
        ?string $customerReference = null,
        ?string $orderRequestID = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrdersReportNewResponse {
        $params = Util::removeNulls(
            [
                'countryCode' => $countryCode,
                'createdAtGt' => $createdAtGt,
                'createdAtLt' => $createdAtLt,
                'customerReference' => $customerReference,
                'orderRequestID' => $orderRequestID,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the status and details of a sub number orders report.
     *
     * @param string $reportID The unique identifier of the sub number orders report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $reportID,
        RequestOptions|array|null $requestOptions = null
    ): SubNumberOrdersReportGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($reportID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Download the CSV file for a completed sub number orders report. The report status must be 'success' before the file can be downloaded.
     *
     * @param string $reportID The unique identifier of the sub number orders report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function download(
        string $reportID,
        RequestOptions|array|null $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->download($reportID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
