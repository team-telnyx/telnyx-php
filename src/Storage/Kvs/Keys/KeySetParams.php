<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs\Keys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\FileParam;

/**
 * Creates or replaces the value for a key. The request body is stored verbatim as the value — no base64, no JSON envelope — up to 1 MiB. The request's `Content-Type` header is stored with the value and echoed back on retrieval. Returns `201` when the key is created and `200` when an existing key is updated.
 *
 * @see Telnyx\Services\Storage\Kvs\KeysService::set()
 *
 * @phpstan-type KeySetParamsShape = array{
 *   id: string, body: string|FileParam, ttlSecs?: int|null
 * }
 */
final class KeySetParams implements BaseModel
{
    /** @use SdkModel<KeySetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * Raw value bytes, stored verbatim.
     */
    #[Required]
    public string $body;

    /**
     * Time-to-live in seconds. When set, the key expires and is deleted after this duration. Requires a namespace provisioned with TTL support; namespaces without it return a `409`.
     */
    #[Optional]
    public ?int $ttlSecs;

    /**
     * `new KeySetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KeySetParams::with(id: ..., body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KeySetParams)->withID(...)->withBody(...)
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
    public static function with(
        string $id,
        string|FileParam $body,
        ?int $ttlSecs = null
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['body'] = $body;

        null !== $ttlSecs && $self['ttlSecs'] = $ttlSecs;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Raw value bytes, stored verbatim.
     */
    public function withBody(string|FileParam $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * Time-to-live in seconds. When set, the key expires and is deleted after this duration. Requires a namespace provisioned with TTL support; namespaces without it return a `409`.
     */
    public function withTtlSecs(int $ttlSecs): self
    {
        $self = clone $this;
        $self['ttlSecs'] = $ttlSecs;

        return $self;
    }
}
