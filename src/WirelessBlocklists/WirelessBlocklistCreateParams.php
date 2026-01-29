<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams\Type;

/**
 * Create a Wireless Blocklist to prevent SIMs from connecting to certain networks.
 *
 * @see Telnyx\Services\WirelessBlocklistsService::create()
 *
 * @phpstan-type WirelessBlocklistCreateParamsShape = array{
 *   name: string, type: Type|value-of<Type>, values: list<string>
 * }
 */
final class WirelessBlocklistCreateParams implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the Wireless Blocklist.
     */
    #[Required]
    public string $name;

    /**
     * The type of wireless blocklist.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @var list<string> $values
     */
    #[Required(list: 'string')]
    public array $values;

    /**
     * `new WirelessBlocklistCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WirelessBlocklistCreateParams::with(name: ..., type: ..., values: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WirelessBlocklistCreateParams)
     *   ->withName(...)
     *   ->withType(...)
     *   ->withValues(...)
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
     *
     * @param Type|value-of<Type> $type
     * @param list<string> $values
     */
    public static function with(
        string $name,
        Type|string $type,
        array $values
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['type'] = $type;
        $self['values'] = $values;

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
     * The type of wireless blocklist.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

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
