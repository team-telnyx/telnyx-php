<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FaxShape from \Telnyx\Faxes\Fax
 *
 * @phpstan-type FaxGetResponseShape = array{data?: null|Fax|FaxShape}
 */
final class FaxGetResponse implements BaseModel
{
    /** @use SdkModel<FaxGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Fax $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FaxShape $data
     */
    public static function with(Fax|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param FaxShape $data
     */
    public function withData(Fax|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
