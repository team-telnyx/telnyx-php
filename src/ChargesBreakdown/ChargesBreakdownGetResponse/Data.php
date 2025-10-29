<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   currency: string,
 *   endDate: \DateTimeInterface,
 *   results: list<Result>,
 *   startDate: \DateTimeInterface,
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
    #[Api]
    public string $currency;

    /**
     * End date of the breakdown period.
     */
    #[Api('end_date')]
    public \DateTimeInterface $endDate;

    /**
     * List of phone number charge breakdowns.
     *
     * @var list<Result> $results
     */
    #[Api(list: Result::class)]
    public array $results;

    /**
     * Start date of the breakdown period.
     */
    #[Api('start_date')]
    public \DateTimeInterface $startDate;

    /**
     * User email address.
     */
    #[Api('user_email')]
    public string $userEmail;

    /**
     * User identifier.
     */
    #[Api('user_id')]
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
     * @param list<Result> $results
     */
    public static function with(
        string $currency,
        \DateTimeInterface $endDate,
        array $results,
        \DateTimeInterface $startDate,
        string $userEmail,
        string $userID,
    ): self {
        $obj = new self;

        $obj->currency = $currency;
        $obj->endDate = $endDate;
        $obj->results = $results;
        $obj->startDate = $startDate;
        $obj->userEmail = $userEmail;
        $obj->userID = $userID;

        return $obj;
    }

    /**
     * Currency code.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * End date of the breakdown period.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    /**
     * List of phone number charge breakdowns.
     *
     * @param list<Result> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Start date of the breakdown period.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }

    /**
     * User email address.
     */
    public function withUserEmail(string $userEmail): self
    {
        $obj = clone $this;
        $obj->userEmail = $userEmail;

        return $obj;
    }

    /**
     * User identifier.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
