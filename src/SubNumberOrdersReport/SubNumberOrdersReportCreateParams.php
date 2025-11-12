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
 * @see Telnyx\Services\SubNumberOrdersReportService::create()
 *
 * @phpstan-type SubNumberOrdersReportCreateParamsShape = array{
 *   country_code?: string,
 *   created_at_gt?: \DateTimeInterface,
 *   created_at_lt?: \DateTimeInterface,
 *   customer_reference?: string,
 *   order_request_id?: string,
 *   status?: Status|value-of<Status>,
 * }
 */
final class SubNumberOrdersReportCreateParams implements BaseModel
{
    /** @use SdkModel<SubNumberOrdersReportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by country code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Filter for orders created after this date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at_gt;

    /**
     * Filter for orders created before this date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at_lt;

    /**
     * Filter by customer reference.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Filter by specific order request ID.
     */
    #[Api(optional: true)]
    public ?string $order_request_id;

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
        ?string $country_code = null,
        ?\DateTimeInterface $created_at_gt = null,
        ?\DateTimeInterface $created_at_lt = null,
        ?string $customer_reference = null,
        ?string $order_request_id = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $country_code && $obj->country_code = $country_code;
        null !== $created_at_gt && $obj->created_at_gt = $created_at_gt;
        null !== $created_at_lt && $obj->created_at_lt = $created_at_lt;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $order_request_id && $obj->order_request_id = $order_request_id;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    /**
     * Filter for orders created after this date.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj->created_at_gt = $createdAtGt;

        return $obj;
    }

    /**
     * Filter for orders created before this date.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj->created_at_lt = $createdAtLt;

        return $obj;
    }

    /**
     * Filter by customer reference.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * Filter by specific order request ID.
     */
    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj->order_request_id = $orderRequestID;

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
