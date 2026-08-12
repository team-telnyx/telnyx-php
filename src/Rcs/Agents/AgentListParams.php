<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists RCS agents owned by the authenticated organization, optionally filtered by brand.
 *
 * @see Telnyx\Services\Rcs\AgentsService::list()
 *
 * @phpstan-type AgentListParamsShape = array{brandID?: string|null}
 */
final class AgentListParams implements BaseModel
{
    /** @use SdkModel<AgentListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Only return agents belonging to this brand.
     */
    #[Optional]
    public ?string $brandID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $brandID = null): self
    {
        $self = new self;

        null !== $brandID && $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * Only return agents belonging to this brand.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }
}
