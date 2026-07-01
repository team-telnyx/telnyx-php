<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingActionRequirementShape from \Telnyx\PortingOrders\ActionRequirements\PortingActionRequirement
 *
 * @phpstan-type ActionRequirementInitiateResponseShape = array{
 *   data?: null|PortingActionRequirement|PortingActionRequirementShape
 * }
 */
final class ActionRequirementInitiateResponse implements BaseModel
{
    /** @use SdkModel<ActionRequirementInitiateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingActionRequirement $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingActionRequirement|PortingActionRequirementShape|null $data
     */
    public static function with(
        PortingActionRequirement|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingActionRequirement|PortingActionRequirementShape $data
     */
    public function withData(PortingActionRequirement|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
