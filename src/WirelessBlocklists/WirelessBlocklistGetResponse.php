<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklists\WirelessBlocklist\Type;

/**
 * @phpstan-type WirelessBlocklistGetResponseShape = array{
 *   data?: WirelessBlocklist|null
 * }
 */
final class WirelessBlocklistGetResponse implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WirelessBlocklist $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WirelessBlocklist|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   values?: list<string>|null,
     * } $data
     */
    public static function with(WirelessBlocklist|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WirelessBlocklist|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   values?: list<string>|null,
     * } $data
     */
    public function withData(WirelessBlocklist|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
