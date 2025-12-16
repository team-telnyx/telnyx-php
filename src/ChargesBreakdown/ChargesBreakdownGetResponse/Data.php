<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ResultShape from \Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result
 *
 * @phpstan-type DataShape = array{
 *   currency: string,
 *   endDate: string,
 *   results: list<ResultShape>,
 *   startDate: string,
 *   userEmail: string,
 *   userID: string,
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
    #[Required('end_date')]
    public string $endDate;

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
    #[Required('start_date')]
    public string $startDate;

    /**
     * User email address.
     */
    #[Required('user_email')]
    public string $userEmail;

    /**
     * User identifier.
     */
    #[Required('user_id')]
    public string $userID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   currency: ...,
     *   endDate: ...,
     *   results: ...,
     *   startDate: ...,
     *   userEmail: ...,
     *   userID: ...,
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
     * @param list<ResultShape> $results
     */
    public static function with(
        string $currency,
        string $endDate,
        array $results,
        string $startDate,
        string $userEmail,
        string $userID,
    ): self {
        $self = new self;

        $self['currency'] = $currency;
        $self['endDate'] = $endDate;
        $self['results'] = $results;
        $self['startDate'] = $startDate;
        $self['userEmail'] = $userEmail;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Currency code.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * End date of the breakdown period.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * List of phone number charge breakdowns.
     *
     * @param list<ResultShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * Start date of the breakdown period.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * User email address.
     */
    public function withUserEmail(string $userEmail): self
    {
        $self = clone $this;
        $self['userEmail'] = $userEmail;

        return $self;
    }

    /**
     * User identifier.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
