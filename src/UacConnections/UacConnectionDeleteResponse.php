<?php

declare(strict_types=1);

namespace Telnyx\UacConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UacConnectionShape from \Telnyx\UacConnections\UacConnection
 *
 * @phpstan-type UacConnectionDeleteResponseShape = array{
 *   data?: null|UacConnection|UacConnectionShape
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
    public ?UacConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UacConnection|UacConnectionShape|null $data
     */
    public static function with(UacConnection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A UAC (User Agent Client) Connection registers Telnyx to your PBX — the opposite of a standard SIP trunk, where the PBX registers to Telnyx. Use UAC when your PBX doesn’t support outbound SIP registration or you need Telnyx to maintain the registration.
     *
     * @param UacConnection|UacConnectionShape $data
     */
    public function withData(UacConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
