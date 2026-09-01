<?php

declare(strict_types=1);

namespace Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RequirementActionShape = array{
 *   type?: string|null, value?: string|null
 * }
 */
final class RequirementAction implements BaseModel
{
    /** @use SdkModel<RequirementActionShape> */
    use SdkModel;

    #[Optional]
    public ?string $type;

    /**
     * For Australia mobile ID verification, the unique Onfido verification link to share with the end user.
     */
    #[Optional(nullable: true)]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $type = null,
        ?string $value = null
    ): self {
        $self = new self;

        null !== $type && $self['type'] = $type;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * For Australia mobile ID verification, the unique Onfido verification link to share with the end user.
     */
    public function withValue(?string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
