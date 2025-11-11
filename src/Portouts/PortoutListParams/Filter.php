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
 *   carrier_name?: string|null,
 *   country_code?: string|null,
 *   country_code_in?: list<string>|null,
 *   foc_date?: \DateTimeInterface|null,
 *   inserted_at?: InsertedAt|null,
 *   phone_number?: string|null,
 *   pon?: string|null,
 *   ported_out_at?: PortedOutAt|null,
 *   spid?: string|null,
 *   status?: value-of<Status>|null,
 *   status_in?: list<value-of<StatusIn>>|null,
 *   support_key?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by new carrier name.
     */
    #[Api(optional: true)]
    public ?string $carrier_name;

    /**
     * Filter by 2-letter country code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Filter by a list of 2-letter country codes.
     *
     * @var list<string>|null $country_code_in
     */
    #[Api(list: 'string', optional: true)]
    public ?array $country_code_in;

    /**
     * Filter by foc_date. Matches all portouts with the same date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $foc_date;

    /**
     * Filter by inserted_at date range using nested operations.
     */
    #[Api(optional: true)]
    public ?InsertedAt $inserted_at;

    /**
     * Filter by a phone number on the portout. Matches all portouts with the phone number.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Filter by Port Order Number (PON).
     */
    #[Api(optional: true)]
    public ?string $pon;

    /**
     * Filter by ported_out_at date range using nested operations.
     */
    #[Api(optional: true)]
    public ?PortedOutAt $ported_out_at;

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
     * @var list<value-of<StatusIn>>|null $status_in
     */
    #[Api(list: StatusIn::class, optional: true)]
    public ?array $status_in;

    /**
     * Filter by the portout's support_key.
     */
    #[Api(optional: true)]
    public ?string $support_key;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $country_code_in
     * @param Status|value-of<Status> $status
     * @param list<StatusIn|value-of<StatusIn>> $status_in
     */
    public static function with(
        ?string $carrier_name = null,
        ?string $country_code = null,
        ?array $country_code_in = null,
        ?\DateTimeInterface $foc_date = null,
        ?InsertedAt $inserted_at = null,
        ?string $phone_number = null,
        ?string $pon = null,
        ?PortedOutAt $ported_out_at = null,
        ?string $spid = null,
        Status|string|null $status = null,
        ?array $status_in = null,
        ?string $support_key = null,
    ): self {
        $obj = new self;

        null !== $carrier_name && $obj->carrier_name = $carrier_name;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $country_code_in && $obj->country_code_in = $country_code_in;
        null !== $foc_date && $obj->foc_date = $foc_date;
        null !== $inserted_at && $obj->inserted_at = $inserted_at;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $pon && $obj->pon = $pon;
        null !== $ported_out_at && $obj->ported_out_at = $ported_out_at;
        null !== $spid && $obj->spid = $spid;
        null !== $status && $obj['status'] = $status;
        null !== $status_in && $obj['status_in'] = $status_in;
        null !== $support_key && $obj->support_key = $support_key;

        return $obj;
    }

    /**
     * Filter by new carrier name.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj->carrier_name = $carrierName;

        return $obj;
    }

    /**
     * Filter by 2-letter country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

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
        $obj->country_code_in = $countryCodeIn;

        return $obj;
    }

    /**
     * Filter by foc_date. Matches all portouts with the same date.
     */
    public function withFocDate(\DateTimeInterface $focDate): self
    {
        $obj = clone $this;
        $obj->foc_date = $focDate;

        return $obj;
    }

    /**
     * Filter by inserted_at date range using nested operations.
     */
    public function withInsertedAt(InsertedAt $insertedAt): self
    {
        $obj = clone $this;
        $obj->inserted_at = $insertedAt;

        return $obj;
    }

    /**
     * Filter by a phone number on the portout. Matches all portouts with the phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

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
        $obj->ported_out_at = $portedOutAt;

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
        $obj['status_in'] = $statusIn;

        return $obj;
    }

    /**
     * Filter by the portout's support_key.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj->support_key = $supportKey;

        return $obj;
    }
}
