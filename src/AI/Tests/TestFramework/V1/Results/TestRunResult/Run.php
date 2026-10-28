<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult;

use Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\Run\Scenario;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type ScenarioShape from \Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult\Run\Scenario
 *
 * @phpstan-type RunShape = array{
 *   id?: int|null,
 *   duration?: string|null,
 *   errorMessage?: string|null,
 *   evaluationStatus?: string|null,
 *   executedAt?: string|null,
 *   personalityName?: string|null,
 *   scenario?: null|Scenario|ScenarioShape,
 *   scenarioName?: string|null,
 *   status?: string|null,
 *   success?: bool|null,
 *   testProfileName?: string|null,
 *   timestamp?: string|null,
 * }
 */
final class Run implements BaseModel
{
    /** @use SdkModel<RunShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $duration;

    #[Optional('error_message')]
    public ?string $errorMessage;

    #[Optional('evaluation_status')]
    public ?string $evaluationStatus;

    #[Optional('executed_at')]
    public ?string $executedAt;

    #[Optional('personality_name')]
    public ?string $personalityName;

    #[Optional]
    public ?Scenario $scenario;

    #[Optional('scenario_name')]
    public ?string $scenarioName;

    #[Optional]
    public ?string $status;

    #[Optional(nullable: true)]
    public ?bool $success;

    #[Optional('test_profile_name')]
    public ?string $testProfileName;

    #[Optional]
    public ?string $timestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Scenario|ScenarioShape|null $scenario
     */
    public static function with(
        bool|Omitted|null $success = Omitted::VALUE,
        ?int $id = null,
        ?string $duration = null,
        ?string $errorMessage = null,
        ?string $evaluationStatus = null,
        ?string $executedAt = null,
        ?string $personalityName = null,
        Scenario|array|null $scenario = null,
        ?string $scenarioName = null,
        ?string $status = null,
        ?string $testProfileName = null,
        ?string $timestamp = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $duration && $self['duration'] = $duration;
        null !== $errorMessage && $self['errorMessage'] = $errorMessage;
        null !== $evaluationStatus && $self['evaluationStatus'] = $evaluationStatus;
        null !== $executedAt && $self['executedAt'] = $executedAt;
        null !== $personalityName && $self['personalityName'] = $personalityName;
        null !== $scenario && $self['scenario'] = $scenario;
        null !== $scenarioName && $self['scenarioName'] = $scenarioName;
        null !== $status && $self['status'] = $status;
        Omitted::VALUE !== $success && $self['success'] = $success;
        null !== $testProfileName && $self['testProfileName'] = $testProfileName;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDuration(string $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    public function withErrorMessage(string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }

    public function withEvaluationStatus(string $evaluationStatus): self
    {
        $self = clone $this;
        $self['evaluationStatus'] = $evaluationStatus;

        return $self;
    }

    public function withExecutedAt(string $executedAt): self
    {
        $self = clone $this;
        $self['executedAt'] = $executedAt;

        return $self;
    }

    public function withPersonalityName(string $personalityName): self
    {
        $self = clone $this;
        $self['personalityName'] = $personalityName;

        return $self;
    }

    /**
     * @param Scenario|ScenarioShape $scenario
     */
    public function withScenario(Scenario|array $scenario): self
    {
        $self = clone $this;
        $self['scenario'] = $scenario;

        return $self;
    }

    public function withScenarioName(string $scenarioName): self
    {
        $self = clone $this;
        $self['scenarioName'] = $scenarioName;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSuccess(?bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }

    public function withTestProfileName(string $testProfileName): self
    {
        $self = clone $this;
        $self['testProfileName'] = $testProfileName;

        return $self;
    }

    public function withTimestamp(string $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
