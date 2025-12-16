<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TexmlApplicationShape from \Telnyx\TexmlApplications\TexmlApplication
 *
 * @phpstan-type TexmlApplicationUpdateResponseShape = array{
 *   data?: null|TexmlApplication|TexmlApplicationShape
 * }
 */
final class TexmlApplicationUpdateResponse implements BaseModel
{
    /** @use SdkModel<TexmlApplicationUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?TexmlApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TexmlApplicationShape $data
     */
    public static function with(TexmlApplication|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param TexmlApplicationShape $data
     */
    public function withData(TexmlApplication|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
