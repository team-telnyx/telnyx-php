<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EnterprisePublicShape from \Telnyx\Enterprises\EnterprisePublic
 *
 * @phpstan-type EnterpriseGetResponseShape = array{
 *   data?: null|EnterprisePublic|EnterprisePublicShape
 * }
 */
final class EnterpriseGetResponse implements BaseModel
{
    /** @use SdkModel<EnterpriseGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?EnterprisePublic $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EnterprisePublic|EnterprisePublicShape|null $data
     */
    public static function with(EnterprisePublic|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param EnterprisePublic|EnterprisePublicShape $data
     */
    public function withData(EnterprisePublic|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
