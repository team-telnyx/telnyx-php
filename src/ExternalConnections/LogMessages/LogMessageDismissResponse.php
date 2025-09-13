<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type log_message_dismiss_response = array{success?: bool}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class LogMessageDismissResponse implements BaseModel
{
    /** @use SdkModel<log_message_dismiss_response> */
    use SdkModel;

    /**
     * Describes wether or not the operation was successful.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $success && $obj->success = $success;

        return $obj;
    }

    /**
     * Describes wether or not the operation was successful.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }
}
