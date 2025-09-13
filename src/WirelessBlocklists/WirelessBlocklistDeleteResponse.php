<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type wireless_blocklist_delete_response = array{
 *   data?: WirelessBlocklist
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class WirelessBlocklistDeleteResponse implements BaseModel
{
    /** @use SdkModel<wireless_blocklist_delete_response> */
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
     */
    public static function with(?WirelessBlocklist $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(WirelessBlocklist $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
