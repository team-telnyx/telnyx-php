<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type location_id = array{eq?: string|null}
 */
final class LocationID implements BaseModel
{
    /** @use SdkModel<location_id> */
    use SdkModel;

    /**
     * The location ID to filter by.
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
     * The location ID to filter by.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }
}
