<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SMSFallbackShape = array{from?: string, text?: string}
 */
final class SMSFallback implements BaseModel
{
    /** @use SdkModel<SMSFallbackShape> */
    use SdkModel;

    /**
     * Phone number in +E.164 format.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * Text (maximum 3072 characters).
     */
    #[Api(optional: true)]
    public ?string $text;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $from = null, ?string $text = null): self
    {
        $obj = new self;

        null !== $from && $obj->from = $from;
        null !== $text && $obj->text = $text;

        return $obj;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * Text (maximum 3072 characters).
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
