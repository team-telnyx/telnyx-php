<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\BusinessAccounts\Settings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WabaSettingsShape from \Telnyx\Whatsapp\BusinessAccounts\Settings\WabaSettings
 *
 * @phpstan-type SettingUpdateResponseShape = array{
 *   data?: null|WabaSettings|WabaSettingsShape
 * }
 */
final class SettingUpdateResponse implements BaseModel
{
    /** @use SdkModel<SettingUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WabaSettings $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WabaSettings|WabaSettingsShape|null $data
     */
    public static function with(WabaSettings|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WabaSettings|WabaSettingsShape $data
     */
    public function withData(WabaSettings|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
