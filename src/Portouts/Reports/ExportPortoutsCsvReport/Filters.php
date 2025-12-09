<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports\ExportPortoutsCsvReport;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters\StatusIn;

/**
 * The filters to apply to the export port-out CSV report.
 *
 * @phpstan-type FiltersShape = array{
 *   createdAtGt?: \DateTimeInterface|null,
 *   createdAtLt?: \DateTimeInterface|null,
 *   customerReferenceIn?: list<string>|null,
 *   endUserName?: string|null,
 *   phoneNumbersOverlaps?: list<string>|null,
 *   statusIn?: list<value-of<StatusIn>>|null,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    /**
     * The date and time the port-out was created after.
     */
    #[Optional('created_at__gt')]
    public ?\DateTimeInterface $createdAtGt;

    /**
     * The date and time the port-out was created before.
     */
    #[Optional('created_at__lt')]
    public ?\DateTimeInterface $createdAtLt;

    /**
     * The customer reference of the port-outs to include in the report.
     *
     * @var list<string>|null $customerReferenceIn
     */
    #[Optional('customer_reference__in', list: 'string')]
    public ?array $customerReferenceIn;

    /**
     * The end user name of the port-outs to include in the report.
     */
    #[Optional('end_user_name')]
    public ?string $endUserName;

    /**
     * A list of phone numbers that the port-outs phone numbers must overlap with.
     *
     * @var list<string>|null $phoneNumbersOverlaps
     */
    #[Optional('phone_numbers__overlaps', list: 'string')]
    public ?array $phoneNumbersOverlaps;

    /**
     * The status of the port-outs to include in the report.
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

        null !== $createdAtGt && $obj['createdAtGt'] = $createdAtGt;
        null !== $createdAtLt && $obj['createdAtLt'] = $createdAtLt;
        null !== $customerReferenceIn && $obj['customerReferenceIn'] = $customerReferenceIn;
        null !== $endUserName && $obj['endUserName'] = $endUserName;
        null !== $phoneNumbersOverlaps && $obj['phoneNumbersOverlaps'] = $phoneNumbersOverlaps;
        null !== $statusIn && $obj['statusIn'] = $statusIn;

        return $obj;
    }

    /**
     * The date and time the port-out was created after.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj['createdAtGt'] = $createdAtGt;

        return $obj;
    }

    /**
     * The date and time the port-out was created before.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj['createdAtLt'] = $createdAtLt;

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
        $obj['customerReferenceIn'] = $customerReferenceIn;

        return $obj;
    }

    /**
     * The end user name of the port-outs to include in the report.
     */
    public function withEndUserName(string $endUserName): self
    {
        $obj = clone $this;
        $obj['endUserName'] = $endUserName;

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
        $obj['phoneNumbersOverlaps'] = $phoneNumbersOverlaps;

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
