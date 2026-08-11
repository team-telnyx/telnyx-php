<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates an editable RCS agent draft under a brand. The `Idempotency-Key` is scoped to the authenticated organization. Reusing the key with the same request returns the original agent, while reusing it with a different request returns a conflict.
 *
 * @see Telnyx\Services\Rcs\AgentsService::create()
 *
 * @phpstan-import-type AgentConfigurationShape from \Telnyx\Rcs\Agents\AgentConfiguration
 *
 * @phpstan-type AgentCreateParamsShape = array{
 *   brandID: string,
 *   configuration: AgentConfiguration|AgentConfigurationShape,
 *   displayName: string,
 *   useCase: AgentUseCase|value-of<AgentUseCase>,
 *   idempotencyKey: string,
 *   hostingRegion?: string|null,
 *   profileID?: string|null,
 * }
 */
final class AgentCreateParams implements BaseModel
{
    /** @use SdkModel<AgentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('brand_id')]
    public string $brandID;

    #[Required]
    public AgentConfiguration $configuration;

    #[Required('display_name')]
    public string $displayName;

    /** @var value-of<AgentUseCase> $useCase */
    #[Required('use_case', enum: AgentUseCase::class)]
    public string $useCase;

    #[Required]
    public string $idempotencyKey;

    #[Optional('hosting_region', nullable: true)]
    public ?string $hostingRegion;

    /**
     * A Messaging Profile owned by the authenticated organization. When omitted, the agent inherits the brand profile.
     */
    #[Optional('profile_id', nullable: true)]
    public ?string $profileID;

    /**
     * `new AgentCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentCreateParams::with(
     *   brandID: ...,
     *   configuration: ...,
     *   displayName: ...,
     *   useCase: ...,
     *   idempotencyKey: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentCreateParams)
     *   ->withBrandID(...)
     *   ->withConfiguration(...)
     *   ->withDisplayName(...)
     *   ->withUseCase(...)
     *   ->withIdempotencyKey(...)
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
     * @param AgentConfiguration|AgentConfigurationShape $configuration
     * @param AgentUseCase|value-of<AgentUseCase> $useCase
     */
    public static function with(
        string $brandID,
        AgentConfiguration|array $configuration,
        string $displayName,
        AgentUseCase|string $useCase,
        string $idempotencyKey,
        ?string $hostingRegion = null,
        ?string $profileID = null,
    ): self {
        $self = new self;

        $self['brandID'] = $brandID;
        $self['configuration'] = $configuration;
        $self['displayName'] = $displayName;
        $self['useCase'] = $useCase;
        $self['idempotencyKey'] = $idempotencyKey;

        null !== $hostingRegion && $self['hostingRegion'] = $hostingRegion;
        null !== $profileID && $self['profileID'] = $profileID;

        return $self;
    }

    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * @param AgentConfiguration|AgentConfigurationShape $configuration
     */
    public function withConfiguration(
        AgentConfiguration|array $configuration
    ): self {
        $self = clone $this;
        $self['configuration'] = $configuration;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * @param AgentUseCase|value-of<AgentUseCase> $useCase
     */
    public function withUseCase(AgentUseCase|string $useCase): self
    {
        $self = clone $this;
        $self['useCase'] = $useCase;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    public function withHostingRegion(?string $hostingRegion): self
    {
        $self = clone $this;
        $self['hostingRegion'] = $hostingRegion;

        return $self;
    }

    /**
     * A Messaging Profile owned by the authenticated organization. When omitted, the agent inherits the brand profile.
     */
    public function withProfileID(?string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }
}
