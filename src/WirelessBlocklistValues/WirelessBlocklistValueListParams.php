<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams\Type;

/**
 * Retrieve all wireless blocklist values for a given blocklist type.
 *
 * @see Telnyx\Services\WirelessBlocklistValuesService::list()
 *
 * @phpstan-type WirelessBlocklistValueListParamsShape = array{
 *   type: Type|value-of<Type>
 * }
 */
final class WirelessBlocklistValueListParams implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistValueListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The Wireless Blocklist type for which to list possible values (e.g., `country`, `mcc`, `plmn`).
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new WirelessBlocklistValueListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WirelessBlocklistValueListParams::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WirelessBlocklistValueListParams)->withType(...)
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
     */
    public static function with(Type|string $type): self
    {
        $obj = new self;

        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The Wireless Blocklist type for which to list possible values (e.g., `country`, `mcc`, `plmn`).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
