<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   channelLimit?: int,
 *   email?: string,
 *   managerAccountID?: string,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The user ID of the managed account.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Integer value that indicates the number of allocatable global outbound channels that are allocated to the managed account. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     */
    #[Api('channel_limit', optional: true)]
    public ?int $channelLimit;

    /**
     * The email of the managed account.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * The user ID of the manager of the account.
     */
    #[Api('manager_account_id', optional: true)]
    public ?string $managerAccountID;

    /**
     * The name of the type of data in the response.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?int $channelLimit = null,
        ?string $email = null,
        ?string $managerAccountID = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $channelLimit && $obj->channelLimit = $channelLimit;
        null !== $email && $obj->email = $email;
        null !== $managerAccountID && $obj->managerAccountID = $managerAccountID;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The user ID of the managed account.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Integer value that indicates the number of allocatable global outbound channels that are allocated to the managed account. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj->channelLimit = $channelLimit;

        return $obj;
    }

    /**
     * The email of the managed account.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * The user ID of the manager of the account.
     */
    public function withManagerAccountID(string $managerAccountID): self
    {
        $obj = clone $this;
        $obj->managerAccountID = $managerAccountID;

        return $obj;
    }

    /**
     * The name of the type of data in the response.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
