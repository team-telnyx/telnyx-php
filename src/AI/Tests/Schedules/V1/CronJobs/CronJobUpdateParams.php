<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\Schedules\V1\CronJobs;

use Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobUpdateParams\NotifyOn;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Updates the specified scheduled test job.
 *
 * @see Telnyx\Services\AI\Tests\Schedules\V1\CronJobsService::update()
 *
 * @phpstan-type CronJobUpdateParamsShape = array{
 *   agent?: int|null,
 *   crontabExpression?: string|null,
 *   executionMode?: string|null,
 *   frequency?: int|null,
 *   isActive?: bool|null,
 *   name?: string|null,
 *   notifyOn?: null|NotifyOn|value-of<NotifyOn>,
 *   personalities?: list<int>|null,
 *   runAsText?: bool|null,
 *   scenarios?: list<int>|null,
 *   tags?: list<string>|null,
 *   timezone?: string|null,
 * }
 */
final class CronJobUpdateParams implements BaseModel
{
    /** @use SdkModel<CronJobUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?int $agent;

    /**
     * Cron expression controlling when the job runs.
     */
    #[Optional('crontab_expression')]
    public ?string $crontabExpression;

    /**
     * Execution mode for the test runs, such as voice, text, or sip.
     */
    #[Optional('execution_mode')]
    public ?string $executionMode;

    #[Optional]
    public ?int $frequency;

    #[Optional('is_active')]
    public ?bool $isActive;

    #[Optional]
    public ?string $name;

    /** @var value-of<NotifyOn>|null $notifyOn */
    #[Optional('notify_on', enum: NotifyOn::class)]
    public ?string $notifyOn;

    /** @var list<int>|null $personalities */
    #[Optional(list: 'int')]
    public ?array $personalities;

    #[Optional('run_as_text')]
    public ?bool $runAsText;

    /** @var list<int>|null $scenarios */
    #[Optional(list: 'int')]
    public ?array $scenarios;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional]
    public ?string $timezone;

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
     * @param list<int>|null $scenarios
     * @param list<string>|null $tags
     */
    public static function with(
        int|Omitted|null $agent = Omitted::VALUE,
        ?string $crontabExpression = null,
        ?string $executionMode = null,
        ?int $frequency = null,
        ?bool $isActive = null,
        ?string $name = null,
        NotifyOn|string|null $notifyOn = null,
        ?array $personalities = null,
        ?bool $runAsText = null,
        ?array $scenarios = null,
        ?array $tags = null,
        ?string $timezone = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $agent && $self['agent'] = $agent;
        null !== $crontabExpression && $self['crontabExpression'] = $crontabExpression;
        null !== $executionMode && $self['executionMode'] = $executionMode;
        null !== $frequency && $self['frequency'] = $frequency;
        null !== $isActive && $self['isActive'] = $isActive;
        null !== $name && $self['name'] = $name;
        null !== $notifyOn && $self['notifyOn'] = $notifyOn;
        null !== $personalities && $self['personalities'] = $personalities;
        null !== $runAsText && $self['runAsText'] = $runAsText;
        null !== $scenarios && $self['scenarios'] = $scenarios;
        null !== $tags && $self['tags'] = $tags;
        null !== $timezone && $self['timezone'] = $timezone;

        return $self;
    }

    public function withAgent(?int $agent): self
    {
        $self = clone $this;
        $self['agent'] = $agent;

        return $self;
    }

    /**
     * Cron expression controlling when the job runs.
     */
    public function withCrontabExpression(string $crontabExpression): self
    {
        $self = clone $this;
        $self['crontabExpression'] = $crontabExpression;

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

    /**
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

    public function withRunAsText(bool $runAsText): self
    {
        $self = clone $this;
        $self['runAsText'] = $runAsText;

        return $self;
    }

    /**
     * @param list<int> $scenarios
     */
    public function withScenarios(array $scenarios): self
    {
        $self = clone $this;
        $self['scenarios'] = $scenarios;

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
