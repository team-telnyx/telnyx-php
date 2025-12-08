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
 *   created_at__gt?: \DateTimeInterface|null,
 *   created_at__lt?: \DateTimeInterface|null,
 *   customer_reference__in?: list<string>|null,
 *   status__in?: list<value-of<StatusIn>>|null,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    /**
     * The date and time the porting order was created after.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at__gt;

    /**
     * The date and time the porting order was created before.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at__lt;

    /**
     * The customer reference of the porting orders to include in the report.
     *
     * @var list<string>|null $customer_reference__in
     */
    #[Optional(list: 'string')]
    public ?array $customer_reference__in;

    /**
     * The status of the porting orders to include in the report.
     *
     * @var list<value-of<StatusIn>>|null $status__in
     */
    #[Optional(list: StatusIn::class)]
    public ?array $status__in;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $customer_reference__in
     * @param list<StatusIn|value-of<StatusIn>> $status__in
     */
    public static function with(
        ?\DateTimeInterface $created_at__gt = null,
        ?\DateTimeInterface $created_at__lt = null,
        ?array $customer_reference__in = null,
        ?array $status__in = null,
    ): self {
        $obj = new self;

        null !== $created_at__gt && $obj['created_at__gt'] = $created_at__gt;
        null !== $created_at__lt && $obj['created_at__lt'] = $created_at__lt;
        null !== $customer_reference__in && $obj['customer_reference__in'] = $customer_reference__in;
        null !== $status__in && $obj['status__in'] = $status__in;

        return $obj;
    }

    /**
     * The date and time the porting order was created after.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj['created_at__gt'] = $createdAtGt;

        return $obj;
    }

    /**
     * The date and time the porting order was created before.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj['created_at__lt'] = $createdAtLt;

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
        $obj['customer_reference__in'] = $customerReferenceIn;

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
        $obj['status__in'] = $statusIn;

        return $obj;
    }
}
