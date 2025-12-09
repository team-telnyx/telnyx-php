<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\PortoutListParams\Filter\InsertedAt;
use Telnyx\Portouts\PortoutListParams\Filter\PortedOutAt;
use Telnyx\Portouts\PortoutListParams\Filter\Status;
use Telnyx\Portouts\PortoutListParams\Filter\StatusIn;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[carrier_name], filter[country_code], filter[country_code_in], filter[foc_date], filter[inserted_at], filter[phone_number], filter[pon], filter[ported_out_at], filter[spid], filter[status], filter[status_in], filter[support_key].
 *
 * @phpstan-type FilterShape = array{
 *   carrierName?: string|null,
 *   countryCode?: string|null,
 *   countryCodeIn?: list<string>|null,
 *   focDate?: \DateTimeInterface|null,
 *   insertedAt?: InsertedAt|null,
 *   phoneNumber?: string|null,
 *   pon?: string|null,
 *   portedOutAt?: PortedOutAt|null,
 *   spid?: string|null,
 *   status?: value-of<Status>|null,
 *   statusIn?: list<value-of<StatusIn>>|null,
 *   supportKey?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by new carrier name.
     */
    #[Optional('carrier_name')]
    public ?string $carrierName;

    /**
     * Filter by 2-letter country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Filter by a list of 2-letter country codes.
     *
     * @var list<string>|null $countryCodeIn
     */
    #[Optional('country_code_in', list: 'string')]
    public ?array $countryCodeIn;

    /**
     * Filter by foc_date. Matches all portouts with the same date.
     */
    #[Optional('foc_date')]
    public ?\DateTimeInterface $focDate;

    /**
     * Filter by inserted_at date range using nested operations.
     */
    #[Optional('inserted_at')]
    public ?InsertedAt $insertedAt;

    /**
     * Filter by a phone number on the portout. Matches all portouts with the phone number.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Filter by Port Order Number (PON).
     */
    #[Optional]
    public ?string $pon;

    /**
     * Filter by ported_out_at date range using nested operations.
     */
    #[Optional('ported_out_at')]
    public ?PortedOutAt $portedOutAt;

    /**
     * Filter by new carrier spid.
     */
    #[Optional]
    public ?string $spid;

    /**
     * Filter by portout status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Filter by a list of portout statuses.
     *
     * @var list<value-of<StatusIn>>|null $statusIn
     */
    #[Optional('status_in', list: StatusIn::class)]
    public ?array $statusIn;

    /**
     * Filter by the portout's support_key.
     */
    #[Optional('support_key')]
    public ?string $supportKey;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $countryCodeIn
     * @param InsertedAt|array{
     *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
     * } $insertedAt
     * @param PortedOutAt|array{
     *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
     * } $portedOutAt
     * @param Status|value-of<Status> $status
     * @param list<StatusIn|value-of<StatusIn>> $statusIn
     */
    public static function with(
        ?string $carrierName = null,
        ?string $countryCode = null,
        ?array $countryCodeIn = null,
        ?\DateTimeInterface $focDate = null,
        InsertedAt|array|null $insertedAt = null,
        ?string $phoneNumber = null,
        ?string $pon = null,
        PortedOutAt|array|null $portedOutAt = null,
        ?string $spid = null,
        Status|string|null $status = null,
        ?array $statusIn = null,
        ?string $supportKey = null,
    ): self {
        $obj = new self;

        null !== $carrierName && $obj['carrierName'] = $carrierName;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $countryCodeIn && $obj['countryCodeIn'] = $countryCodeIn;
        null !== $focDate && $obj['focDate'] = $focDate;
        null !== $insertedAt && $obj['insertedAt'] = $insertedAt;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $pon && $obj['pon'] = $pon;
        null !== $portedOutAt && $obj['portedOutAt'] = $portedOutAt;
        null !== $spid && $obj['spid'] = $spid;
        null !== $status && $obj['status'] = $status;
        null !== $statusIn && $obj['statusIn'] = $statusIn;
        null !== $supportKey && $obj['supportKey'] = $supportKey;

        return $obj;
    }

    /**
     * Filter by new carrier name.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj['carrierName'] = $carrierName;

        return $obj;
    }

    /**
     * Filter by 2-letter country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * Filter by a list of 2-letter country codes.
     *
     * @param list<string> $countryCodeIn
     */
    public function withCountryCodeIn(array $countryCodeIn): self
    {
        $obj = clone $this;
        $obj['countryCodeIn'] = $countryCodeIn;

        return $obj;
    }

    /**
     * Filter by foc_date. Matches all portouts with the same date.
     */
    public function withFocDate(\DateTimeInterface $focDate): self
    {
        $obj = clone $this;
        $obj['focDate'] = $focDate;

        return $obj;
    }

    /**
     * Filter by inserted_at date range using nested operations.
     *
     * @param InsertedAt|array{
     *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
     * } $insertedAt
     */
    public function withInsertedAt(InsertedAt|array $insertedAt): self
    {
        $obj = clone $this;
        $obj['insertedAt'] = $insertedAt;

        return $obj;
    }

    /**
     * Filter by a phone number on the portout. Matches all portouts with the phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Filter by Port Order Number (PON).
     */
    public function withPon(string $pon): self
    {
        $obj = clone $this;
        $obj['pon'] = $pon;

        return $obj;
    }

    /**
     * Filter by ported_out_at date range using nested operations.
     *
     * @param PortedOutAt|array{
     *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
     * } $portedOutAt
     */
    public function withPortedOutAt(PortedOutAt|array $portedOutAt): self
    {
        $obj = clone $this;
        $obj['portedOutAt'] = $portedOutAt;

        return $obj;
    }

    /**
     * Filter by new carrier spid.
     */
    public function withSpid(string $spid): self
    {
        $obj = clone $this;
        $obj['spid'] = $spid;

        return $obj;
    }

    /**
     * Filter by portout status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by a list of portout statuses.
     *
     * @param list<StatusIn|value-of<StatusIn>> $statusIn
     */
    public function withStatusIn(array $statusIn): self
    {
        $obj = clone $this;
        $obj['statusIn'] = $statusIn;

        return $obj;
    }

    /**
     * Filter by the portout's support_key.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj['supportKey'] = $supportKey;

        return $obj;
    }
}
