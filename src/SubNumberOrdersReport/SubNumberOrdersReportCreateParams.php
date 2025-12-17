<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport;

use Telnyx\Core\Attributes\Optional;
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
 *   countryCode?: string|null,
 *   createdAtGt?: \DateTimeInterface|null,
 *   createdAtLt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   orderRequestID?: string|null,
 *   status?: null|Status|value-of<Status>,
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
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Filter for orders created after this date.
     */
    #[Optional('created_at_gt')]
    public ?\DateTimeInterface $createdAtGt;

    /**
     * Filter for orders created before this date.
     */
    #[Optional('created_at_lt')]
    public ?\DateTimeInterface $createdAtLt;

    /**
     * Filter by customer reference.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Filter by specific order request ID.
     */
    #[Optional('order_request_id')]
    public ?string $orderRequestID;

    /**
     * Filter by order status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
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
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAtGt = null,
        ?\DateTimeInterface $createdAtLt = null,
        ?string $customerReference = null,
        ?string $orderRequestID = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAtGt && $self['createdAtGt'] = $createdAtGt;
        null !== $createdAtLt && $self['createdAtLt'] = $createdAtLt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $orderRequestID && $self['orderRequestID'] = $orderRequestID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filter by country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Filter for orders created after this date.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $self = clone $this;
        $self['createdAtGt'] = $createdAtGt;

        return $self;
    }

    /**
     * Filter for orders created before this date.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $self = clone $this;
        $self['createdAtLt'] = $createdAtLt;

        return $self;
    }

    /**
     * Filter by customer reference.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Filter by specific order request ID.
     */
    public function withOrderRequestID(string $orderRequestID): self
    {
        $self = clone $this;
        $self['orderRequestID'] = $orderRequestID;

        return $self;
    }

    /**
     * Filter by order status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
