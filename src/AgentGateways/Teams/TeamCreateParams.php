<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Teams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Creates a team on the instance. A team is a model list, a budget, and rate limits that its keys share. Names need not be unique; the `id` identifies the team. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\TeamsService::create()
 *
 * @phpstan-type TeamCreateParamsShape = array{
 *   name: string,
 *   budgetResetsEvery?: string|null,
 *   maxBudget?: float|null,
 *   models?: list<string>|null,
 *   requestsPerMinute?: int|null,
 *   tokensPerMinute?: int|null,
 * }
 */
final class TeamCreateParams implements BaseModel
{
    /** @use SdkModel<TeamCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A label for people.
     */
    #[Required]
    public string $name;

    /**
     * How often the spend resets: a number and a unit, `s`, `m`, `h`, or `d`.
     */
    #[Optional('budget_resets_every', nullable: true)]
    public ?string $budgetResetsEvery;

    /**
     * The most the team's keys may spend together, in USD.
     */
    #[Optional('max_budget', nullable: true)]
    public ?float $maxBudget;

    /**
     * The models the team's keys may use. Leave it out to allow every model.
     *
     * @var list<string>|null $models
     */
    #[Optional(list: 'string', nullable: true)]
    public ?array $models;

    /**
     * The most requests the team's keys may make per minute, together.
     */
    #[Optional('requests_per_minute', nullable: true)]
    public ?int $requestsPerMinute;

    /**
     * The most tokens the team's keys may use per minute, together.
     */
    #[Optional('tokens_per_minute', nullable: true)]
    public ?int $tokensPerMinute;

    /**
     * `new TeamCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TeamCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TeamCreateParams)->withName(...)
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
     * @param list<string>|Omitted|null $models
     */
    public static function with(
        string $name,
        string|Omitted|null $budgetResetsEvery = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        array|Omitted|null $models = Omitted::VALUE,
        int|Omitted|null $requestsPerMinute = Omitted::VALUE,
        int|Omitted|null $tokensPerMinute = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['name'] = $name;

        Omitted::VALUE !== $budgetResetsEvery && $self['budgetResetsEvery'] = $budgetResetsEvery;
        Omitted::VALUE !== $maxBudget && $self['maxBudget'] = $maxBudget;
        Omitted::VALUE !== $models && $self['models'] = $models;
        Omitted::VALUE !== $requestsPerMinute && $self['requestsPerMinute'] = $requestsPerMinute;
        Omitted::VALUE !== $tokensPerMinute && $self['tokensPerMinute'] = $tokensPerMinute;

        return $self;
    }

    /**
     * A label for people.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * How often the spend resets: a number and a unit, `s`, `m`, `h`, or `d`.
     */
    public function withBudgetResetsEvery(?string $budgetResetsEvery): self
    {
        $self = clone $this;
        $self['budgetResetsEvery'] = $budgetResetsEvery;

        return $self;
    }

    /**
     * The most the team's keys may spend together, in USD.
     */
    public function withMaxBudget(?float $maxBudget): self
    {
        $self = clone $this;
        $self['maxBudget'] = $maxBudget;

        return $self;
    }

    /**
     * The models the team's keys may use. Leave it out to allow every model.
     *
     * @param list<string>|null $models
     */
    public function withModels(?array $models): self
    {
        $self = clone $this;
        $self['models'] = $models;

        return $self;
    }

    /**
     * The most requests the team's keys may make per minute, together.
     */
    public function withRequestsPerMinute(?int $requestsPerMinute): self
    {
        $self = clone $this;
        $self['requestsPerMinute'] = $requestsPerMinute;

        return $self;
    }

    /**
     * The most tokens the team's keys may use per minute, together.
     */
    public function withTokensPerMinute(?int $tokensPerMinute): self
    {
        $self = clone $this;
        $self['tokensPerMinute'] = $tokensPerMinute;

        return $self;
    }
}
