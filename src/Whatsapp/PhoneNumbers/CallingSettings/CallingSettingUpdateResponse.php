<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\CallingSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallingSettingsDataShape from \Telnyx\Whatsapp\PhoneNumbers\CallingSettings\CallingSettingsData
 *
 * @phpstan-type CallingSettingUpdateResponseShape = array{
 *   data?: null|CallingSettingsData|CallingSettingsDataShape
 * }
 */
final class CallingSettingUpdateResponse implements BaseModel
{
    /** @use SdkModel<CallingSettingUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CallingSettingsData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallingSettingsData|CallingSettingsDataShape|null $data
     */
    public static function with(CallingSettingsData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallingSettingsData|CallingSettingsDataShape $data
     */
    public function withData(CallingSettingsData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
