<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Results;

use Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\Run;
use Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\Scenario1 as Scenario;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type CompletedRunsCountVariants from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\CompletedRunsCount
 * @phpstan-import-type FailedRunsCountVariants from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\FailedRunsCount
 * @phpstan-import-type MetExpectedOutcomeCountVariants from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\MetExpectedOutcomeCount
 * @phpstan-import-type SuccessRateVariants from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\SuccessRate
 * @phpstan-import-type SuccessRunsCountVariants from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\SuccessRunsCount
 * @phpstan-import-type TotalExpectedOutcomeCountVariants from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\TotalExpectedOutcomeCount
 * @phpstan-import-type TotalRunsCountVariants from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\TotalRunsCount
 * @phpstan-import-type CompletedRunsCountShape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\CompletedRunsCount
 * @phpstan-import-type FailedRunsCountShape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\FailedRunsCount
 * @phpstan-import-type MetExpectedOutcomeCountShape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\MetExpectedOutcomeCount
 * @phpstan-import-type RunShape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\Run
 * @phpstan-import-type Scenario1Shape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\Scenario1
 * @phpstan-import-type SuccessRateShape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\SuccessRate
 * @phpstan-import-type SuccessRunsCountShape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\SuccessRunsCount
 * @phpstan-import-type TotalExpectedOutcomeCountShape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\TotalExpectedOutcomeCount
 * @phpstan-import-type TotalRunsCountShape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\TotalRunsCount
 *
 * @phpstan-type TestRunResultShape = array{
 *   id: int,
 *   agent: int,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   status: string,
 *   updatedAt: \DateTimeInterface,
 *   agentInbound?: bool|null,
 *   agentName?: string|null,
 *   completedRunsCount?: CompletedRunsCountShape|null,
 *   failedRunsCount?: FailedRunsCountShape|null,
 *   isCronjob?: bool|null,
 *   metExpectedOutcomeCount?: MetExpectedOutcomeCountShape|null,
 *   runAsText?: bool|null,
 *   runType?: string|null,
 *   runs?: array<string,Run|RunShape>|null,
 *   scenarios?: list<Scenario|Scenario1Shape>|null,
 *   successRate?: SuccessRateShape|null,
 *   successRunsCount?: SuccessRunsCountShape|null,
 *   totalExpectedOutcomeCount?: TotalExpectedOutcomeCountShape|null,
 *   totalRunsCount?: TotalRunsCountShape|null,
 * }
 */
