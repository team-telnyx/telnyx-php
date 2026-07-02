<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs\Keys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes a key. Idempotent: deleting a key that does not exist still succeeds. The namespace itself must exist and be provisioned.
 *
 * @see Telnyx\Services\Storage\Kvs\KeysService::delete()
 *
 * @phpstan-type KeyDeleteParamsShape = array{id: string}
 */
final class KeyDeleteParams implements BaseModel
{
    /** @use SdkModel<KeyDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new KeyDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KeyDeleteParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KeyDeleteParams)->withID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
