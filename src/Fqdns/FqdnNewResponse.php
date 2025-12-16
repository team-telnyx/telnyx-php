<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FqdnShape from \Telnyx\Fqdns\Fqdn
 *
 * @phpstan-type FqdnNewResponseShape = array{data?: null|Fqdn|FqdnShape}
 */
final class FqdnNewResponse implements BaseModel
{
    /** @use SdkModel<FqdnNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Fqdn $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FqdnShape $data
     */
    public static function with(Fqdn|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param FqdnShape $data
     */
    public function withData(Fqdn|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
