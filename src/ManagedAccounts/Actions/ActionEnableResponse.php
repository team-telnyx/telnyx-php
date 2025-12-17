<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccount;

/**
 * @phpstan-import-type ManagedAccountShape from \Telnyx\ManagedAccounts\ManagedAccount
 *
 * @phpstan-type ActionEnableResponseShape = array{
 *   data?: null|ManagedAccount|ManagedAccountShape
 * }
 */
final class ActionEnableResponse implements BaseModel
{
    /** @use SdkModel<ActionEnableResponseShape> */
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
     * @param ManagedAccount|ManagedAccountShape|null $data
     */
    public static function with(ManagedAccount|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ManagedAccount|ManagedAccountShape $data
     */
    public function withData(ManagedAccount|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
