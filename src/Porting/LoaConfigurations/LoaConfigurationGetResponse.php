<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingLoaConfigurationShape from \Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration
 *
 * @phpstan-type LoaConfigurationGetResponseShape = array{
 *   data?: null|PortingLoaConfiguration|PortingLoaConfigurationShape
 * }
 */
final class LoaConfigurationGetResponse implements BaseModel
{
    /** @use SdkModel<LoaConfigurationGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingLoaConfiguration $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingLoaConfiguration|PortingLoaConfigurationShape|null $data
     */
    public static function with(
        PortingLoaConfiguration|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingLoaConfiguration|PortingLoaConfigurationShape $data
     */
    public function withData(PortingLoaConfiguration|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
