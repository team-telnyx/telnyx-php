<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Adjustment;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\Comparative;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\Simple;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Total;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
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
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Currency code.
     */
    #[Required]
    public string $currency;

    /**
     * End date of the summary period.
     */
    #[Required('end_date')]
    public \DateTimeInterface $endDate;

    /**
     * Start date of the summary period.
     */
    #[Required('start_date')]
    public \DateTimeInterface $startDate;

    #[Required]
    public Summary $summary;

    #[Required]
    public Total $total;

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
     *
     * @param Summary|array{
     *   adjustments: list<Adjustment>, lines: list<Comparative|Simple>
     * } $summary
     * @param Total|array{
     *   credits: string,
     *   existingMrc: string,
     *   grandTotal: string,
     *   ledgerAdjustments: string,
     *   newMrc: string,
     *   newOtc: string,
     *   other: string,
     * } $total
     */
    public static function with(
        string $currency,
        \DateTimeInterface $endDate,
        \DateTimeInterface $startDate,
        Summary|array $summary,
        Total|array $total,
        string $userEmail,
        string $userID,
    ): self {
        $obj = new self;

        $obj['currency'] = $currency;
        $obj['endDate'] = $endDate;
        $obj['startDate'] = $startDate;
        $obj['summary'] = $summary;
        $obj['total'] = $total;
        $obj['userEmail'] = $userEmail;
        $obj['userID'] = $userID;

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
        $obj['endDate'] = $endDate;

        return $obj;
    }

    /**
     * Start date of the summary period.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['startDate'] = $startDate;

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
     *   existingMrc: string,
     *   grandTotal: string,
     *   ledgerAdjustments: string,
     *   newMrc: string,
     *   newOtc: string,
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
        $obj['userEmail'] = $userEmail;

        return $obj;
    }

    /**
     * User identifier.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }
}
