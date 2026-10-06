<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\ByDay;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\ByModel;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Totals;

/**
 * @phpstan-import-type ByDayShape from \Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\ByDay
 * @phpstan-import-type ByModelShape from \Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\ByModel
 * @phpstan-import-type GuardrailsShape from \Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails
 * @phpstan-import-type TotalsShape from \Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Totals
 *
 * @phpstan-type DataShape = array{
 *   byDay: list<ByDay|ByDayShape>,
 *   byModel: list<ByModel|ByModelShape>,
 *   guardrails: Guardrails|GuardrailsShape,
 *   totals: Totals|TotalsShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * One row per UTC day, including zero-activity days.
     *
     * @var list<ByDay> $byDay
     */
    #[Required('by_day', list: ByDay::class)]
    public array $byDay;

    /**
     * One row per model, ordered by request count descending then model name.
     *
     * @var list<ByModel> $byModel
     */
    #[Required('by_model', list: ByModel::class)]
    public array $byModel;

    /**
     * Complete guardrail event counts and bounded recent findings for the same group and range.
     */
    #[Required]
    public Guardrails $guardrails;

    /**
     * Metrics for all matching requests.
     */
    #[Required]
    public Totals $totals;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(byDay: ..., byModel: ..., guardrails: ..., totals: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withByDay(...)
     *   ->withByModel(...)
     *   ->withGuardrails(...)
     *   ->withTotals(...)
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
     * @param list<ByDay|ByDayShape> $byDay
     * @param list<ByModel|ByModelShape> $byModel
     * @param Guardrails|GuardrailsShape $guardrails
     * @param Totals|TotalsShape $totals
     */
    public static function with(
        array $byDay,
        array $byModel,
        Guardrails|array $guardrails,
        Totals|array $totals,
    ): self {
        $self = new self;

        $self['byDay'] = $byDay;
        $self['byModel'] = $byModel;
        $self['guardrails'] = $guardrails;
        $self['totals'] = $totals;

        return $self;
    }

    /**
     * One row per UTC day, including zero-activity days.
     *
     * @param list<ByDay|ByDayShape> $byDay
     */
    public function withByDay(array $byDay): self
    {
        $self = clone $this;
        $self['byDay'] = $byDay;

        return $self;
    }

    /**
     * One row per model, ordered by request count descending then model name.
     *
     * @param list<ByModel|ByModelShape> $byModel
     */
    public function withByModel(array $byModel): self
    {
        $self = clone $this;
        $self['byModel'] = $byModel;

        return $self;
    }

    /**
     * Complete guardrail event counts and bounded recent findings for the same group and range.
     *
     * @param Guardrails|GuardrailsShape $guardrails
     */
    public function withGuardrails(Guardrails|array $guardrails): self
    {
        $self = clone $this;
        $self['guardrails'] = $guardrails;

        return $self;
    }

    /**
     * Metrics for all matching requests.
     *
     * @param Totals|TotalsShape $totals
     */
    public function withTotals(Totals|array $totals): self
    {
        $self = clone $this;
        $self['totals'] = $totals;

        return $self;
    }
}
