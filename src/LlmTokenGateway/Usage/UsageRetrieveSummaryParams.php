<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Return complete usage totals, UTC daily and model breakdowns, and guardrail event counts for one token group owned by the authenticated account. Requires the llm_token_gateway.usage.read permission; spend and guardrail read permissions do not grant this combined report. All sections share one database snapshot and include the latest usage corrections. Dates use an inclusive start and exclusive end spanning 1 to 31 days. Only token_group_id, start_date and end_date are accepted; pagination, group_by and other filters are rejected. Spend is reference/enforcement USD, not invoice truth or BYOK provider charges. Unknown cost is excluded from spend and reported through unknown_requests and reserved_spend. Daily rows include zero-activity days. Model rows are ordered by request count descending, then model name, and are limited to 1,000. Guardrail counts count events, not distinct requests; recent_events contains at most 20 newest events. A report that exceeds model or query limits returns 503 rather than a truncated success.
 *
 * @see Telnyx\Services\LlmTokenGateway\UsageService::retrieveSummary()
 *
 * @phpstan-type UsageRetrieveSummaryParamsShape = array{
 *   endDate: string, startDate: string, tokenGroupID: string
 * }
 */
final class UsageRetrieveSummaryParams implements BaseModel
{
    /** @use SdkModel<UsageRetrieveSummaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Exclusive UTC date in YYYY-MM-DD format. Must follow start_date by 1 to 31 days.
     */
    #[Required]
    public string $endDate;

    /**
     * Inclusive UTC date in YYYY-MM-DD format. Must precede end_date by 1 to 31 days.
     */
    #[Required]
    public string $startDate;

    /**
     * ID of a token group owned by the authenticated account.
     */
    #[Required]
    public string $tokenGroupID;

    /**
     * `new UsageRetrieveSummaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsageRetrieveSummaryParams::with(
     *   endDate: ..., startDate: ..., tokenGroupID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsageRetrieveSummaryParams)
     *   ->withEndDate(...)
     *   ->withStartDate(...)
     *   ->withTokenGroupID(...)
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
        string $endDate,
        string $startDate,
        string $tokenGroupID
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    /**
     * Exclusive UTC date in YYYY-MM-DD format. Must follow start_date by 1 to 31 days.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Inclusive UTC date in YYYY-MM-DD format. Must precede end_date by 1 to 31 days.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * ID of a token group owned by the authenticated account.
     */
    public function withTokenGroupID(string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }
}
