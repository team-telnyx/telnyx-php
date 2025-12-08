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
 *   created_at__gt?: \DateTimeInterface|null,
 *   created_at__lt?: \DateTimeInterface|null,
 *   customer_reference__in?: list<string>|null,
 *   end_user_name?: string|null,
 *   phone_numbers__overlaps?: list<string>|null,
 *   status__in?: list<value-of<StatusIn>>|null,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    /**
     * The date and time the port-out was created after.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at__gt;

    /**
     * The date and time the port-out was created before.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at__lt;

    /**
     * The customer reference of the port-outs to include in the report.
     *
     * @var list<string>|null $customer_reference__in
     */
    #[Optional(list: 'string')]
    public ?array $customer_reference__in;

    /**
     * The end user name of the port-outs to include in the report.
     */
    #[Optional]
    public ?string $end_user_name;

    /**
     * A list of phone numbers that the port-outs phone numbers must overlap with.
     *
     * @var list<string>|null $phone_numbers__overlaps
     */
    #[Optional(list: 'string')]
    public ?array $phone_numbers__overlaps;

    /**
     * The status of the port-outs to include in the report.
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
     * @param list<string> $phone_numbers__overlaps
     * @param list<StatusIn|value-of<StatusIn>> $status__in
     */
    public static function with(
        ?\DateTimeInterface $created_at__gt = null,
        ?\DateTimeInterface $created_at__lt = null,
        ?array $customer_reference__in = null,
        ?string $end_user_name = null,
        ?array $phone_numbers__overlaps = null,
        ?array $status__in = null,
    ): self {
        $obj = new self;

        null !== $created_at__gt && $obj['created_at__gt'] = $created_at__gt;
        null !== $created_at__lt && $obj['created_at__lt'] = $created_at__lt;
        null !== $customer_reference__in && $obj['customer_reference__in'] = $customer_reference__in;
        null !== $end_user_name && $obj['end_user_name'] = $end_user_name;
        null !== $phone_numbers__overlaps && $obj['phone_numbers__overlaps'] = $phone_numbers__overlaps;
        null !== $status__in && $obj['status__in'] = $status__in;

        return $obj;
    }

    /**
     * The date and time the port-out was created after.
     */
    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj['created_at__gt'] = $createdAtGt;

        return $obj;
    }

    /**
     * The date and time the port-out was created before.
     */
    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj['created_at__lt'] = $createdAtLt;

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
        $obj['customer_reference__in'] = $customerReferenceIn;

        return $obj;
    }

    /**
     * The end user name of the port-outs to include in the report.
     */
    public function withEndUserName(string $endUserName): self
    {
        $obj = clone $this;
        $obj['end_user_name'] = $endUserName;

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
        $obj['phone_numbers__overlaps'] = $phoneNumbersOverlaps;

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
        $obj['status__in'] = $statusIn;

        return $obj;
    }
}
