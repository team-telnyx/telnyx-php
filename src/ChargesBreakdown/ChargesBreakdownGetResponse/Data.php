<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result;
use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result\Service;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   currency: string,
 *   end_date: \DateTimeInterface,
 *   results: list<Result>,
 *   start_date: \DateTimeInterface,
 *   user_email: string,
 *   user_id: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Currency code.
     */
    #[Required]
    public string $currency;

    /**
     * End date of the breakdown period.
     */
    #[Required]
    public \DateTimeInterface $end_date;

    /**
     * List of phone number charge breakdowns.
     *
     * @var list<Result> $results
     */
    #[Required(list: Result::class)]
    public array $results;

    /**
     * Start date of the breakdown period.
     */
    #[Required]
    public \DateTimeInterface $start_date;

    /**
     * User email address.
     */
    #[Required]
    public string $user_email;

    /**
     * User identifier.
     */
    #[Required]
    public string $user_id;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   currency: ...,
     *   end_date: ...,
     *   results: ...,
     *   start_date: ...,
     *   user_email: ...,
     *   user_id: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withCurrency(...)
     *   ->withEndDate(...)
     *   ->withResults(...)
     *   ->withStartDate(...)
     *   ->withUserEmail(...)
     *   ->withUserID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Result|array{
     *   charge_type: string,
     *   service_owner_email: string,
     *   service_owner_user_id: string,
     *   services: list<Service>,
     *   tn: string,
     * }> $results
     */
    public static function with(
        string $currency,
        \DateTimeInterface $end_date,
        array $results,
        \DateTimeInterface $start_date,
        string $user_email,
        string $user_id,
    ): self {
        $obj = new self;

        $obj['currency'] = $currency;
        $obj['end_date'] = $end_date;
        $obj['results'] = $results;
        $obj['start_date'] = $start_date;
        $obj['user_email'] = $user_email;
        $obj['user_id'] = $user_id;

        return $obj;
    }

    /**
     * Currency code.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * End date of the breakdown period.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['end_date'] = $endDate;

        return $obj;
    }

    /**
     * List of phone number charge breakdowns.
     *
     * @param list<Result|array{
     *   charge_type: string,
     *   service_owner_email: string,
     *   service_owner_user_id: string,
     *   services: list<Service>,
     *   tn: string,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * Start date of the breakdown period.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

        return $obj;
    }

    /**
     * User email address.
     */
    public function withUserEmail(string $userEmail): self
    {
        $obj = clone $this;
        $obj['user_email'] = $userEmail;

        return $obj;
    }

    /**
     * User identifier.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }
}
