<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ParameterShape = array{
 *   dataType?: string, name?: string, optional?: bool
 * }
 */
final class Parameter implements BaseModel
{
    /** @use SdkModel<ParameterShape> */
    use SdkModel;

    #[Api('data_type', optional: true)]
    public ?string $dataType;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $dataType && $obj->dataType = $dataType;
        null !== $name && $obj->name = $name;
        null !== $optional && $obj->optional = $optional;

        return $obj;
    }

    public function withDataType(string $dataType): self
    {
        $obj = clone $this;
        $obj->dataType = $dataType;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withOptional(bool $optional): self
    {
        $obj = clone $this;
        $obj->optional = $optional;

        return $obj;
    }
}
