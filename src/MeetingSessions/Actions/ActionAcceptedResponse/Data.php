<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Actions\ActionAcceptedResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{accepted: bool}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public bool $accepted = true;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(): self
    {
        return new self;
    }

    public function withAccepted(bool $accepted): self
    {
        $self = clone $this;
        $self['accepted'] = $accepted;

        return $self;
    }
}
