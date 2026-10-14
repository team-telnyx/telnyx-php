<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Gateway reference/enforcement usage, not invoice truth or BYOK provider charges. Requires the dedicated llm_token_gateway.usage.read V2 action for combined spend and guardrail reporting; existing spend.read and guardrail_events.read grants do not grant this endpoint. All totals, UTC daily buckets, models and latest 20 guardrail events share one database snapshot. UTC half-open dates, at most 31 days. Zero-filled days; at most 1000 models (503 rather than truncation on overflow/timeout). Known tokens sum independently known categories across latest attempt evidence, including corrections; unknown spend is excluded and unknown_requests/reserved_spend remain explicit. Guardrail counts count events, not distinct requests. No raw spend events, prompts or secrets. This read-only report creates no pagination snapshot and accepts no pagination parameters.
 *
 * @see Telnyx\Services\LlmTokenGateway\UsageService::retrieveSummary()
 *
 * @phpstan-type UsageRetrieveSummaryParamsShape = array{
 *   endDate: string,
 *   startDate: string,
 *   tokenGroupID: string,
 *   metadata?: array<string,string>|null,
 * }
 */
final class UsageRetrieveSummaryParams implements BaseModel
{
    /** @use SdkModel<UsageRetrieveSummaryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $endDate;

    #[Required]
    public string $startDate;

    #[Required]
    public string $tokenGroupID;

    /**
     * Request tag filters as metadata[<key>]=<value>, at most 5, combined with AND. A value matches the tag's text form exactly (booleans as true/false, integers in decimal), so metadata[flag]=true matches both boolean true and the string "true". Keys are case-sensitive; reserved-prefix keys are rejected. Unindexed: bounded by the account, the date range and the report timeout.
     *
     * @var array<string,string>|null $metadata
     */
    #[Optional(map: 'string')]
    public ?array $metadata;

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
     *
     * @param array<string,string>|null $metadata
     */
    public static function with(
        string $endDate,
        string $startDate,
        string $tokenGroupID,
        ?array $metadata = null,
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;
        $self['tokenGroupID'] = $tokenGroupID;

        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    public function withTokenGroupID(string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    /**
     * Request tag filters as metadata[<key>]=<value>, at most 5, combined with AND. A value matches the tag's text form exactly (booleans as true/false, integers in decimal), so metadata[flag]=true matches both boolean true and the string "true". Keys are case-sensitive; reserved-prefix keys are rejected. Unindexed: bounded by the account, the date range and the report timeout.
     *
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
