<?php

declare(strict_types=1);

namespace Telnyx\UacConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UacConnections\UacConnectionDeleteResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\UacConnections\UacConnectionDeleteResponse\Data
 *
 * @phpstan-type UacConnectionDeleteResponseShape = array{
 *   data?: null|Data|DataShape
 * }
 */
final class UacConnectionDeleteResponse implements BaseModel
{
    /** @use SdkModel<UacConnectionDeleteResponseShape> */
    use SdkModel;

    /**
     * A UAC (User Agent Client) Connection registers Telnyx to your PBX — the opposite of a standard SIP trunk, where the PBX registers to Telnyx. Use UAC when your PBX doesn’t support outbound SIP registration or you need Telnyx to maintain the registration.
     */
    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A UAC (User Agent Client) Connection registers Telnyx to your PBX — the opposite of a standard SIP trunk, where the PBX registers to Telnyx. Use UAC when your PBX doesn’t support outbound SIP registration or you need Telnyx to maintain the registration.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
