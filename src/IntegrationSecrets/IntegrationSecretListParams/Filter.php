<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets\IntegrationSecretListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter\Type;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[type].
 *
 * @phpstan-type filter_alias = array{type?: value-of<Type>}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(Type|string|null $type = null): self
    {
        $obj = new self;

        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
