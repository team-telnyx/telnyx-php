<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Address;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Contact;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Logo;

/**
 * @phpstan-type LoaConfigurationGetResponseShape = array{
 *   data?: PortingLoaConfiguration|null
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
     * @param PortingLoaConfiguration|array{
     *   id?: string|null,
     *   address?: Address|null,
     *   companyName?: string|null,
     *   contact?: Contact|null,
     *   createdAt?: \DateTimeInterface|null,
     *   logo?: Logo|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        PortingLoaConfiguration|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PortingLoaConfiguration|array{
     *   id?: string|null,
     *   address?: Address|null,
     *   companyName?: string|null,
     *   contact?: Contact|null,
     *   createdAt?: \DateTimeInterface|null,
     *   logo?: Logo|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingLoaConfiguration|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
