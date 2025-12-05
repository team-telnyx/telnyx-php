<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConnectionNameShape = array{contains?: string|null}
 */
final class ConnectionName implements BaseModel
{
    /** @use SdkModel<ConnectionNameShape> */
    use SdkModel;

    /**
     * If present, connections with <code>connection_name</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    #[Api(optional: true)]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $obj = new self;

        null !== $contains && $obj['contains'] = $contains;

        return $obj;
    }

    /**
     * If present, connections with <code>connection_name</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj['contains'] = $contains;

        return $obj;
    }
}
