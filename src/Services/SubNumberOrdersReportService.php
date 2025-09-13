<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SubNumberOrdersReportContract;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams\Status;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;

use const Telnyx\Core\OMIT as omit;

final class SubNumberOrdersReportService implements SubNumberOrdersReportContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     *
     * @return SubNumberOrdersReportNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $countryCode = omit,
        $createdAtGt = omit,
        $createdAtLt = omit,
        $customerReference = omit,
        $orderRequestID = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrdersReportNewResponse {
        $params = [
            'countryCode' => $countryCode,
            'createdAtGt' => $createdAtGt,
            'createdAtLt' => $createdAtLt,
            'customerReference' => $customerReference,
            'orderRequestID' => $orderRequestID,
            'status' => $status,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SubNumberOrdersReportNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrdersReportNewResponse {
        [$parsed, $options] = SubNumberOrdersReportCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'sub_number_orders_report',
            body: (object) $parsed,
            options: $options,
            convert: SubNumberOrdersReportNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the status and details of a sub number orders report.
     *
     * @return SubNumberOrdersReportGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $reportID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrdersReportGetResponse {
        $params = [];

        return $this->retrieveRaw($reportID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return SubNumberOrdersReportGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $reportID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrdersReportGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sub_number_orders_report/%1$s', $reportID],
            options: $requestOptions,
            convert: SubNumberOrdersReportGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Download the CSV file for a completed sub number orders report. The report status must be 'success' before the file can be downloaded.
     *
     * @throws APIException
     */
    public function download(
        string $reportID,
        ?RequestOptions $requestOptions = null
    ): string {
        $params = [];

        return $this->downloadRaw($reportID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function downloadRaw(
        string $reportID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sub_number_orders_report/%1$s/download', $reportID],
            headers: ['Accept' => 'text/csv'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
