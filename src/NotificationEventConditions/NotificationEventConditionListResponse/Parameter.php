<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ParameterShape = array{
 *   dataType?: string|null, name?: string|null, optional?: bool|null
 * }
 */
final class Parameter implements BaseModel
{
    /** @use SdkModel<ParameterShape> */
    use SdkModel;

    #[Optional('data_type')]
    public ?string $dataType;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?bool $optional;

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
        ?string $dataType = null,
        ?string $name = null,
        ?bool $optional = null
    ): self {
        $self = new self;

        null !== $dataType && $self['dataType'] = $dataType;
        null !== $name && $self['name'] = $name;
        null !== $optional && $self['optional'] = $optional;

        return $self;
    }

    public function withDataType(string $dataType): self
    {
        $self = clone $this;
        $self['dataType'] = $dataType;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOptional(bool $optional): self
    {
        $self = clone $this;
        $self['optional'] = $optional;

        return $self;
    }
}
