<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport\SubNumberOrdersReport;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The filters that were applied to generate this report.
 *
 * @phpstan-type FiltersShape = array{
 *   countryCode?: string|null,
 *   createdAtGt?: \DateTimeInterface|null,
 *   createdAtLt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   orderRequestID?: string|null,
 *   status?: string|null,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional('created_at_gt')]
    public ?\DateTimeInterface $createdAtGt;

    #[Optional('created_at_lt')]
    public ?\DateTimeInterface $createdAtLt;

    #[Optional('customer_reference')]
    public ?string $customerReference;

    #[Optional('order_request_id')]
    public ?string $orderRequestID;

    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAtGt = null,
        ?\DateTimeInterface $createdAtLt = null,
        ?string $customerReference = null,
        ?string $orderRequestID = null,
        ?string $status = null,
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

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $self = clone $this;
        $self['createdAtGt'] = $createdAtGt;

        return $self;
    }

    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $self = clone $this;
        $self['createdAtLt'] = $createdAtLt;

        return $self;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $self = clone $this;
        $self['orderRequestID'] = $orderRequestID;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