final class TestRunResult implements BaseModel
{
    /** @use SdkModel<TestRunResultShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required]
    public int $agent;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $name;

    /**
     * Run batch status: running, completed, failed, pending, in_progress, evaluating, in_queue, timeout, cancelled, or scaling_up.
     */
    #[Required]
    public string $status;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Optional('agent_inbound')]
    public ?bool $agentInbound;

    #[Optional('agent_name')]
    public ?string $agentName;

    /** @var CompletedRunsCountVariants|null $completedRunsCount */
    #[Optional('completed_runs_count')]
    public int|string|null $completedRunsCount;

    /** @var FailedRunsCountVariants|null $failedRunsCount */
    #[Optional('failed_runs_count')]
    public int|string|null $failedRunsCount;

    /**
     * Whether this batch was started by a scheduled job.
     */
    #[Optional('is_cronjob')]
    public ?bool $isCronjob;

    /** @var MetExpectedOutcomeCountVariants|null $metExpectedOutcomeCount */
    #[Optional('met_expected_outcome_count')]
    public int|string|null $metExpectedOutcomeCount;

    /**
     * Whether the batch ran as text chat rather than voice calls.
     */
    #[Optional('run_as_text')]
    public ?bool $runAsText;

    #[Optional('run_type', nullable: true)]
    public ?string $runType;

    /**
     * Per-run detail keyed by run ID.
     *
     * @var array<string,Run>|null $runs
     */
    #[Optional(map: Run::class, nullable: true)]
    public ?array $runs;

    /** @var list<Scenario>|null $scenarios */
    #[Optional(list: Scenario::class, nullable: true)]
    public ?array $scenarios;

    /**
     * Share of runs judged successful.
     *
     * @var SuccessRateVariants|null $successRate
     */
    #[Optional('success_rate')]
    public float|string|null $successRate;

    /** @var SuccessRunsCountVariants|null $successRunsCount */
    #[Optional('success_runs_count')]
    public int|string|null $successRunsCount;

    /** @var TotalExpectedOutcomeCountVariants|null $totalExpectedOutcomeCount */
    #[Optional('total_expected_outcome_count')]
    public int|string|null $totalExpectedOutcomeCount;

    /** @var TotalRunsCountVariants|null $totalRunsCount */
    #[Optional('total_runs_count')]
    public int|string|null $totalRunsCount;

    /**
     * `new TestRunResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestRunResult::with(
     *   id: ..., agent: ..., createdAt: ..., name: ..., status: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestRunResult)
     *   ->withID(...)
     *   ->withAgent(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withStatus(...)
     *   ->withUpdatedAt(...)
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
     * @param Omitted|array<string,Run|RunShape>|null $runs
     * @param list<Scenario|Scenario1Shape>|Omitted|null $scenarios
     * @param CompletedRunsCountShape|null $completedRunsCount
     * @param FailedRunsCountShape|null $failedRunsCount
     * @param MetExpectedOutcomeCountShape|null $metExpectedOutcomeCount
     * @param SuccessRateShape|null $successRate
     * @param SuccessRunsCountShape|null $successRunsCount
     * @param TotalExpectedOutcomeCountShape|null $totalExpectedOutcomeCount
     * @param TotalRunsCountShape|null $totalRunsCount
     */
    public static function with(
        int $id,
        int $agent,
        \DateTimeInterface $createdAt,
        string $name,
        string $status,
        \DateTimeInterface $updatedAt,
        string|Omitted|null $runType = Omitted::VALUE,
        Omitted|array|null $runs = Omitted::VALUE,
        array|Omitted|null $scenarios = Omitted::VALUE,
        ?bool $agentInbound = null,
        ?string $agentName = null,
        int|string|null $completedRunsCount = null,
        int|string|null $failedRunsCount = null,
        ?bool $isCronjob = null,
        int|string|null $metExpectedOutcomeCount = null,
        ?bool $runAsText = null,
        float|string|null $successRate = null,
        int|string|null $successRunsCount = null,
        int|string|null $totalExpectedOutcomeCount = null,
        int|string|null $totalRunsCount = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['agent'] = $agent;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['status'] = $status;
        $self['updatedAt'] = $updatedAt;

        null !== $agentInbound && $self['agentInbound'] = $agentInbound;
        null !== $agentName && $self['agentName'] = $agentName;
        null !== $completedRunsCount && $self['completedRunsCount'] = $completedRunsCount;
        null !== $failedRunsCount && $self['failedRunsCount'] = $failedRunsCount;
        null !== $isCronjob && $self['isCronjob'] = $isCronjob;
        null !== $metExpectedOutcomeCount && $self['metExpectedOutcomeCount'] = $metExpectedOutcomeCount;
        null !== $runAsText && $self['runAsText'] = $runAsText;
        Omitted::VALUE !== $runType && $self['runType'] = $runType;
        Omitted::VALUE !== $runs && $self['runs'] = $runs;
        Omitted::VALUE !== $scenarios && $self['scenarios'] = $scenarios;
        null !== $successRate && $self['successRate'] = $successRate;
        null !== $successRunsCount && $self['successRunsCount'] = $successRunsCount;
        null !== $totalExpectedOutcomeCount && $self['totalExpectedOutcomeCount'] = $totalExpectedOutcomeCount;
        null !== $totalRunsCount && $self['totalRunsCount'] = $totalRunsCount;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAgent(int $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Run batch status: running, completed, failed, pending, in_progress, evaluating, in_queue, timeout, cancelled, or scaling_up.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withAgentInbound(bool $agentInbound): self
    {
        $self = clone $this;
        $self['agentInbound'] = $agentInbound;

        return $self;
    }

    public function withAgentName(string $agentName): self
    {
        $self = clone $this;
        $self['agentName'] = $agentName;

        return $self;
    }

    /**
     * @param CompletedRunsCountShape $completedRunsCount
     */
    public function withCompletedRunsCount(int|string $completedRunsCount): self
    {
        $self = clone $this;
        $self['completedRunsCount'] = $completedRunsCount;

        return $self;
    }

    /**
     * @param FailedRunsCountShape $failedRunsCount
     */
    public function withFailedRunsCount(int|string $failedRunsCount): self
    {
        $self = clone $this;
        $self['failedRunsCount'] = $failedRunsCount;

        return $self;
    }

    /**
     * Whether this batch was started by a scheduled job.
     */
    public function withIsCronjob(bool $isCronjob): self
    {
        $self = clone $this;
        $self['isCronjob'] = $isCronjob;

        return $self;
    }

    /**
     * @param MetExpectedOutcomeCountShape $metExpectedOutcomeCount
     */
    public function withMetExpectedOutcomeCount(
        int|string $metExpectedOutcomeCount
    ): self {
        $self = clone $this;
        $self['metExpectedOutcomeCount'] = $metExpectedOutcomeCount;

        return $self;
    }

    /**
     * Whether the batch ran as text chat rather than voice calls.
     */
    public function withRunAsText(bool $runAsText): self
    {
        $self = clone $this;
        $self['runAsText'] = $runAsText;

        return $self;
    }

    public function withRunType(?string $runType): self
    {
        $self = clone $this;
        $self['runType'] = $runType;

        return $self;
    }

    /**
     * Per-run detail keyed by run ID.
     *
     * @param array<string,Run|RunShape>|null $runs
     */
    public function withRuns(?array $runs): self
    {
        $self = clone $this;
        $self['runs'] = $runs;

        return $self;
    }

    /**
     * @param list<Scenario|Scenario1Shape>|null $scenarios
     */
    public function withScenarios(?array $scenarios): self
    {
        $self = clone $this;
        $self['scenarios'] = $scenarios;

        return $self;
    }

    /**
     * Share of runs judged successful.
     *
     * @param SuccessRateShape $successRate
     */
    public function withSuccessRate(float|string $successRate): self
    {
        $self = clone $this;
        $self['successRate'] = $successRate;

        return $self;
    }

    /**
     * @param SuccessRunsCountShape $successRunsCount
     */
    public function withSuccessRunsCount(int|string $successRunsCount): self
    {
        $self = clone $this;
        $self['successRunsCount'] = $successRunsCount;

        return $self;
    }

    /**
     * @param TotalExpectedOutcomeCountShape $totalExpectedOutcomeCount
     */
    public function withTotalExpectedOutcomeCount(
        int|string $totalExpectedOutcomeCount
    ): self {
        $self = clone $this;
        $self['totalExpectedOutcomeCount'] = $totalExpectedOutcomeCount;

        return $self;
    }

    /**
     * @param TotalRunsCountShape $totalRunsCount
     */
    public function withTotalRunsCount(int|string $totalRunsCount): self
    {
        $self = clone $this;
        $self['totalRunsCount'] = $totalRunsCount;

        return $self;
    }
}
