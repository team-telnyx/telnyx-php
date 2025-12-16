<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ManagedAccountShape from \Telnyx\ManagedAccounts\ManagedAccount
 *
 * @phpstan-type ManagedAccountGetResponseShape = array{
 *   data?: null|ManagedAccount|ManagedAccountShape
 * }
 */
final class ManagedAccountGetResponse implements BaseModel
{
    /** @use SdkModel<ManagedAccountGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ManagedAccount $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ManagedAccountShape $data
     */
    public static function with(ManagedAccount|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ManagedAccountShape $data
     */
    public function withData(ManagedAccount|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
