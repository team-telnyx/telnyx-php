<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountUpdateGlobalChannelLimitResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   channel_limit?: int|null,
 *   email?: string|null,
 *   manager_account_id?: string|null,
 *   record_type?: string|null,
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
    #[Api(optional: true)]
    public ?int $channel_limit;

    /**
     * The email of the managed account.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * The user ID of the manager of the account.
     */
    #[Api(optional: true)]
    public ?string $manager_account_id;

    /**
     * The name of the type of data in the response.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
        ?int $channel_limit = null,
        ?string $email = null,
        ?string $manager_account_id = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $channel_limit && $obj['channel_limit'] = $channel_limit;
        null !== $email && $obj['email'] = $email;
        null !== $manager_account_id && $obj['manager_account_id'] = $manager_account_id;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * The user ID of the managed account.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Integer value that indicates the number of allocatable global outbound channels that are allocated to the managed account. If the value is 0 then the account will have no usable channels and will not be able to perform outbound calling.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj['channel_limit'] = $channelLimit;

        return $obj;
    }

    /**
     * The email of the managed account.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * The user ID of the manager of the account.
     */
    public function withManagerAccountID(string $managerAccountID): self
    {
        $obj = clone $this;
        $obj['manager_account_id'] = $managerAccountID;

        return $obj;
    }

    /**
     * The name of the type of data in the response.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
