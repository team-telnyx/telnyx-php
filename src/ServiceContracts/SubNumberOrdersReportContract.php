<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams\Status;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;

interface SubNumberOrdersReportContract
{
    /**
     * @api
     *
     * @param string $countryCode Filter by country code
     * @param string|\DateTimeInterface $createdAtGt Filter for orders created after this date
     * @param string|\DateTimeInterface $createdAtLt Filter for orders created before this date
     * @param string $customerReference Filter by customer reference
     * @param string $orderRequestID Filter by specific order request ID
     * @param 'pending'|'success'|'failure'|Status $status Filter by order status
     *
     * @throws APIException
     */
    public function create(
        ?string $countryCode = null,
        string|\DateTimeInterface|null $createdAtGt = null,
        string|\DateTimeInterface|null $createdAtLt = null,
        ?string $customerReference = null,
        ?string $orderRequestID = null,
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrdersReportNewResponse;

    /**
     * @api
     *
     * @param string $reportID The unique identifier of the sub number orders report
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
     * @param string $reportID The unique identifier of the sub number orders report
     *
     * @throws APIException
     */
    public function download(
        string $reportID,
        ?RequestOptions $requestOptions = null
    ): string;
}
