<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new WirelessBlocklistUpdateParams); // set properties as needed
 * $client->wirelessBlocklists->update(...$params->toArray());
 * ```
 * Update a Wireless Blocklist.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->wirelessBlocklists->update(...$params->toArray());`
 *
 * @see Telnyx\WirelessBlocklists->update
 *
 * @phpstan-type wireless_blocklist_update_params = array{
 *   name?: string, type?: Type|value-of<Type>, values?: list<string>
 * }
 */
final class WirelessBlocklistUpdateParams implements BaseModel
{
    /** @use SdkModel<wireless_blocklist_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the Wireless Blocklist.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The type of wireless blocklist.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * Values to block. The values here depend on the `type` of Wireless Blocklist.
     *
     * @var list<string>|null $values
     */
    #[Api(list: 'string', optional: true)]
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
     * @param Type|value-of<Type> $type
     * @param list<string> $values
     */
    public static function with(
        ?string $name = null,
        Type|string|null $type = null,
        ?array $values = null
    ): self {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $type && $obj['type'] = $type;
        null !== $values && $obj->values = $values;

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
