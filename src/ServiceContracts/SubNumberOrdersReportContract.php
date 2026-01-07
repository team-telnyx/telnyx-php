<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams\Status;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
    ): SubNumberOrdersReportNewResponse;

    /**
     * @api
     *
     * @param string $reportID The unique identifier of the sub number orders report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $reportID,
        RequestOptions|array|null $requestOptions = null
    ): SubNumberOrdersReportGetResponse;

    /**
     * @api
     *
     * @param string $reportID The unique identifier of the sub number orders report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function download(
        string $reportID,
        RequestOptions|array|null $requestOptions = null
    ): string;
}
