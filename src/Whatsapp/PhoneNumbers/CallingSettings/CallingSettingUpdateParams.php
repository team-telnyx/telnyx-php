<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\CallingSettings;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Enable or disable Whatsapp calling for a phone number.
 *
 * @see Telnyx\Services\Whatsapp\PhoneNumbers\CallingSettingsService::update()
 *
 * @phpstan-type CallingSettingUpdateParamsShape = array{enabled: bool}
 */
final class CallingSettingUpdateParams implements BaseModel
{
    /** @use SdkModel<CallingSettingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public bool $enabled;

    /**
     * `new CallingSettingUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallingSettingUpdateParams::with(enabled: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallingSettingUpdateParams)->withEnabled(...)
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
    public static function with(bool $enabled): self
    {
        $self = new self;

        $self['enabled'] = $enabled;

        return $self;
    }

    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }
}
