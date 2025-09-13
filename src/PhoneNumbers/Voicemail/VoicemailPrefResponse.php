<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type voicemail_pref_response = array{enabled?: bool, pin?: string}
 */
final class VoicemailPrefResponse implements BaseModel
{
    /** @use SdkModel<voicemail_pref_response> */
    use SdkModel;

    /**
     * Whether voicemail is enabled.
     */
    #[Api(optional: true)]
    public ?bool $enabled;

    /**
     * The pin used for the voicemail.
     */
    #[Api(optional: true)]
    public ?string $pin;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $enabled = null, ?string $pin = null): self
    {
        $obj = new self;

        null !== $enabled && $obj->enabled = $enabled;
        null !== $pin && $obj->pin = $pin;

        return $obj;
    }

    /**
     * Whether voicemail is enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj->enabled = $enabled;

        return $obj;
    }

    /**
     * The pin used for the voicemail.
     */
    public function withPin(string $pin): self
    {
        $obj = clone $this;
        $obj->pin = $pin;

        return $obj;
    }
}
