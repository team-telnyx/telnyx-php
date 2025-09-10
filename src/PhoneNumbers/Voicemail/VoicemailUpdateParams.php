<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VoicemailUpdateParams); // set properties as needed
 * $client->phoneNumbers.voicemail->update(...$params->toArray());
 * ```
 * Update voicemail settings for a phone number.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumbers.voicemail->update(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumbers\Voicemail->update
 *
 * @phpstan-type voicemail_update_params = array{enabled?: bool, pin?: string}
 */
final class VoicemailUpdateParams implements BaseModel
{
    /** @use SdkModel<voicemail_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether voicemail is enabled.
     */
    #[Api(optional: true)]
    public ?bool $enabled;

    /**
     * The pin used for voicemail.
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
     * The pin used for voicemail.
     */
    public function withPin(string $pin): self
    {
        $obj = clone $this;
        $obj->pin = $pin;

        return $obj;
    }
}
