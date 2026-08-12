<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections\FqdnAuthentication;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FqdnAuthenticationShape from \Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthentication
 *
 * @phpstan-type FqdnAuthenticationPatchAllResponseShape = array{
 *   data?: null|FqdnAuthentication|FqdnAuthenticationShape
 * }
 */
final class FqdnAuthenticationPatchAllResponse implements BaseModel
{
    /** @use SdkModel<FqdnAuthenticationPatchAllResponseShape> */
    use SdkModel;

    #[Optional]
    public ?FqdnAuthentication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FqdnAuthentication|FqdnAuthenticationShape|null $data
     */
    public static function with(FqdnAuthentication|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param FqdnAuthentication|FqdnAuthenticationShape $data
     */
    public function withData(FqdnAuthentication|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
