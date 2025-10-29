<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListParams;

use Telnyx\Core\Attributes\Api;
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
 *   carrierName?: string,
 *   countryCode?: string,
 *   countryCodeIn?: list<string>,
 *   focDate?: \DateTimeInterface,
 *   insertedAt?: InsertedAt,
 *   phoneNumber?: string,
 *   pon?: string,
 *   portedOutAt?: PortedOutAt,
 *   spid?: string,
 *   status?: value-of<Status>,
 *   statusIn?: list<value-of<StatusIn>>,
 *   supportKey?: string,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by new carrier name.
     */
    #[Api('carrier_name', optional: true)]
    public ?string $carrierName;

    /**
     * Filter by 2-letter country code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Filter by a list of 2-letter country codes.
     *
     * @var list<string>|null $countryCodeIn
     */
    #[Api('country_code_in', list: 'string', optional: true)]
    public ?array $countryCodeIn;

    /**
     * Filter by foc_date. Matches all portouts with the same date.
     */
    #[Api('foc_date', optional: true)]
    public ?\DateTimeInterface $focDate;

    /**
     * Filter by inserted_at date range using nested operations.
     */
    #[Api('inserted_at', optional: true)]
    public ?InsertedAt $insertedAt;

    /**
     * Filter by a phone number on the portout. Matches all portouts with the phone number.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Filter by Port Order Number (PON).
     */
    #[Api(optional: true)]
    public ?string $pon;

    /**
     * Filter by ported_out_at date range using nested operations.
     */
    #[Api('ported_out_at', optional: true)]
    public ?PortedOutAt $portedOutAt;

    /**
     * Filter by new carrier spid.
     */
    #[Api(optional: true)]
    public ?string $spid;

    /**
     * Filter by portout status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Filter by a list of portout statuses.
     *
     * @var list<value-of<StatusIn>>|null $statusIn
     */
    #[Api('status_in', list: StatusIn::class, optional: true)]
    public ?array $statusIn;

    /**
     * Filter by the portout's support_key.
     */
    #[Api('support_key', optional: true)]
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
     * @param Status|value-of<Status> $status
     * @param list<StatusIn|value-of<StatusIn>> $statusIn
     */
    public static function with(
        ?string $carrierName = null,
        ?string $countryCode = null,
        ?array $countryCodeIn = null,
        ?\DateTimeInterface $focDate = null,
        ?InsertedAt $insertedAt = null,
        ?string $phoneNumber = null,
        ?string $pon = null,
        ?PortedOutAt $portedOutAt = null,
        ?string $spid = null,
        Status|string|null $status = null,
        ?array $statusIn = null,
        ?string $supportKey = null,
    ): self {
        $obj = new self;

        null !== $carrierName && $obj->carrierName = $carrierName;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $countryCodeIn && $obj->countryCodeIn = $countryCodeIn;
        null !== $focDate && $obj->focDate = $focDate;
        null !== $insertedAt && $obj->insertedAt = $insertedAt;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $pon && $obj->pon = $pon;
        null !== $portedOutAt && $obj->portedOutAt = $portedOutAt;
        null !== $spid && $obj->spid = $spid;
        null !== $status && $obj['status'] = $status;
        null !== $statusIn && $obj['statusIn'] = $statusIn;
        null !== $supportKey && $obj->supportKey = $supportKey;

        return $obj;
    }

    /**
     * Filter by new carrier name.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj->carrierName = $carrierName;

        return $obj;
    }

    /**
     * Filter by 2-letter country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

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
        $obj->countryCodeIn = $countryCodeIn;

        return $obj;
    }

    /**
     * Filter by foc_date. Matches all portouts with the same date.
     */
    public function withFocDate(\DateTimeInterface $focDate): self
    {
        $obj = clone $this;
        $obj->focDate = $focDate;

        return $obj;
    }

    /**
     * Filter by inserted_at date range using nested operations.
     */
    public function withInsertedAt(InsertedAt $insertedAt): self
    {
        $obj = clone $this;
        $obj->insertedAt = $insertedAt;

        return $obj;
    }

    /**
     * Filter by a phone number on the portout. Matches all portouts with the phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Filter by Port Order Number (PON).
     */
    public function withPon(string $pon): self
    {
        $obj = clone $this;
        $obj->pon = $pon;

        return $obj;
    }

    /**
     * Filter by ported_out_at date range using nested operations.
     */
    public function withPortedOutAt(PortedOutAt $portedOutAt): self
    {
        $obj = clone $this;
        $obj->portedOutAt = $portedOutAt;

        return $obj;
    }

    /**
     * Filter by new carrier spid.
     */
    public function withSpid(string $spid): self
    {
        $obj = clone $this;
        $obj->spid = $spid;

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
        $obj->supportKey = $supportKey;

        return $obj;
    }
}
