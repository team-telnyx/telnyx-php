<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a Wireless Blocklist.
 *
 * @see Telnyx\Services\WirelessBlocklistsService::update()
 *
 * @phpstan-type WirelessBlocklistUpdateParamsShape = array{
 *   name?: string|null, values?: list<string>|null
 * }
 */
final class WirelessBlocklistUpdateParams implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the Wireless Blocklist.
     */
    #[Optional]
    public ?string $name;

    /**
     * Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @var list<string>|null $values
     */
    #[Optional(list: 'string')]
    public ?array $values;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $values
     */
    public static function with(?string $name = null, ?array $values = null): self
    {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $values && $self['values'] = $values;

        return $self;
    }

    /**
     * The name of the Wireless Blocklist.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }
}
