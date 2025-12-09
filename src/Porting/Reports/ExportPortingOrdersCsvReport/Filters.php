<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport\Filters\StatusIn;

/**
 * The filters to apply to the export porting order CSV report.
 *
 * @phpstan-type FiltersShape = array{
 *   createdAtGt?: \DateTimeInterface|null,
 *   createdAtLt?: \DateTimeInterface|null,
 *   customerReferenceIn?: list<string>|null,
 *   statusIn?: list<value-of<StatusIn>>|null,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    /**
     * The date and time the porting order was created after.
     */
    #[Optional('created_at__gt')]
    public ?\DateTimeInterface $createdAtGt;

    /**
     * The date and time the porting order was created before.
     */
    #[Optional('created_at__lt')]
    public ?\DateTimeInterface $createdAtLt;

    /**
     * The customer reference of the porting orders to include in the report.
     *
     * @var list<string>|null $customerReferenceIn
     */
    #[Optional('customer_reference__in', list: 'string')]
    public ?array $customerReferenceIn;

    /**
     * The status of the porting orders to include in the report.
     *
     * @var list<value-of<StatusIn>>|null $statusIn
     */
    #[Optional('status__in', list: StatusIn::class)]
    public ?array $statusIn;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $customerReferenceIn
     * @param list<StatusIn|value-of<StatusIn>> $statusIn
     */
    public static function with(
        ?\DateTimeInterface $createdAtGt = null,
        ?\DateTimeInterface $createdAtLt = null,
        ?array $customerReferenceIn = null,
        ?array $statusIn = null,
    ): self {
        $obj = new self;

        null !== $createdAtGt && $obj['createdAtGt'] = $createdAtGt;
        null !== $createdAtLt && $obj['createdAtLt'] = $createdAtLt;
        null !== $customerReferenceIn && $obj['customerReferenceIn'] = $customerReferenceIn;
        null !== $statusIn && $obj['statusIn'] = $statusIn;

        return $obj;
    }

    /**
     * The date and time the porting order was created after.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj['createdAtGt'] = $createdAtGt;

        return $obj;
    }

    /**
     * The date and time the porting order was created before.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj['createdAtLt'] = $createdAtLt;

        return $obj;
    }

    /**
     * The customer reference of the porting orders to include in the report.
     *
     * @param list<string> $customerReferenceIn
     */
    public function withCustomerReferenceIn(array $customerReferenceIn): self
    {
        $obj = clone $this;
        $obj['customerReferenceIn'] = $customerReferenceIn;

        return $obj;
    }

    /**
     * The status of the porting orders to include in the report.
     *
     * @param list<StatusIn|value-of<StatusIn>> $statusIn
     */
    public function withStatusIn(array $statusIn): self
    {
        $obj = clone $this;
        $obj['statusIn'] = $statusIn;

        return $obj;
    }
}
