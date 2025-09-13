<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Direction filtering operations.
 *
 * @phpstan-type direction_alias = array{eq?: string}
 */
final class Direction implements BaseModel
{
    /** @use SdkModel<direction_alias> */
    use SdkModel;

    /**
     * The direction, inbound or outbound, for filtering faxes sent from this account.
     */
    #[Api(optional: true)]
    public ?string $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $eq = null): self
    {
        $obj = new self;

        null !== $eq && $obj->eq = $eq;

        return $obj;
    }

    /**
     * The direction, inbound or outbound, for filtering faxes sent from this account.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }
}
