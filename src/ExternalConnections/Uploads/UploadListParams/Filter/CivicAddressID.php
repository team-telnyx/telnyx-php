<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\UploadListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type civic_address_id = array{eq?: string|null}
 */
final class CivicAddressID implements BaseModel
{
    /** @use SdkModel<civic_address_id> */
    use SdkModel;

    /**
     * The civic address ID to filter by.
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
     * The civic address ID to filter by.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }
}
