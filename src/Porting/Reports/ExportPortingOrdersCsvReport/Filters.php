<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport\Filters\StatusIn;

/**
 * The filters to apply to the export porting order CSV report.
 *
 * @phpstan-type filters_alias = array{
 *   createdAtGt?: \DateTimeInterface|null,
 *   createdAtLt?: \DateTimeInterface|null,
 *   customerReferenceIn?: list<string>|null,
 *   statusIn?: list<value-of<StatusIn>>|null,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<filters_alias> */
    use SdkModel;

    /**
     * The date and time the porting order was created after.
     */
    #[Api('created_at__gt', optional: true)]
    public ?\DateTimeInterface $createdAtGt;

    /**
     * The date and time the porting order was created before.
     */
    #[Api('created_at__lt', optional: true)]
    public ?\DateTimeInterface $createdAtLt;

    /**
     * The customer reference of the porting orders to include in the report.
     *
     * @var list<string>|null $customerReferenceIn
     */
    #[Api('customer_reference__in', list: 'string', optional: true)]
    public ?array $customerReferenceIn;

    /**
     * The status of the porting orders to include in the report.
     *
     * @var list<value-of<StatusIn>>|null $statusIn
     */
    #[Api('status__in', list: StatusIn::class, optional: true)]
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

        null !== $createdAtGt && $obj->createdAtGt = $createdAtGt;
        null !== $createdAtLt && $obj->createdAtLt = $createdAtLt;
        null !== $customerReferenceIn && $obj->customerReferenceIn = $customerReferenceIn;
        null !== $statusIn && $obj->statusIn = array_map(fn ($v) => $v instanceof StatusIn ? $v->value : $v, $statusIn);

        return $obj;
    }

    /**
     * The date and time the porting order was created after.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj->createdAtGt = $createdAtGt;

        return $obj;
    }

    /**
     * The date and time the porting order was created before.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj->createdAtLt = $createdAtLt;

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
        $obj->customerReferenceIn = $customerReferenceIn;

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
        $obj->statusIn = array_map(fn ($v) => $v instanceof StatusIn ? $v->value : $v, $statusIn);

        return $obj;
    }
}
