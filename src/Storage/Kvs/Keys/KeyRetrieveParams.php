<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs\Keys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the raw stored value for a key. The response body is the value exactly as it was written; the `Content-Type` header echoes the value's stored content type (defaults to `application/octet-stream`).
 *
 * @see Telnyx\Services\Storage\Kvs\KeysService::retrieve()
 *
 * @phpstan-type KeyRetrieveParamsShape = array{id: string}
 */
final class KeyRetrieveParams implements BaseModel
{
    /** @use SdkModel<KeyRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new KeyRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KeyRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KeyRetrieveParams)->withID(...)
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
