<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams\Status;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;

use const Telnyx\Core\OMIT as omit;

interface SubNumberOrdersReportContract
{
    /**
     * @api
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
    ): SubNumberOrdersReportNewResponse;

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
    ): SubNumberOrdersReportNewResponse;

    /**
     * @api
     *
     * @return SubNumberOrdersReportGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $reportID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrdersReportGetResponse;

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
    ): SubNumberOrdersReportGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function download(
        string $reportID,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function downloadRaw(
        string $reportID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): string;
}
