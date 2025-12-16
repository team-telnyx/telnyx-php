<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FaxApplicationShape from \Telnyx\FaxApplications\FaxApplication
 *
 * @phpstan-type FaxApplicationUpdateResponseShape = array{
 *   data?: null|FaxApplication|FaxApplicationShape
 * }
 */
final class FaxApplicationUpdateResponse implements BaseModel
{
    /** @use SdkModel<FaxApplicationUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?FaxApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FaxApplicationShape $data
     */
    public static function with(FaxApplication|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param FaxApplicationShape $data
     */
    public function withData(FaxApplication|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
