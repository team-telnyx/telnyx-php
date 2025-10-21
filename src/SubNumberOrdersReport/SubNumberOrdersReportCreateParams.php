<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams\Status;

/**
 * Create a CSV report for sub number orders. The report will be generated asynchronously and can be downloaded once complete.
 *
 * @see Telnyx\SubNumberOrdersReport->create
 *
 * @phpstan-type sub_number_orders_report_create_params = array{
 *   countryCode?: string,
 *   createdAtGt?: \DateTimeInterface,
 *   createdAtLt?: \DateTimeInterface,
 *   customerReference?: string,
 *   orderRequestID?: string,
 *   status?: Status|value-of<Status>,
 * }
 */
final class SubNumberOrdersReportCreateParams implements BaseModel
{
    /** @use SdkModel<sub_number_orders_report_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by country code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Filter for orders created after this date.
     */
    #[Api('created_at_gt', optional: true)]
    public ?\DateTimeInterface $createdAtGt;

    /**
     * Filter for orders created before this date.
     */
    #[Api('created_at_lt', optional: true)]
    public ?\DateTimeInterface $createdAtLt;

    /**
     * Filter by customer reference.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Filter by specific order request ID.
     */
    #[Api('order_request_id', optional: true)]
    public ?string $orderRequestID;

    /**
     * Filter by order status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAtGt = null,
        ?\DateTimeInterface $createdAtLt = null,
        ?string $customerReference = null,
        ?string $orderRequestID = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $createdAtGt && $obj->createdAtGt = $createdAtGt;
        null !== $createdAtLt && $obj->createdAtLt = $createdAtLt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $orderRequestID && $obj->orderRequestID = $orderRequestID;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Filter for orders created after this date.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj->createdAtGt = $createdAtGt;

        return $obj;
    }

    /**
     * Filter for orders created before this date.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj->createdAtLt = $createdAtLt;

        return $obj;
    }

    /**
     * Filter by customer reference.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Filter by specific order request ID.
     */
    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj->orderRequestID = $orderRequestID;

        return $obj;
    }

    /**
     * Filter by order status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
