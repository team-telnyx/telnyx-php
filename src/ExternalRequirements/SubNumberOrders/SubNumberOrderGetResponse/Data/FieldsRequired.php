<?php

declare(strict_types=1);

namespace Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FieldsRequiredShape = array{
 *   description?: string|null,
 *   name?: string|null,
 *   type?: string|null,
 *   value?: string|null,
 * }
 */
final class FieldsRequired implements BaseModel
{
    /** @use SdkModel<FieldsRequiredShape> */
    use SdkModel;

    #[Optional]
    public ?string $description;

    /**
     * The field name to send inside the `requirement` object on the POST.
     */
    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $type;

    /**
     * The value already stored for this field, or null if not yet provided.
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
        ?string $description = null,
        ?string $name = null,
        ?string $type = null,
        ?string $value = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $type && $self['type'] = $type;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The field name to send inside the `requirement` object on the POST.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The value already stored for this field, or null if not yet provided.
     */
    public function withValue(?string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
