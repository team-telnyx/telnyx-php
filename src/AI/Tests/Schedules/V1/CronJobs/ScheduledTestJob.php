<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\Schedules\V1\CronJobs;

use Telnyx\AI\Tests\Schedules\V1\CronJobs\ScheduledTestJob\NotifyOn;
use Telnyx\AI\Tests\Schedules\V1\CronJobs\ScheduledTestJob\ScenariosData;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type ScenariosDataShape from \Telnyx\AI\Tests\Schedules\V1\CronJobs\ScheduledTestJob\ScenariosData
 *
 * @phpstan-type ScheduledTestJobShape = array{
 *   id: int,
 *   agent: int,
 *   createdAt: \DateTimeInterface,
 *   crontabExpression: string,
 *   isActive: bool,
 *   name: string,
 *   updatedAt: \DateTimeInterface,
 *   executionMode?: string|null,
 *   frequency?: int|null,
 *   notifyOn?: null|NotifyOn|value-of<NotifyOn>,
 *   personalities?: list<int>|null,
 *   personality?: int|null,
 *   runAsText?: bool|null,
 *   scenarioIDs?: list<int>|null,
 *   scenariosData?: list<ScenariosData|ScenariosDataShape>|null,
 *   tags?: list<string>|null,
 *   timezone?: string|null,
 * }
 */
final class ScheduledTestJob implements BaseModel
{
    /** @use SdkModel<ScheduledTestJobShape> */
    use SdkModel;

    #[Required]
    public int $id;

    /**
     * ID of the test agent the job belongs to.
     */
    #[Required]
    public int $agent;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Cron expression controlling when the job runs, in the job's timezone.
     */
    #[Required('crontab_expression')]
    public string $crontabExpression;

    #[Required('is_active')]
    public bool $isActive;

    #[Required]
    public string $name;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * Execution mode for the test runs, such as voice, text, or sip.
     */
    #[Optional('execution_mode')]
    public ?string $executionMode;

    #[Optional]
    public ?int $frequency;

    /**
     * When the job sends a notification.
     *
     * @var value-of<NotifyOn>|null $notifyOn
     */
    #[Optional('notify_on', enum: NotifyOn::class)]
    public ?string $notifyOn;

    /** @var list<int>|null $personalities */
    #[Optional(list: 'int')]
    public ?array $personalities;

    #[Optional(nullable: true)]
    public ?int $personality;

    /**
     * Whether the job runs scenarios as text chat rather than voice calls.
     */
    #[Optional('run_as_text')]
    public ?bool $runAsText;

    /**
     * Scenario IDs the job executes.
     *
     * @var list<int>|null $scenarioIDs
     */
    #[Optional('scenario_ids', list: 'int')]
    public ?array $scenarioIDs;

    /** @var list<ScenariosData>|null $scenariosData */
    #[Optional('scenarios_data', list: ScenariosData::class)]
    public ?array $scenariosData;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional]
    public ?string $timezone;

    /**
     * `new ScheduledTestJob()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledTestJob::with(
     *   id: ...,
     *   agent: ...,
     *   createdAt: ...,
     *   crontabExpression: ...,
     *   isActive: ...,
     *   name: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScheduledTestJob)
     *   ->withID(...)
     *   ->withAgent(...)
     *   ->withCreatedAt(...)
     *   ->withCrontabExpression(...)
     *   ->withIsActive(...)
     *   ->withName(...)
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
     * @param NotifyOn|value-of<NotifyOn>|null $notifyOn
     * @param list<int>|null $personalities
     * @param list<int>|null $scenarioIDs
     * @param list<ScenariosData|ScenariosDataShape>|null $scenariosData
     * @param list<string>|null $tags
     */
    public static function with(
        int $id,
        int $agent,
        \DateTimeInterface $createdAt,
        string $crontabExpression,
        bool $isActive,
        string $name,
        \DateTimeInterface $updatedAt,
        int|Omitted|null $personality = Omitted::VALUE,
        ?string $executionMode = null,
        ?int $frequency = null,
        NotifyOn|string|null $notifyOn = null,
        ?array $personalities = null,
        ?bool $runAsText = null,
        ?array $scenarioIDs = null,
        ?array $scenariosData = null,
        ?array $tags = null,
        ?string $timezone = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['agent'] = $agent;
        $self['createdAt'] = $createdAt;
        $self['crontabExpression'] = $crontabExpression;
        $self['isActive'] = $isActive;
        $self['name'] = $name;
        $self['updatedAt'] = $updatedAt;

        null !== $executionMode && $self['executionMode'] = $executionMode;
        null !== $frequency && $self['frequency'] = $frequency;
        null !== $notifyOn && $self['notifyOn'] = $notifyOn;
        null !== $personalities && $self['personalities'] = $personalities;
        Omitted::VALUE !== $personality && $self['personality'] = $personality;
        null !== $runAsText && $self['runAsText'] = $runAsText;
        null !== $scenarioIDs && $self['scenarioIDs'] = $scenarioIDs;
        null !== $scenariosData && $self['scenariosData'] = $scenariosData;
        null !== $tags && $self['tags'] = $tags;
        null !== $timezone && $self['timezone'] = $timezone;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ID of the test agent the job belongs to.
     */
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

    /**
     * Cron expression controlling when the job runs, in the job's timezone.
     */
    public function withCrontabExpression(string $crontabExpression): self
    {
        $self = clone $this;
        $self['crontabExpression'] = $crontabExpression;

        return $self;
    }

    public function withIsActive(bool $isActive): self
    {
        $self = clone $this;
        $self['isActive'] = $isActive;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Execution mode for the test runs, such as voice, text, or sip.
     */
    public function withExecutionMode(string $executionMode): self
    {
        $self = clone $this;
        $self['executionMode'] = $executionMode;

        return $self;
    }

    public function withFrequency(int $frequency): self
    {
        $self = clone $this;
        $self['frequency'] = $frequency;

        return $self;
    }

    /**
     * When the job sends a notification.
     *
     * @param NotifyOn|value-of<NotifyOn> $notifyOn
     */
    public function withNotifyOn(NotifyOn|string $notifyOn): self
    {
        $self = clone $this;
        $self['notifyOn'] = $notifyOn;

        return $self;
    }

    /**
     * @param list<int> $personalities
     */
    public function withPersonalities(array $personalities): self
    {
        $self = clone $this;
        $self['personalities'] = $personalities;

        return $self;
    }

    public function withPersonality(?int $personality): self
    {
        $self = clone $this;
        $self['personality'] = $personality;

        return $self;
    }

    /**
     * Whether the job runs scenarios as text chat rather than voice calls.
     */
    public function withRunAsText(bool $runAsText): self
    {
        $self = clone $this;
        $self['runAsText'] = $runAsText;

        return $self;
    }

    /**
     * Scenario IDs the job executes.
     *
     * @param list<int> $scenarioIDs
     */
    public function withScenarioIDs(array $scenarioIDs): self
    {
        $self = clone $this;
        $self['scenarioIDs'] = $scenarioIDs;

        return $self;
    }

    /**
     * @param list<ScenariosData|ScenariosDataShape> $scenariosData
     */
    public function withScenariosData(array $scenariosData): self
    {
        $self = clone $this;
        $self['scenariosData'] = $scenariosData;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    public function withTimezone(string $timezone): self
    {
        $self = clone $this;
        $self['timezone'] = $timezone;

        return $self;
    }
}
