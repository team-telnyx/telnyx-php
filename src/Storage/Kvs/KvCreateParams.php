<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new KV namespace. Provisioning is asynchronous: the namespace is returned with status `pending` and becomes usable once it reaches `provision_ok`.
 *
 * @see Telnyx\Services\Storage\KvsService::create()
 *
 * @phpstan-type KvCreateParamsShape = array{name: string}
 */
final class KvCreateParams implements BaseModel
{
    /** @use SdkModel<KvCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Namespace name. May contain lowercase letters, numbers, and hyphens only.
     */
    #[Required]
    public string $name;

    /**
     * `new KvCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KvCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KvCreateParams)->withName(...)
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
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * Namespace name. May contain lowercase letters, numbers, and hyphens only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
