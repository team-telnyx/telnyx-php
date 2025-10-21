<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams\Type;

/**
 * Create a Wireless Blocklist to prevent SIMs from connecting to certain networks.
 *
 * @see Telnyx\WirelessBlocklists->create
 *
 * @phpstan-type wireless_blocklist_create_params = array{
 *   name: string, type: Type|value-of<Type>, values: list<string>
 * }
 */
final class WirelessBlocklistCreateParams implements BaseModel
{
    /** @use SdkModel<wireless_blocklist_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the Wireless Blocklist.
     */
    #[Api]
    public string $name;

    /**
     * The type of wireless blocklist.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @var list<string> $values
     */
    #[Api(list: 'string')]
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
        $obj = new self;

        $obj->name = $name;
        $obj['type'] = $type;
        $obj->values = $values;

        return $obj;
    }

    /**
     * The name of the Wireless Blocklist.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The type of wireless blocklist.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }
}
