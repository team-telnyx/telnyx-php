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
    public bool $accepted;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(accepted: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withAccepted(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(bool $accepted): self
    {
        $self = new self;

        $self['accepted'] = $accepted;

        return $self;
    }

    public function withAccepted(bool $accepted): self
    {
        $self = clone $this;
        $self['accepted'] = $accepted;

        return $self;
    }
}
