<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\UploadListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocationIDShape = array{eq?: string|null}
 */
final class LocationID implements BaseModel
{
    /** @use SdkModel<LocationIDShape> */
    use SdkModel;

    /**
     * The location ID to filter by.
     */
    #[Optional]
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

        null !== $eq && $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * The location ID to filter by.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }
}
