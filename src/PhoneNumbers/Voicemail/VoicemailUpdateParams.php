<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update voicemail settings for a phone number.
 *
 * @see Telnyx\Services\PhoneNumbers\VoicemailService::update()
 *
 * @phpstan-type VoicemailUpdateParamsShape = array{enabled?: bool, pin?: string}
 */
final class VoicemailUpdateParams implements BaseModel
{
    /** @use SdkModel<VoicemailUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether voicemail is enabled.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * The pin used for voicemail.
     */
    #[Optional]
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

        null !== $enabled && $obj['enabled'] = $enabled;
        null !== $pin && $obj['pin'] = $pin;

        return $obj;
    }

    /**
     * Whether voicemail is enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj['enabled'] = $enabled;

        return $obj;
    }

    /**
     * The pin used for voicemail.
     */
    public function withPin(string $pin): self
    {
        $obj = clone $this;
        $obj['pin'] = $pin;

        return $obj;
    }
}
