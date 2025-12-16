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
 * @phpstan-import-type InsertedAtShape from \Telnyx\Portouts\PortoutListParams\Filter\InsertedAt
 * @phpstan-import-type PortedOutAtShape from \Telnyx\Portouts\PortoutListParams\Filter\PortedOutAt
 *
 * @phpstan-type FilterShape = array{
 *   carrierName?: string|null,
 *   countryCode?: string|null,
 *   countryCodeIn?: list<string>|null,
 *   focDate?: \DateTimeInterface|null,
 *   insertedAt?: null|InsertedAt|InsertedAtShape,
 *   phoneNumber?: string|null,
 *   pon?: string|null,
 *   portedOutAt?: null|PortedOutAt|PortedOutAtShape,
 *   spid?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   statusIn?: list<StatusIn|value-of<StatusIn>>|null,
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
     * @param InsertedAtShape $insertedAt
     * @param PortedOutAtShape $portedOutAt
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
        $self = new self;

        null !== $carrierName && $self['carrierName'] = $carrierName;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $countryCodeIn && $self['countryCodeIn'] = $countryCodeIn;
        null !== $focDate && $self['focDate'] = $focDate;
        null !== $insertedAt && $self['insertedAt'] = $insertedAt;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $pon && $self['pon'] = $pon;
        null !== $portedOutAt && $self['portedOutAt'] = $portedOutAt;
        null !== $spid && $self['spid'] = $spid;
        null !== $status && $self['status'] = $status;
        null !== $statusIn && $self['statusIn'] = $statusIn;
        null !== $supportKey && $self['supportKey'] = $supportKey;

        return $self;
    }

    /**
     * Filter by new carrier name.
     */
    public function withCarrierName(string $carrierName): self
    {
        $self = clone $this;
        $self['carrierName'] = $carrierName;

        return $self;
    }

    /**
     * Filter by 2-letter country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Filter by a list of 2-letter country codes.
     *
     * @param list<string> $countryCodeIn
     */
    public function withCountryCodeIn(array $countryCodeIn): self
    {
        $self = clone $this;
        $self['countryCodeIn'] = $countryCodeIn;

        return $self;
    }

    /**
     * Filter by foc_date. Matches all portouts with the same date.
     */
    public function withFocDate(\DateTimeInterface $focDate): self
    {
        $self = clone $this;
        $self['focDate'] = $focDate;

        return $self;
    }

    /**
     * Filter by inserted_at date range using nested operations.
     *
     * @param InsertedAtShape $insertedAt
     */
    public function withInsertedAt(InsertedAt|array $insertedAt): self
    {
        $self = clone $this;
        $self['insertedAt'] = $insertedAt;

        return $self;
    }

    /**
     * Filter by a phone number on the portout. Matches all portouts with the phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Filter by Port Order Number (PON).
     */
    public function withPon(string $pon): self
    {
        $self = clone $this;
        $self['pon'] = $pon;

        return $self;
    }

    /**
     * Filter by ported_out_at date range using nested operations.
     *
     * @param PortedOutAtShape $portedOutAt
     */
    public function withPortedOutAt(PortedOutAt|array $portedOutAt): self
    {
        $self = clone $this;
        $self['portedOutAt'] = $portedOutAt;

        return $self;
    }

    /**
     * Filter by new carrier spid.
     */
    public function withSpid(string $spid): self
    {
        $self = clone $this;
        $self['spid'] = $spid;

        return $self;
    }

    /**
     * Filter by portout status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Filter by a list of portout statuses.
     *
     * @param list<StatusIn|value-of<StatusIn>> $statusIn
     */
    public function withStatusIn(array $statusIn): self
    {
        $self = clone $this;
        $self['statusIn'] = $statusIn;

        return $self;
    }

    /**
     * Filter by the portout's support_key.
     */
    public function withSupportKey(string $supportKey): self
    {
        $self = clone $this;
        $self['supportKey'] = $supportKey;

        return $self;
    }
}
