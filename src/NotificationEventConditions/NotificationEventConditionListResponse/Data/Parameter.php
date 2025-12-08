<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ParameterShape = array{
 *   data_type?: string|null, name?: string|null, optional?: bool|null
 * }
 */
final class Parameter implements BaseModel
{
    /** @use SdkModel<ParameterShape> */
    use SdkModel;

    #[Optional]
    public ?string $data_type;

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
        ?string $data_type = null,
        ?string $name = null,
        ?bool $optional = null
    ): self {
        $obj = new self;

        null !== $data_type && $obj['data_type'] = $data_type;
        null !== $name && $obj['name'] = $name;
        null !== $optional && $obj['optional'] = $optional;

        return $obj;
    }

    public function withDataType(string $dataType): self
    {
        $obj = clone $this;
        $obj['data_type'] = $dataType;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withOptional(bool $optional): self
    {
        $obj = clone $this;
        $obj['optional'] = $optional;

        return $obj;
    }
}
