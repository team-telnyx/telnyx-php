<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Total;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   currency: string,
 *   endDate: \DateTimeInterface,
 *   startDate: \DateTimeInterface,
 *   summary: Summary,
 *   total: Total,
 *   userEmail: string,
 *   userID: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Currency code.
     */
    #[Api]
    public string $currency;

    /**
     * End date of the summary period.
     */
    #[Api('end_date')]
    public \DateTimeInterface $endDate;

    /**
     * Start date of the summary period.
     */
    #[Api('start_date')]
    public \DateTimeInterface $startDate;

    #[Api]
    public Summary $summary;

    #[Api]
    public Total $total;

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
     *   startDate: ...,
     *   summary: ...,
     *   total: ...,
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
     *   ->withStartDate(...)
     *   ->withSummary(...)
     *   ->withTotal(...)
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
     */
    public static function with(
        string $currency,
        \DateTimeInterface $endDate,
        \DateTimeInterface $startDate,
        Summary $summary,
        Total $total,
        string $userEmail,
        string $userID,
    ): self {
        $obj = new self;

        $obj->currency = $currency;
        $obj->endDate = $endDate;
        $obj->startDate = $startDate;
        $obj->summary = $summary;
        $obj->total = $total;
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
     * End date of the summary period.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    /**
     * Start date of the summary period.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }

    public function withSummary(Summary $summary): self
    {
        $obj = clone $this;
        $obj->summary = $summary;

        return $obj;
    }

    public function withTotal(Total $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

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
