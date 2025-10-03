<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports\ExportPortoutsCsvReport;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters\StatusIn;

/**
 * The filters to apply to the export port-out CSV report.
 *
 * @phpstan-type filters_alias = array{
 *   createdAtGt?: \DateTimeInterface,
 *   createdAtLt?: \DateTimeInterface,
 *   customerReferenceIn?: list<string>,
 *   endUserName?: string,
 *   phoneNumbersOverlaps?: list<string>,
 *   statusIn?: list<value-of<StatusIn>>,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<filters_alias> */
    use SdkModel;

    /**
     * The date and time the port-out was created after.
     */
    #[Api('created_at__gt', optional: true)]
    public ?\DateTimeInterface $createdAtGt;

    /**
     * The date and time the port-out was created before.
     */
    #[Api('created_at__lt', optional: true)]
    public ?\DateTimeInterface $createdAtLt;

    /**
     * The customer reference of the port-outs to include in the report.
     *
     * @var list<string>|null $customerReferenceIn
     */
    #[Api('customer_reference__in', list: 'string', optional: true)]
    public ?array $customerReferenceIn;

    /**
     * The end user name of the port-outs to include in the report.
     */
    #[Api('end_user_name', optional: true)]
    public ?string $endUserName;

    /**
     * A list of phone numbers that the port-outs phone numbers must overlap with.
     *
     * @var list<string>|null $phoneNumbersOverlaps
     */
    #[Api('phone_numbers__overlaps', list: 'string', optional: true)]
    public ?array $phoneNumbersOverlaps;

    /**
     * The status of the port-outs to include in the report.
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
     * @param list<string> $phoneNumbersOverlaps
     * @param list<StatusIn|value-of<StatusIn>> $statusIn
     */
    public static function with(
        ?\DateTimeInterface $createdAtGt = null,
        ?\DateTimeInterface $createdAtLt = null,
        ?array $customerReferenceIn = null,
        ?string $endUserName = null,
        ?array $phoneNumbersOverlaps = null,
        ?array $statusIn = null,
    ): self {
        $obj = new self;

        null !== $createdAtGt && $obj->createdAtGt = $createdAtGt;
        null !== $createdAtLt && $obj->createdAtLt = $createdAtLt;
        null !== $customerReferenceIn && $obj->customerReferenceIn = $customerReferenceIn;
        null !== $endUserName && $obj->endUserName = $endUserName;
        null !== $phoneNumbersOverlaps && $obj->phoneNumbersOverlaps = $phoneNumbersOverlaps;
        null !== $statusIn && $obj['statusIn'] = $statusIn;

        return $obj;
    }

    /**
     * The date and time the port-out was created after.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj->createdAtGt = $createdAtGt;

        return $obj;
    }

    /**
     * The date and time the port-out was created before.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj->createdAtLt = $createdAtLt;

        return $obj;
    }

    /**
     * The customer reference of the port-outs to include in the report.
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
     * The end user name of the port-outs to include in the report.
     */
    public function withEndUserName(string $endUserName): self
    {
        $obj = clone $this;
        $obj->endUserName = $endUserName;

        return $obj;
    }

    /**
     * A list of phone numbers that the port-outs phone numbers must overlap with.
     *
     * @param list<string> $phoneNumbersOverlaps
     */
    public function withPhoneNumbersOverlaps(array $phoneNumbersOverlaps): self
    {
        $obj = clone $this;
        $obj->phoneNumbersOverlaps = $phoneNumbersOverlaps;

        return $obj;
    }

    /**
     * The status of the port-outs to include in the report.
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
