<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type KvNamespaceShape from \Telnyx\Storage\Kvs\KvNamespace
 *
 * @phpstan-type KvNamespaceResponseWrapperShape = array{
 *   data?: null|KvNamespace|KvNamespaceShape
 * }
 */
final class KvNamespaceResponseWrapper implements BaseModel
{
    /** @use SdkModel<KvNamespaceResponseWrapperShape> */
    use SdkModel;

    #[Optional]
    public ?KvNamespace $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param KvNamespace|KvNamespaceShape|null $data
     */
    public static function with(KvNamespace|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param KvNamespace|KvNamespaceShape $data
     */
    public function withData(KvNamespace|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
