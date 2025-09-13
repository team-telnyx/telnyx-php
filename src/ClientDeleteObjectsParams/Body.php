<?php

declare(strict_types=1);

namespace Telnyx\ClientDeleteObjectsParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type body_alias = array{key?: string}
 */
final class Body implements BaseModel
{
    /** @use SdkModel<body_alias> */
    use SdkModel;

    #[Api('Key', optional: true)]
    public ?string $key;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $key = null): self
    {
        $obj = new self;

        null !== $key && $obj->key = $key;

        return $obj;
    }

    public function withKey(string $key): self
    {
        $obj = clone $this;
        $obj->key = $key;

        return $obj;
    }
}
