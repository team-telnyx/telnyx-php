<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Teams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A team on an instance: a model list, a budget, and rate limits that its keys share.
 *
 * @phpstan-type AgentGatewayTeamShape = array{
 *   id: string,
 *   blocked: bool,
 *   budgetResetsAt: \DateTimeInterface|null,
 *   budgetResetsEvery: string|null,
 *   createdAt: \DateTimeInterface|null,
 *   maxBudget: float|null,
 *   models: list<string>,
 *   name: string|null,
 *   requestsPerMinute: int|null,
 *   spend: float,
 *   tokensPerMinute: int|null,
 * }
 */
final class AgentGatewayTeam implements BaseModel
{
    /** @use SdkModel<AgentGatewayTeamShape> */
    use SdkModel;

    /**
     * Identifies the team.
     */
    #[Required]
    public string $id;

    /**
     * Whether the instance refuses every key in the team.
     */
    #[Required]
    public bool $blocked;

    /**
     * When the team's spend next resets.
     */
    #[Required('budget_resets_at')]
    public ?\DateTimeInterface $budgetResetsAt;

    /**
     * How often the team's spend resets, such as `30d`.
     */
    #[Required('budget_resets_every')]
    public ?string $budgetResetsEvery;

    /**
     * When the team was created.
     */
    #[Required('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The most the team's keys may spend together, in USD, until the budget resets.
     */
    #[Required('max_budget')]
    public ?float $maxBudget;

    /**
     * The models the team's keys may use. Empty means every model the instance serves.
     *
     * @var list<string> $models
     */
    #[Required(list: 'string')]
    public array $models;

    /**
     * A label for people. Names need not be unique.
     */
    #[Required]
    public ?string $name;

    /**
     * The most requests the team's keys may make per minute, together.
     */
    #[Required('requests_per_minute')]
    public ?int $requestsPerMinute;

    /**
     * What the team's keys have spent since the budget last reset, in USD.
     */
    #[Required]
    public float $spend;

    /**
     * The most tokens the team's keys may use per minute, together.
     */
    #[Required('tokens_per_minute')]
    public ?int $tokensPerMinute;

    /**
     * `new AgentGatewayTeam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayTeam::with(
     *   id: ...,
     *   blocked: ...,
     *   budgetResetsAt: ...,
     *   budgetResetsEvery: ...,
     *   createdAt: ...,
     *   maxBudget: ...,
     *   models: ...,
     *   name: ...,
     *   requestsPerMinute: ...,
     *   spend: ...,
     *   tokensPerMinute: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayTeam)
     *   ->withID(...)
     *   ->withBlocked(...)
     *   ->withBudgetResetsAt(...)
     *   ->withBudgetResetsEvery(...)
     *   ->withCreatedAt(...)
     *   ->withMaxBudget(...)
     *   ->withModels(...)
     *   ->withName(...)
     *   ->withRequestsPerMinute(...)
     *   ->withSpend(...)
     *   ->withTokensPerMinute(...)
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
     * @param list<string> $models
     */
    public static function with(
        string $id,
        bool $blocked,
        ?\DateTimeInterface $budgetResetsAt,
        ?string $budgetResetsEvery,
        ?\DateTimeInterface $createdAt,
        ?float $maxBudget,
        array $models,
        ?string $name,
        ?int $requestsPerMinute,
        float $spend,
        ?int $tokensPerMinute,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['blocked'] = $blocked;
        $self['budgetResetsAt'] = $budgetResetsAt;
        $self['budgetResetsEvery'] = $budgetResetsEvery;
        $self['createdAt'] = $createdAt;
        $self['maxBudget'] = $maxBudget;
        $self['models'] = $models;
        $self['name'] = $name;
        $self['requestsPerMinute'] = $requestsPerMinute;
        $self['spend'] = $spend;
        $self['tokensPerMinute'] = $tokensPerMinute;

        return $self;
    }

    /**
     * Identifies the team.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether the instance refuses every key in the team.
     */
    public function withBlocked(bool $blocked): self
    {
        $self = clone $this;
        $self['blocked'] = $blocked;

        return $self;
    }

    /**
     * When the team's spend next resets.
     */
    public function withBudgetResetsAt(
        ?\DateTimeInterface $budgetResetsAt
    ): self {
        $self = clone $this;
        $self['budgetResetsAt'] = $budgetResetsAt;

        return $self;
    }

    /**
     * How often the team's spend resets, such as `30d`.
     */
    public function withBudgetResetsEvery(?string $budgetResetsEvery): self
    {
        $self = clone $this;
        $self['budgetResetsEvery'] = $budgetResetsEvery;

        return $self;
    }

    /**
     * When the team was created.
     */
    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The most the team's keys may spend together, in USD, until the budget resets.
     */
    public function withMaxBudget(?float $maxBudget): self
    {
        $self = clone $this;
        $self['maxBudget'] = $maxBudget;

        return $self;
    }

    /**
     * The models the team's keys may use. Empty means every model the instance serves.
     *
     * @param list<string> $models
     */
    public function withModels(array $models): self
    {
        $self = clone $this;
        $self['models'] = $models;

        return $self;
    }

    /**
     * A label for people. Names need not be unique.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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
     * What the team's keys have spent since the budget last reset, in USD.
     */
    public function withSpend(float $spend): self
    {
        $self = clone $this;
        $self['spend'] = $spend;

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
