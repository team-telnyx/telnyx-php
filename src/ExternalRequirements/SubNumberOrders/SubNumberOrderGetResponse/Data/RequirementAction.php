<?php

declare(strict_types=1);

namespace Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type RequirementActionShape = array{
 *   type?: string|null, value?: string|null
 * }
 */
final class RequirementAction implements BaseModel
{
    /** @use SdkModel<RequirementActionShape> */
    use SdkModel;

    /**
     * The type of action the end user must complete.
     */
    #[Optional]
    public ?string $type;

    /**
     * The action value. For ID verification this is the verification link URL, or null until it has been generated.
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
        string|Omitted|null $value = Omitted::VALUE,
        ?string $type = null
    ): self {
        $self = new self;

        null !== $type && $self['type'] = $type;
        Omitted::VALUE !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * The type of action the end user must complete.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The action value. For ID verification this is the verification link URL, or null until it has been generated.
     */
    public function withValue(?string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
