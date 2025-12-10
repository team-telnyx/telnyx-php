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
 *   endDate: string,
 *   startDate: string,
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
    public string $endDate;

    /**
     * Start date of the summary period.
     */
    #[Required('start_date')]
    public string $startDate;

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
        string $endDate,
        string $startDate,
        Summary|array $summary,
        Total|array $total,
        string $userEmail,
        string $userID,
    ): self {
        $self = new self;

        $self['currency'] = $currency;
        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;
        $self['summary'] = $summary;
        $self['total'] = $total;
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
     * End date of the summary period.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Start date of the summary period.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * @param Summary|array{
     *   adjustments: list<Adjustment>, lines: list<Comparative|Simple>
     * } $summary
     */
    public function withSummary(Summary|array $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
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
        $self = clone $this;
        $self['total'] = $total;

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
