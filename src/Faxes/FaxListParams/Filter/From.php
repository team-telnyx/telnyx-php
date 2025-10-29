<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * From number filtering operations.
 *
 * @phpstan-type FromShape = array{eq?: string}
 */
final class From implements BaseModel
{
    /** @use SdkModel<FromShape> */
    use SdkModel;

    /**
     * The phone number, in E.164 format for filtering faxes sent from this number.
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
     * The phone number, in E.164 format for filtering faxes sent from this number.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }
}
