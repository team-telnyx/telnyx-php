<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates one or more fields on an agent while its status is `CREATED`. Submitted agents cannot be changed through this endpoint.
 *
 * @see Telnyx\Services\Rcs\AgentsService::update()
 *
 * @phpstan-import-type AgentConfigurationShape from \Telnyx\Rcs\Agents\AgentConfiguration
 *
 * @phpstan-type AgentUpdateParamsShape = array{
 *   configuration?: null|AgentConfiguration|AgentConfigurationShape,
 *   displayName?: string|null,
 *   hostingRegion?: string|null,
 *   profileID?: string|null,
 *   useCase?: null|AgentUseCase|value-of<AgentUseCase>,
 * }
 */
final class AgentUpdateParams implements BaseModel
{
    /** @use SdkModel<AgentUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?AgentConfiguration $configuration;

    #[Optional('display_name')]
    public ?string $displayName;

    #[Optional('hosting_region')]
    public ?string $hostingRegion;

    #[Optional('profile_id')]
    public ?string $profileID;

    /** @var value-of<AgentUseCase>|null $useCase */
    #[Optional('use_case', enum: AgentUseCase::class)]
    public ?string $useCase;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AgentConfiguration|AgentConfigurationShape|null $configuration
     * @param AgentUseCase|value-of<AgentUseCase>|null $useCase
     */
    public static function with(
        AgentConfiguration|array|null $configuration = null,
        ?string $displayName = null,
        ?string $hostingRegion = null,
        ?string $profileID = null,
        AgentUseCase|string|null $useCase = null,
    ): self {
        $self = new self;

        null !== $configuration && $self['configuration'] = $configuration;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $hostingRegion && $self['hostingRegion'] = $hostingRegion;
        null !== $profileID && $self['profileID'] = $profileID;
        null !== $useCase && $self['useCase'] = $useCase;

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

    public function withHostingRegion(string $hostingRegion): self
    {
        $self = clone $this;
        $self['hostingRegion'] = $hostingRegion;

        return $self;
    }

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

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
}
