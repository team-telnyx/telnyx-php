<?php

declare(strict_types=1);

namespace Telnyx\NotificationSettings\NotificationSettingCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ParameterShape = array{name?: string|null, value?: string|null}
 */
final class Parameter implements BaseModel
{
    /** @use SdkModel<ParameterShape> */
    use SdkModel;

    #[Optional]
    public ?string $name;

    #[Optional]
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
    public static function with(?string $name = null, ?string $value = null): self
    {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
