<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LogMessageDismissResponseShape = array{success?: bool|null}
 */
final class LogMessageDismissResponse implements BaseModel
{
    /** @use SdkModel<LogMessageDismissResponseShape> */
    use SdkModel;

    /**
     * Describes wether or not the operation was successful.
     */
    #[Optional]
    public ?bool $success;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $success = null): self
    {
        $self = new self;

        null !== $success && $self['success'] = $success;

        return $self;
    }

    /**
     * Describes wether or not the operation was successful.
     */
    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
