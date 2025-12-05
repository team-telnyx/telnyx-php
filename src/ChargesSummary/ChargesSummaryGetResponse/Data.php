<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Adjustment;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\Comparative;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\Simple;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Total;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   currency: string,
 *   end_date: \DateTimeInterface,
 *   start_date: \DateTimeInterface,
 *   summary: Summary,
 *   total: Total,
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
    #[Api]
    public string $currency;

    /**
     * End date of the summary period.
     */
    #[Api]
    public \DateTimeInterface $end_date;

    /**
     * Start date of the summary period.
     */
    #[Api]
    public \DateTimeInterface $start_date;

    #[Api]
    public Summary $summary;

    #[Api]
    public Total $total;

    /**
     * User email address.
     */
    #[Api]
    public string $user_email;

    /**
     * User identifier.
     */
    #[Api]
    public string $user_id;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   currency: ...,
     *   end_date: ...,
     *   start_date: ...,
     *   summary: ...,
     *   total: ...,
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
     *
     * @param Summary|array{
     *   adjustments: list<Adjustment>, lines: list<Comparative|Simple>
     * } $summary
     * @param Total|array{
     *   credits: string,
     *   existing_mrc: string,
     *   grand_total: string,
     *   ledger_adjustments: string,
     *   new_mrc: string,
     *   new_otc: string,
     *   other: string,
     * } $total
     */
    public static function with(
        string $currency,
        \DateTimeInterface $end_date,
        \DateTimeInterface $start_date,
        Summary|array $summary,
        Total|array $total,
        string $user_email,
        string $user_id,
    ): self {
        $obj = new self;

        $obj['currency'] = $currency;
        $obj['end_date'] = $end_date;
        $obj['start_date'] = $start_date;
        $obj['summary'] = $summary;
        $obj['total'] = $total;
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
     * End date of the summary period.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['end_date'] = $endDate;

        return $obj;
    }

    /**
     * Start date of the summary period.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

        return $obj;
    }

    /**
     * @param Summary|array{
     *   adjustments: list<Adjustment>, lines: list<Comparative|Simple>
     * } $summary
     */
    public function withSummary(Summary|array $summary): self
    {
        $obj = clone $this;
        $obj['summary'] = $summary;

        return $obj;
    }

    /**
     * @param Total|array{
     *   credits: string,
     *   existing_mrc: string,
     *   grand_total: string,
     *   ledger_adjustments: string,
     *   new_mrc: string,
     *   new_otc: string,
     *   other: string,
     * } $total
     */
    public function withTotal(Total|array $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

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
