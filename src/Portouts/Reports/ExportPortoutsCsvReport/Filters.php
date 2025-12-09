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
        $self = new self;

        null !== $createdAtGt && $self['createdAtGt'] = $createdAtGt;
        null !== $createdAtLt && $self['createdAtLt'] = $createdAtLt;
        null !== $customerReferenceIn && $self['customerReferenceIn'] = $customerReferenceIn;
        null !== $endUserName && $self['endUserName'] = $endUserName;
        null !== $phoneNumbersOverlaps && $self['phoneNumbersOverlaps'] = $phoneNumbersOverlaps;
        null !== $statusIn && $self['statusIn'] = $statusIn;

        return $self;
    }

    /**
     * The date and time the port-out was created after.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $self = clone $this;
        $self['createdAtGt'] = $createdAtGt;

        return $self;
    }

    /**
     * The date and time the port-out was created before.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $self = clone $this;
        $self['createdAtLt'] = $createdAtLt;

        return $self;
    }

    /**
     * The customer reference of the port-outs to include in the report.
     *
     * @param list<string> $customerReferenceIn
     */
    public function withCustomerReferenceIn(array $customerReferenceIn): self
    {
        $self = clone $this;
        $self['customerReferenceIn'] = $customerReferenceIn;

        return $self;
    }

    /**
     * The end user name of the port-outs to include in the report.
     */
    public function withEndUserName(string $endUserName): self
    {
        $self = clone $this;
        $self['endUserName'] = $endUserName;

        return $self;
    }

    /**
     * A list of phone numbers that the port-outs phone numbers must overlap with.
     *
     * @param list<string> $phoneNumbersOverlaps
     */
    public function withPhoneNumbersOverlaps(array $phoneNumbersOverlaps): self
    {
        $self = clone $this;
        $self['phoneNumbersOverlaps'] = $phoneNumbersOverlaps;

        return $self;
    }

    /**
     * The status of the port-outs to include in the report.
     *
     * @param list<StatusIn|value-of<StatusIn>> $statusIn
     */
    public function withStatusIn(array $statusIn): self
    {
        $self = clone $this;
        $self['statusIn'] = $statusIn;

        return $self;
    }
}
