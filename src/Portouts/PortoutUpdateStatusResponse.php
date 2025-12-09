<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\PortoutDetails\Status;

/**
 * @phpstan-type PortoutUpdateStatusResponseShape = array{
 *   data?: PortoutDetails|null
 * }
 */
final class PortoutUpdateStatusResponse implements BaseModel
{
    /** @use SdkModel<PortoutUpdateStatusResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortoutDetails $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortoutDetails|array{
     *   id?: string|null,
     *   alreadyPorted?: bool|null,
     *   authorizedName?: string|null,
     *   carrierName?: string|null,
     *   city?: string|null,
     *   createdAt?: string|null,
     *   currentCarrier?: string|null,
     *   endUserName?: string|null,
     *   focDate?: string|null,
     *   hostMessaging?: bool|null,
     *   insertedAt?: string|null,
     *   lsr?: list<string>|null,
     *   phoneNumbers?: list<string>|null,
     *   pon?: string|null,
     *   reason?: string|null,
     *   recordType?: string|null,
     *   rejectionCode?: int|null,
     *   requestedFocDate?: string|null,
     *   serviceAddress?: string|null,
     *   spid?: string|null,
     *   state?: string|null,
     *   status?: value-of<Status>|null,
     *   supportKey?: string|null,
     *   updatedAt?: string|null,
     *   userID?: string|null,
     *   vendor?: string|null,
     *   zip?: string|null,
     * } $data
     */
    public static function with(PortoutDetails|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PortoutDetails|array{
     *   id?: string|null,
     *   alreadyPorted?: bool|null,
     *   authorizedName?: string|null,
     *   carrierName?: string|null,
     *   city?: string|null,
     *   createdAt?: string|null,
     *   currentCarrier?: string|null,
     *   endUserName?: string|null,
     *   focDate?: string|null,
     *   hostMessaging?: bool|null,
     *   insertedAt?: string|null,
     *   lsr?: list<string>|null,
     *   phoneNumbers?: list<string>|null,
     *   pon?: string|null,
     *   reason?: string|null,
     *   recordType?: string|null,
     *   rejectionCode?: int|null,
     *   requestedFocDate?: string|null,
     *   serviceAddress?: string|null,
     *   spid?: string|null,
     *   state?: string|null,
     *   status?: value-of<Status>|null,
     *   supportKey?: string|null,
     *   updatedAt?: string|null,
     *   userID?: string|null,
     *   vendor?: string|null,
     *   zip?: string|null,
     * } $data
     */
    public function withData(PortoutDetails|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
