<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A key on an instance, without its value.
 *
 * @phpstan-type AgentGatewayKeyShape = array{
 *   id: string,
 *   blocked: bool,
 *   budgetResetsAt: \DateTimeInterface|null,
 *   budgetResetsEvery: string|null,
 *   createdAt: \DateTimeInterface|null,
 *   expiresAt: \DateTimeInterface|null,
 *   maxBudget: float|null,
 *   maxParallelRequests: int|null,
 *   models: list<string>,
 *   name: string|null,
 *   requestsPerMinute: int|null,
 *   spend: float,
 *   teamID: string|null,
 *   tokensPerMinute: int|null,
 * }
 */
final class AgentGatewayKey implements BaseModel
{
    /** @use SdkModel<AgentGatewayKeyShape> */
    use SdkModel;

    /**
     * Identifies the key. It is a 64-character hash the instance stores in place of the key's value.
     */
    #[Required]
    public string $id;

    /**
     * Whether the instance refuses the key.
     */
    #[Required]
    public bool $blocked;

    /**
     * When the key's spend next resets.
     */
    #[Required('budget_resets_at')]
    public ?\DateTimeInterface $budgetResetsAt;

    /**
     * How often the key's spend resets, such as `30d`.
     */
    #[Required('budget_resets_every')]
    public ?string $budgetResetsEvery;

    /**
     * When the key was issued.
     */
    #[Required('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * When the key stops working; `null` when it does not expire.
     */
    #[Required('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * The most the key may spend, in USD, until its budget resets.
     */
    #[Required('max_budget')]
    public ?float $maxBudget;

    /**
     * The most requests the key may have in flight at once.
     */
    #[Required('max_parallel_requests')]
    public ?int $maxParallelRequests;

    /**
     * The models the key may use. Empty means every model the instance serves.
     *
     * @var list<string> $models
     */
    #[Required(list: 'string')]
    public array $models;

    /**
     * A label for people; `null` when none was given.
     */
    #[Required]
    public ?string $name;

    /**
     * The most requests the key may make per minute.
     */
    #[Required('requests_per_minute')]
    public ?int $requestsPerMinute;

    /**
     * What the key has spent since its budget last reset, in USD.
     */
    #[Required]
    public float $spend;

    /**
     * The team the key belongs to, if any.
     */
    #[Required('team_id')]
    public ?string $teamID;

    /**
     * The most tokens the key may use per minute.
     */
    #[Required('tokens_per_minute')]
    public ?int $tokensPerMinute;

    /**
     * `new AgentGatewayKey()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayKey::with(
     *   id: ...,
     *   blocked: ...,
     *   budgetResetsAt: ...,
     *   budgetResetsEvery: ...,
     *   createdAt: ...,
     *   expiresAt: ...,
     *   maxBudget: ...,
     *   maxParallelRequests: ...,
     *   models: ...,
     *   name: ...,
     *   requestsPerMinute: ...,
     *   spend: ...,
     *   teamID: ...,
     *   tokensPerMinute: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayKey)
     *   ->withID(...)
     *   ->withBlocked(...)
     *   ->withBudgetResetsAt(...)
     *   ->withBudgetResetsEvery(...)
     *   ->withCreatedAt(...)
     *   ->withExpiresAt(...)
     *   ->withMaxBudget(...)
     *   ->withMaxParallelRequests(...)
     *   ->withModels(...)
     *   ->withName(...)
     *   ->withRequestsPerMinute(...)
     *   ->withSpend(...)
     *   ->withTeamID(...)
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
        ?\DateTimeInterface $expiresAt,
        ?float $maxBudget,
        ?int $maxParallelRequests,
        array $models,
        ?string $name,
        ?int $requestsPerMinute,
        float $spend,
        ?string $teamID,
        ?int $tokensPerMinute,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['blocked'] = $blocked;
        $self['budgetResetsAt'] = $budgetResetsAt;
        $self['budgetResetsEvery'] = $budgetResetsEvery;
        $self['createdAt'] = $createdAt;
        $self['expiresAt'] = $expiresAt;
        $self['maxBudget'] = $maxBudget;
        $self['maxParallelRequests'] = $maxParallelRequests;
        $self['models'] = $models;
        $self['name'] = $name;
        $self['requestsPerMinute'] = $requestsPerMinute;
        $self['spend'] = $spend;
        $self['teamID'] = $teamID;
        $self['tokensPerMinute'] = $tokensPerMinute;

        return $self;
    }

    /**
     * Identifies the key. It is a 64-character hash the instance stores in place of the key's value.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether the instance refuses the key.
     */
    public function withBlocked(bool $blocked): self
    {
        $self = clone $this;
        $self['blocked'] = $blocked;

        return $self;
    }

    /**
     * When the key's spend next resets.
     */
    public function withBudgetResetsAt(
        ?\DateTimeInterface $budgetResetsAt
    ): self {
        $self = clone $this;
        $self['budgetResetsAt'] = $budgetResetsAt;

        return $self;
    }

    /**
     * How often the key's spend resets, such as `30d`.
     */
    public function withBudgetResetsEvery(?string $budgetResetsEvery): self
    {
        $self = clone $this;
        $self['budgetResetsEvery'] = $budgetResetsEvery;

        return $self;
    }

    /**
     * When the key was issued.
     */
    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * When the key stops working; `null` when it does not expire.
     */
    public function withExpiresAt(?\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * The most the key may spend, in USD, until its budget resets.
     */
    public function withMaxBudget(?float $maxBudget): self
    {
        $self = clone $this;
        $self['maxBudget'] = $maxBudget;

        return $self;
    }

    /**
     * The most requests the key may have in flight at once.
     */
    public function withMaxParallelRequests(?int $maxParallelRequests): self
    {
        $self = clone $this;
        $self['maxParallelRequests'] = $maxParallelRequests;

        return $self;
    }

    /**
     * The models the key may use. Empty means every model the instance serves.
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
     * A label for people; `null` when none was given.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The most requests the key may make per minute.
     */
    public function withRequestsPerMinute(?int $requestsPerMinute): self
    {
        $self = clone $this;
        $self['requestsPerMinute'] = $requestsPerMinute;

        return $self;
    }

    /**
     * What the key has spent since its budget last reset, in USD.
     */
    public function withSpend(float $spend): self
    {
        $self = clone $this;
        $self['spend'] = $spend;

        return $self;
    }

    /**
     * The team the key belongs to, if any.
     */
    public function withTeamID(?string $teamID): self
    {
        $self = clone $this;
        $self['teamID'] = $teamID;

        return $self;
    }

    /**
     * The most tokens the key may use per minute.
     */
    public function withTokensPerMinute(?int $tokensPerMinute): self
    {
        $self = clone $this;
        $self['tokensPerMinute'] = $tokensPerMinute;

        return $self;
    }
}
