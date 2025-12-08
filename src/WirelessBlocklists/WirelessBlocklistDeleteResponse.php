<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklists\WirelessBlocklist\Type;

/**
 * @phpstan-type WirelessBlocklistDeleteResponseShape = array{
 *   data?: WirelessBlocklist|null
 * }
 */
final class WirelessBlocklistDeleteResponse implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistDeleteResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   created_at?: string|null,
     *   name?: string|null,
     *   record_type?: string|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     *   values?: list<string>|null,
     * } $data
     */
    public static function with(WirelessBlocklist|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param WirelessBlocklist|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   name?: string|null,
     *   record_type?: string|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     *   values?: list<string>|null,
     * } $data
     */
    public function withData(WirelessBlocklist|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
